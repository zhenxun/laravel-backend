<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $if_superuser_exist = DB::table('administrators')->where('name', 'superuser')->exists();

        if(!$if_superuser_exist){
            DB::table('administrators')->insert([
                'name' => 'superuser',
                'email' => 'system@example.com',
                'password' => bcrypt('sample1234'),
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    
            $user_id = DB::table('administrators')->where('name', 'superuser')->pluck('id');
    
            DB::table('administrator_roles')->insert([
                'administrator_id' => $user_id[0],
                'role' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),                
            ]);
        }
        
    }
}
