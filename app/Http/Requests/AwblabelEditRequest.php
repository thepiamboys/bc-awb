<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwblabelEditRequest extends FormRequest
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
            
				"airline" => "nullable|string",
				"awbbc" => "nullable|string",
				"awb" => "nullable|string",
				"hawb" => "nullable|string",
				"destination" => "nullable|string",
				"origin" => "nullable|string",
				"total" => "nullable|numeric",
            
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
