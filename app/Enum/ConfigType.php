<?php

namespace App\Enum;

use Illuminate\Validation\Rules\Enum;

final class ConfigType extends Enum
{
    const TIEU_DE = "tieu_de";
    const API_VNPAY = "api_vn_pay";
    const API_ZALO = "api_zalo";
    const BANNER_TOP = "banner_top";
    const FOOTER = "footer";
    const LOGO = "logo";
    const MENU = "menu";
    const SMTP_EMAIL = "smtp_email";
}
