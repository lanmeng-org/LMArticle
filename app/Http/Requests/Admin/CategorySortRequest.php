<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Models\Category;

class CategorySortRequest extends Request
{
    public function rules()
    {
        return [
            'orders' => 'required|array',
        ];
    }

    public function attributes()
    {
        return [
            'orders' => '排序',
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
}
