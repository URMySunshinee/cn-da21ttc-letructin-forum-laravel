<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class commentController
{

    public function add(Request $request,$id)
    {
        DB::table('post_comments')->insert([
            'user_id' => Auth::user()->id,
            'post_id' => $id,
            'content' => $request->content,
            'comment_id' => $request->comment_id ?? null,
        ]);
        return back();
    }

    public function delete($id){
        DB::table('post_comments')
        ->where('id', $id)
        ->where('user_id', Auth::user()->id)
        ->delete();
        return back();
    }
    public function adminDelete($id){
        DB::table('post_comments')
        ->where('id', $id)
        ->delete();
        return back();
    }

    public function authorDelete($id){
        DB::table('post_comments')
        ->join('posts', 'post_comments.post_id', '=', 'posts.id')
        ->where('post_comments.id', $id)
        ->where('posts.user_id', Auth::user()->id)
        ->delete();
        return back();
    }


}
