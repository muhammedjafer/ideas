<?php

use App\Models\V1\Product;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\CreateProductCommand;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::command(CreateProductCommand::class)->everySecond();

// Schedule::call(function () {
//     Product::truncate();
// })->everySecond();