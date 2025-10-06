<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\ImuData;

class ImuController extends Controller
{
    public function index()
    {
        $imuList = ImuData::getImuList();
        return view('IMU.imu', compact('imuList'));
    }

    public function product($id = null)
    {
        if ($id) {
            $product = ImuData::getImuById($id);
            if (!$product) {
                abort(404);
            }
            return view('IMU.IMUproduct', compact('product'));
        }
        
        // Если ID не указан, показываем первый продукт
        $products = ImuData::getImuSensors();
        $product = $products[0] ?? null;
        
        if (!$product) {
            abort(404);
        }
        
        return view('IMU.IMUproduct', compact('product'));
    }
}