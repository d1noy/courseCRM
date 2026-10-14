<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Определить, авторизован ли пользователь для выполнения этого запроса.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Правила валидации согласно ТЗ.
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:30',
                function ($attribute, $value, $fail) {
                    if ($this->validStr('йцукенгшщзхъфывапролджэячсмитьбю - ', $value)) {
                        $fail('Поле содержит недопустимые символы.');
                    }
                }
            ],

            'description' => [
                'nullable',
                'max:100',
                function ($attribute, $value, $fail) {
                    if ($value && $this->validStr('йцукенгшщзхъфывапролджэячсмитьбю - ', $value)) {
                        $fail('Поле содержит недопустимые символы.');
                    }
                }
            ],

            'images' => [
                $this->route('category') ? 'nullable' : 'required',
                'image',
                'mimes:jpeg,jpg',
                'max:2000'
            ],

            'duration' => ['required', 'integer', 'max:10'],

            'price' => ['required', 'numeric', 'min:100', 'regex:/^\d+(\.\d{1,2})?$/'],

            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ];
    }


    /**
     * Ваша кастомная функция проверки символов.
     */
    public function validStr($validSymbols, $str): bool
    {
        $arr = str_split(mb_strtolower($str));

        foreach ($arr as $k => $v) {
            if (mb_strpos($validSymbols, $v) !== false) {
                return false;
            }
        }
        return true;
    }

    /**
     * Кастомные сообщения об ошибках.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Название курса обязательно для заполнения.',
            'name.max' => 'Название курса не должно превышать 30 символов.',
            'description.max' => 'Описание курса не должно превышать 100 символов.',
            'duration.required' => 'Укажите продолжительность курса.',
            'duration.integer' => 'Продолжительность должна быть целым числом.',
            'duration.max' => 'Продолжительность не может быть больше 10 часов.',
            'price.required' => 'Укажите цену курса.',
            'price.numeric' => 'Цена должна быть числом.',
            'price.min' => 'Цена должна быть не менее 100.',
            'price.regex' => 'Цена должна соответствовать формату хх.хх.',
            'start_date.required' => 'Дата начала обязательна.',
            'start_date.date_format' => 'Формат даты начала должен быть дд/мм/гггг.',
            'end_date.required' => 'Дата окончания обязательна.',
            'end_date.date_format' => 'Формат даты окончания должен быть дд/мм/гггг.',
            'images.required' => 'Обложка курса обязательна при создании.',
            'images.image' => 'Файл должен быть изображением.',
            'images.mimes' => 'Допускаются только форматы JPG и JPEG.',
            'images.max' => 'Максимальный размер обложки — 2000 Кб.',
        ];
    }
}
