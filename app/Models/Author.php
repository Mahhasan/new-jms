<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = [
        'manuscript_id','user_id', 'name', 'title', 'family_name', 'organization', 'country', 'email',
    ];
}
