<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create();
        factory(App\Invoice::class, 300)->create();
        factory(App\Product::class, 400)->create();
        factory(App\Item::class, 500)->create();
    }
}
