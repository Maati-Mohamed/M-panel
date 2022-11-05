<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'website_name' => 'Mpanel',
            'website_bio' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat, commodi!',
            'website_logo' => 'admin/logo.png',

            'contact_email' => 'website@gmail.com',
            'phone' => '0912345678',
            'whatsapp_phone' => '0912345678',
            'main_color' => '#ffbb55',
            'dark_mode' => 0
        ]);
    }
}
