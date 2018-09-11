<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-09-11
 * Time: 13:31
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
                    'job_title_fr' => 'required',
                    'job_title_en' => 'required',
                    'link' => 'required',
                    'location' => 'required',
                    'job_type' => 'required'
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
