<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Phone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($value)
    {
        preg_match('/\+[0-9]{2}\([0-9]{3}\)[0-9]{7}/', $value, $matches);

        return !empty($matches);
    }

    public function message()
    {
        return 'Невірний формат. "+XX(XXX)XXXXXXX"';
    }
}
