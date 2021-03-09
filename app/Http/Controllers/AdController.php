<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController
{
    public function showAll()
    {
        $ads = Ad::with('user')->paginate(5);
        $users = $ads->pluck('user');
        return view('Ad/list', compact('ads', 'users'));
    }

    public function showAd(Ad $ad)
    {
        $user = User::find($ad->user_id);
        return view('Ad/showAd', compact('ad', 'user'));
    }

    public function editAd(Request $request , Ad $ad)
    {
       return view('Ad.edit' , compact('ad' ?? ''));

    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $data['user_id'] = Auth::id();
        $ad = Ad::create($data);
        return new RedirectResponse('/'.$ad->id);
    }


    public function update(Request $request , Ad $ad)
    {

        $data = $request->validate([
            'title' => 'filled',
            'description' => 'required'
        ]);
        if (Auth::user()->can('update' , $ad)){
            $ad->update($data);
            return new RedirectResponse('/' . $ad->id);
        }else{
            return new RedirectResponse('/');
        }
    }

    public function delete(Ad $ad)
    {
        if (Auth::user()->can('delete' , $ad)){
            $ad->delete();
            return new RedirectResponse('/');
        }else{
            return new RedirectResponse('/');
        }
    }



}

