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
        $data = [
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
        ];

        if ($request->has('password')) {
            $data += [
                'password' => bcrypt($request->get('password'))
            ];
        }

        \Auth::user()->update($data);

        session()->flash('tips.success', '修改成功');

        return back();
    }
}
