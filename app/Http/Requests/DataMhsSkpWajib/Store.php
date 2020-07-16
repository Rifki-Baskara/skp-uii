<?php

namespace App\Http\Requests\DataMhsSkpWajib;

use Illuminate\Foundation\Http\FormRequest;


class Store extends FormRequest
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
            'data.*.nama' => ['required'],
            'data.*.mahasiswa_nim' => ['required'],
        ];
    }
    public function prepareForValidation()
    {
        $data = json_decode(request('data'));
        $formattedData = [];
        foreach ($data as $row)
        {
            $formattedData[] = [
            'nama' => $row[0],
            'mahasiswa_nim' => $row[1],
            ];
        }

        $this->merge(['data' => $formattedData]);
    }
    public function messages()
    {
    return [
        'data.*.nama.required' => 'Nama wajib diisi ',
        'data.*.mahasiswa_nim.required' => 'NIM wajib diisi',
        ];
    }
}
