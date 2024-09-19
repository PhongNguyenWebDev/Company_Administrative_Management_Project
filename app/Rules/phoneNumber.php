<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class phoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^\+1-[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $value)) {
            $fail("The $attribute must be a valid US phone number format: +1-xxx-xxx-xxxx");
        }
    }
}
