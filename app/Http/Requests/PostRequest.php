<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|unique:posts",
            "description" => "required"
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $message = '';
        foreach ($errors as $key=>$valid_error){
            if(empty($message)){
                $message = isset($valid_error[0])?$valid_error[0]:"";
            }
        }
        throw new HttpResponseException(
            response()->json(['status'=>'error', 'data'=>(object)[], 'message'=> $message])
        );
    }

    public function prepareRequest(): array
    {
        $request = $this;
        return [
            'uuid' => Str::uuid()->toString(),
            'title' => $request->title,
            'description' => $request->description
        ];
    }

}
