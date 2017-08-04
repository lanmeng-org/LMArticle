<?php namespace Lanmeng\Utils;

use Illuminate\Http\UploadedFile;

/**
 * 文件操作类, 相对于网站 public 目录
 * Class FileUtil
 * @package Lanmeng\General
 */
class FileUtil
{
    /**
     * UploadedFile 保存到指定目录
     * @param UploadedFile $file        UploadedFile对象
     * @param string       $path        保存路径
     * @param null         $sub_path    子路径
     * @param null         $file_name   指定文件名,不指定自动生成
     * @return string
     */
    public static function save(UploadedFile $file, $path, $sub_path = null, $file_name = null)
    {
        if (empty($sub_path)) {
            $sub_path = date('Y');
        }

        $real_path = public_path($path). DIRECTORY_SEPARATOR. $sub_path;
        if (!file_exists($real_path)) {
            mkdir($real_path, 0766, true);
        }

        if (empty($file_name)) {
            $file_name = md5(uniqid(). $file->getBasename()). '.'. $file->extension();
        }

        $file->move($real_path, $file_name);

        return $path. DIRECTORY_SEPARATOR. $sub_path. DIRECTORY_SEPARATOR. $file_name;
    }

    /**
     * 删除指定文件
     * @param $file         文件的路径
     * @return bool|null
     */
    public static function delete($file)
    {
        $file = public_path($file);
        if (file_exists($file)) {
            try {
                unlink($file);
            } catch (\Exception $error) {
                return false;
            }
        }

        return null;
    }
}
