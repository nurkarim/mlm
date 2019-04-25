<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Discount;
class CheckExitsCode implements Rule
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


    public function passes($attribute, $value)
    {
        $check=Discount::where('code',$value)->count();
        return $check > 0;
    }


    public function message()
    {
        return 'The code is already exits.';
    }
}
