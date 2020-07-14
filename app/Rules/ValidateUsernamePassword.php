<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Log;

class ValidateUsernamePassword implements Rule
{
    var $request;
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Request $_request)
    {
        $this->request = $_request;
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
        $email = $this->request->get('email');
        $password = md5($value.env('hash_key'));

        Log::info('Parola: '.$password);
        
        $loggedInUser = User::where('email', $email)
                ->where('password', $password)
                ->first();
        
        return !empty($loggedInUser);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Date incorecte de autentificare.';
    }
}
