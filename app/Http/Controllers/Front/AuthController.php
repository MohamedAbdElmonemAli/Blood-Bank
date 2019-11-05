<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Mail\ClientResetPassword;
use Auth;
use Mail;

class AuthController extends Controller
{

  public function getLogin()
  {
    return view('website.login');
  }
  public function login(Request $request)
  {
    $rememberme = request('rememberme') == 1 ? true : false;
      if (auth()->guard('client')->attempt(['phone' => request('phone'), 'password' => request('password')], $rememberme)) {
          return redirect('user/homepage');
      } else {
        flash('يوجد خطا في البيانات الرجاء التاكد من رقم الهاتف وكلمه المرور')->error();
          return back();
      }
  }

  public function getRegister()
  {
    return view('website.signup');
  }
  public function newRegister(Request $request)
  {
    $rules = [
      'name' => 'required',
      'email' => 'required|email|unique:clients',
      'd_o_b' => 'required',
      'password' => 'required|confirmed',
      'blood_type_id' => 'required',
      'governorate_id' => 'required',
      'city_id' => 'required',
      'phone' => 'required',
      'last_date_of_donation' => 'required',
    ];
    $message = [
      'name.required' =>'إسم المستخدم مطلوب',
      'email.required' =>'البريد الإلكتروني مطلوب',
      'd_o_b.required' =>'مطلوب إدخال تاريخ الميلاد',
      'password.required' =>'كلمه المرور مطلوبه',
      'blood_type_id.required' =>'مطلوب إدخال فصيله الدم',
      'governorate_id.required' =>'إسم المحافظه مطلوب',
      'city_id.required' =>'إسم المدينه مطلوب',
      'phone.required' =>'مطلوب رقم الهاتف',
      'last_date_of_donation.required' =>'مطلوب اخر تاريخ تبرع',
    ];
    $this->validate($request,$rules,$message);
    $request->merge(['password'=> bcrypt($request->password)]);
    $clients = Client::create($request->all());
    $clients->api_token = str_random(60);
    $clients->save();
    return redirect('user/loginsite');

  }
  public function GetEmail()
  {
      return view('website.resetPassword.email');
  }
  public function SendEmail()
  {
      $this->validate(request(),[
          'email' => 'required'
      ]);
      $client = Client::where('email',request()->email)->first();
      if($client)
      {
          Mail::to($client->email)
              ->send(new ClientResetPassword);
          flash()->success('تم الارسال');
          return redirect(route('loginsite'));
      }
      flash()->success('حدث خطأ حاول مره اخرى');
      return redirect(route('loginsite'));
  }
  public function ResetPassword()
  {
      return view('website.resetPassword.resetPassword');
  }
  public function NewPassword()
  {
      $this->validate(request(),[
          'email' => 'required',
          'password' => 'required|confirmed'
      ]);
      $client = Client::where('email',request()->email)->first();
      if($client)
      {
          $client->password = bcrypt(request()->input('password'));
          $client->save();
          return redirect(route('loginsite'));
      }else{
          flash()->success('حدث خطأ حاول مره اخرى');
          return redirect(route('loginsite'));
      }
  }

}
