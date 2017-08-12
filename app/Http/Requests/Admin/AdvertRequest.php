<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Lanmeng\Qiu5\SeoUtils;

class AdvertRequest extends Request
{
    public function rules()
    {
        $rules = [
            'name'       => 'required',
            'content'     => 'required',
        ];

        if ($this->isMethod('put')) {
            $advert = $this->route('advert');
            $rules['name'] = [
                'required',
                Rule::unique('adverts')->ignore($advert->getKey(), 'id')
            ];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'name'       => '名称',
            'content'     => '内容',
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
