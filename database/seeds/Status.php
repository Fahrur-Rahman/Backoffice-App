<?php

use Illuminate\Database\Seeder;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class Status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // //
        // $status = [
        //     ['status' => 'Propose'],
        //     ['status' => 'Approve'],
        //     ['status' => 'Rejected'],
        //     ['status' => 'Not-Attend'],
        //     ['status' => 'InterviewByClient'],
        // ];
        // foreach($status as $statu){
        //     DB::table('status')->insert($statu);;
        // }
        $status = Status::where('status')->first();
        if ($status === null) {
            Status::create([
                'status' => 'Propose'
            ]);
            Status::create([
                'status' => 'Approve'
            ]);
            Status::create([
                'status' => 'Rejected'
            ]);
            Status::create([
                'status' => 'Not-Attend'
            ]);
            Status::create([
                'status' => 'InterviewByClient'
            ]);
        }
    }
}
