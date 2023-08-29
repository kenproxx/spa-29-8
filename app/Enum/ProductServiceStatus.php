<?php

namespace App\Enum;

use Illuminate\Validation\Rules\Enum;

final class ProductServiceStatus extends Enum
{
    const ACTIVE =   "1";
    const INACTIVE =   "2";
    const DELETED =   "3";
}
