<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rules = City::paginate(5);
      return view('cities.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create', compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $data = $this->validate(request(),[
      //       'name' => 'required',
      //       'governorate_id' => 'required'
      //   ]);
      //   City::create($data);
      //   flash('تم الإضافه')->success();
      //   return redirect(route('city.index'));
      $rules =[
        'name' => 'required',
        'governorate_id'=>'required'
      ];
      $message =[
        'name.required'=>'The Name is Required',
        'governorate_id.required'=>'The Governorate is Required'
      ];
     $data = $this->validate($request,$rules,$message);
      City::create($data);
     // $data = New City;
     // $data->name =$request->input('name');
     // $data->governorate_id =$request->input('governorate_id');
     // $data->save();
     flash()->success("تم الاضافه بنجاح");
     return redirect(route('city.index'));
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
      $model = City::findOrFail($id);
      return view('cities.edit',compact('model'));
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
      $data = City::findOrFail($id);
        $rules = $this->validate(request(),[
            'name'           => 'required',
            'governorate_id' => 'required'
        ]);
        $data->update($rules);
        flash('تم التعديل بنجاح')->success();
        return redirect(route('city.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = City::findOrFail($id);
      $data->delete();
      flash(' تم الحذف بنجاح')->success();
      return redirect(route('city.index'));
    }
}
