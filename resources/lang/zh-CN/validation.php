<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute 必须接受',
    'active_url'           => ':attribute 是一个格式不正确的URL',
    'after'                => ':attribute 日期必须在 :date 之后',
    'alpha'                => ':attribute 只能包含英文字母',
    'alpha_dash'           => ':attribute 只能包含英文字母, 数字和横线',
    'alpha_num'            => ':attribute 只能包含英文字母和数字.',
    'array'                => ':attribute 必须是一个数组',
    'before'               => ':attribute 日期必须在 :date 之前',
    'between'              => [
        'numeric' => ':attribute 必须大于等于 :min 并且小余等于 :max',
        'file'    => ':attribute 文件大小必须大于等于 :min kb 并且小余等于 :max kb',
        'string'  => ':attribute 文字长度必须大于等于 :min 位并且小余等于 :max 位',
        'array'   => ':attribute 必须存在最少 :min 个, 最多 :max 个项目',
    ],
    'boolean'              => ':attribute 必须为 true 或 false',
    'confirmed'            => ':attribute 不匹配',
    'date'                 => ':attribute 日期格式错误',
    'date_format'          => ':attribute 与格式: :format 不匹配',
    'different'            => ':attribute 和 :other 必须不相同',
    'digits'               => ':attribute 必须等于 :digits',
    'digits_between'       => ':attribute 必须大于等于 :min 并且小余等于 :max ',
    'distinct'             => ':attribute 必须是唯一值',
    'email'                => ':attribute 邮箱格式错误',
    'exists'               => '所选 :attribute 数据无效',
    'filled'               => ':attribute 此字段为必填',
    'image'                => ':attribute 必须是一个图片文件',
    'in'                   => '所选 :attribute 数据无效',
    'in_array'             => ':attribute 必须在 :other 中',
    'integer'              => ':attribute 必须是整数',
    'ip'                   => ':attribute 必须是一个合法的IP地址',
    'json'                 => ':attribute 必须为有效的JSON字符串',
    'max'                  => [
        'numeric' => ':attribute 必须小余等于 :max.',
        'file'    => ':attribute 文件大小必须最大为 :max kb',
        'string'  => ':attribute 文字长度必须最大为 :max 位',
        'array'   => ':attribute 必须最多包含 :max 个',
    ],
    'mimes'                => ':attribute 必须为: :values 类型',
    'min'                  => [
        'numeric' => ':attribute 必须大于等于 :min.',
        'file'    => ':attribute 文件大小必须至少为 :min kb',
        'string'  => ':attribute 文字长度必须至少为 :min 位',
        'array'   => ':attribute 必须至少包含 :min 个',
    ],
    'not_in'               => '所选 :attribute 为无效数据',
    'numeric'              => ':attribute 此字段必须为数字',
    'present'              => ':attribute 此字段必须已存在',
    'regex'                => ':attribute 格式不正确',
    'required'             => ':attribute 此字段为必填',
    'required_if'          => '当 :other 等于 :value, :attribute 为必填, ',
    'required_unless'      => ':attribute 此字段为必填, 除非 :other 已在 :values 之中',
    'required_with'        => '当 :values 已存在, :attribute 为必填',
    'required_with_all'    => '当 :values 已存在, :attribute 为必填',
    'required_without'     => '当 :values 不存在, :attribute 为必填',
    'required_without_all' => '当 :values 中没有一个存在, :attribute 为必填',
    'same'                 => ':attribute 与 :other 必须匹配',
    'size'                 => [
        'numeric' => ':attribute 数字长度必须为 :size 位',
        'file'    => ':attribute 文件大小必须为 :size kb',
        'string'  => ':attribute 文字长度必须为 :size 位',
        'array'   => ':attribute 必须包含 :size 个项目',
    ],
    'string'               => ':attribute 必须是字符串',
    'timezone'             => ':attribute 时区格式不正确',
    'unique'               => ':attribute 已存在',
    'url'                  => '此URL地址 :attribute 格式不正确',
    'mobile'               => '手机号码格式不正确',
    'captcha'              => '验证码不正确',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
