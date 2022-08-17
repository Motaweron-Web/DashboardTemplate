<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use PhotoTrait;
    public function register(){
        if (Auth::guard('user')->check()) {
            return redirect('homepage');
        }
        else{
            return view('site.Auth.register');
        }
    }

    public function UserRegistration(request $request){
        $request->validate([
            'user_name'             => 'required|max:255',
            'email'                 => 'required|max:255|email|unique:users,email',
            'password'              => 'required|confirmed|max:255|min:6',
            'password_confirmation' => 'required',
        ],[
            'user_name.required' => 'Please Enter Your User Name',
            'email.required'     => 'Please Enter Your Email',
            'email.unique'       => 'This Email is Used Before',
            'password.required'  => 'Please Enter A Password',
            'password.confirmed' => 'Password Confirmation Should Be Same As Password',
        ]);
        $data = $request->only('user_name','email','password');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if ($user){
            Auth::guard('user')->login($user);
            toastSuccess('مرحبا بك يا '.$request->user_name);
            return redirect('homepage');
        }
        else{
            toastError('هناك خطأ ما ...');
            return view('site.Auth.register');
        }
    }

    public function logout(){
        user()->logout();
        toastr()->info('تم تسجيل الخروج');
        return redirect('login');
    }

    public function login(){
        if (Auth::guard('user')->check()) {
            return redirect('homepage');
        }
        return redirect('/');
    }

    public function postLogin(request $request){
        $request->validate([
            'email'    => 'required',
            'password' => 'required'
        ],[
            'email'    => 'يرجي ادخال الايميل',
            'password' => 'يرجي ادخال كلمة المرور',
        ]);
        $status = ($request->has('rememberMe')) ? 'true' : 'false';
        if (Auth::guard('user')->attempt($request->only('email','password'),$status)){
            toastSuccess('مرحبا بعودتك');
            return redirect(route('homepage'));
        }
        toastError('بيانات دخول غير صحيحة');
        return back();
    }

    public function profile(){
        return view('site.profile');
    }

    public function editProfile(Request $request){
        $user=auth()->user();
        $validator=\Validator::make($request->all(),
            [
                'email'=>'required|unique:users,email,'.$user->id,
                'user_name'=>'required|string|min:3|max:100',
                'image'         => 'nullable|mimes:jpeg,jpg,png,gif',

            ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $inputs=[];
        $inputs['email']=$request->email;
        $inputs['user_name']=$request->user_name;

        if($request->has('image')){
            if (file_exists($user->image)) {
                unlink($user->image);
            }
            $inputs['image'] = $this->saveImage($request->image,'assets/uploads/users');
        }

       $user->update($inputs);
        toastSuccess('تم تعديل حسابك بنجاح');
        return  redirect()->route('profile');

    }

    public function editPassword(Request $request){
        $data = $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'

        ],[
            'password.required'  => 'يرجي ادخال كلمة المرور' ,
            'password_confirmation.required'  => 'يرجي تاكيد كلمة المرور' ,
            'password.confirmed'  => 'يرجي ادخال كلمة المرور' ,
            'password.min'  => 'الحد الادني لكلمة الحروف ستة احرف' ,
            'password_confirmation.min'  => 'الحد الادني لكلمة الحروف ستة احرف' ,


        ]);


        $user=auth()->user();
        $user->password= Hash::make($request->password);
        $user->save();
        return response()->json(['status'=>true]);

    }



    public function deleteMyProfile(){
        $user=auth()->user();
        $user->delete();
        return redirect()->route('/');
    }




}
