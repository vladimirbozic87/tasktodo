<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['status_name' => 'active'],
            ['status_name' => 'inactive'],
            ['status_name' => 'on-hold'],
            ['status_name' => 'close'],
            ['status_name' => 'complete']
        ];

        DB::table('status')->insert($data);
    }
}
