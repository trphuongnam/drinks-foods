<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertRatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Product 1 */
        DB::table('ratings')->insert([
            "star" => 3,
            "id_product" => 1,
            "id_user" => 1,
            "status" => 1
        ]);

        DB::table('ratings')->insert([
            "star" => 3,
            "id_product" => 1,
            "id_user" => 1,
            "status" => 1
        ]);

        DB::table('ratings')->insert([
            "star" => 5,
            "id_product" => 1,
            "id_user" => 1,
            "status" => 1
        ]);

        DB::table('ratings')->insert([
            "star" => 1,
            "id_product" => 1,
            "id_user" => 1,
            "status" => 1
        ]);

        DB::table('ratings')->insert([
            "star" => 4,
            "id_product" => 1,
            "id_user" => 1,
            "status" => 1
        ]);

        /* Product 2 */
        DB::table('ratings')->insert([
            "star" => 3,
            "id_product" => 2,
            "id_user" => 1,
            "status" => 1
        ]);

        DB::table('ratings')->insert([
            "star" => 1,
            "id_product" => 2,
            "id_user" => 1,
            "status" => 1
        ]);

        DB::table('ratings')->insert([
            "star" => 3,
            "id_product" => 2,
            "id_user" => 1,
            "status" => 1
        ]);

        /* Product 3 */
        DB::table('ratings')->insert([
            "star" => 2,
            "id_product" => 3,
            "id_user" => 1,
            "status" => 1
        ]);

        DB::table('ratings')->insert([
            "star" => 3,
            "id_product" => 3,
            "id_user" => 1,
            "status" => 1
        ]);

        DB::table('ratings')->insert([
            "star" => 3,
            "id_product" => 3,
            "id_user" => 1,
            "status" => 1
        ]);

        DB::table('ratings')->insert([
            "star" => 5,
            "id_product" => 3,
            "id_user" => 1,
            "status" => 1
        ]);

        /* product 4 */
        DB::table('ratings')->insert([
            "star" => 3,
            "id_product" => 4,
            "id_user" => 1,
            "status" => 1
        ]);

        DB::table('ratings')->insert([
            "star" => 1,
            "id_product" => 4,
            "id_user" => 1,
            "status" => 1
        ]);
    }
}
