<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = DB::table('schedule')
        ->join('candidatelist','candidatelist.candidatelistid', '=', 'schedule.candidatelistid')
        ->join('interview', 'interview.interviewid', '=', 'schedule.scheduleid')
        ->where('interviewid',$id)->first();

        if($status->statusid == 4){
            $states = DB::table("schedule")
            ->join('candidatelist','candidatelist.candidatelistid', '=', 'schedule.candidatelistid')
            ->join('interview', 'interview.interviewid', '=', 'schedule.scheduleid')
            ->join('link','link.candidatelistid', '=', 'candidatelist.candidatelistid')
            ->join('recruitmen.candidate as dt2','dt2.candidateid', '=', 'link.candidateid')
            ->join('status', 'status.id' ,'=' ,'interview.statusid')
            // ->join('users', 'users.id', '=', 'interview.id')
            ->join('rejectedreason', 'rejectreasonid', '=', 'schedule.scheduleid')
            ->where('interviewid',$id)->first();
            return json_encode($states);
        }elseif($status->statusid == 3){
            $states = DB::table("schedule")
            ->join('candidatelist','candidatelist.candidatelistid', '=', 'schedule.candidatelistid')
            ->join('interview', 'interview.interviewid', '=', 'schedule.scheduleid')
            ->join('link','link.candidatelistid', '=', 'candidatelist.candidatelistid')
            ->join('recruitmen.candidate as dt2','dt2.candidateid', '=', 'link.candidateid')
            ->join('status', 'status.id' ,'=' ,'interview.statusid')
            // ->join('users', 'users.id', '=', 'interview.id')
            ->join('rejectedreason', 'rejectreasonid', '=', 'interview.interviewid')
            ->where('interviewid',$id)->first();
            return json_encode($states);
        }elseif($status->statusid == 5){
            $check = DB::table("interviewbyclient")
            ->join('schedule', 'schedule.scheduleid', '=', 'interviewbyclient.interviewclientid')
            ->where("scheduleid",$id)->first();
            if($check->statusclientid == 3){
                $states = DB::table("schedule")
                ->join('candidatelist','candidatelist.candidatelistid', '=', 'schedule.candidatelistid')
                ->join('interview', 'interview.interviewid', '=', 'schedule.scheduleid')
                ->join('link','link.candidatelistid', '=', 'candidatelist.candidatelistid')
                ->join('recruitmen.candidate as dt2','dt2.candidateid', '=', 'link.candidateid')
                ->join('status', 'status.id' ,'=' ,'interview.statusid')
                // ->join('users', 'users.id', '=', 'interview.id')
                ->join('interviewbyclient', 'interviewbyclient.interviewclientid', '=', 'schedule.scheduleid')
                ->join('rejectedreason', 'rejectedreason.rejectreasonid', '=', 'schedule.scheduleid')
                ->where('interviewid',$id)->first();
                return json_encode($states);
            }else{
                $states = DB::table("schedule")
                ->join('candidatelist','candidatelist.candidatelistid', '=', 'schedule.candidatelistid')
                ->join('interview', 'interview.interviewid', '=', 'schedule.scheduleid')
                ->join('link','link.candidatelistid', '=', 'candidatelist.candidatelistid')
                ->join('recruitmen.candidate as dt2','dt2.candidateid', '=', 'link.candidateid')
                ->join('status', 'status.id' ,'=' ,'interview.statusid')
                // ->join('users', 'users.id', '=', 'interview.id')
                ->join('interviewbyclient', 'interviewbyclient.interviewclientid', '=', 'schedule.scheduleid')
                ->where('interviewid',$id)->first();
                return json_encode($states);
            }
        }elseif($status->statusid == 2){
            $states = DB::table("schedule")
            ->join('candidatelist','candidatelist.candidatelistid', '=', 'schedule.candidatelistid')
            ->join('interview', 'interview.interviewid', '=', 'schedule.scheduleid')
            ->join('candidatelink','candidatelink.candidatelistid', '=', 'candidatelist.candidatelistid')
            ->join('recruitmen.candidate as dt2','dt2.candidateid', '=', 'candidatelink.candidateid')
            ->join('status', 'status.id' ,'=' ,'interview.statusid')
            // ->join('users', 'users.id', '=', 'interview.id')
            // ->join('rejectedreason', 'rejectreasonid', '=', 'schedule.scheduleid')
            ->where('interviewid',$id)->first();
        }
        elseif($status->statusid == 1){
            $states = DB::table("schedule")
            ->join('candidatelist','candidatelist.candidatelistid', '=', 'schedule.candidatelistid')
            ->join('interview', 'interview.interviewid', '=', 'schedule.scheduleid')
            ->join('candidatelink','candidatelink.candidatelistid', '=', 'candidatelist.candidatelistid')
            ->join('recruitmen.candidate as dt2','dt2.candidateid', '=', 'candidatelink.candidateid')
            ->join('status', 'status.id' ,'=' ,'interview.statusid')
            // ->join('users', 'users.id', '=', 'interview.id')
            // ->join('rejectedreason', 'rejectreasonid', '=', 'schedule.scheduleid')
            ->where('interviewid',$id)->first();
        }
        // $states = DB::table("schedule")
        // ->join('candidatelist','candidatelist.candidatelistid', '=', 'schedule.candidatelistid')
        // ->join('interview', 'interview.interviewid', '=', 'schedule.scheduleid')
        // ->join('candidatelink','candidatelink.candidatelistid', '=', 'candidatelist.candidatelistid')
        // ->join('candidate','candidate.candidateid', '=', 'candidatelink.candidateid')
        // ->join('status', 'status.id' ,'=' ,'interview.statusid')
        // ->join('users', 'users.id', '=', 'interview.id')
        // ->where("scheduleid",$id)->first();
        // return json_encode($states);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
