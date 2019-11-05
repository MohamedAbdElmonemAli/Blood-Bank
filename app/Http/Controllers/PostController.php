<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rules = Post::paginate(5);
      return view('posts.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', compact('categories'));
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
        'title' => 'required',
        'content' => 'required',
        'image' => 'required',
        'category_id' => 'required'
    ];
    $message =[
      'title.required'=>'The Title is Required',
      'content.required'=>'The Content is Required',
      'image.required'=>'The Image is Required',
      'category_id.required'=>'The Category is Required'
    ];
   $this->validate($request,$rules,$message);
    $data = Post::create($request->all());
    if ( $request->hasFile('image')  ) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/post', $image_new_name);
            $data->image = 'uploads/post/'.$image_new_name;
            $data->save();
        }

   flash()->success("تم الاضافه بنجاح");
   return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $rules = Post::find($id);
      return view('posts.show',compact('rules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
       $model = Post::findOrFail($id);
      return view('posts.edit',compact('model'));
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
       $data = Post::findOrFail($id);
         $rules = $this->validate(request(),[
           'title' => 'required',
           'content' => 'required',
           'image' => 'required',
           'category_id' => 'required'
         ]);
         $data->update($rules);
         if ( $request->hasFile('image')  ) {
                 $image = $request->image;
                 $image_new_name = time() . $image->getClientOriginalName();
                 $image->move('uploads/post', $image_new_name);
                 $data->image = 'uploads/post/'.$image_new_name;
                 $data->save();
             }
         flash('تم التعديل بنجاح')->success();
         return redirect(route('post.index'));
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       $data = Post::findOrFail($id);
       $data->delete();
       flash(' تم الحذف بنجاح')->success();
       return redirect(route('post.index'));
     }
}
