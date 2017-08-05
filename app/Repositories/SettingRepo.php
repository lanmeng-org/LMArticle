<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepo extends Repository
{
    public function model()
    {
        return Setting::class;
    }

    public static function getItem($key)
    {
        return Setting::where('key', $key)->first();
    }

    public static function getItemContent($key)
    {
        $setting = self::getItem($key);

        return $setting ? $setting->content : null;
    }
}
