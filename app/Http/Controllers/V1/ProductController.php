<?php

namespace App\Http\Controllers\V1;

use App\Events\ProductEvent;
use App\Models\V1\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        try {

            event(new ProductEvent(fake()->name(), fake()->numberBetween(1, 10)));

            return response()->streamJson([
                'message' => 'Product created successfully'
            ], 201);
            
        } catch (\Throwable $th) {
            return response()->streamJson([
                'error' => $th
            ], 400);
        }
    }
}
