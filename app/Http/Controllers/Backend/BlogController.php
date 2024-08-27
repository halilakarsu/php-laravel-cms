<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BlogController extends Controller
{

    public function index()
    {
        $blogs=Blogs::all()->sortBy('blog_sort');
        return view('backend.blog.index',)->with('blogs',$blogs);

    }

    public function sortable(){
      $items=$_POST['item'];
        foreach ($items as $key => $value) {
            $blogs=Blogs::find(intval($value));
            $blogs->blog_sort=intval($key);
            $blogs->save();
        }
        echo true;
    }


    public function create()
    {
       return view('backend.blog.create');
    }


    public function store(Request $request)
    {    if(strlen($request->blog_slug>3)){
         $slug=Str::slug($request->blog_slug);
    } else{
        $slug=Str::slug($request->blog_title);
    }
         if ($request->hasFile('blog_file')){
            $request->validate([
            'blog_file'=>'required|image|mimes:jpg,png,jpeg|max:2048',
            'blog_content'=>'required',
            'blog_title'=>'required'
           ]);
           $fileName=rand(1,999999).'-'.$request->blog_file->getClientOriginalName();
           $request->blog_file->move(public_path('backend/images/blogs'),$fileName);
         }
         else {
            return back()->with('error',"Dosya yüklenemedi");
         }
      $blogStore=Blogs::insert(
          [
             'blog_title' =>$request->blog_title,
             'blog_file' =>$fileName,
             'blog_content' =>$request->blog_content,
             'blog_status' =>$request->blog_status,
             'blog_slug'=>$slug
          ]);
       if($blogStore){
           return redirect(route('blog.index'))->with('success','işlem başarılı bir şekilde gerçekleşti');
       }
        return back()->width('error','Kayıt işlemi başarısız.');
    }


    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $blogEdit=Blogs::find($id);
        return view('backend.blog.edit',compact('blogEdit'));
    }


    public function update(Request $request, $id)
    {        if (strlen($request->blog_slug > 3)) {
                $slug = Str::slug($request->blog_slug);
            } else {
                $slug = Str::slug($request->blog_title);
            }
            if ($request->hasFile('blog_file')) {
                $request->validate([
                    'blog_file' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                    'blog_content' => 'required',
                    'blog_title' => 'required'
                ]);
                $fileName = rand(1, 999999) . '-' . $request->blog_file->getClientOriginalName();
                $request->blog_file->move(public_path('backend/images/blogs'), $fileName);
                $blogStore = Blogs::where('id',$id)->update(
                    [   'blog_title' => $request->blog_title,
                        'blog_file' => $fileName,
                        'blog_content' => $request->blog_content,
                        'blog_status' => $request->blog_status,
                        'blog_slug' => $slug
                    ]);
                $path='backend/images/blogs/'.$request->oldFile;
                if(file_exists($path)) {
                    @unlink(public_path($path));
                }
            } else {
                $request->validate([
                    'blog_content' => 'required',
                    'blog_title' => 'required'
                ]);
                $blogStore = Blogs::where('id',$id)->update(
                    [   'blog_title' => $request->blog_title,
                        'blog_content' => $request->blog_content,
                        'blog_status' => $request->blog_status,
                        'blog_slug' => $slug
                    ]);
            }

            if ($blogStore) {
                return redirect(route('blog.index'))->with('success', 'işlem başarılı bir şekilde gerçekleşti');
            }
            return back()->width('error', 'Kayıt işlemi başarısız.');
        }


    public function destroy(string $id)
    {
        $blogs=Blogs::destroy(intval($id));
        if($blogs){
          return 1;
        }
        else {
            echo 0;
        }
    }
}
