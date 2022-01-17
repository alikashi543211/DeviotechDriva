<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VatNoRule implements Rule
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
        
        if(isset($value)){
            $prefix=substr($value,0,2);
            $value=strtolower($value);
            $value_length=strlen($value);
            if(count_spaces($value)>0){
                return false;
            }else if(count_digits($value)==9 && $prefix=='GB' && count_small_letters($value)==2 && $value_length==11){
                return true;
            }else{
                return false;
            }
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
        return 'Enter a valid VAT number';
    }
}
