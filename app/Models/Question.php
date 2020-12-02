<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $filliable = ['title', 'body'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
