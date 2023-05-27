<?php

namespace App\Libs;

class Validator
{

    public function validFieldData(string $fieldValue): string
    {
        return trim(htmlentities(strip_tags($fieldValue)));
    }

    public function hasValue($value): bool
    {
        return isset($value) || !empty($value);
    }

    public function isNotEmpty($value): bool
    {
        return isset($value) && !empty($value);
    }
}
