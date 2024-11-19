<?php

namespace App\Console\Commands;

use App\Models\V1\Product;
use Illuminate\Console\Command;

class CreateProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-product-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = fake()->name();
        $amount = fake()->numberBetween(1, 10);

        Product::create([
            'name' => $name,
            'amount' => $amount
        ]);
    }
}
