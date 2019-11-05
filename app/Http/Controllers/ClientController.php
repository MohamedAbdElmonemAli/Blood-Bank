<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\BloodType;
use App\Models\City;
use Hash;
use Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rules = Client::paginate(5);
      return view('clients.index', compact('rules'));
    }

    public function status($id)
    {
      $rule = Client::findOrFail($id);
      if($rule->status == 1){
        $rule->status = 0;
        $rule->update(['status' =>$rule->status]);
      }
      else{
        $rule->status = 1;
        $rule->update(['status' =>$rule->status]);
      }
      return back();
    }

    public function search(Request $request)
   {
       $rules = Client::with('city','blood_type')->where(function ($query) use ($request) {
           if ($request->input('city_id')) {
             $query->where('city_id', $request->city_id);
           }
           if($request->input('blood_type_id')){
             $query->where('blood_type_id', $request->blood_type_id);
           }
       })->latest()->paginate(10);

       if ($rules->count() == 0) {
         flash('لا يوجد بيانات بهذا الطلب')->error();
           return redirect(route('client.index'));
       }
       else{
       return view('clients.index',compact('rules'));
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
        //
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
      $data = Client::findOrFail($id);
      $data->delete();
      flash(' تم الحذف بنجاح')->success();
      return redirect(route('client.index'));
    }




}
