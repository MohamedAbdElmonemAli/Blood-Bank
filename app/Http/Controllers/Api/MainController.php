<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\BloodType;
use App\Models\Client;
use App\Models\Token;
use App\Models\Category;
use App\Models\Notification;
use App\Models\DonationRequest;
use Validator;

class MainController extends Controller
{
  //////governorates////////
    public function governorates()
    {
      $governorates= Governorate::all();
      return jsonResponse(1,'success',$governorates);
    }
////////cities/////////////
    public function cities(Request $request)
    {
      $cities= City::where(function($query) use($request){
        if ($request->has('governorate_id')) {
          $query->where('governorate_id',$request->governorate_id);
        }
      })->get();
      return jsonResponse(1,'success',$cities);
    }
    //////////////////clients////////////
    public function clients(Request $request)
    {
      $clients= Client::with('city','blood_type')->where(function($query) use($request){
        if ($request->has('city_id')) {
          $query->where('city_id',$request->city_id);
        }
        if ($request->has('blood_type_id')) {
          $query->where('blood_type_id',$request->blood_type_id);
        }
      })->get();
      return jsonResponse(1,'success',$clients);
    }
//////////category////////////
    public function getcategories()
    {
        $categories = Category::all();
        return jsonResponse(1,'success', $categories);
    }
/////////////posts///////////////////
    public function posts(){
      $posts = Post::with('category')->paginate(10);
      return jsonResponse(1,'success',$posts);
    }
//////////////searchByCategory/////////////
    public function searchByCategory(Request $request)
    {
        $posts = Post::with('category')->where(function ($query) use ($request) {
            if ($request->input('category_id')) {
                $query->where('category_id', $request->category_id);
            }
            elseif ($request->input('keyword')) {
                $query->where(function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->keyword . '%');
                    $query->orWhere('content', 'like', '%' . $request->keyword . '%');
                });
            }
        })->latest()->paginate(10);
        //dd($posts);
        if ($posts->count() == 0) {
            return jsonResponse(0, 'Failed');
        }
        else{
        return jsonResponse(1, 'success', $posts);
      }
    }

    /*public function posts(Request $request)
    {
      $posts= Post::where(function($query) use($request){
        if ($request->has('category_id')) {
          $query->where('category_id',$request->category_id);
        }
      })->get();
      return jsonResponse(1,'success',$posts);
    }*/
//////////////postDetails///////////
    public function postDetails(Request $request)
    {
       $post = Post::select('title', 'content', 'image')->where('id', $request->id)->get();
       return jsonResponse(1,'success', $post);
    }
////////Settings/////////////
    public function settings()
    {
      $settings= Setting::all();
      return jsonResponse(1,'success',$settings);
    }
/////////////////Contacts/////////////
    public function contacts(Request $request)
    {
      $rules =[
        'name' => 'required',
        'email' => 'required|email|unique:clients',
        'phone' => 'required',
        'subject' => 'required',
        'message' => 'required',
      ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
        return jsonResponse(0,$validator->errors()->first(),$validator->errors());
      }
      else {
        $contacts = Contact::create($request->all());
        $contacts->save();
        return jsonResponse(1,'تم ارسال الرساله بنجاح',$contacts);
      }
    }
///////////////Profile//////////
   public function profile(Request $request){
     $profile = $request->user();
     return jsonResponse(1,'success',$profile);
   }
//////////////editprofile/////////////////
    public function editprofile(Request $request){
      $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:clients',
        'password' => 'required|confirmed',
        'phone' => 'required',
        'city_id' => 'required',
        'blood_type_id' => 'required',
        'd_o_b' => 'required',
        'last_date_of_donation' => 'required',
      ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
        return jsonResponse(0,$validator->errors()->first(),$validator->errors());
      }
      else{
        $request->merge(['password'=> bcrypt($request->password)]);
        $request->user()->update($request->all());
        return jsonResponse(1,'تم التعديل بنجاح',[
          'client' => $request->user()
        ]);
      }
    }
//////////////notificationsetting////////////
    public function notificationsetting(Request $request){
      $blood_tybe= $request->user()->bloodtypes()->pluck('blood_type.id')->toArray();
      $governorate= $request->user()->governorates()->pluck('governorates.id')->toArray();
      return jsonResponse(1,'success',[
        'blood_type' => $blood_tybe,
        'governorate' => $governorate
      ]);
    }
///////////////updatenotificationsetting//////////////
     public function updatenotificationsetting(Request $request){
       $rules = [
         'governorates'=>'required',
         'blood_type'=>'required'
       ];
       $validator = Validator::make($request->all(),$rules);
       if ($validator->fails()) {
         return jsonResponse(0,$validator->errors()->first(),$validator->errors());
       }else{
         $governorate = $request->user()->governorates()->sync($request->governorates);
         $blood_tybe = $request->user()->bloodtypes()->sync($request->blood_type);
         return jsonResponse(1,'تم التعديل بنجاح',[
           'governorates'=>$governorate,
           'blood_type'=>$blood_tybe
         ]);
       }
     }
//////////////////favourites///////////////
     public function favourites(Request $request)
        {
            $favourites = $request->user()->posts()->paginate(10);

            return jsonResponse(1, 'success', $favourites);
        }
//////////////////toggleFavourites//////////////////
        public function toggleFavourites(Request $request)
        {
            $rules = [
             'posts' => 'required'
             ];
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                return jsonResponse(0, $validator->errors()->first(), $validator->errors());
            }
            else{
            $favourites = $request->user()->posts()->toggle($request->posts);
            return jsonResponse(1, 'success',['posts'=> $favourites]);
            }
         }
/////////////////notifications////////////
          public function notifications(){
          $notifcation = Notification::paginate(10);
          return jsonResponse(1,'success', $notifcation);
          }
//////////////createDonation////////////////
          public function createDonation(Request $request)
          {
            $rules = [
               'name' => 'required',
               'client_id' => 'required',
               'age' => 'required',
               'blood_type_id' => 'required',
               'bags_num' => 'required',
               'hospital_name' => 'required',
               'hospital_address' => 'required',
               'langitude' => 'required',
               'latitude' => 'required',
               'city_id' => 'required|exists:cities,id',
               'phone' => 'required|digits:11',
               'notes' => 'required',

            ];
          $validator = Validator::make($request->all(),$rules);

          if ($validator->fails()) {

             return jsonResponse(0, $validator->errors()->first(), $validator->errors());
          }

          $donationRequests = $request->user()->donationrequests()->create($request->all());
          // find clients suitable for this donation request
          $clientsIds = $donationRequests->city->governorate
          ->clients()->whereHas('bloodtypes', function ($q) use ($request,$donationRequests) {

             $q->where('blood_type.id', $donationRequests->blood_type_id);
             })->pluck('clients.id')->toArray();

          $send = null;
          if (count($clientsIds)) {
             $notification = $donationRequests->notifications()->create([
                 'title' => 'احتاج متبرع لفصيله',
                 'content' => $donationRequests->blood_type . 'محتاج متبرع لفصيلة ',
             ]);
             $notification->clients()->attach($clientsIds);
             $tokens = Token::whereIn('client_id',$clientsIds)->where('token','!=', null)->pluck('token')->toArray();
             if (count($tokens)) {
                 $title = $notification->title;
                 $body = $notification->body;
                 $data = [
                     'donation_request_id' => $donationRequests->name
                 ];
                 $send = notifyByFirebase($title, $body, $tokens, $data);
             }
           }
          return jsonResponse(1, 'تمت الاضافه بنجاح', $donationRequests);
        }
///////////////////donations//////////////////
        public function donations()
        {
        $donations = DonationRequest::paginate(10,[
            'name',
            'client_id',
            'age',
            'blood_type_id',
            'bags_num',
            'hospital_name',
            'hospital_address',
            'longitude',
            'latitude',
            'city_id',
            'phone',
            'notes'
        ]);

        return jsonResponse(1,'success', $donations);
      }
//////////////////donationDetails///////////////
        public function donationDetails(Request $request)
        {
        $donationdetails = DonationRequest::where('id', $request->id)->get();

        return jsonResponse(1,'success',$donationdetails);
        }
////////////////////donationSearch//////////////
      /*  public function donationSearch(Request $request)
        {
            $donations = DonationRequest::with('city')->where(function ($query) use ($request) {
                if ($request->input('city')) {
                    $query->where('city_id', $request->city_id);
                }
                elseif ($request->input('keyword')) {
                    $query->where(function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->keyword . '%');
                        $query->orWhere('content', 'like', '%' . $request->keyword . '%');
                    });
                }
            })->latest()->paginate(10);
            //dd($posts);
            if ($donations->count() == 0) {
                return jsonResponse(0, 'Failed');
            }
            else{
            return jsonResponse(1, 'success', $donations);
          }
        }*/

}
