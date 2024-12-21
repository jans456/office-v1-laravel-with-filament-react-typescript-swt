<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\OfficeSpaceResource;
use App\Models\OfficeSpace;
use Illuminate\Http\Request;

class OfficeSpaceController extends Controller
{
    public function index()
    {
        $officeSpaces = OfficeSpace::with('city')->get();
        return OfficeSpaceResource::collection($officeSpaces); //collection ingin menampilkan lebih dari 1 
    }

    public function show(OfficeSpace  $officeSpace) //model binding 
    {
        $officeSpace->load(['city', 'photos', 'benefits']);
        return new OfficeSpaceResource($officeSpace);// membahas detail  yang dipilih makannya menggunakan new
    }
}
