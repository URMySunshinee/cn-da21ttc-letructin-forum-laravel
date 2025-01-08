<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class homeadminController
{
    
    public function index()
    {
        return view("admin.index");
    }

    public function category()
    {   
        $category_all=DB::table('categories')
            ->select('*')
            ->get();
        return view("admin.category",compact('category_all'));
    }
    
    
    public function report()
    {
        $user_active = DB::table('users')
                ->where('role_id', 2)
                ->where('delUser', 0)
                ->select('*')
                ->get();
                $user_unactive = DB::table('users')
                ->where('role_id', 2)
                ->where('delUser', 1)
                ->select('*')
                ->get();
                $post_accepted = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->where('delPost', 0)
                ->where('delUser', 0)
                ->where('delCategory', 0)
                ->where('isAccepted', 0)
                ->select('*')
                ->get();
                $post_unaccepted = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->where('delPost', 0)
                ->where('delUser', 0)
                ->where('delCategory', 0)
                ->where('isAccepted', 1)
                ->select('*')
                ->get();
        return view("admin.report",compact('user_active','user_unactive','post_accepted','post_unaccepted'));
    }
    public function user()
    {
        $user_all = DB::table('users')
                ->where('role_id', 2)
                ->select('*')
                ->get();
        return view("admin.user",compact('user_all'));
            }

            public function post(){
                $all_news = DB::table('posts')
    ->join('categories', 'posts.category_id', '=', 'categories.id')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->where('delPost', 0)
    ->where('delUser', 0)
    ->where('delCategory', 0)
    ->select('posts.*', 'users.name', 'categories.nameCategory')
    ->get();
    return view("admin.post",compact('all_news'));
            }

}
