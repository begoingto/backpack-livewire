<?php
namespace App\Enums;

enum StatusEnum: int
{
    case Active = 1;
    case Inactive = 0;

    public static function color($status):string
    {
        return match ($status) {
            self::Active->value => 'success',
            self::Inactive->value => 'danger',
        };
    }

    public static function name($status): string
    {
        return match ($status) {
            self::Active->value => self::Active->name,
            self::Inactive->value => self::Inactive->name,
        };
    }
}
