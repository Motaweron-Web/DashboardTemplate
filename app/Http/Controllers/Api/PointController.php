<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\User;
use App\Traits\GeneralTrait;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PointController extends Controller
{
    use GeneralTrait,PhotoTrait;

    public function latestPoints(request $request)
    {
        $data = Point::latest()->get()->take(4);
        return $this->returnData('data',$data);
    }

    public function allPoints(request $request)
    {
        $data = Point::all();
        return $this->returnData('data',$data);
    }

}
