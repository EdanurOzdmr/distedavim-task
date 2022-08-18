<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Treatments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function index(Request $request)
    {
        $id=User::find($request->user()->id);
        $data['treatment'] = Treatments::where('clinic_id',$id->clinic_id)->get();

        return view('default.index',compact('data'));
    }
    public function login()
    {
        return view('default.login');
    }
    public function authenticate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Lütfen e-mail ve parola kontrol ediniz.');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $this->authorize('clinic');
            $auth = Auth::user();
            $auth['token'] = $auth->createToken('UserAuth', ['user'])->plainTextToken;
            $message = 'Giriş başarılı';
            return redirect()->intended(route('nedmin.Index'));
        } else {
            return back()->with('error','Hatalı Kullanıcı');
        }
        }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->user()->tokens()->delete();
        return redirect(route('nedmin.Login'))->with('success','Güvenli Çıkış Yapıldı');
    }

    public function apiLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Lütfen e-mail ve parola kontrol ediniz.');
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            $auth['token'] = $auth->createToken('UserAuth', ['user'])->plainTextToken;
            $message = 'Giriş başarılı';
            return $this->sendResponse(new UserResource($auth), $message);
        } else {
            return $this->sendError('Giriş başarısız.');

        }
    }

}
