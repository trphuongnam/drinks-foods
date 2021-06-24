<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            "name"=>"Cơm tấm sườn",
            "brand"=>"Quán cơm 123 NVS",
            "id_cat"=>1,
            "id_user_created"=>1,
            "price"=>"25000",
            "type"=>1,
            "status"=>1,
            "uid"=>"cts213nvs",
            "url_key"=>"com-tam-suon"
        ]);
        DB::table('products')->insert([
            "name"=>"Cơm gà chiên",
            "brand"=>"Quán cơm sinh viên",
            "id_cat"=>1,
            "id_user_created"=>1,
            "price"=>"30000",
            "type"=>1,
            "status"=>1,
            "uid"=>"csvAbsu0931",
            "url_key"=>"com-ga-chien"
        ]);
        DB::table('products')->insert([
            "name"=>"Bún bò",
            "brand"=>"Bún bà A",
            "id_cat"=>2,
            "id_user_created"=>1,
            "price"=>"25000",
            "type"=>1,
            "status"=>1,
            "uid"=>"bba34Saql",
            "url_key"=>"bun-bo"
        ]);
        DB::table('products')->insert([
            "name"=>"Mỳ quảng gà",
            "brand"=>"Cô B mỳ quảng",
            "id_cat"=>3,
            "id_user_created"=>1,
            "price"=>"20000",
            "type"=>1,
            "status"=>1,
            "uid"=>"cts2kuwqi",
            "url_key"=>"my-quang-ga"
        ]);
        DB::table('products')->insert([
            "name"=>"Nước 7Up",
            "brand"=>"Quán cơm 123 NVS",
            "id_cat"=>7,
            "id_user_created"=>1,
            "price"=>"10000",
            "type"=>2,
            "status"=>1,
            "uid"=>"cts213posA",
            "url_key"=>"nuoc-7up"
        ]);
        DB::table('products')->insert([
            "name"=>"Cà phê sữa",
            "brand"=>"Tcafe 09 NVS",
            "id_cat"=>5,
            "id_user_created"=>1,
            "price"=>"10000",
            "type"=>2,
            "status"=>1,
            "uid"=>"tcf210993",
            "url_key"=>"ca-phe-sua"
        ]);
        DB::table('products')->insert([
            "name"=>"Trà sữa trân châu",
            "brand"=>"Mộc Trà Sữa",
            "id_cat"=>6,
            "id_user_created"=>1,
            "price"=>"30000",
            "type"=>2,
            "status"=>1,
            "uid"=>"ts1ps213nvs",
            "url_key"=>"tra-sua-tran-chau"
        ]);
    }
}
