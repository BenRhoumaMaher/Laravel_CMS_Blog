<?php

namespace App\Models\post;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'image',
        'description',
        'category',
        'user_id',
        'user_name',
        'created_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'name');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
    public $timestamps = false;
}
