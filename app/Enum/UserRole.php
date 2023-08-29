<?php

namespace App\Enum;

use Illuminate\Validation\Rules\Enum;

final class UserRole extends Enum
{
    const SUPER_ADMIN =   "1";
    const ADMIN =   "2";
    const GUEST =   "3";
}
