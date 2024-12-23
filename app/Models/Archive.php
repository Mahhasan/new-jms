<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    //
    protected $fillable = [
        'volume_id', 'journal_id', 'title', 'slug', 'abstract', 'keywords', 'main_file', 'archive_link'
    ];
    public function journal(){
        return $this->belongsTo('App\Models\Journal','journal_id');
    }
    public function volume(){
        return $this->belongsTo('App\Models\Volume','volume_id');
    }
}
