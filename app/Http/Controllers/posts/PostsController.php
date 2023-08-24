<?php

namespace App\Http\Controllers\posts;

use App\Http\Controllers\Controller;
use App\Models\post\Category;
use App\Models\post\Comment;
use App\Models\post\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {

        // first section
        $posts = Post::all()->take(2);
        $postOne = Post::take(1)->orderBy('id', 'desc')->get();
        $postTwo = Post::take(2)->orderBy('title', 'desc')->get();

        // business section
        $postBus = Post::where('category', 'business')->take(2)->orderBy('id', 'desc')->get();
        $postBusTwo = Post::where('category', 'business')->take(3)->orderBy('title', 'desc')->get();

        // random posts
        $randomPosts = Post::take(4)->orderBy('category', 'desc')->get();

        // Culture section
        $postCul = Post::where('category', 'culture')->take(2)->orderBy('description', 'desc')->get();
        $postCulTwo = Post::where('category', 'culture')->take(3)->orderBy('title', 'desc')->get();

        // Politics section
        $postPol = Post::where('category', 'politics')->take(9)->orderBy('created_at', 'desc')->get();

        // Travel section
        $postTraOne = Post::where('category', 'travel')->take(1)->orderBy('title', 'desc')->get();
        $postTraFirst = Post::where('category', 'travel')->take(1)->orderBy('id', 'desc')->get();
        $postTraTwo = Post::where('category', 'travel')->take(2)->orderBy('description', 'desc')->get();

        return view('posts.index')->with([
            'posts' => $posts,
            'postOne' => $postOne,
            'postTwo' => $postTwo,
            'postBus' => $postBus,
            'postBusTwo' => $postBusTwo,
            'randomPosts' => $randomPosts,
            'postCul' => $postCul,
            'postCulTwo' => $postCulTwo,
            'postPol' => $postPol,
            'postTraOne' => $postTraOne,
            'postTraFirst' => $postTraFirst,
            'postTraTwo' => $postTraTwo
        ]);
    }
    public function single(Post $post, User $user)
    {
        $popPost = Post::take(3)->orderBy('id', 'desc')->get();
        $category = Category::withCount('posts')->get();

        // Grabbing comments
        $comments = $post->comments;
        $commentCount = $post->comments->count();

        $morePosts = Post::where('category', $post->category)->where('id', '!=', $post->id)->take(4)->get();

        return view('posts.single')->with([
            'post' => $post,
            'user' => $post->user,
            'popPost' => $popPost,
            'category' => $category,
            'comments' => $comments,
            'commentCount' => $commentCount,
            'morePosts' => $morePosts,
        ]);
    }
    public function storeComment(Request $request)
    {

        $insertComment = Comment::create([
            'comment' => $request->comment,
            'user_id' => auth()->user()->id,
            'user_name' => auth()->user()->name,
            'post_id' => $request->post_id,
        ]);
        return redirect()->back()->with('comment', 'thank you for adding this wonderful comment !');
    }
    public function createPost()
    {
        $categories = Category::all();

        return view('posts.create-post')->with([
            'categories' => $categories,
        ]);
    }
    public function storePost(Request $request, Post $post)
    {

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $insertPost = Post::create([
            'title' => $request->title,
            'category' => $request->category,
            'user_id' => auth()->user()->id,
            'user_name' => auth()->user()->name,
            'description' => $request->description,
            'image' => $myimage,
        ]);
        $post = $insertPost->id;
        return redirect()->to("/single/$post")->with('post', 'Congrats ! youve created new post');
    }
    public function deletePost(Request $request, Post $post)
    {
        $filepath = public_path('assets/images/'.$post->image.'');
        unlink($filepath);
        $post->delete();
        return redirect()->to("/posts/index")->with('delete', 'Post has been deleted successfully');
    }
    public function editPost(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit-post')->with([
            'post' => $post,
            'categories' => $categories,
        ]);
    }
    public function updatePost(Request $request, Post $post)
    {
        $post->update($request->all());
        $id = $post->id;
        return redirect()->to("/single/$id")->with('update', 'Post has been updated successfully');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $results = Post::where('title', 'like', "%$search%")->get();
        return view('posts.search')->with([
            'results' => $results,
        ]);
    }
}
