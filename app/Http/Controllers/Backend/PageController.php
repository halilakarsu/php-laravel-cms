<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PageController extends Controller
{

    public function index()
    {
        $pages=Pages::all()->sortBy('page_sort');
        return view('backend.pages.index',)->with('pages',$pages);

    }

    public function sortable(){
      $items=$_POST['item'];
        foreach ($items as $key => $value) {
            $pages=Pages::find(intval($value));
            $pages->page_sort=intval($key);
            $pages->save();
        }
        echo true;
    }


    public function create()
    {
       return view('backend.pages.create');
    }


    public function store(Request $request)
    {    if(strlen($request->page_slug>3)){
         $slug=Str::slug($request->page_slug);
    } else{
        $slug=Str::slug($request->page_title);
    }
         if ($request->hasFile('page_file')){
            $request->validate([
            'page_file'=>'required|image|mimes:jpg,png,jpeg|max:2048',
            'page_content'=>'required',
            'page_title'=>'required'
           ]);
           $fileName=rand(1,999999).'-'.$request->page_file->getClientOriginalName();
           $request->page_file->move(public_path('backend/images/pages'),$fileName);
         }
         else {
            return back()->with('error',"Dosya yüklenemedi");
         }
      $pagestore=Pages::insert(
          [
             'page_title' =>$request->page_title,
             'page_file' =>$fileName,
             'page_content' =>$request->page_content,
             'page_status' =>$request->page_status,
             'page_slug'=>$slug
          ]);
       if($pagestore){
           return redirect(route('page.index'))->with('success','işlem başarılı bir şekilde gerçekleşti');
       }
        return back()->width('error','Kayıt işlemi başarısız.');
    }


    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $pageEdit=Pages::find($id);
        return view('backend.pages.edit',compact('pageEdit'));
    }


    public function update(Request $request, $id)
    {        if (strlen($request->page_slug > 3)) {
                $slug = Str::slug($request->page_slug);
            } else {
                $slug = Str::slug($request->page_title);
            }
            if ($request->hasFile('page_file')) {
                $request->validate([
                    'page_file' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                    'page_content' => 'required',
                    'page_title' => 'required'
                ]);
                $fileName = rand(1, 999999) . '-' . $request->page_file->getClientOriginalName();
                $request->page_file->move(public_path('backend/images/pages'), $fileName);
                $pageStore = Pages::where('id',$id)->update(
                    [   'page_title' => $request->page_title,
                        'page_file' => $fileName,
                        'page_content' => $request->page_content,
                        'page_status' => $request->page_status,
                        'page_slug' => $slug
                    ]);
                $path='backend/images/pages/'.$request->oldFile;
                if(file_exists($path)) {
                    @unlink(public_path($path));
                }
            } else {
                $request->validate([
                    'page_content' => 'required',
                    'page_title' => 'required'
                ]);
                $pageStore = Pages::where('id',$id)->update(
                    [   'page_title' => $request->page_title,
                        'page_content' => $request->page_content,
                        'page_status' => $request->page_status,
                        'page_slug' => $slug
                    ]);
            }

            if ($pageStore) {
                return redirect(route('page.index'))->with('success', 'işlem başarılı bir şekilde gerçekleşti');
            }
            return back()->width('error', 'Kayıt işlemi başarısız.');
        }


    public function destroy(string $id)
    {
        $pages=Pages::destroy(intval($id));
        if($pages){
          return 1;
        }
        else {
            echo 0;
        }
    }
}
