<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function updateUser(Request $request)
    {
    	$user = auth()->user();

    	$data = $this->validate($request, [
    		'email' => 'required|min:2',
            'repeat_email' => 'required|min:2',
    		'password' => 'required|min:2',
            'repeat_password' => 'required|min:2'
    	]);

    	if($data['email'] == $data['repeat_email'] && $data['password'] == $data['repeat_password'])
        {
            $user->email = $data['email'];
            $user->password = \Hash::make($data['password']);

            $user->save();
            return redirect()->back()->with('success', 'User has been updated');
        }
        else
        {
            return redirect()->back()->with('error', 'fields don not match');
        }    	
    }

    public function deleteUser()
    {
    	$user = auth()->user();
    	$user->delete();
    }

    public function updateRole(Request $request, $user_id)
    {
        $user = User::find($user_id);

        \DB::table('model_has_roles')->where('model_id',$user_id)->delete();

        $user->assignRole($request->input('role'));

        $user->save();

        return redirect()->back()->with('success', 'the user has been updated correctly.');
    }
}
