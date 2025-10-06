<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\GyroData;

class GyroController extends Controller
{
    public function index()
    {
        $gyroscopes = GyroData::getGyroscopes();
        return view('GYROS.gyroscope', compact('gyroscopes'));
    }

    public function product($id = null)
    {
        if ($id) {
            $product = GyroData::getGyroById($id);
            if (!$product) {
                abort(404);
            }
            return view('GYROS.gyroproduct', compact('product'));
        }
        
        // Если ID не указан, показываем первый продукт
        $products = GyroData::getSensorsGyro();
        $product = $products[0] ?? null;
        
        if (!$product) {
            abort(404);
        }
        
        return view('GYROS.gyroproduct', compact('product'));
    }
}