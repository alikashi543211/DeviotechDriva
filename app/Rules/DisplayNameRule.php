<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DisplayNameRule implements Rule
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
        $value=strtolower($value);
        if(count_spaces($value)>0)
        {
            return false;
        }else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $value)){
    // one or more of the 'special characters' found in $string
    return false;
    }
    else if(strlen($value)>4)
    {
    return true;
    }
    else
    {
    return false;
    }

    }

    /**
    * Get the validation error message.
    *
    * @return string
    */
    public function message()
    {
    return 'Please change your display name and try again';
    }
    }