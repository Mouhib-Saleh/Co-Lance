<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_name', 'comments'];

    public function comments()
{
    return $this->hasMany(Comment::class);
}
}