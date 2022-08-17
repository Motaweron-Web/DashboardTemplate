<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\GeneralTrait;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use GeneralTrait,PhotoTrait;

    public function login(request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        if(Auth::guard('user')->attempt($request->only('email','password'))){
            $data = User::with('sites','sites.type')->where('id',Auth::guard('user')->id())->first();
            return $this->returnData('data', $data,'تم تسجيل الدخول بنجاح');
        }

        return $this->returnError('تحقق من بيانات الدخول',405);

    }

    public function register(request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'       => 'nullable|image',
            'user_name'   => 'required|max:255',
            'email'       => 'required|email',
            'password'    => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        $check = User::with('sites','sites.type')->where('email',$request->email)->first();

        if($check)
            return $this->returnError('هذا الايميل تم استخدامه من قبل', 401);

        $data = $request->except('password_confirmation');
        $data['password'] = Hash::make($request->password);
        if($request->has('image') && $request->image != null)
            $data['image'] = $this->saveImage($request->image,'assets/uploads/users');

        $user = User::create($data);
        return $this->returnData('data',$user,'تم اضافة مستخدم جديد');
    }

    public function logout(request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        Auth::logout();
        return $this->returnSuccessMessage('تم تسجيل الخروج بنجاح');
    }

    public function updateProfile(request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'       => 'nullable|image',
            'user_id'     => 'required|exists:users,id',
            'user_name'   => 'nullable|max:255',
            'email'       => 'nullable|email',
            'password'    => 'nullable|min:6|confirmed',
            'password_confirmation' => 'nullable|min:6'
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        $check = User::with('sites','sites.type')->where([['email',$request->email],['id','!=',$request->user_id]])->first();

        if($check)
            return $this->returnError('هذا الايميل تم استخدامه من قبل', 401);

        $data = $request->except('password_confirmation','user_id');

        if($request->has('password') && $request->password != null)
            $data['password'] = Hash::make($request->password);
        else
            unset($data['password']);

        if($request->has('image') && $request->image != null)
            $data['image'] = $this->saveImage($request->image,'assets/uploads/users');
        else
            unset($data['image']);


        $user = User::with('sites','sites.type')->find($request->user_id);
        $user->update($data);
        return $this->returnData('data',$user,'تم تعديل المستخدم بنجاح');
    }

    public function deleteMyAccount(request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails())
            return $this->returnError($validator->getMessageBag(), 400);

        User::find($request->user_id)->delete();

        return $this->returnSuccessMessage('تم حذف حسابك بنجاح :(');

    }


}
