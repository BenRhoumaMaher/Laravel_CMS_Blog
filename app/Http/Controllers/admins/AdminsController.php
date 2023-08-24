<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\post\Category;
use App\Models\post\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminsController extends Controller
{
    public function viewLogin()
    {
        if(!auth()->guard('admin')->check()) {
            return view('admins.login-admins');
        } else {
            return redirect()->route('admins.dashboard');
        }
    }
    public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
            ])) {
            return redirect()->route('admins.dashboard');
        };
    }
    public function index(Post $post, Category $category, Admin $admin)
    {
        $postCount = $post->count();
        $countCategory = $category->count();
        $countAdmin = $admin->count();
        if(auth()->guard('admin')->check()) {
            return view('admins.dashboard')->With([
                'postCount' => $postCount,
                'countCategory' => $countCategory,
                'countAdmin' => $countAdmin,
            ]);
        } else {
            return redirect()->route('admins.login');
        }
    }
    public function showAdmins(Admin $admin)
    {
        $admin = $admin->get();
        return view('admins.admins')->with([
            'admins' => $admin,
        ]);
    }
    public function createAdmins()
    {
        return view('admins.create-admins');
    }
    public function storeAdmins(Request $request)
    {
        $incomingFields = $request->validate([
            'email' => ['required','email',Rule::unique('admins', 'email')],
            'name' => ['required',Rule::unique('admins', 'name')],
            'password' => 'required',
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        Admin::create($incomingFields);
        return redirect()->route('admins.list')->with('admin', 'Yey !! youve created a new admin');
    }
    public function showCategories(Category $categories)
    {
        $categories = $categories->get();
        return view('admins.categories')->with([
            'categories' => $categories,
        ]);
    }
    public function createCategory()
    {
        return view('admins.create-category');
    }
    public function storeCategory(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required',Rule::unique('categories', 'name')],
        ]);
        Category::create($incomingFields);
        return redirect()->route('admins.categories')->with('category', 'Congrat ! youve created a new category');
    }
    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect()->route('admins.categories')->with('categorydelete', 'The category has been deleted successfully');
    }
    public function updateCategory(Category $category)
    {
        $categories = $category->get();
        return view('admins.update-category')->with([
            'categories' => $categories,
            'category' => $category,
        ]);
    }
    public function editCategory(Request $request, Category $category)
    {
        $incomingFields = $request->validate([
            'name' => ['required',Rule::unique('categories', 'name')]
        ]);
        $category->update($incomingFields);
        return redirect()->route('admins.categories')->with('categoryupdate', 'Category has been updated successfully');
    }
    public function showPosts(Post $post)
    {
        $posts = $post->get();
        return view('admins.posts')->with([
            'posts' => $posts,
        ]);
    }
    public function deletePost(Post $post)
    {
        $filepath = public_path('assets/images/'.$post->image.'');
        unlink($filepath);
        $post->delete();
        return redirect()->route('admins.posts')->with('postdelete', 'The post has been deleted successfully');
    }
}
