<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Governorate;


class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = Governorate::paginate(5);
        return view('governorates.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rules =[
         'name' => 'required'
       ];
       $message =[
         'name.required'=>'The Name is Required'
       ];
      $this->validate($request,$rules,$message);
      // $data = New Governorate;
      // $data->name =$request->input('name');
      // $data->save();
      $data = Governorate::create($request->all());
      flash()->success("تم الإضافه بنجاح");
      return redirect(route('governorate.index'));

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
      $model = Governorate::findOrFail($id);
      return view('governorates.edit',compact('model'));
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
        $data = Governorate::findOrFail($id);
        $data->update($request->all());
        flash()->success('تم التحديث بنجاح');
        return redirect(route('governorate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = Governorate::findOrFail($id);
      $data->delete();
      flash()->success('تم الحذف بنجاح');
      return redirect(route('governorate.index'));
    }
}
