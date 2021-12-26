<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KapanLagiAPIController extends ProvinceController
{
    public function getProvinces()
    {
        // if data json is null execute this
        $this->Store();


        // get data from json web
        $json = file_get_contents('https://d.kapanlaginetwork.com/banner/test/province.json');

        // decode json to array
        $data = json_decode($json, true);

        // return data
        return response()->json($data);
    }

    public function getCities()
    {
        // get data from json web
        $json = file_get_contents('https://d.kapanlaginetwork.com/banner/test/city.json');

        // decode json to array
        $data = json_decode($json, true);

        // return data
        return response()->json($data);
    }
}
