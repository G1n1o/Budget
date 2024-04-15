<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Validator;
use Framework\Rules\{
    RequiredRule,
    EmailRule,
    SelectedRule,
    MinRule,
    MatchRule,
    LengthMaxRule,
    NumericRule,
    DateFormatRule,
};

class ValidatorService
{
    private Validator $validator;
    public function __construct()
    {
        $this->validator = new Validator();
        $this->validator->add('required', new RequiredRule());
        $this->validator->add('email', new EmailRule());
        $this->validator->add('min', new MinRule());
        $this->validator->add('match', new MatchRule());
        $this->validator->add('selected', new SelectedRule());
        $this->validator->add('lengthMax', new LengthMaxRule);
        $this->validator->add('numeric', new NumericRule());
        $this->validator->add('dateFormat', new DateFormatRule());
    }

    public function validateRegister(array $formData)
    {
        $this->validator->validate($formData, [
            'username' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'confirmPassword' => ['required', 'match:password']
        ]);
    }

    public function validateLogin(array $formData)
    {
        $this->validator->validate($formData, [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    }

    public function validateTransaction(array $formData)
    {
        $this->validator->validate($formData, [
            'amount' => ['required', 'numeric'],
            'date' => ['required', 'dateFormat:Y-m-d'],
            'comment' => ['lengthMax:255'],
            'category' => ['selected']
        ]);
    }

    public function validateUserData(array $formData)
    {
        $this->validator->validate($formData, [
            'username' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'email']
        ]);
    }
    public function validateUserPassword(array $formData)
    {
        $this->validator->validate($formData, [
            'newPassword' => ['required', 'min:6'],
            'confirmNewPassword' => ['required', 'match:newPassword']
        ]);
    }
}
