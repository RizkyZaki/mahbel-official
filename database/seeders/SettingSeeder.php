<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'logo' => 'logo.png',
            'title' => 'Mahbel Company',
            'keyword' => 'company, profile, bisnis, Kue Kering, Food, Beverage',
            'description' => 'Mahbel Company adalah perusahaan yang bergerak di bidang FNB.',
            'email' => 'contact@mahbel.com',
            'phone' => '+6281234567890',
            'address' => 'Jl. Teknologi No. 123, Jakarta',
            'link_facebook' => 'https://facebook.com/mahbel',
            'link_twitter' => 'https://twitter.com/mahbel',
            'link_tiktok' => 'https://tiktok.com/@mahbel',
            'link_instagram' => 'https://instagram.com/mahbel',
            'link_shopee' => 'https://shopee.co.id/mahbel',
            'link_tokopedia' => 'https://tokopedia.com/mahbel',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
