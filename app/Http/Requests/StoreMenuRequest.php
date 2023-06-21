<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Menu;

class StoreMenuRequest extends FormRequest
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
            //
        ];
    }

    public function save() {
        $menu = new Menu();
        $menu->title = $this->title;
        $menu->url = $this->url;
        $menu->position = $this->position;
        $menu->user_id = (int)$this->user()->id;

        $menu->save();

        return $menu;        
    }
}
