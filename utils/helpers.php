<?php

if (!function_exists('validateUser')) {
    function validateUser($params) {
        if (!isset($params['first_name']) || empty($params['first_name'])) {
            $errors['first_name'] = 'First Name is required';
        } else {
            $errors['first_name'] = validate(4, 30, $params['first_name'], 'first_name');
        }

        if (!isset($params['last_name']) || empty($params['last_name'])) {
            $errors['last_name'] = 'Last Name is required';
        } else {
            $errors['last_name'] = validate(4, 30, $params['last_name'], 'last_name');
        }

        if (!isset($params['email']) || empty($params['email'])) {
            $errors['email'] = 'Email is required';
        } else if (!filter_var($params['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email is invalid';
        }

        return array_filter($errors, 'strlen');
    }
}


if (!function_exists('validate')) {
    function validate($min, $max, $str, $key) {
        $error = '';
        if (strlen($str) < $min)
        {
            $error = "{$key} should be atleast minimum ${min} characters";
        } else if (strlen(($str) > $max))
        {
            $error = "{$key} should not be greater than ${max} characters";
        }

        return $error;
    }
}
