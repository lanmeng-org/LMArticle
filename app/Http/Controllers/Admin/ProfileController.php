<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\NoticeRequest;
use App\Models\Notice;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.form', [
            'data' => \Auth::user(),
        ]);
    }

    public function update(Notice $notice, NoticeRequest $request)
    {
        $notice->update($request->all());

        return redirect()->route('admin.notice.index');
    }
}
