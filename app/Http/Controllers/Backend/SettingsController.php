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
}
