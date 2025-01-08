<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class userController
{

    public function lockUser($id){
        DB::table('users')
        ->where('id', $id)
        ->where('role_id', '!=',1)
        ->update([
        'delUser' => 1,
        ]);
        return back();
    }

    public function unLockUser($id){
        DB::table('users')
        ->where('id', $id)
        ->where('role_id', '!=',1)
        ->update([
        'delUser' => 0,
        ]);
        return back();
    }

    public function lockUserPost($id){
        DB::table('users')
        ->where('id', $id)
        ->where('role_id', '!=',1)
        ->update([
        'blockAddPost' => 1,
        ]);
        return back();
    }

    public function unLockUserPost($id){
        DB::table('users')
        ->where('id', $id)
        ->where('role_id', '!=',1)
        ->update([
        'blockAddPost' => 0,
        ]);
        return back();
    }
}
