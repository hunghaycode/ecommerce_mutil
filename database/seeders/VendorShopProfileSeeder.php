<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =  User::where('email','vendor@gmail.com')->first();

        $vendor = new Vendor();
        $vendor->banner = 'uploads/5555.jpg';
        $vendor->shop_name = 'eeee';
        $vendor->phone = '092434385';
        $vendor->email = 'vendor@gmail.com';
        $vendor->address = 'vietnam';
        $vendor->description = 'vietnam champion';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
