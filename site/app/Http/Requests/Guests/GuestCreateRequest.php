<?php

namespace App\Http\Requests\Guests;

use App\Helpers\StringHelper;
use Illuminate\Foundation\Http\FormRequest;

class GuestCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'firstname' => 'string|required',
            'lastname'  => 'string|required',
            'email'     => 'email|required|unique:guests',
            'phone'     => 'phone|required|unique:guests',
            'country'   => 'string|nullable',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        if (!$this->post('country')) $this->prepareCountryField();
    }

    /**
     * Prepare country field if not exist
     *
     * @return void
     */
    private function prepareCountryField(): void
    {
        $this->merge([
            'country' => StringHelper::getCountryFromPhone($this->post('phone'))
        ]);
    }
}
