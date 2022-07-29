<?php
namespace App\Traits;

use DateTime;
use DateTimeZone;

trait ConvertTimeZone
{
    public function getCreatedAtAttribute()
    {
        $converted = new DateTime($this->attributes['created_at'], new DateTimeZone('UTC'));
        $converted->setTimezone(new DateTimeZone('Asia/Phnom_Penh'));
        return $converted->format('Y-m-d H:i:s T');
    }
}
