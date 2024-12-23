<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewerSelection extends Model
{
    //
    protected $fillable = [
        'user_id', 'journal_id', 'manuscript_id', 'reviewer', 'status', 'reviewer_comment', 'reviewed_file'
    ];
    public function reviewers(){
        return $this->belongsTo('App\Models\User','reviewer');
    }
    public function manuscript(){
        return $this->belongsTo('App\Models\Manuscript','manuscript_id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function topic(){
        return $this->belongsTo('App\Models\Topic','topic_id');
    }
    public function journal(){
        return $this->belongsTo('App\Models\Journal','journal_id');
    }
}
