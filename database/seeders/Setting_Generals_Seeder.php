<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use App\Models\SettingGenerals;
use App\Models\User;
use Carbon\Carbon;

class Setting_Generals_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $general_unique_ids = strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRST", 10)), 0, 10));
         SettingGenerals::create([
            'unique_id' => $general_unique_ids,
            'title' => 'Aquamonia',
            'tagline' => 'Build Your Own Smart Aquaponic',
            'description' => 'Aquamonia Version 1',
            'email' => 'admin@aquamonia.com',
            'phone' => '+6288787878787',
            'theme' => 'dark',
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'site Language' => 'english',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}