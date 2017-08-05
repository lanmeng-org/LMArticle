<?php

namespace App\Repositories;

use App\Models\Notice;

class NoticeRepo extends Repository
{
    public function model()
    {
        return Notice::class;
    }

    public static function getList($number = null)
    {
        if (empty($number)) {
            $number = SettingRepo::getItemContent('notice_show_number');
        }

        return Notice::take($number)->get();
    }
}
