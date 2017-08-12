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
        $item = \Cache::remember("setting.items.$key", config('site.cache.minutes'), function () use ($key) {
            return Setting::where('key', $key)->first();
        });

        return $item;
    }

    public static function getItemContent($key)
    {
        $setting = self::getItem($key);

        return $setting ? $setting->content : null;
    }

    public static function getItemContentArray($key)
    {
        $setting = self::getItem($key);

        return $setting ? $setting->contentArray() : null;
    }
}
