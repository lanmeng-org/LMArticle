<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Qm5Data extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tool:qm5data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $prePage = 100;
        $curPage = 0;


        $categories = [
            1  => 1,
            3  => 1,
            11 => 1,
            12 => 1,
            13 => 1,
            14 => 1,
            16 => 1,
            17 => 1,
            18 => 1,
            19 => 1,

            2  => 2,
            4  => 2,
            24 => 2,
            25 => 2,
            26 => 2,
            22 => 2,

            20 => 3,
            21 => 4,
        ];

        do {
            $items = \DB::table('dede_archives')
                ->join('dede_ziyuan', 'dede_ziyuan.aid', '=', 'dede_archives.id')
                ->skip($curPage * $prePage)
                ->take($prePage)
                ->get();

            $articles = [];

            foreach ($items as $item) {
                if (isset($categories[$item->typeid])) {
                    $articles[] = [
                        'title'       => $this->replaceOldStr($item->title),
                        'keywords'    => $this->replaceOldStr($item->keywords),
                        'content'     => $this->replaceOldStr($item->ziyuanjianjie),
                        'category_id' => $categories[$item->typeid],
                        'created_at'  => date('Y-m-d H:i:s', $item->senddate),
                        'updated_at'  => date('Y-m-d H:i:s', $item->pubdate),
                    ];
                }
            }

            try {
                \DB::table('articles')->insert($articles);

                $this->info("第 $curPage 页 插入成功");
            } catch (\Exception $exception) {
                $this->info("第 $curPage 页 插入失败: {$exception->getMessage()}");
            }

            $curPage++;
        } while (!$items->isEmpty());

    }

    protected function replaceOldStr($string)
    {
        return str_replace(
            [
                'qm5.cc',
                '球迷网',
                '迅雷百度',
                '高清版',
                '收藏版',
                'CCTV5',
            ],
            [
                'qiu5.cc',
                '天下球迷网',
                '百度',
                '收藏版',
                '高清版',
                '央视',
            ],
            $string
        );
    }
}
