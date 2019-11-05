<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Models\City;
use App\Models\BloodType;
class DonationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rules = DonationRequest::paginate(5);
      return view('donationrequests.index', compact('rules'));
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
           return redirect(route('donationrequests.index'));
       }
       else{
       return view('donationrequests.index',compact('rules'));
     }
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $rules = DonationRequest::find($id);
      return view('donationrequests.show',compact('rules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = DonationRequest::findOrFail($id);
      $data->delete();
      flash(' تم الحذف بنجاح')->success();
      return redirect(route('donationrequests.index'));
    }
}
