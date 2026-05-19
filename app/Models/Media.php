<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['type', 'title', 'file_path', 'video_url', 'thumbnail', 'order', 'status'];
}
