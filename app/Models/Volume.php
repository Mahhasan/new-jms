<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    //
    protected $fillable = [
        'journal_id', 'issue', 'volume_number', 'year'
    ];
    public function journal(){
        return $this->belongsTo('App\Models\Journal','journal_id');
    }
}
