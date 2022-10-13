<?php

namespace App\Http\Requests\Courier;

use Illuminate\Foundation\Http\FormRequest;

class CourierRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return $this->createRules();
        } elseif ($this->isMethod('put')) {
            return $this->updateRules();
        }
    }
    /**
     * Define validation rules to store method for resource creation
     *
     * @return array
     */
    public function createRules(): array
    {
        return [
            'gi_carrier_ref_no' => 'required|string|max:191',
            'ti_date' => 'required|string|max:191',
            'ti_time' => 'required|string|max:191',
            'ti_activities' => 'required|string|max:191',
            'ti_location' => 'required|string|max:191',

        ];
    }

    /**
     * Define validation rules to update method for resource update
     *
     * @return array
     */
    public function updateRules(): array
    {
        return [
            'gi_carrier_ref_no' => 'required|string|max:191',
            'ti_date' => 'required|string|max:191',
            'ti_time' => 'required|string|max:191',
            'ti_activities' => 'required|string|max:191',
            'ti_location' => 'required|string|max:191',
        ];
    }
}
