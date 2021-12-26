<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class KapanLagiAPIController extends ProvinceController
{
    public function getProvinces()
    {
        // if data json is null execute this
        $this->Store();


        // return data json
        $data = Province::all();

        // return data
        return response()->json($data);
    }

    public function getCities()
    {
        $this->Store();
        $data = City::all();

        // return data
        return response()->json($data);
    }
}
