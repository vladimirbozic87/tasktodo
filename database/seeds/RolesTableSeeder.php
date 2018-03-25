<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['role_name' => 'Project Manager'],
            ['role_name' => 'Team Leader'],
            ['role_name' => 'Developer'],
            ['role_name' => 'Administrator'],
            ['role_name' => 'Designer']
        ];

        DB::table('roles')->insert($data);
    }
}
