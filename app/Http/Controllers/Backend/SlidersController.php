<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SlidersController extends Controller
{
    public function index()
    {
        $sliders=Sliders::all()->sortBy('slider_sort');
        return view('backend.sliders.index')->with('sliders',$sliders);
    }


    public function create()
    {

        return view('backend.sliders.create');
    }


    public function store(Request $request)
    {         if(strlen($request->slider_slug)>3){
              $slug=Str::slug($request->slider_slug);
            }else {
                $slug=Str::slug($request->slider_title);
            }
        if($request->hasFile('slider_file')){
            $request->validate([
              'slider_file'=>'required|image|mimes:jpg,jpeg,png|max:2024',
              'slider_title'=>'required',
              'slider_content'=>'required'
            ]);
            $fileName=rand(1,999999).'-'.$request->slider_file->getClientOriginalName();
            $request->slider_file->move(public_path('/backend/images/sliders'),$fileName);
            $sliderStore=Sliders::insert([
              'slider_file'=>$fileName,
              'slider_title'=>$request->slider_title,
              'slider_content'=>$request->slider_content,
              'slider_status'=>$request->slider_status,
              'slider_slug'=>$slug
            ]);

        }
        else {
            $request->validate([
                'slider_title'=>'required',
                'slider_content'=>'required'
            ]);
            $sliderStore=Sliders::insert([
                'slider_title'=>$request->slider_title,
                'slider_content'=>$request->slider_content,
                'slider_status'=>$request->slider_status,
                'slider_slug'=>$request->$slug
            ]);
        }
           if($sliderStore){
            return redirect(route('slider.index'))->with('success','Kayıt İşlemi Başarılı');
           }
           return back()->with('error','Kayıt işlemi başarısız');
    }


    public function show(Sliders $sliders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sliderEdit=Sliders::where('id',$id)->first();
      return view('backend.sliders.edit')->with('sliderEdit',$sliderEdit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        if (strlen($request->slider_slug) > 3) {
            $slug = Str::slug($request->slider_slug);
        } else {
            $slug = Str::slug($request->slider_title);
        }
        if ($request->hasFile('slider_file')) {
            $request->validate([
                'slider_file' => 'required|image|mimes:jpg,jpeg,png|max:2024',
                'slider_title' => 'required',
                'slider_content' => 'required'
            ]);
            $fileName = rand(1, 999999) . '-' . $request->slider_file->getClientOriginalName();
            $request->slider_file->move(public_path('/backend/images/sliders'), $fileName);
            $sliderUpdate=Sliders::where('id',$id)->update([
                'slider_file'=>$fileName,
                'slider_title'=>$request->slider_title,
                'slider_content'=>$request->slider_content,
                'slider_status'=>$request->slider_status,
                'slider_slug'=>$slug
            ]);
            $path='/backend/images/slider'.$request->oldFile;
            if(file_exists('oldFile')){
                unlink(public_path($path));
            }

        }else {
            $sliderUpdate=Sliders::where('id',$id)->update([
                'slider_title'=>$request->slider_title,
                'slider_content'=>$request->slider_content,
                'slider_status'=>$request->slider_status,
                'slider_slug'=>$slug
            ]);
        }
        if($sliderUpdate){
          return redirect(route('slider.index'))->with('success','Güncelleme Başarılı');
        }
        return back()->with('error',"güncelleme başarısız");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        {
            $slider=Sliders::destroy(intval($id));
            if($slider){
                return 1;
            }
            else {
                echo 0;
            }
        }
    }
    public function sortable(){
        $items=$_POST['item'];
        foreach ($items as $key => $value) {
            $sliders=Sliders::find(intval($value));
            $sliders->slider_sort=intval($key);
            $sliders->save();
        }
        echo true;
    }

}
