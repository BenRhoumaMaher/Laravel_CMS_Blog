<?php

namespace App\Models\post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'created_at'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class, 'category', 'name');
    }
    public $timestamps = false;
}
