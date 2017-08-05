<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryRequest extends Request
{
    public function rules()
    {
        $rules =  [
            'name'         => 'required|min:1|unique:categories,name',
            'display_name' => 'required|min:1',
            'order'        => 'required',
            'show_home'    => 'required',
            'show_column'  => 'required|integer|max:12',
        ];

        if ($this->isMethod('put')) {
            $category = $this->route('category');

            $rules['name'] = [
                'required',
                'min:1',
                Rule::unique('categories')->ignore($category->getKey(), 'id')
            ];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'name'         => '标识名称',
            'display_name' => '显示名称',
            'order'        => '排序',
            'show_home'    => '是否在首页显示',
            'show_column'  => '首页显示大小',
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

        $this->validateParent();
    }

    public function validateParent()
    {
        $parentId = $this->get('parent_id');

        if (empty($parentId)) {
            return;
        }

        $exists = Category::where('id', $parentId)->where('parent_id', 0)->exists();

        if (!$exists) {
            $this->failed('父分类不存在!');
        }
    }
}
