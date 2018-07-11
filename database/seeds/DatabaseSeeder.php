<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        App\Models\Admin::insert(['username' => 'admin','password' => bcrypt('123456'),'email' => 'admin@admin.com','name'=>'admin']);
        \App\Models\Setting::insert(['namesetting'=>'Title','type'=>0]);
        \App\Models\Setting::insert(['namesetting'=>'Email','type'=>0]);
        \App\Models\Setting::insert(['namesetting'=>'Logo','type'=>2]);
        \App\Models\Setting::insert(['namesetting'=>'Favicon','type'=>2]);
        \App\Models\Setting::insert(['namesetting'=>'Phone','type'=>0]);
        \App\Models\Setting::insert(['namesetting'=>'Address','type'=>0]);
        \App\Models\Setting::insert(['namesetting'=>'Facebook','type'=>0]);
        \App\Models\Setting::insert(['namesetting'=>'Google Plus','type'=>0]);
        \App\Models\Setting::insert(['namesetting'=>'Description','type'=>1]);
        \App\Models\Setting::insert(['namesetting'=>'Meta Keywords','type'=>1]);
        \App\Models\Setting::insert(['namesetting'=>'Meta Description','type'=>1]);

    }
}
