<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDanhMucRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    // public function rules()
    // {
    //     return [
    //         'ten_danh_muc'      =>  'required|max:50|unique:danh_muc_san_phams,ten_danh_muc',
    //         'slug_danh_muc'     =>  'required|max:50|unique:danh_muc_san_phams,slug_danh_muc',
    //         'is_open'           =>  'required|boolean',
    //     ];
    // }

    // public function messages()
    // {
    //     return [
    //         'required'      =>  ':attribute không được để trống',
    //         'max'           =>  ':attribute quá dài',
    //         'exists'        =>  ':attribute không tồn tại',
    //         'boolean'       =>  ':attribute chỉ được chọn True/False',
    //         'unique'        =>  ':attribute đã tồn tại',
    //     ];
    // }

    // public function attributes()
    // {
    //     return [
    //         'ten_danh_muc'      =>  'Tên danh mục',
    //         'slug_danh_muc'     =>  'Slug danh mục',
    //         'is_open'           =>  'Tình trạng',
    //     ];
    // }
}

