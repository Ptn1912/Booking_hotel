<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'room_id'=>$this->room_id,
            'HotelID'=>$this->HotelID,
            'room_type'=>$this->room_type,
           'room_Image'=>$this->room_Image,
           'room_price'=>$this->room_price,
           'room_no'=>$this->room_no,
           'room_status'=>$this->room_status,
           'room_description'=>$this->room_description
        ];
    }
}
