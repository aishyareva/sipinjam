<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('mahasiswa')?->id;

        return [
            'nrp'   => ['required', 'digits:10', Rule::unique('mahasiswas', 'nrp')->ignore($id)],
            'nama'  => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email', 'max:100', Rule::unique('mahasiswas', 'email')->ignore($id)],
            'prodi' => ['required', 'in:Teknologi Rekayasa Multimedia,Teknik Informatika,Teknik Komputer,Teknik Elektronika'],
        ];
    }

    public function messages(): array
    {
        return [
            'nrp.required'   => 'NRP wajib diisi.',
            'nrp.digits'     => 'NRP harus tepat 10 digit angka.',
            'nrp.unique'     => 'NRP sudah terdaftar.',
            'nama.required'  => 'Nama mahasiswa wajib diisi.',
            'nama.min'       => 'Nama mahasiswa minimal 3 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'email.unique'   => 'Email sudah digunakan mahasiswa lain.',
            'prodi.required' => 'Program studi wajib dipilih.',
            'prodi.in'       => 'Program studi tidak valid.',
        ];
    }
}