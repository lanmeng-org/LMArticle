<?php

namespace App\Repositories;

use App\Models\Advert;

class AdvertRepo extends Repository
{
    public function model()
    {
        return Advert::class;
    }

    public static function getItem($name)
    {
        return Advert::where('name', $name)->where('status', 1)->first();
    }

    public static function getItemContent($name)
    {
        $advert = self::getItem($name);

        return $advert ? $advert->content : null;
    }
}
