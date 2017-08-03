<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Models\Category;

class CategoryRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'display_name' => 'required|min:3',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '标识名称',
            'display_name' => '显示名称',
        ];
    }

    protected function rulesValidate()
    {
        $validator = $this->getValidatorInstance();
        if ($validator->fails()) {
            $this->failed($validator);
        }
    }

    public function validate()
    {
        $this->rulesValidate();
    }

    public function validateParent()
    {
        $exists = Category::where('id', $this->get('parent_id'))->where('parent_id', '<>', 0)->exists();

        if (!$exists) {
            $this->failed('父分类不存在!');
        }
    }
}
