<?php

namespace JePaFe\Profile\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JePaFe\Profile\Http\Requests;
use JePaFe\Profile\Models\Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();

        return view('profile::edit', compact('user'));
    }

    public function update(Requests\Profile $request)
    {
        if (Hash::check($request->get('password'), auth()->user()->getAuthPassword())) {
            if (!is_null($request->get('new_password'))) {
                $request->merge(['password' => Hash::make($request->get('new_password'))]);

                auth()->user()->update($request->all());
            } else {
                auth()->user()->update($request->except('password'));
            }
        }

        return redirect('/');
    }
}
