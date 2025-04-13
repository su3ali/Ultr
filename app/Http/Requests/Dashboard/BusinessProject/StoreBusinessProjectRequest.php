<?php
namespace App\Http\Requests\Dashboard\BusinessProject;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // مشروع
            'name_ar'                          => 'required|string|max:255',
            'name_en'                          => 'required|string|max:255',
            'description'                      => 'nullable|string',

            // الفروع
            'branches'                         => 'required|array|min:1',
            'branches.*.name_ar'               => 'required|string|max:255',
            'branches.*.name_en'               => 'required|string|max:255',
            'branches.*.location'              => 'nullable|string|max:255',

            // الطوابق
            'branches.*.floors'                => 'nullable|array',
            'branches.*.floors.*.name_ar'      => 'required|string|max:255',
            'branches.*.floors.*.name_en'      => 'required|string|max:255',
            'branches.*.floors.*.floor_number' => 'nullable|integer|min:0',
            'branches.*.floors.*.type'         => 'nullable|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'name_ar.required'                     => 'اسم المشروع بالعربية مطلوب',
            'name_en.required'                     => 'اسم المشروع بالإنجليزية مطلوب',
            'branches.required'                    => 'يجب إدخال فرع واحد على الأقل',
            'branches.*.name_ar.required'          => 'اسم الفرع بالعربية مطلوب',
            'branches.*.name_en.required'          => 'اسم الفرع بالإنجليزية مطلوب',
            'branches.*.floors.*.name_ar.required' => 'اسم الطابق بالعربية مطلوب',
            'branches.*.floors.*.name_en.required' => 'اسم الطابق بالإنجليزية مطلوب',
        ];
    }
}
