<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Carbon\Carbon;

class ExpireProducts extends Command
{
    protected $signature = 'expire:products';
    protected $description = 'Mark products as sold out if they are expired';

    public function handle()
    {
        $this->info('Checking and updating product statuses...');

        // Find products where the expiration date is less than or equal to the current date
        $expiredProducts = Product::where('expired_date', '<=', now())->get();

        foreach ($expiredProducts as $product) {
            // Update the product status to "sold out"
            $product->update(['sold_out' => 1]);
        }

        $this->info('Product statuses updated successfully.');
    }
}
