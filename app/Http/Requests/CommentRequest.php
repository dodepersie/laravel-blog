<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'comment_user_name' => 'required',
            'comment_user_email' => 'required|email|exists:users,email',
            'post_id' => 'required',
            'comment_parent_id' => 'required',
            'comment_user_id' => 'required',
            'comment_avatar' => 'nullable',
            'comment_message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages(): array
    {
        return [
            'comment_user_name.required' => 'Harap masukkan username!',
            'comment_user_email.required' => 'Harap masukkan email!',
            'post_id.required' => 'Harap masukkan Post ID!',
            'comment_parent_id.required' => 'Harap masukkan Parent ID!',
            'comment_user_id.required' => 'Harap masukkan User ID!',
            'comment_message.required' => 'Harap isi kolom komentar!',
            'g-recaptcha-response.required' => 'Harap verifikasi captcha!',
            'g-recaptcha-response.captcha' => 'Harap verifikasi captcha!',
        ];
    }
}
