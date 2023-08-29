<?php

namespace App\Enum;

use Illuminate\Validation\Rules\Enum;

final class ProductFeedbackStatus extends Enum
{
    const APPROVED =   "APPROVED";
    const PENDING =   "PENDING";
    const REFUSE =   "REFUSE";
    const DELETED =   "DELETED";
}
