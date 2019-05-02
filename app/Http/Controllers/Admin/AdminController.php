<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use URL;
use Exception;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $count = User::count();
        return view('admin/admins')->with('count', $count);
    }

    public function delete($id){

        $check = User::find($id);
        if(isset($check) == true ){
            $admin = User::find($id);
            if($admin ){
                $admin->delete();
                session()->flash('message','Admin deleted successfully.');
                
            }
            else
            session()->flash('message','Admin deleted successfully.');

            return redirect(URL::to('/').'/admin/admins');
        }
        else{
            return 'Admin not found';
        }
    }


}
