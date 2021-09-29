<?php

namespace App\Http\Helpers;

abstract class Redirect
{
    public static function responseErrorsInput($to, $errors)
    {
        return response()->redirectToRoute($to)->withErrors($errors)->withInput();
    }
}
