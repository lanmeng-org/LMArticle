<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\NoticeRequest;
use App\Models\Notice;
use Lanmeng\LMArticle\SeoUtils;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::paginate(20);

        return view('admin.notice.index', [
            'data' => $notices,
        ]);
    }

    public function create()
    {
        return view('admin.notice.form');
    }

    public function store(NoticeRequest $request)
    {
        Notice::create($request->getParams());

        return redirect()->route('admin.notice.index');
    }

    public function edit(Notice $notice)
    {
        return view('admin.notice.form', [
            'data'       => $notice,
        ]);
    }

    public function update(Notice $notice, NoticeRequest $request)
    {
        $notice->update($request->getParams());

        return redirect()->route('admin.notice.index');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();

        return back();
    }
}
