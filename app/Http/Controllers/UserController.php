<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function authUser(Request $request)
    {

        $id = User::firstWhere(['name' =>  $request['name']])->id ?? null;
        $data = $request->validate([
           'name' => ['required' , "unique:users,name,$id"],
           'password' => 'required'
        ]);

        if(!$user = DB::table('users')->where('name' , '=' , $data['name'])->exists()){
            $user = new User();
            $user->name = $data['name'];
            $user->password = Hash::make($data['password']);
            $user->save();
        }

        if (Auth::attempt($data)) {
            if(Hash::needsRehash(Auth::user()->getAuthPassword())){
                $hash = Hash::make(Auth::user()->getAuthPassword());
                Auth::user()->update(['password' => $hash]);
            }
            return new RedirectResponse('/');
        }

        return back()->withErrors([
            'name' => ['The provided data does not match our records.']
        ]);

    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return new RedirectResponse('/');
    }

}
