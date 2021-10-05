<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //
       $objs = array(

        // default password is 'aaaaaaaa'
        ['id'=>'1', 'role_id' =>'1', 'name'=>'LTT', 'password' =>'$2y$10$KDarx27N4/WgKdW5TOspmOXdpxFQe8OJaeDPq1V0XSsXodrWBgB02','email' =>'admin@gmail.com', 'phone'=>'95250676233','address'=>'ygn'],
        ['id'=>'2', 'role_id' =>'2', 'name'=>'LTT', 'password' =>'$2y$10$KDarx27N4/WgKdW5TOspmOXdpxFQe8OJaeDPq1V0XSsXodrWBgB02','email' =>'doctor@gmail.com',  'phone'=>'959254490447','address'=>'ygn'],
        ['id'=>'3', 'role_id' =>'3', 'name'=>'LTT', 'password' =>'$2y$10$KDarx27N4/WgKdW5TOspmOXdpxFQe8OJaeDPq1V0XSsXodrWBgB02','email' =>'customer@gmail.com', 'phone'=>'959753272603','address'=>'ygn']
        
    
    );

    DB::table('users')->insert($objs);
    }
}
