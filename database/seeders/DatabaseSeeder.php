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
        \App\Models\Category::factory(3)->create();
        \App\Models\Theme::factory(2)->create();

        \App\Models\Image::factory(1)->create();
        
        \App\Models\Image::factory(1)->create([
            'product_id' => 1
        ]);

        \App\Models\Image::factory(1)->create([
            'post_id' => 2
        ]);

        
        \App\Models\Country::factory(5)->create();

        \App\Models\City::factory(2)->create([
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


        \App\Models\User::factory(2)->create([
            'is_admin' => true,
            'city_id' => 4
        ]);
        \App\Models\User::factory(2)->create([
            'is_distributor' => true,
            'city_id' => 1
        ]);
        \App\Models\User::factory()->create([
            'city_id' => 3
        ]);
        \App\Models\User::factory(2)->create([
            'city_id' => 7
        ]);
        

        \App\Models\Product::factory(2)->create([
            'category_id' => 1,
            'user_id' => 1,
        ]);

        \App\Models\Product::factory(2)->create([
            'category_id' => 2,
            'user_id' => 3,
        ]);

        \App\Models\Product::factory(2)->create([
            'category_id' => 3,
            'user_id' => 2,
        ]);


        \App\Models\Post::factory(5)->create([
            'theme_id' => 1,
            'user_id' => 2,
        ]);

        \App\Models\Post::factory(5)->create([
            'theme_id' => 2,
            'user_id' => 4,
        ]);

        /* role */
        \App\Models\Role::factory()->create([
            'name' => 'sample'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'distributor'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'administrator'
        ]);


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

        \App\Models\Weight_product::factory()->create([
            'initial_stock' => 200,
            'weight_id' => 1,
            'product_id' => 1
        ]);
        \App\Models\Weight_product::factory()->create([
            'initial_stock' => 150,
            'weight_id' => 3,
            'product_id' => 1
        ]);
        \App\Models\Weight_product::factory()->create([
            'initial_stock' => 100,
            'weight_id' => 1,
            'product_id' => 2
        ]);
        \App\Models\Weight_product::factory()->create([
            'initial_stock' => 350,
            'weight_id' => 2,
            'product_id' => 3
        ]);
    }
}
