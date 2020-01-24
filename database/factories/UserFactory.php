<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Bank;
use App\Branch;
use App\Payment;
use App\Address;
use App\Category;
use App\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('thanhbang'), // password
        'remember_token' => Str::random(10),
    ];
});

// address
$factory->define(Address::class, function (Faker $faker) {
    return [
        'address' => $faker->paragraph(1),
        'user_id' => User::all()->random()->id,
    ];
});

//bank
$factory->define(Bank::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

//branch
$factory->define(Branch::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'bank_id' => Bank::all()->random()->id,
    ];
});

//Payment
$factory->define(Payment::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'bank_id' => Bank::all()->random()->id,
        'branch_id' => Branch::all()->random()->id,
        'bank_account' => $faker->word,
        'bank_name' => $faker->word,
    ];
});

//category
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1)
    ];
});

//blog
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1)
    ];
});

// product
$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'cat_id' => Category::all()->random()->id,
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'stock' => $faker->numberBetween(1,20),
        'price' => $faker->word,
        'status' => $faker->randomElement([Product::AVAILABLE_PRODUCT, Product::UNAVAILABLE_PRODUCT]),
        'image' => $faker->randomElement(['1.png', '2.png', '3.png']),
    ];
});
