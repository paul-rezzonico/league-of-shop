<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le nom du produit est obligatoire.',
            'nom.string' => 'Le nom du produit doit être une chaîne de caractères.',
            'nom.max' => 'Le nom du produit ne doit pas dépasser 255 caractères.',
            'description.required' => 'La description du produit est obligatoire.',
            'description.string' => 'La description du produit doit être une chaîne de caractères.',
            'prix.required' => 'Le prix du produit est obligatoire.',
            'prix.numeric' => 'Le prix du produit doit être un nombre.',
            'prix.min' => 'Le prix du produit ne doit pas être négatif.',
            'image.image' => 'Le fichier doit être une image.',
            'image.max' => 'Le fichier ne doit pas dépasser 10 Mo.',
        ];
    }
}
