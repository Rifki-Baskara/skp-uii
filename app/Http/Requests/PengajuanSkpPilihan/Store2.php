<?php

namespace App\Http\Requests\PengajuanSkpPilihan;

use Illuminate\Foundation\Http\FormRequest;


class Store2 extends FormRequest
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
            'data2.*.nama' => ['required'],
            'data2.*.mahasiswa_nim' => ['required'],
        ];
    }
    public function prepareForValidation()
    {
        $data2 = json_decode(request('data2'));
        $formattedData = [];
        foreach ($data2 as $row)
        {
            $formattedData[] = [
            'nama' => $row[0],
            'mahasiswa_nim' => $row[1],
            ];
        }

        $this->merge(['data2' => $formattedData]);
    }
    public function messages()
    {
    return [
        'data2.*.nama.required' => 'Nama wajib diisi ',
        'data2.*.mahasiswa_nim.required' => 'NIM wajib diisi',
        ];
    }
}
