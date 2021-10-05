<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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

            
            ['id'=>'1', 'name'=>'admin', 'status'=>'1'],
            ['id'=>'2', 'name'=>'Doctor', 'status'=>'1'],
            ['id'=>'3', 'name'=>'Customer', 'status'=>'1'],
           

        );

        DB::table('role')->insert($objs);
    }
}