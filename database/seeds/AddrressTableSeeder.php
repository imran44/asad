<?php

use Illuminate\Database\Seeder;

class AddrressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
     
       DB::table('address')->insert([
'sector' => 'F-10/3',
 'city' => 'Islamabad',
'country' => 'Pakistan',

]);
       DB::table('address')->insert([
'sector' => 'F-10/4',
 'city' => 'Islamabad',
'country' => 'Pakistan',

]);
       DB::table('address')->insert([
'sector' => 'F-11/2',
 'city' => 'Islamabad',
'country' => 'Pakistan',

]);
       DB::table('address')->insert([
'sector' => 'F-11/3',
 'city' => 'Islamabad',
'country' => 'Pakistan',

]);
       DB::table('address')->insert([
'sector' => 'F-10/4',
 'city' => 'Islamabad',
'country' => 'Pakistan',

]);
       DB::table('address')->insert([
'sector' => 'G-10/2',
 'city' => 'Islamabad',
'country' => 'Pakistan',

]);
       DB::table('address')->insert([
'sector' => 'G-10/3',
 'city' => 'Islamabad',
'country' => 'Pakistan',

]);
    }
}
