<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manuscript extends Model
{
    //
    protected $fillable = [
        'user_id', 'journal_id', 'topic_id', 'specific_area', 'paper_title', 'abstract', 'keywords', 'cover_letter', 'main_file', 'updated_file', 'status', 'editor_comment', 'plagiarism_status', 'submission_status', 'first_reviewer', 'second_reviewer',
    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function topic(){
        return $this->belongsTo('App\Models\Topic','topic_id');
    }
    public function reviewers(){
        return $this->belongsTo('App\Models\User','reviewer');
    }
    public function reviewer_comment(){
        return $this->belongsTo('App\Models\ReviewerSelection','reviewer_comment');
    }
    public function reviewed_file(){
        return $this->belongsTo('App\Models\ReviewerSelection','reviewed_file');
    }
    public function journal(){
        return $this->belongsTo('App\Models\Journal','journal_id');
    }
}
