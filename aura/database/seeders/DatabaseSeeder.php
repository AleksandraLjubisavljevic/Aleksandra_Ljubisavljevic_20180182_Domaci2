<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Distributor;
use App\Models\User;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        User::truncate();
        Product::truncate();
        Distributor::truncate();

        $user = User::factory()->create();

        
        $cat1 = Category::factory()->create();
        $cat2 = Category::factory()->create();

        $dist1=Distributor::factory()->create();
        $dist2=Distributor::factory()->create();

        Product::factory(5)->create([
            'user_id'=>$user->id,
            'category_id'=>$cat1->id,
            'distributor_id'=>$dist1->id,
        ]);

        Product::factory(2)->create([
            'user_id'=>$user->id,
            'category_id'=>$cat2->id,
            'distributor_id'=>$dist2->id,
        ]);
    }
}
