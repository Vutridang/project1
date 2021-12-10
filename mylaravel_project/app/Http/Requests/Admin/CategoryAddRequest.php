<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CategoryAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'name' => ['required', Rule::unique('categorys')->where(function($query){
                    return $query->where('id', '!=', $this->id);
           })]
        ];
    }

    public function messages()
    {
        return [
           'name.required' => 'Vui lòng nhập lại',
           'name.unique' => 'Tên danh mục đã tồn tại'
        ];
    }
}
//khi ấn submit thì sẽ chạy vào file auth.category.create.post trước đó nó sẽ chạy qua CategoryAddRequest để validate nếu có lỗi nó sẽ báo 'Vui lòng nhập lại' 
//Và khi có lỗi thì file message.blade.php được include vào sẽ hiển thị box báo lỗi 
//và $error trong đó sẽ lấy câu return ra từ trong CategoryAddRequest rồi xuất ra