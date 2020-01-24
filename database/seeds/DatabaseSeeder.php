<?php

use App\User;
use App\Address;
use App\Bank;
use App\Branch;
use App\Payment;
use App\Category;
use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Category::truncate();
        Address::truncate();
        Bank::truncate();
        Branch::truncate();
        Payment::truncate();
        Product::truncate();

        User::flushEventListeners();
        Category::flushEventListeners();
        Address::flushEventListeners();
        Bank::flushEventListeners();
        Branch::flushEventListeners();
        Payment::flushEventListeners();
        Product::flushEventListeners();

        $usersQuantity = 50;
        $categoriesQuantity = 30;
        $addressesQuantity = 50;
        $banksQuantity = 50;
        $branchQuantity = 200;
        $paymentsQuantity = 200;
        $productsQuantity = 300;

        factory(User::class, $usersQuantity)->create();
        factory(Category::class, $categoriesQuantity)->create();
        factory(Address::class, $addressesQuantity)->create();
        factory(Bank::class, $banksQuantity)->create();
        factory(Branch::class, $branchQuantity)->create();
        factory(Payment::class, $paymentsQuantity)->create();
        factory(Product::class, $productsQuantity)->create();

    }
}
