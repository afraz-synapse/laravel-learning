<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserProfileUpdateController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user-profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $data = $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id),],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::findOrFail($id);
        $file = $request->file('image');
        $user->updateRecord($data,$file);
        notify()->success("Profile Updated Successfully!","Success!","topRight", "icon");
        return redirect(route('profile.edit',['id' => $id]));
    }
}
