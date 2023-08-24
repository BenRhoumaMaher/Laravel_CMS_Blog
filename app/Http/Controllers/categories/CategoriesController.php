<?php

namespace App\Http\Controllers\categories;

use App\Http\Controllers\Controller;
use App\Models\post\Category;
use App\Models\post\Post;

class CategoriesController extends Controller
{
    public function category($category)
    {
        $posts = Post::where('category', $category)->take(5)->orderBy('created_at', 'desc')->get();
        $categoryname = $category;
        $catg = Category::withCount('posts')->get();
        $popPost = Post::take(5)->orderBy('id', 'desc')->get();

        return view('categories.category')->with([
            'posts' => $posts,
            'categoryname' => $categoryname,
            'catg' => $catg,
            'popPost' => $popPost,
        ]);
    }
}
