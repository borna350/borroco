<?php

use App\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'slug' => "mr-sp-admin",
            'role' => "super_admin",
            'name' => "Mr. SP. Admin",
                'email' => "sp@admin.com",
            'status' => "active",
            'craft_request' => "accept",
            'password' => bcrypt("12345678"),
        ]);

        Admin::create([
            'slug' => "admin",
            'role' => "admin",
            'name' => "Mr. Admin",
            'email' => "admin@admin.com",
            'status' => "active",
            'craft_request' => "accept",
            'password' => bcrypt("12345678"),
        ]);

        Admin::create([
            'slug' => "craftsman",
            'role' => "craftsman",
            'name' => "Mr. Craftsman",
            'email' => "craft@admin.com",
            'status' => "active",
            'craft_request' => "accept",
            'password' => bcrypt("12345678"),
        ]);

        User::create([
            'first_name' => "Mr Test",
            'last_name' => "User",
            'email' => "test@test.com",
            'status' => "active",
            'password' => bcrypt("12345678"),
        ]);

        Category::create([
            'slug' => "woman",
            'title' => "Woman",
            'status' => "active",
        ]);

        Category::create([
            'slug' => "man",
            'title' => "Man",
            'status' => "active",
        ]);

        Subcategory::create([
            'slug' => "accessories",
            'category_id' => "1",
            'title' => "Accessories",
            'status' => "active",
        ]);

        Subcategory::create([
            'slug' => "bags",
            'category_id' => "1",
            'title' => "Bags",
            'status' => "active",
        ]);

        Subcategory::create([
            'slug' => "jewelry",
            'category_id' => "1",
            'title' => "Jewelry",
            'status' => "active",
        ]);

        Subcategory::create([
            'slug' => "shoes",
            'category_id' => "1",
            'title' => "Shoes",
            'status' => "active",
        ]);

        Subcategory::create([
            'slug' => "accessories-1",
            'category_id' => "2",
            'title' => "Accessories",
            'status' => "active",
        ]);

        Subcategory::create([
            'slug' => "jackets-and-vests",
            'category_id' => "2",
            'title' => "Jackets and Vests",
            'status' => "active",
        ]);

        Subcategory::create([
            'slug' => "leather-goods",
            'category_id' => "2",
            'title' => "Leather goods",
            'status' => "active",
        ]);

        Subcategory::create([
            'slug' => "shirts",
            'category_id' => "2",
            'title' => "shirts",
            'status' => "active",
        ]);

        Subcategory::create([
            'slug' => "shoes-1",
            'category_id' => "2",
            'title' => "Shoes",
            'status' => "active",
        ]);

        Subcategory::create([
            'slug' => "sweaters",
            'category_id' => "2",
            'title' => "Sweaters",
            'status' => "active",
        ]);

        Subcategory::create([
            'slug' => "ties",
            'category_id' => "2",
            'title' => "Ties",
            'status' => "active",
        ]);

        Subcategory::create([
            'slug' => "trousers",
            'category_id' => "2",
            'title' => "Ties",
            'status' => "Trousers",
        ]);


    }
}
