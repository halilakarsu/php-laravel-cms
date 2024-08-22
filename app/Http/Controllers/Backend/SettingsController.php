<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
       public function index(){
        $dataSettings=Settings::all()->sortBy('sort');
      return view('backend.settings.index',compact('dataSettings'));
       }
       public function sortable(){
       $items=$_POST['item'];
           foreach ($items as $key => $value) {
            $settings=Settings::find(intval($value));
            $settings->sort=intval($key);
            $settings->save();
       }
           echo true;
       }
       public function destroy($id){
         $deleteSettings=Settings::find($id);
         if($deleteSettings->delete()){
             return back()->with('success','işlem Başarılı');
         }else {
             return back()->with('error','İşlem Başarısız');
         }

       }
       public function edit($id){
         $editSettings=Settings::where('id',$id)->first();
          return view('backend.settings.edit')->with('editSettings',$editSettings);
       }

}
