<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'noid'    => ['required', 'string', 'unique:members,no_id'],
            'nama'    => ['required', 'string'],
            'telepon' => ['required', 'string', 'unique:members,nomor_telepon'],
            'alamat'  => ['required', 'string'],
            'upline'  => ['exists:members,id']
        ];
    }
}
