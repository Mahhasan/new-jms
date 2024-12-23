<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $fillable = [
        'journal_id', 'name', 'status',
    ];
    public function journal(){
        return $this->belongsTo('App\Models\Journal','journal_id');
    }
}
