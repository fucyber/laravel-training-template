<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserUpdateRequest extends FormRequest
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
    // protected function formatErrors(Validator $validator)
    // {
    //     return $validator->errors()->all();
    // }
    public function rules()
    {
        return [
            'name'        => 'required|string|max:255',
            'email'       => 'required|string|email|max:255',
            'phone'       => 'required|array',
            'phone.*'     => 'required|digits_between:9,10|distinct',
            'address'     => 'required|array',
            'address.*'   => 'required|string',
            'personal_id' => 'required|regex:/\b\d{13}\b/',
            'gender'      => 'required',
            'nationality' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'          => 'กรุณากรอกข้อมูลชื่อ-นามสกุลให้ครบถ้วน',
            'phone.*.required'       => 'กรุณากรอกข้อมูลเบอร์โทรให้ครบถ้วน',
            'phone.*.digits_between' => 'กรุณากรอกข้อมูลเบอร์โทรระหว่าง :min และ :max ',
            'phone.*.distinct'       => 'กรุณากรอกข้อมูลเบอร์โทรห้ามซ้ำกัน',
            'address.*.required'     => 'กรุณากรอกข้อมูลที่อยู่ให้ครบถ้วน',
            'personal_id.required'   => 'กรุณากรอกข้อมูลเลขบัตรประชาชนให้ครบถ้วน',
            'personal_id.regex'      => 'รูปแบบบัตรประชาชนไม่ถูกต้อง',
            'nationality.required'   => 'กรุณากรอกข้อมูลสัญชาติให้ครบถ้วน',
            'email.required'         => 'กรุณากรอกข้อมูลอีเมล์ให้ครบถ้วน',
            'email.max'              => 'ข้อมูลอีเมล์ตัวอักษรเกินที่กำหนด',
            'email.unique'           => 'มีอีเมล์นี้แล้วในระบบ',
            'personal_id.unique'     => 'มีรหัสบัตรประชาชนนี้แล้วในระบบนี้แล้วในระบบ',

        ];
    }
}
