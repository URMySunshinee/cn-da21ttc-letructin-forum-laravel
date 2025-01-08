<?php
namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class homeController
{

    public function __construct() {
    }

    public function index()
    {
        $top_9_news_trending = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('delPost', 0)
            ->where('isAccepted', 0)
            ->where('delUser', 0)
            ->where('delCategory', 0)
            ->where('delCategory', 0)
            ->where('datePost', '>=', Carbon::now()->subDays(7))
            ->select('posts.*','users.name','categories.nameCategory')
            ->limit(9)
            ->orderBy('viewPost','DESC')
            ->get();
            if(count($top_9_news_trending)<9){
                $top_9_news_trending = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('delPost', 0)
            ->where('isAccepted', 0)
            ->where('delUser', 0)
            ->where('delCategory', 0)
            ->where('delCategory', 0)
            ->select('posts.*','users.name','categories.nameCategory')
            ->limit(9)
            ->orderBy('datePost','DESC')
            ->get();
            }

            $top_4_news_most_like = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('delPost', 0)
            ->where('isAccepted', 0)
            ->where('delUser', 0)
            ->where('delCategory', 0)
            ->where('delCategory', 0)
            ->where('datePost', '>=', Carbon::now()->subDays(7))
            ->select('posts.*','users.name','categories.nameCategory')
            ->limit(4)
            ->orderBy('likePost','DESC')
            ->get();
            if(count($top_4_news_most_like)<4){
                $top_4_news_most_like = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('delPost', 0)
            ->where('isAccepted', 0)
            ->where('delUser', 0)
            ->where('delCategory', 0)
            ->where('delCategory', 0)
            ->select('posts.*','users.name','categories.nameCategory')
            ->limit(4)
            ->orderBy('likePost','DESC')
            ->get();
            }

            $all_news = DB::table('posts')
    ->join('categories', 'posts.category_id', '=', 'categories.id')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->where('delPost', 0)
    ->where('isAccepted', 0)
    ->where('delUser', 0)
    ->where('delCategory', 0)
    ->select('posts.*', 'users.name as user_name', 'categories.nameCategory')
    ->orderBy('datePost', 'DESC')
    ->get();

    

$top_4_news_recent_by_category = $all_news->groupBy('category_id')->map(function ($items) {
    return $items->take(4); 
})->flatten();
            $categories = DB::table('categories')
                ->where('delCategory', 0)
                ->select('*')
                ->limit(5)
                ->get();

        return view("user.index",compact('top_9_news_trending','top_4_news_most_like','categories','top_4_news_recent_by_category'));
    }

    public function detail($id)
    {
        if(Auth::check()){
            $isReact=DB::table('post_reacts')
            ->where('post_id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();
        }else{
            $isReact=null;
        }
        DB::table('posts')
        ->where('id', $id)
        ->update([
        'viewPost' => DB::raw('`viewPost` + 1'),
        ]);
        $all_comment = DB::table('post_comments')
        ->join('users', 'post_comments.user_id', '=', 'users.id')
        ->where('post_id', $id)
        ->where('delUser', 0)
        ->where('comment_id', null)
        ->select('post_comments.dateComment','post_comments.content','post_comments.id','post_comments.user_id','users.name','users.avatar')
        ->get();
        $all_reply = DB::table('post_comments')
        ->join('users', 'post_comments.user_id', '=', 'users.id')
        ->where('post_id', $id)
        ->where('delUser', 0)
        ->where('comment_id', '!=' ,null)
        ->orderBy('dateComment')
        ->select('post_comments.dateComment','post_comments.content','post_comments.id','post_comments.user_id','post_comments.comment_id','users.name','users.avatar')
        ->get();
        $get_post_by_id = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->join('users', 'posts.user_id', '=', 'users.id')
                ->where('delPost', 0)
                ->where('isAccepted', 0)
                ->where('delUser', 0)
                ->where('delCategory', 0)
                ->where('posts.id', $id)
                ->select('posts.*','users.name','categories.nameCategory')
                ->first();
                $get_post_detail=DB::table('post_details')
                ->where('post_id', $id)
                ->orderBy('index','ASC')
                ->get();
        return view("user.details",compact('get_post_by_id','get_post_detail','all_comment','all_reply','isReact'));
    }
    public function category()
    {
        $all_news = DB::table('posts')
    ->join('categories', 'posts.category_id', '=', 'categories.id')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->where('delPost', 0)
    ->where('isAccepted', 0)
    ->where('delUser', 0)
    ->where('delCategory', 0)
    ->select('posts.*', 'users.name as user_name', 'categories.nameCategory')
    ->orderBy('datePost', 'DESC')
    ->get();

            $categories = DB::table('categories')
                ->where('delCategory', 0)
                ->select('*')
                ->get();
        return view("user.category",compact('all_news','categories'));
    }
    
    public function profile()
    {
       
        return view("user.profile");
    }
    public function about()
    {
       
        return view("user.about");
    }
    public function dashboard()
    {
        $my_news = DB::table('posts')
        ->join('categories', 'posts.category_id', '=', 'categories.id')
        ->where('user_id', Auth::user()->id)
        ->select('posts.*', 'categories.nameCategory')
        ->orderBy('datePost', 'DESC')
        ->get();
        $categories = DB::table('categories')
                ->where('delCategory', 0)
                ->select('*')
                ->get();
        return view("user.dashboard",compact('my_news','categories'));
    }

    
    public function search(Request $request)
    {
        $searchText=$request->input('searchText');

        $post_by_search = DB::table('posts')
    ->join('categories', 'posts.category_id', '=', 'categories.id')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->where('delPost', 0)
    ->where('isAccepted', 0)
    ->where('delUser', 0)
    ->where('delCategory', 0)
    ->where('namepost','like','%'.$searchText.'%' )
    ->select('posts.*', 'users.name as user_name', 'categories.nameCategory')
    ->orderBy('datePost', 'DESC')
    ->get();

        return view("user.search",compact('searchText','post_by_search'));
    }





}
