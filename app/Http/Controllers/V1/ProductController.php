<?php

namespace App\Http\Controllers\V1;

use App\Events\ProductEvent;
use App\Models\V1\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\CreateProductJob;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'type' => 'required|in:event,queue-job'
        ]);

        try {

            if ($request->type == "event")
            {
                event(new ProductEvent(fake()->name(), fake()->numberBetween(1, 10)));
            }
            else {
                CreateProductJob::dispatch(fake()->name(),
                fake()->numberBetween(1, 10));
            }

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
