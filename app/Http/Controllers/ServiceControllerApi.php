<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Exception;

class ServiceControllerApi extends Controller
{
    public function index(Request $request)
    {
        return response(Service::with('category')
            ->limit($request->perpage ?? 3)
            ->offset(($request->perpage ?? 3) * ($request->page ?? 0))
            ->get());
    }

    public function total()
    {
        return response(Service::all()->count());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
