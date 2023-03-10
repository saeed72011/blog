<?php


use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

function dateToJalali($date): Jalalian
{
    $toCarbon = Carbon::parse($date);
    return Jalalian::fromDateTime($toCarbon);
}


function dateToPersian($timestamp): string
{
    return  Morilog\Jalali\Jalalian::fromCarbon(Carbon::parse(@$timestamp))->format('%A, %d %B %Y');
}


function timeToPersian($timestamp): string
{
    return  Morilog\Jalali\Jalalian::fromCarbon(Carbon::parse(@$timestamp))->format('H:i');
}


function validateDate($date, $format = 'Y-m-d H:i:s'): bool
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

