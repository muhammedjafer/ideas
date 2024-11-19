<?php

namespace App\Listeners;

use App\Models\V1\Product;
use App\Events\ProductEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateProduct
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductEvent $event): void
    {
        Product::create([
            'name' => fake()->name(),
            'amount' => fake()->numberBetween(2, 10)
        ]);
    }
}
