<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'verification_code' => str_random(100)
    ];
});

$factory->define(\App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'category_name' => $faker->sentence(5),
        'category_order' => rand(0, 10),
    ];
});


$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    $categories = \App\Models\Category::all();
    $category = $categories[rand(0, $categories->count() - 1)];
    $users = \App\Models\User::all();
    $user = $users[rand(0, $users->count() - 1)];
    return [
        'product_name' => $faker->sentence(5),
        'product_order' => rand(0, 10),
        'category_id' => $category->category_id,
        'owner_id' => $user->id,
        'owner_type' => 'App\Models\User',
    ];
});
