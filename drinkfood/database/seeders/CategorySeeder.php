<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                "name"=>"Cơm",
                "id_user_created"=>1,
                "status"=>1,
                "uid"=>"abc123",
                "url_key"=>"com",
                "type"=>1
            ]);

        DB::table('categories')->insert([
                "name"=>"Bún",
                "id_user_created"=>1,
                "status"=>1,
                "uid"=>"bn1221a",
                "url_key"=>"bun",
                "type"=>1
            ]);
            
        DB::table('categories')->insert([
                "name"=>"Mỳ Quảng",
                "id_user_created"=>1,
                "status"=>1,
                "uid"=>"mq123ish",
                "url_key"=>"my-quang",
                "type"=>1
            ]);

        DB::table('categories')->insert([
            "name"=>"Cháo",
            "id_user_created"=>1,
            "status"=>1,
            "uid"=>"ch1284Ai83",
            "url_key"=>"chao",
            "type"=>1
        ]);

        DB::table('categories')->insert([
            "name"=>"Cà phê",
            "id_user_created"=>1,
            "status"=>1,
            "uid"=>"cfA12sA82P",
            "url_key"=>"ca-phe",
            "type"=>2
        ]);

        DB::table('categories')->insert([
            "name"=>"Trà Sữa",
            "id_user_created"=>1,
            "status"=>1,
            "uid"=>"tsPshAS12si",
            "url_key"=>"tra-sua",
            "type"=>2
        ]);

        DB::table('categories')->insert([
            "name"=>"Nước ngọt",
            "id_user_created"=>1,
            "status"=>1,
            "uid"=>"PaLs12su93",
            "url_key"=>"nuoc-ngot",
            "type"=>2
        ]);
    }
}
