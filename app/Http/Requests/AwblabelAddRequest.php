<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwblabelAddRequest extends FormRequest
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
            
				"row.*.airline" => "nullable|string",
				"row.*.awbbc" => "nullable|string",
				"row.*.awb" => "nullable|string",
				"row.*.hawb" => "nullable|string",
				"row.*.destination" => "nullable|string",
				"row.*.origin" => "nullable|string",
				"row.*.total" => "nullable|numeric",
            
        ];
    }

	public function messages()
    {
        return [
			
            //using laravel default validation messages
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //eg = 'name' => 'trim|capitalize|escape'
        ];
    }
}
