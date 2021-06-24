<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'namtran12345',
            'password' => bcrypt('namtran12345'),
            'fullname' => 'Tran Phuong Nam',
            'gender' => 1, 
            'fullname' => 'Tran Phuong Nam',
            'email' => 'trphuongnam@gmail.com',
            'phone' => '0123456789',
            'address' => '104 Doan Phu Tu - Lien Chieu - Da Nang',
            'birthday' => '1991-02-12',
            'type' => '1',
            'uid' => Str::random(20),
            'url_key' => 'tran-phuong-nam'
        ]);
    }
}
