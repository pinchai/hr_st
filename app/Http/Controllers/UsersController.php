<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public static function index(Request $request){
        $data  = User::all();
        return view('user.user', ['data'=>$data]);
    }

    public static function index_create(Request $request){
        return view('user.create_user');
    }

    public function create(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->permission = $request->permission;
        $user->password = Hash::make($request->input('password'));

        if ($user->save()){
            if (isset($request->profile)){
                $imageName = time().'.'.$request->profile->extension();
                $request->profile->move(public_path('images'), $imageName);
                $user->profile = $imageName;
                $user->save();
            }
        }

        return redirect(route('index_user'));
    }

    public static function confirm_delete(Request $request){
        $user_id = $request->query('user_id');
        $data = User::find($user_id);
        return view('user.confirm_delete', ['data'=>$data]);
    }

    public static function delete(Request $request){
        $user_id = $request->id;
        $data = User::find($user_id);
        if ($data){
            $data->delete();
            //$data->forceDelete();
        }
        return redirect(route('index_user'));
    }

    public static function index_update_user(Request $request){
        $user_id = $request->query('user_id');
        $data = User::find($user_id);
        return view('user.edit_user', ['data'=>$data]);
    }

    public function update(Request $request){
        $user = User::find($request->id);
        $old_profile = $user->profile;
        if ($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->permission = $request->permission;
            if($request->password != ''){
                $user->password = Hash::make($request->input('password'));
            }
            if ($user->save()){
                if (isset($request->profile)){
                    $imageName = time().'.'.$request->profile->extension();
                    $request->profile->move(public_path('images'), $old_profile);
                    $user->profile = $old_profile;
                    $user->save();
                }
            }
        }

        return redirect(route('index_user'));
    }

}
