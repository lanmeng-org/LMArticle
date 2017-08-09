<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdvertRequest;
use App\Models\Advert;

class AdvertController extends Controller
{
    public function index()
    {
        $advert = Advert::paginate(20);

        return view('admin.advert.index', [
            'data' => $advert,
        ]);
    }

    public function create()
    {
        return view('admin.advert.form');
    }

    public function store(AdvertRequest $request)
    {
        Advert::create($request->all());

        return redirect()->route('admin.advert.index');
    }

    public function edit(Advert $advert)
    {
        return view('admin.advert.form', [
            'data'       => $advert,
        ]);
    }

    public function update(Advert $advert, AdvertRequest $request)
    {
        $advert->update($request->all());

        return redirect()->route('admin.advert.index');
    }

    public function destroy(Advert $advert)
    {
        $advert->delete();

        return back();
    }
}
