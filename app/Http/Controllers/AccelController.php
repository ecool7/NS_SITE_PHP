<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\AccelData;

class AccelController extends Controller
{
    public function index()
    {
        $accelList = AccelData::getAccelList();
        return view('ACCEL.accelerometer', compact('accelList'));
    }

    public function product($id = null)
    {
        if ($id) {
            $product = AccelData::getAccelById($id);
            if (!$product) {
                abort(404);
            }
            return view('ACCEL.accelproduct', compact('product'));
        }
        
        // Если ID не указан, показываем первый продукт
        $products = AccelData::getAccelSensors();
        $product = $products[0] ?? null;
        
        if (!$product) {
            abort(404);
        }
        
        return view('ACCEL.accelproduct', compact('product'));
    }
}