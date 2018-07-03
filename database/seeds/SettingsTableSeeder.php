<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = array(
            ['item' => 'app_url', 'value' => 'http://www.laravel-backend.com', 'config_method' => 'config', 'config_name' => 'app.url'],
            ['item' => 'locale', 'value' => 'en', 'config_method' => 'session', 'config_name' => 'backend-locale'],
            ['item' => 'footer', 'value' => '&copy; Laravel Backend. All Right Reserved.', 'config_method' => 'session', 'config_name' => 'footer-text'],

        );

        for ($i=0; $i < count($settings) ; $i++) {

            $if_item_exist =  DB::table('settings')->where('item', $settings[$i]['item'])->exists();

            if(!$if_item_exist){
                DB::table('settings')->insert([
                    'item' => $settings[$i]['item'],
                    'value' => $settings[$i]['value'],
                    'config_method' => $settings[$i]['config_method'],
                    'config_name' => $settings[$i]['config_name'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }

        }
    }
}
