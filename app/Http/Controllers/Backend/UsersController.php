<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{

    public function index()
    {
        $users=User::all()->sortBy('user_sort');
        return view('backend.users.index',)->with('users',$users);

    }

    public function sortable(){
      $items=$_POST['item'];
        foreach ($items as $key => $value) {
            $users=User::find(intval($value));
            $users->user_sort=intval($key);
            $users->save();
        }
        echo true;
    }

    public function create()
    {
       return view('backend.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
             'name'=>'required',
             'email'=>'required|min:6'
        ]);
         if ($request->hasFile('user_file')){
            $request->validate([
            'user_file'=>'required|image|mimes:jpg,png,jpeg|max:2048',
           ]);
           $fileName=rand(1,999999).'-'.$request->user_file->getClientOriginalName();
           $request->user_file->move(public_path('backend/images/users'),$fileName);
         }
         else {
            return back()->with('error',"Dosya yüklenemedi");
         }
      $userStore=User::insert(
          [
             'name' =>$request->name,
             'user_file' =>$fileName,
             'password' =>Hash::make($request->password),
             'user_status' =>$request->user_status,
             'email' =>$request->email,
          ]);
       if($userStore){
           return redirect(route('user.index'))->with('success','işlem başarılı bir şekilde gerçekleşti.');
       }
        return back()->width('error','Kayıt işlemi başarısız.');
    }


    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $userEdit=User::find($id);
        return view('backend.user.edit',compact('userEdit'));
    }


    public function update(Request $request, $id)
    {        if (strlen($request->user_slug > 3)) {
                $slug = Str::slug($request->user_slug);
            } else {
                $slug = Str::slug($request->user_title);
            }
            if ($request->hasFile('user_file')) {
                $request->validate([
                    'user_file' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                    'user_content' => 'required',
                    'user_title' => 'required'
                ]);
                $fileName = rand(1, 999999) . '-' . $request->user_file->getClientOriginalName();
                $request->user_file->move(public_path('backend/images/users'), $fileName);
                $userStore = User::where('id',$id)->update(
                    [   'user_title' => $request->user_title,
                        'user_file' => $fileName,
                        'user_content' => $request->user_content,
                        'user_status' => $request->user_status,
                        'user_slug' => $slug
                    ]);
                $path='backend/images/users/'.$request->oldFile;
                if(file_exists($path)) {
                    @unlink(public_path($path));
                }
            } else {
                $request->validate([
                    'user_content' => 'required',
                    'user_title' => 'required'
                ]);
                $userStore = User::where('id',$id)->update(
                    [   'user_title' => $request->user_title,
                        'user_content' => $request->user_content,
                        'user_status' => $request->user_status,
                        'user_slug' => $slug
                    ]);
            }

            if ($userStore) {
                return redirect(route('user.index'))->with('success', 'işlem başarılı bir şekilde gerçekleşti');
            }
            return back()->width('error', 'Kayıt işlemi başarısız.');
        }


    public function destroy(string $id)
    {
        $users=User::destroy(intval($id));
        if($users){
          return 1;
        }
        else {
            echo 0;
        }
    }
}
