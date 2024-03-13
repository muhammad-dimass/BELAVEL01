<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DataTableController extends Controller
{
    public function clientside(Request $request) {
        // echo "ini metod index";
        // $data = User::get();

        $data = new User;
        if($request->get('search')){
                $data = $data->where('name', 'LIKE','%'.$request->get('search').'%')->orWhere('email','LIKE','%'.$request->get('search').'%');
        }

        if($request->get('tanggal')){
            $data = $data->where('name','LIKE','%'.$request->get('search').'%')
            ->orWhere('email','LIKE','%'.$request->get('search').'%');
        }


        $data = $data->get();
        return view('datatable.clientside', compact('data', 'request'));
    }

    public function serverside(Request $request) {

        if($request->ajax()) {

        $data = new User;
        $data = $data->latest();

            return DataTables::of($data)->addColumn('no',function($data){
                return 'ini nomor';
            })  ->addColumn('photo',function($data){
                return '<img width="100px" alt="'.  $data->name .'" src="'. asset('storage/photo.user/'.$data->image).'">';
            })   ->addColumn('nama',function($data){
                return $data->name;
            })   ->addColumn('email',function($data){
                return $data->email;
            })   ->addColumn('action',function($data){
                return '<a href="'. route('edituser',['id' => $data->id]).'"><i class="fa fa-edit me-sm-1"></i></a>

                    <a href="" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class="fa fa-trash me-sm-1"></i></a>';
            })->rawColumns(['photo','action'])
              ->make(true); 

             }

        return view('datatable.serverside', compact( 'request'));
    }

}
