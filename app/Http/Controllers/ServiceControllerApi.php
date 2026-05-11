<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class ServiceControllerApi extends Controller
{
    public function index(Request $request)
    {
        return response(Service::with('category')
            ->limit($request->perpage ?? 3)
            ->offset(($request->perpage ?? 3) * ($request->page ?? 0))
            ->where('name', 'ILIKE', '%' . $request->search . '%')
            ->get());
    }

    public function total(Request $request)
    {
        return response(Service::where('name', 'ILIKE', '%' . $request->search . '%')->count());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Gate::allows('create-service')) {
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление новой услуги',
            ]);
        }
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'required|file',
        ]);
        $file = $request->file('image');
        $fileName = rand(1, 1000000).'_'.$file->getClientOriginalName();
        try {
            $path = Storage::disk('s3')->putFileAs('services_img', $file, $fileName);
            $fileUrl = Storage::disk('s3')->url($path);
        } catch (Exception $ex) {
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка загрузки файла в хранилище S3',
            ]);
        };
        $service = new Service($validated);
        $service->image_url = $fileUrl;
        $service->save();
        return response()->json([
            'code' => 0,
            'message' => 'Услуга успешно добавлена'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Service::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (! Gate::allows('update-service')) {
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на редактирование услуги',
            ]);
        }
        $validated = $request->validate([
            'name' => 'required|max:255|unique:services,name,' . $id,
            'description' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required',
            'image' => 'nullable|file|image|max:2048',
        ]);
        try {
            $service = Service::findOrFail($id);
            if ($request->input('delete_image') === 'true' && !$request->hasFile('image')) {
                if ($service->image_url) {
                    $path = parse_url($service->image_url, PHP_URL_PATH);
                    $oldPath = ltrim($path, '/');
                    if (Storage::disk('s3')->exists($oldPath)) {
                        Storage::disk('s3')->delete($oldPath);
                    }
                    $service->image_url = null;
                }
            }
            $service->name = $validated['name'];
            $service->description = $validated['description'];
            $service->price = $validated['price'];
            $service->category_id = $validated['category_id'];
            if ($request->hasFile('image')) {
                try {
                    if ($service->image_url) {
                        $path = parse_url($service->image_url, PHP_URL_PATH);
                        $oldPath = ltrim($path, '/');
                        if (Storage::disk('s3')->exists($oldPath)) {
                            Storage::disk('s3')->delete($oldPath);
                        }
                    }
                    $file = $request->file('image');
                    $fileName = rand(1, 1000000).'_'.$file->getClientOriginalName();
                    $path = Storage::disk('s3')->putFileAs('services_img', $file, $fileName);
                    $service->image_url = Storage::disk('s3')->url($path);

                } catch (Exception $ex) {
                    return response()->json([
                        'message' => 'Ошибка загрузки файла в s3 хранилище',
                        'error' => [
                            'code' => $ex->getCode(),
                            'message' => $ex->getMessage(),
                        ]
                    ], 500);
                }
            }
            $service->save();
            return response()->json([
                'code' => 0,
                'message' => 'Услуга успешно обновлена'
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка при обновлении: ' . $ex->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Gate::allows('destroy-service')) {
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на удаление услуги'
            ], 401);
        }
        $service = Service::find($id);
        if (!$service) {
            return response()->json([
                'code' => 1,
                'error' => 'Услуга не найдена'
            ]);
        }
        if ($service->image_url) {
            $path = parse_url($service->image_url, PHP_URL_PATH);
            $oldPath = ltrim($path, '/');
            if (Storage::disk('s3')->exists($oldPath)) {
                Storage::disk('s3')->delete($oldPath);
            }
        }
        Service::destroy($id);
        return response()->json([
            'code' => 0,
            'message' => 'Услуга успешна удалена'
        ]);
    }
}
