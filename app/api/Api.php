<?php

class Api
{
    public static function get($apiKey)
    {
        $key = "access";
        if ($apiKey == $key) {
            return UserModel::all();
        }else {
            return "Invalid API Key";
        }
    }
}
