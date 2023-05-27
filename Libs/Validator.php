<?php

namespace App\Libs;

class Validator
{

    public function validFieldData(string $fieldValue): string
    {
        return trim(htmlentities(strip_tags($fieldValue)));
    }
}
