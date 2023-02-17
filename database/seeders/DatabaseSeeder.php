<?php

namespace Database\Seeders;

use App\Models\AttributeGroup;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(100)->create();
        \App\Models\AttributeGroup::factory(10)->create();
        foreach (AttributeGroup::all() as $attributeGroup) {
            \App\Models\Attribute::factory(random_int(5,8))->withGroup($attributeGroup->id)->create();
        }
        \App\Models\Product::factory(1000)->create();

    }
}
