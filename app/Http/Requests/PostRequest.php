<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
           'title' => ['required', 'max:25'],
					 'trouble' => ['required', 'numeric'],
					 'life' => ['numeric', 'between:0,1'],
					 'medical' => ['numeric', 'between:0,1'],
					 'saving' => ['numeric', 'between:0,1'],
					 'cancer' => ['numeric', 'between:0,1'],
					 'pension' => ['numeric', 'between:0,1'],
					 'all_life' => ['numeric', 'between:0,1'],
					 'other' => ['numeric', 'between:0,1'],
					 'insurance_value' => 'max:190',
					 'contents' => 'max:190'
        ];
    }

		public function messages() {
						return [
							'title.required' => 'タイトルは必ず入力してください',
							'title.max' => 'タイトルは２５文字以内で入力してください',
							'trouble.required' => '悩みは必ず入力してください',
							'insurance_value.max' => '誰がどのくらい入りたいを記入する欄には１９０文字以内でご記入ください',
							'contents' => '自由記入欄には190文字以内でご記入ください',
						];

		}
}
