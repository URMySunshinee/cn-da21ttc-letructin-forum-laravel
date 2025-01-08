<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Mail\forgotPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\passwordReset;

class authController extends Controller
{
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect('/auth')->with('fail', 'Tài khoản không tồn tại!');
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect('/auth')->with('fail', 'Mật khẩu không chính xác!');
        }

        if ($user->delUser == 1) {
            return redirect('/auth')->with('fail', 'Tài khoản đã bị vô hiệu hóa!');
        }


        // Create session or token (optional)
        Auth::login($user);
        switch (Auth::user()->role_id) {
            case 1:
                return redirect('/admin')->with('success', 'Đăng nhập thành công với quyền Admin!');
            case 2:
                return redirect('/')->with('success', 'Đăng nhập thành công!');
            default:
                return redirect('/')->with('info', 'Đăng nhập thành công, nhưng không xác định quyền!');
        }
    }

    public function auth_()
    {
        return view("user.auth");
    }
   

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'avatar' => 'nullable|string|max:1000',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $request->avatar,
        ]);

        return redirect('/auth')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'phone' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
            'avatar' => 'nullable|string|max:1000',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'phone' => $request->phone ?? $user->phone,
            'address' => $request->address ?? $user->address,
            'avatar' => $request->avatar ?? $user->avatar,
        ]);
        
        $user = User::where('id', Auth::user()->id)->first();

        Auth::login($user);

        return back();
    }

    public function likePost($id)
    {
        $alreadyHave=DB::table('post_reacts')
        ->where('user_id', Auth::user()->id)
        ->where('post_id', $id)
        ->select('*')
        ->first();
        if($alreadyHave){
            DB::table('post_reacts')->update([
                'type' => 0,
            ]);
            DB::table('posts')
        ->where('id', $id)
        ->update([
        'dislikePost' => DB::raw('`dislikePost` - 1'),
        ]);
        }else{
            DB::table('post_reacts')->insert([
                'user_id' => Auth::user()->id,
                'post_id' => $id,
                'type' => 0,
            ]);
        }
        DB::table('posts')
        ->where('id', $id)
        ->update([
        'likePost' => DB::raw('`likePost` + 1'),
         ]);
        
        
        return back();
    }

    public function dislikePost($id)
    {
        
        $alreadyHave=DB::table('post_reacts')
        ->where('user_id', Auth::user()->id)
        ->where('post_id', $id)
        ->select('*')
        ->first();
        if($alreadyHave){
            DB::table('post_reacts')->update([
                'type' => 1,
            ]);
            DB::table('posts')
                ->where('id', $id)
                ->update([
                'likePost' => DB::raw('`likePost` - 1'),
                 ]);
        }else{
            DB::table('post_reacts')->insert([
                'user_id' => Auth::user()->id,
                'post_id' => $id,
                'type' => 1,
            ]);
        }
        DB::table('posts')
            ->where('id', $id)
            ->update([
            'dislikePost' => DB::raw('`dislikePost` + 1'),
            ]);
        return back();
    }

    public function forgotPassword()
    {   
        return view('user.forgotpassword');
    }

    public function forgotPassword_(Request $request)
    {   
        $t = User::where('email', $request->email)->first();
        if ($t==null){
            return redirect('/forgotpassword')->with('fail', 'Email không tồn tại!');
        }else{
            $randomToken=Str::random(64);
            $t = new passwordReset;
            $t->email=$_POST['email'];
            $t->token=$randomToken;
            $t->save();

            Mail::to($request->email)->send(new forgotPassword($randomToken));
            return redirect('/auth')->with('success', 'Email khôi phục mật khẩu đã được gửi! Hãy check hòm thư trong Mail của bạn nhé.');
        }
        
    }
    public function forgotPassword1_()
    {   
        $t = User::where('email', Auth::user()->email)->first();
        if ($t==null){
            return redirect('/forgotpassword')->with('fail', 'Email không tồn tại!');
        }else{
            $randomToken=Str::random(64);
            $t = new passwordReset;
            $t->email=Auth::user()->email;
            $t->token=$randomToken;
            $t->save();

            Mail::to(Auth::user()->email)->send(new forgotPassword($randomToken));
            return redirect('/');
        }
        
    }

    public function changePassForgot($token){
        $t = passwordReset::where('token', $token)->first();
        if ($t==null){
            return redirect('/forgotpassword');
        }else{
            return view('user.changePassForgot');
        }
    }

    public function changePassForgot_(Request $request,$token){

        $t = passwordReset::where('token', $token)->first();

        if ($t==null){
            return redirect('/forgotpassword')->with('fail', 'Token không hợp lệ!');
        }else{
            $t1 = User::where('email', $t->email)->first();
            $t1->password=Hash::make($request->password);
            $t1->save();
            PasswordReset::where('token', $token)->delete();;
            return redirect('/auth')->with('success', 'Mật khẩu đã được thay đổi, vui lòng đăng nhập!');
        }
    }

    function changePass(){
        return view('user.changepass');
    }
    function changePass_ (Request $request){
        if(Hash::check($request->password,Auth::user()->password)){
            $t = User::find(Auth::user()->id);
            if ($t==null) return redirect('/changepass')->with('fail', 'Không tìm thấy người dùng!');
            $t->password=Hash::make($request->new_password);
            $t->save();
            return redirect('/')->with('success', 'Đổi mật khẩu thành công!');
        }else{
             return back()->with('fail', 'Mật khẩu cũ không đúng!');
        }

    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
