<?php

namespace App\Enum;

use Illuminate\Validation\Rules\Enum;

final class ResponseStatus extends Enum
{
    const STATUS_SUCCESS =   "success";
    const STATUS_ERROR =   "error";
}
