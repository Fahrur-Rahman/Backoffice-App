<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        db::users()->create(array(['name' => 'Interview','role' => 'Interview','password' => Hash::make('adidata2020')],
        ['name' => 'Recruiter','role' => 'Recruiter','password' => Hash::make('adidata2020')]));
    }
}
