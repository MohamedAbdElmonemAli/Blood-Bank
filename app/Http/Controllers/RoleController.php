<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\User;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rules = Role::paginate(5);
      return view('roles.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('roles.create');
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
          'name' => 'required|unique:roles,name',
          'display_name' => 'required',
          'permission_list' => 'required|array'
          ];
          $message =[
          'name.required'=>'The Name is Required',
          'display_name.required'=>'The Display Name is Required',
          'permission_list.required'=>'The Permission is Required'
          ];
          $this->validate($request,$rules,$message);
          $data = Role::create($request->all());
          $data->permissions()->attach($request->permission_list);
          flash()->success("تم الإضافه بنجاح");
          return redirect(route('role.index'));
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
      $model = Role::findOrFail($id);
      return view('roles.edit',compact('model'));
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
      $rules =[
      'name' => 'required|unique:roles,name,'.$id,
      'display_name' => 'required',
      'permission_list' => 'required|array'
      ];
      $message =[
      'name.required'=>'The Name is Required',
      'display_name.required'=>'The Display Name is Required',
      'permission_list.required'=>'The Permission is Required'
      ];
      $this->validate($request,$rules,$message);
      $data = Role::findOrFail($id);
      $data->update($request->all());
      $data->permissions()->sync($request->permission_list);
      flash()->success('تم التحديث بنجاح');
      return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = Role::findOrFail($id);
      $data->delete();
      flash()->success('تم الحذف بنجاح');
      return redirect(route('role.index'));
    }
}
