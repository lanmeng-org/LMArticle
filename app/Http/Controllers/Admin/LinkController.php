<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LinkRequest;
use App\Models\Link;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::orderBy('order')->paginate(20);

        return view('admin.link.index', [
            'data' => $links,
        ]);
    }

    public function create()
    {
        return view('admin.link.form');
    }

    public function store(LinkRequest $request)
    {
        Link::create($request->all());

        return redirect()->route('admin.link.index');
    }

    public function edit(Link $link)
    {
        return view('admin.link.form', [
            'data'       => $link,
        ]);
    }

    public function update(Link $link, LinkRequest $request)
    {
        $link->update($request->all());

        return redirect()->route('admin.link.index');
    }

    public function destroy(Link $link)
    {
        $link->delete();

        return back();
    }
}
