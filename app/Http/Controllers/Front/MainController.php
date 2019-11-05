<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\DonationRequest;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\Category;

class MainController extends Controller
{
  public function home()
  {
    $posts = Post::all();
    $donations = DonationRequest::paginate(4);
    return view('website.Home', compact('posts','donations'));
  }

  public function postdetail($id)
  {
    $detail = Post::find($id);
    $posts = Post::where('category_id',$detail->category_id)->get();
    return view('website.article',compact('detail','posts'));
  }
  public function donationdetail($id)
  {
    $details = DonationRequest::where('id', request()->id)->get();
    return view('website.donation-details',compact('details'));
  }
  public function donations()
  {
    $rules = DonationRequest::paginate(5);
    return view('website.donations',compact('rules'));
  }
  public function donationsearch(Request $request)
  {
    $rules = DonationRequest::with('city','bloodtype')->where(function ($query) use ($request) {
         if ($request->input('city_id')) {
           $query->where('city_id', $request->city_id);
         }
         if($request->input('blood_type_id')){
           $query->where('blood_type_id', $request->blood_type_id);
         }
       })->latest()->paginate(10);

       if ($rules->count() == 0) {
         flash('لا يوجد بيانات بهذا الطلب')->error();
           return back();
       }
       else{
       return view('website.donations',compact('rules'));
     }
  }
  public function how_we_are()
  {
    return view('website.how-we-are');
  }
  public function setting()
  {
    $settings = Setting::all();
    return View('website.contact-us',compact('settings'));
  }
  public function contact(Request $request)
  {
    $rules = [
      'name' => 'required',
      'email' => 'required|email',
      'phone' => 'required',
      'subject' => 'required',
      'message' =>'required',
    ];
    $messages = [
      'name.required' => 'مطلوب إدخال الإسم',
      'email.required' => 'البريد الإلكتروني مطلوب',
      'phone.required' => 'الرجاء إدخال رقم الهاتف',
      'subject.required' => 'الرجاء لإدخال عنوان الرساله',
      'message.required' => 'الرجاء إدخال نص الرساله',
    ];
    $this->validate($request,$rules,$messages);
    $contacts = Contact::create($request->all());
    $contacts->save();
    flash('تم إرسال الرساله بنجاح')->success();
    return redirect('user/setting');
  }
  public function allarticles()
  {
    $articles = Post::all();
    return view('website.allarticle',compact('articles'));
  }
  public function toggleFavourite(Request $request)
  {
    $toggle = $request->user('client')->posts()->toggle($request->post_id);
    return jsonResponse(1,'success',$toggle);
  }
  public function getdonationrequest()
  {
    return view('website.donationRequest');
  }
  public function postdonation(Request $request)
  {
    $rules =[
    'name' => 'required',
    'age' => 'required',
    'bags_num' => 'required',
    'hospital_name' => 'required',
    'hospital_address' => 'required',
    'phone' => 'required|digits:11',
    'city_id' => 'required',
    'blood_type_id' => 'required',
    'latitude' => 'required',
    'langitude' => 'required',
    'notes' => 'required'
  ];
  $message =[
    'name.required'=>'مطلوب إسم الحاله',
    'age.required'=>'مطلوب إدخال العمر',
    'bags_num.required'=>'عدد الأكياس مطلوب',
    'hospital_name.required'=>'مطلوب إسم المستشفي',
    'hospital_address.required'=>'مطلوب عنوان المستشفي',
    'phone.required'=>'مطلوب رقم الهاتف',
    'city_id.required'=>'مطلوب إدخال المدينه',
    'blood_type_id.required'=>'مطلوب إدخال فصيله الدم',
    'latitude.required'=>'مطلوب إدخال خطوط الطول',
    'langitude.required'=>'مطلوب إدخال خطوط العرض',
    'notes.required'=>'مطلوب إدخال الملاحظات'
  ];
  $this->validate($request,$rules,$message);
  $record = DonationRequest::create($request->all());
  $record->client_id = auth('client')->user()->id;
  $record->save();
  flash('تم إنشاء الطلب بنجاح')->success();
  return back();
  }
}
