<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        \App\Models\Category::factory(3)->create();
        \App\Models\Theme::factory(2)->create();

        \App\Models\Product::factory(2)->create([
            'category_id' => 1
        ]);

        \App\Models\Product::factory(2)->create([
            'category_id' => 2
        ]);

        \App\Models\Product::factory(2)->create([
            'category_id' => 3
        ]);

        \App\Models\Post::factory(5)->create([
            'theme_id' => 1
        ]);

        \App\Models\Post::factory(5)->create([
            'theme_id' => 2
        ]);

        \App\Models\Image::factory(1)->create();
        
        \App\Models\Image::factory(1)->create([
            'product_id' => 1
        ]);

        \App\Models\Image::factory(1)->create([
            'post_id' => 2
        ]);


        \App\Models\Role::factory()->create([
            'name' => 'sample'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'distributor'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'administrator'
        ]);

        \App\Models\User::factory(5)->create();

        $user1 = \App\Models\User::find(1);
        $user2 = \App\Models\User::find(2);
        $user3 = \App\Models\User::find(3);

        $roleAdmin = [1, 2, 3];
        $roleDistributor = [1, 2];
        $roleSample = [1];

        $user1->roles()->attach($roleAdmin);
        $user2->roles()->attach($roleDistributor);
        $user3->roles()->attach($roleSample);


        \App\Models\Order::factory()->create([
            'user_id' => 2
        ]);
        \App\Models\Order::factory(2)->create([
            'user_id' => 3
        ]);
        
        $product1 = \App\Models\Product::find(1);
        $product2 = \App\Models\Product::find(2);
        $product3 = \App\Models\Product::find(3);

        $order1 = \App\Models\Order::find(1);
        $order2 = \App\Models\Order::find(2);

        $product1->orders()->attach($order1);
        $product2->orders()->attach($order1);
        $product3->orders()->attach($order2);
    }
}
