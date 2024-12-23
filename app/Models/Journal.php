<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    //
    protected $fillable = ['user_id', 'full_name', 'short_name', 'reviewer_comment_file'];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function topic(){
        return $this->belongsTo('App\Models\Topic','topic_id');
    }
    public function manuscript(){
        return $this->belongsTo('App\Models\Manuscript','manuscript_id');
    }
    public function journal(){
        return $this->belongsTo('App\Models\Manuscript','journal_id');
    }
}
