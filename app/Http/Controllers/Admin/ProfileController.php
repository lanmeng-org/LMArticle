<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProfileRequest;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.form', [
            'data' => \Auth::user(),
        ]);
    }

    public function update(ProfileRequest $request)
    {
        \Auth::user()->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('newPassword')),
        ]);

        session()->flush('tips.success', '修改成功');

        return redirect()->route('admin.profile.edit');
    }
}
