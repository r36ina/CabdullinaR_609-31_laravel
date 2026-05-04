<?php

namespace App\Http\Controllers;

use App\Models\Medworker;
use Illuminate\Http\Request;
use App\Models\ServicesCategory;

class ServicesCategoryControllerApi extends Controller
{
    public function index()
    {
        return response(ServicesCategory::all());
    }
}
