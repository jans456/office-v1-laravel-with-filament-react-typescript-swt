<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CityResource;
use Illuminate\Http\Request;
use App\Models\City;


class CityController extends Controller
{
    public function index()
    {
        $cities = City::withCount('officeSpaces')->get();
        return CityResource::collection($cities); //collection ingin menampilkan lebih dari 1 cities
    }

    public function show(City  $city) //model binding 
    {
        $city->load(['officeSpaces.city', 'officeSpaces.photos']);
        $city->loadCount('officeSpaces');
        return new CityResource($city);// membahas detail kota yang dipilih makannya menggunakan new
    }
}
