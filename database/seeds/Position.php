<?php

use Illuminate\Support\Facades\DB;
use App\Models\Position;
use Illuminate\Database\Seeder;

class Position extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $positionC = Position::where('position','Programmer')->first();
        if ($positionC === null) {
            Position::create([
                'position' => 'Programmer'
            ]);
            Position::create([
                'position' => 'Data Analysis'
            ]);
        }
    }
}
