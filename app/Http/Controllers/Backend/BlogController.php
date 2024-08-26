<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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
