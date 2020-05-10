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
        factory(App\Invoice::class, 70)->create();
        factory(App\Product::class, 100)->create();
        factory(App\Item::class, 80)->create();
    }
}
