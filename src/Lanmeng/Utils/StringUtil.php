<?php namespace Lanmeng\Utils;

class StringUtil
{
    /**
     * 生成流水号
     *
     * @param int $id
     * @param int $len
     *
     * @return string
     */
    public static function createSerialNo($id = 0, $len = 32)
    {
        $str = date('ymd').substr(microtime(), 2, 6).(int)$id;
        $ilen = $len - strlen($str);

        if ($ilen > 0) {
            $str .= self::createFixLenNumber($ilen);
        } elseif ($ilen < 0) {
            $str = substr($str, 0, $len);
        }

        return $str;
    }

    /**
     * 生成指定长度的数字
     * @param int $len
     * @return int
     */
    public static function createFixLenNumber($len = 10)
    {
        $number = '';
        do {
            $number .= rand();
        } while (strlen($number) < $len);

        if (strlen($number) > $len) {
            $number = substr($number, 0, $len);
        }

        return (int)$number;
    }

    /**
     * 以行为单位把字符串分割为数组
     * @param $string
     * @return array
     */
    public static function line2Array($string)
    {
        $array = explode("\n", $string);
        foreach ($array as &$item) {
            $item = trim($item);
        }

        return $array;
    }

    /**
     * 以单字为单位把字符串分割为数组
     * @param $string
     * @return array
     */
    public static function stringSplit($string) {
        # Split at all position not after the start: ^
        # and not before the end: $
        return preg_split('/(?<!^)(?!$)/u', $string);
    }
}
