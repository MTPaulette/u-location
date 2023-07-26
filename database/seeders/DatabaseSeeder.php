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
        
        \App\Models\Info::factory()->create();
        \App\Models\Category::factory(50)->create();
        \App\Models\Theme::factory(20)->create();
        
        \App\Models\Country::factory(5)->create();

        \App\Models\City::factory(20)->create([
            'country_id' => 1
        ]);
        \App\Models\City::factory()->create([
            'country_id' => 2
        ]);
        \App\Models\City::factory(2)->create([
            'country_id' => 3
        ]);
        \App\Models\City::factory(2)->create([
            'country_id' => 4
        ]);

        \App\Models\Address::factory(50)->create();

        \App\Models\User::factory(2)->create([
            'city_id' => 4
        ]);
        \App\Models\User::factory(10)->create([
            'city_id' => 1
        ]);
        \App\Models\User::factory(5)->create([
            'city_id' => 3
        ]);
        \App\Models\User::factory(7)->create([
            'city_id' => 7
        ]);
        

        \App\Models\Product::factory(10)->create([
            'category_id' => 1,
            'user_id' => 1,
        ]);

        \App\Models\Product::factory(7)->create([
            'category_id' => 2,
            'user_id' => 3,
        ]);

        \App\Models\Product::factory(5)->create([
            'category_id' => 7,
            'user_id' => 2,
        ]);

        \App\Models\Product::factory(3)->create([
            'category_id' => 9,
            'user_id' => 2,
        ]);

        \App\Models\Product::factory(4)->create([
            'category_id' => 10,
            'user_id' => 2,
        ]);


        \App\Models\Post::factory(15)->create([
            'theme_id' => 1,
            'user_id' => 2,
        ]);

        \App\Models\Post::factory(5)->create([
            'theme_id' => 2,
            'user_id' => 1,
        ]);
        \App\Models\Post::factory(5)->create([
            'theme_id' => 2,
            'user_id' => 7,
        ]);
        \App\Models\Post::factory(5)->create([
            'theme_id' => 2,
            'user_id' => 4,
        ]);

        /* role */
        \App\Models\Role::factory()->create([
            'name' => 'administrator'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'distributor'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'sample'
        ]);


    /*
        $users = \App\Models\User::all();
        foreach($users as $user) {
            $user->roles()->attach(1);
        }

        $user1 = \App\Models\User::find(8);
        $user2 = \App\Models\User::find(2);
        $user3 = \App\Models\User::find(3);

        $roleAdmin = [1, 2, 3];
        $roleDistributor = [1, 2];

        $user1->roles()->sync($roleAdmin);
        $user2->roles()->sync($roleDistributor);
        $user3->roles()->sync($roleDistributor);
    */


        \App\Models\Order::factory()->create([
            'user_id' => 2
        ]);
        \App\Models\Order::factory(2)->create([
            'user_id' => 3
        ]);
        
        $product1 = \App\Models\Product::find(1);
        $product2 = \App\Models\Product::find(2);
        $product3 = \App\Models\Product::find(3);

        $city1 = \App\Models\Product::find(1);
        $city2 = \App\Models\Product::find(2);
        $city3 = \App\Models\Product::find(3);

        $order1 = \App\Models\Order::find(1);
        $order2 = \App\Models\Order::find(2);

        $city1->orders()->attach($order1);
        $city2->orders()->attach($order1);
        $city3->orders()->attach($order2);

        $product1->orders()->attach($order1);
        $product2->orders()->attach($order1);
        $product3->orders()->attach($order2);

        \App\Models\Advantage::factory(10)->create();
        
        $a1 = \App\Models\Advantage::find(1);
        $a2 = \App\Models\Advantage::find(2);
        $a3 = \App\Models\Advantage::find(3);

        $product1->advantages()->attach($a1);
        $product1->advantages()->attach($a3);
        $product2->advantages()->attach($a1);
        $product3->advantages()->attach($a2);


        \App\Models\Ingredient::factory(15)->create();
        
        $i1 = \App\Models\Ingredient::find(1);
        $i2 = \App\Models\Ingredient::find(2);
        $i3 = \App\Models\Ingredient::find(3);

        $product1->ingredients()->attach($i1);
        $product1->ingredients()->attach($i3);
        $product2->ingredients()->attach($i1);
        $product3->ingredients()->attach($i2);

        \App\Models\Weight::factory()->create([ 'name' => '100g']);
        \App\Models\Weight::factory()->create([ 'name' => '200g']);
        \App\Models\Weight::factory()->create([ 'name' => '350g']);
        \App\Models\Weight::factory()->create([ 'name' => '500g']);
        \App\Models\Weight::factory()->create([ 'name' => '1kg']);


        $w1 = \App\Models\Weight::find(1);
        $w2 = \App\Models\Weight::find(2);
        $w3 = \App\Models\Weight::find(3);

        $product1->weights()->attach($w1, ['price' => 25000, 'initial_stock' => 500, 'remaining_stock' => 500]);
        $product1->weights()->attach($w3, ['price' => 2500, 'initial_stock' => 350, 'remaining_stock' => 350]);
        $product2->weights()->attach($w1, ['price' => 7500, 'initial_stock' => 800, 'remaining_stock' => 800]);
        $product3->weights()->attach($w2, ['price' => 10000, 'initial_stock' => 750, 'remaining_stock' => 750]);

        \App\Models\Product::find(5)->weights()->attach($w1, ['price' => 25000, 'initial_stock' => 500, 'remaining_stock' => 500]);
        \App\Models\Product::find(5)->weights()->attach($w3, ['price' => 2500, 'initial_stock' => 350, 'remaining_stock' => 350]);
        \App\Models\Product::find(15)->weights()->attach($w1, ['price' => 7500, 'initial_stock' => 800, 'remaining_stock' => 800]);
        \App\Models\Product::find(15)->weights()->attach($w2, ['price' => 10000, 'initial_stock' => 750, 'remaining_stock' => 750]);



        \App\Models\Product::find(6)->weights()->attach($w1, ['price' => 25000, 'initial_stock' => 500, 'remaining_stock' => 500]);
        \App\Models\Product::find(6)->weights()->attach($w3, ['price' => 2500, 'initial_stock' => 350, 'remaining_stock' => 350]);
        \App\Models\Product::find(16)->weights()->attach($w1, ['price' => 7500, 'initial_stock' => 800, 'remaining_stock' => 800]);
        \App\Models\Product::find(16)->weights()->attach($w2, ['price' => 10000, 'initial_stock' => 750, 'remaining_stock' => 750]);
        

        \App\Models\Product::find(7)->weights()->attach($w1, ['price' => 25000, 'initial_stock' => 500, 'remaining_stock' => 500]);
        \App\Models\Product::find(7)->weights()->attach($w3, ['price' => 2500, 'initial_stock' => 350, 'remaining_stock' => 350]);
        \App\Models\Product::find(17)->weights()->attach($w1, ['price' => 7500, 'initial_stock' => 800, 'remaining_stock' => 800]);
        \App\Models\Product::find(17)->weights()->attach($w2, ['price' => 10000, 'initial_stock' => 750, 'remaining_stock' => 750]);

        \App\Models\Product::find(8)->weights()->attach($w1, ['price' => 25000, 'initial_stock' => 500, 'remaining_stock' => 500]);
        \App\Models\Product::find(8)->weights()->attach($w3, ['price' => 2500, 'initial_stock' => 350, 'remaining_stock' => 350]);
        \App\Models\Product::find(28)->weights()->attach($w1, ['price' => 7500, 'initial_stock' => 800, 'remaining_stock' => 800]);
        \App\Models\Product::find(28)->weights()->attach($w2, ['price' => 10000, 'initial_stock' => 750, 'remaining_stock' => 750]);

        \App\Models\Product::find(13)->weights()->attach($w1, ['price' => 25000, 'initial_stock' => 500, 'remaining_stock' => 500]);
        \App\Models\Product::find(13)->weights()->attach($w3, ['price' => 2500, 'initial_stock' => 350, 'remaining_stock' => 350]);
        \App\Models\Product::find(18)->weights()->attach($w1, ['price' => 7500, 'initial_stock' => 800, 'remaining_stock' => 800]);
        \App\Models\Product::find(18)->weights()->attach($w2, ['price' => 10000, 'initial_stock' => 750, 'remaining_stock' => 750]);


        \App\Models\Product::find(12)->weights()->attach($w1, ['price' => 25000, 'initial_stock' => 500, 'remaining_stock' => 500]);
        \App\Models\Product::find(12)->weights()->attach($w3, ['price' => 2500, 'initial_stock' => 350, 'remaining_stock' => 350]);
        \App\Models\Product::find(24)->weights()->attach($w1, ['price' => 7500, 'initial_stock' => 800, 'remaining_stock' => 800]);
        \App\Models\Product::find(24)->weights()->attach($w2, ['price' => 10000, 'initial_stock' => 750, 'remaining_stock' => 750]);


        // $product1->weights()->attach($w3);
        // $product2->weights()->attach($w1);
        // $product3->weights()->attach($w2);
        
}
}