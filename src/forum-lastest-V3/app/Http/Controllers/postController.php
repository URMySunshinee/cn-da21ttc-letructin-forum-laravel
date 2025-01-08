<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class postController
{
    
    public function lock($id){
        $check=$this->checkUserBlock();
        if ($check) {
        return back(); 
    }
        DB::table('posts')
        ->where('id', $id)
        ->update([
        'delPost' => 1,
        ]);
        return back();
    }

    public function unLock($id){
        $check=$this->checkUserBlock();
        if ($check) {
        return back(); 
    }
        DB::table('posts')
        ->where('id', $id)
        ->update([
        'delPost' => 0,
        ]);
        return back();
    }

    public function accepted($id){
        DB::table('posts')
        ->where('id', $id)
        ->update([
        'isAccepted' => 0,
        ]);
        return back();
    }

    

    public function unAccepted($id){
        DB::table('posts')
        ->where('id', $id)
        ->update([
        'isAccepted' => 1,
        ]);
        return back();
    }

    public function detailAdmin($id)
    {
        if(Auth::check()){
            $isReact=DB::table('post_reacts')
            ->where('post_id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();
        }else{
            $isReact=null;
        }
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

    public function detail($id){
        $check=$this->checkUserBlock();
        if ($check) {
        return back(); 
    }
        $post_by_id=DB::table('posts')
        ->where('id', $id)
        ->select('*')
        ->first();

        $post_details=DB::table('post_details')
        ->where('post_id', $id)
        ->select('*')
        ->orderBy('index','ASC')
        ->get();

        $categories = DB::table('categories')
                ->where('delCategory', 0)
                ->select('*')
                ->get();
                $comment = DB::table('post_comments')
                ->join('users', 'post_comments.user_id', '=', 'users.id')
                ->where('post_id', $id)
                ->select('post_comments.*','users.name')
                ->get();
        return view("user.fixpost",compact('post_by_id','categories','comment','post_details'));
    }

    public function update(Request $request,$id){
        $check=$this->checkUserBlock();
        if ($check) {
        return back(); 
    }
        DB::table('posts')
        ->where('id', $id)
        ->update([
        'namePost' => $request->input('namePost'),
        'descriptionPost' => $request->input('descriptionPost'),
        'mainImage' => $request->input('mainImage'),
        'category_id' => $request->input('category_id'),
        'isAccepted' => 1,
        ]);
        return back();
    }
   
    public function store(Request $request){
        $check=$this->checkUserBlock();
        if ($check) {
        return back(); 
    }
        $checkUserBlock=DB::table('users')
        ->where('id', Auth::user()->id)
        ->select('blockAddPost')
        ->first();
        if($checkUserBlock->blockAddPost==1){}

        DB::table('posts')->insert([
            'namePost' => $request->input('namePost'),
        'descriptionPost' => $request->input('descriptionPost'),
        'mainImage' => $request->input('mainImage'),
        'category_id' => $request->input('category_id'),
        'user_id' => Auth::user()->id,
        ]);
        return back();
    }

    public function storeDetail(Request $request,$id){
        $check=$this->checkUserBlock();
        if ($check) {
        return back(); 
    }
        $highestIndexRow = DB::table('post_details')
        ->select('index')
        ->orderBy('index', 'desc') 
        ->first();                


        DB::table('post_details')->insert([
           'title' => $request->input('title'),
        'content' => $request->input('content'),
        'post_id' => $id,
        'index' => $highestIndexRow->index+1,
        ]);
        return back();
    }

    public function updateDetail(Request $request,$id){
        $check=$this->checkUserBlock();
        if ($check) {
        return back(); 
    }
        DB::table('post_details')
        ->where('id', $id)
        ->update([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        ]);

        $pdt= DB::table('post_details')
        ->where('id', $id)
        ->select('post_id')
        ->first();

        DB::table('posts')
        ->where('id', $pdt->post_id)
        ->update([
        'isAccepted' => 1,
        ]);
        return back();
    }
    public function upIndexDetail($id)
{
    $check=$this->checkUserBlock();
    if ($check) {
        return back(); 
    }
    $pdt = DB::table('post_details')
        ->where('id', $id)
        ->select('index')
        ->first();

    if (!$pdt) {
        return back()->withErrors(['error' => 'Bài viết không tồn tại.']);
    }

    $currentIndex = $pdt->index;
    $prevIndex = $currentIndex - 1;

    $prevPost = DB::table('post_details')
        ->where('index', $prevIndex)
        ->first();

    if (!$prevPost) {
        return back()->withErrors(['error' => 'Không thể tăng chỉ số, không có bài viết liền trước.']);
    }

    DB::table('post_details')
        ->where('index', $prevIndex)
        ->update([
            'index' => DB::raw('`index` + 1'),
        ]);

    DB::table('post_details')
        ->where('id', $id)
        ->update([
            'index' => DB::raw('`index` - 1'),
        ]);

    return back()->with('success', 'Cập nhật thứ tự thành công.');
}

    public function downIndexDetail($id)
{
    $check=$this->checkUserBlock();
    if ($check) {
        return back(); 
    }
    $pdt = DB::table('post_details')
        ->where('id', $id)
        ->select('index')
        ->first();

    if (!$pdt) {
        return back()->withErrors(['error' => 'Bài viết không tồn tại.']);
    }

    $currentIndex = $pdt->index;
    $nextIndex = $currentIndex + 1;

    $nextPost = DB::table('post_details')
        ->where('index', $nextIndex)
        ->first();

    if (!$nextPost) {
        return back()->withErrors(['error' => 'Không thể giảm chỉ số, không có bài viết kế tiếp.']);
    }

    DB::table('post_details')
        ->where('index', $nextIndex)
        ->update([
            'index' => DB::raw('`index` - 1'),
        ]);

    DB::table('post_details')
        ->where('id', $id)
        ->update([
            'index' => DB::raw('`index` + 1'),
        ]);

    return back()->with('success', 'Cập nhật thứ tự thành công.');
}
public function deleteDetail($id)
{
    $check=$this->checkUserBlock();
    if ($check) {
        return back(); 
    }
     DB::table('post_details')
        ->join('posts', 'post_details.post_id', '=', 'posts.id')
        ->where('post_details.id', $id)
        ->where('posts.user_id', Auth::user()->id)
        ->delete();
    return back();
}
public function checkUserBlock(){
    $checkUserBlock=DB::table('users')
        ->where('id', Auth::user()->id)
        ->select('blockAddPost')
        ->first();
        if($checkUserBlock->blockAddPost==1){
            return true;
        }else{
            return false;
        }
}

}
