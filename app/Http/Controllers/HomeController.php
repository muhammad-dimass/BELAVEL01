<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
     public function dashboard() {
        // echo "ini metod dashboard";
        return view('dashboard');
    }

    public function index(Request $request) {
        // echo "ini metod index";
        // $data = User::get();

        $data = new User;
        if($request->get('search')){
                $data = $data->where('name', 'LIKE','%'.$request->get('search').'%')->orWhere('email','LIKE','%'.$request->get('search').'%');
        }
        $data = $data->get();
        return view('index', compact('data', 'request'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'photo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required',
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // dd($request->all());

        $photo = $request->file('photo');
        $filename = date('Y-m-d').$photo->getClientOriginalName();
        $path = 'photo.user/'.$filename;

        Storage::disk('public')->PUT($path, file_get_contents($photo));

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $filename;

        User::create($data);
        return redirect()->route('indexuser');
    }

    public function edit(Request $request,$id){
        $data = User::find($id);

        // dd($data);
         return view('edit', compact('data'));
    }

    public function update(Request $request ,$id){
        // dd($request->all());

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'nullable',
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->name;
        $data['email'] = $request->email;

        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);
        return redirect()->route('indexuser');

    }

    public function delete(Request $request,$id){
        $data = User::find($id);
        if($data){
            $data->delete();
        }
        return redirect()->route('indexuser');

    }
}
