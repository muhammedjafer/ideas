<?php

namespace App\Jobs;

use App\Models\V1\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreateProductJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $name,
        public int $amount
    )
    {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Product::create([
            'name' => $this->name,
            'amount' => $this->amount
        ]);
    }
}
