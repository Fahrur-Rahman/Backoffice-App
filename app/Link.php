<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = "link";
    protected $fillable = ['candidatelistid','candidateid'];
    protected $primaryKey = 'candidatelistid';
    public $incrementing = false;
    public $timestamps = false;
    public function candidate()
    {
    return $this->hasMany('App\Candidate', 'id');
    }
    public function candidatelist()
    {
    return $this->hasMany('App\Candidatelist', 'candidatelistid');
    }
}
