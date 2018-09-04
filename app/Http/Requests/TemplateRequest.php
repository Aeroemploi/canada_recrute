<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemplateRequest extends FormRequest
{

    /**
     * Determine if the current user is authorized to make this request.
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'header_title_fr' => 'required|min:3',
                    'header_title_en' => 'required|min:3',
                    'description_fr' => '',
                    'description_en' => '',
                    'background_image' => 'required|mimes:jpg,jpeg,bmp,png|max:10000',
                    'subscribed' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [];
            }
            default:
                break;
        }

        return [

        ];
    }


}

