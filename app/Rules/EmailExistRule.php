<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;

class EmailExistRule implements Rule
{
    private $email;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email=$email;
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
       $count=User::where('email',$this->email)->count();
       if($count==0){
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
        return 'This email does not exist.';
    }
}
