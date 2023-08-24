<?php

namespace App\Models\post;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'comment',
        'user_id',
        'user_name',
        'post_id',
        'created_at',
    ];
    public function post()
    {
        return $this->belongsTo(Comment::class, 'post_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_name', 'name');
    }
    public $timestamps = false;
}