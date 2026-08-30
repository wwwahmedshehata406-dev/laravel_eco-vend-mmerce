<?php


namespace App\Helpers;

use NumberFormatter;


class Currency
{


    public function __invoke(...$prams)
    {
        return static::format($prams);
    }

    public static function format($amount, $currency = null)
    {
        //* local currency used
        $formatter = new NumberFormatter(config('app.locale'), NumberFormatter::CURRENCY);


        //* if no currency 
        if ($currency === null) {
            $currency = config('app.currency', 'USD');

        }
        return $formatter->formatCurrency($amount, $currency);
    }
}