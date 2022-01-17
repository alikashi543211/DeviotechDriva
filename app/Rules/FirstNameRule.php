<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FirstNameRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $letters = array_filter(str_split($value), 'ctype_alpha');
                if(sizeof($letters)<2){
                    return false;
                }else{
                    return true;
                }
                    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'First name must have at least two letters';
    }
}
