<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    //
    protected $connection = 'mysql2';
    protected $table = 'candidate';

    public function link()
    {
     return $this->belongsTo('App\Link','candidateid');
    }

}
