<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveAuthor extends Model
{
    //
    protected $fillable = [
        'archive_id', 'title', 'name', 'organization'
    ];
}
