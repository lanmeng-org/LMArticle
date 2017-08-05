<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $data = Setting::pluck('content', 'key');

        return view('admin.setting.form', [
            'data' => $data,
        ]);
    }

    public function update(Request $request)
    {
        $data = array_filter($request->all(), function ($key) {
            if (in_array($key, Setting::$whiteList)) {
                return true;
            }
        }, ARRAY_FILTER_USE_KEY);

        $insertArr = [];

        foreach ($data as $key => $item) {
            $insertArr[] = [
                'key' => $key,
                'content' => $item,
            ];
        }

        \DB::table('settings')->delete();
        \DB::table('settings')->insert($insertArr);

        return back();
    }
}
