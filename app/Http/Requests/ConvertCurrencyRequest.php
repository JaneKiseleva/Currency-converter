<?php

namespace App\Http\Requests;

use App\Models\Currency;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConvertCurrencyRequest extends FormRequest
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
        $currencies = Currency::query()
            ->select('name')
            ->get()
            ->pluck('name');
        $currencies[] = 'RUB';

        return [
            'from' => [
                'required',
                Rule::in($currencies)
            ],
            'to' => [
                'required',
                Rule::in($currencies)
            ],
            'sum' => 'required|integer'
        ];
    }
}



//$currencies = [
//    Currency::query()
//        ->where("name", "=", 'USD')
//        ->orWhere("name", "=", 'EUR')
//        ->orWhere("name", "=", 'GBP')
//        ->get('name'),
////            Currency::query()->where("name", "=", 'EUR')
////                ->first()
////                ->name,
////            Currency::query()->where("name", "=", 'GBP')
////                ->first()
////                ->name,
//    'RUB'
//];

//Currency::query()->where("name", "=", 'USD')
//    ->first()
//    ->name,
//            Currency::query()->where("name", "=", 'EUR')
//                ->first()
//                ->name,
//            Currency::query()->where("name", "=", 'GBP')
//                ->first()
//                ->name,

//            'from' => ['required|exists:App\Models\Currency,name', Rule::in(['RUB'=>1])],
//            'to' => ['required|exists:App\Models\Currency,name', Rule::in(['RUB'=>1])],
//            'sum' => 'required|integer'
