<?php

declare(strict_types=1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class SelectedRule implements RuleInterface
{
    public function validate(array $data, string $field, array $params): bool
    {
        return isset($data[$field]) ? true : false;
    }

    public function getMessage(array $data, string $field, array $params): string
    {
        return "Nie wybrano kategorii!";
    }
}
