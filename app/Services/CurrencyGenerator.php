<?php

namespace App\Services;

class CurrencyGenerator
{
    public static function generate(): array
    {
        $date = new \DateTime();
        return [
            new Currency(
                1,
                'Bitcoin',
                'btc',
                6646.91,
                $date,
                true
            ),
            new Currency(
                2,
                'Ethereum',
                'eth',
                472.37,
                $date,
                true
            ),
            new Currency(
                3,
                'NEO',
                'neo',
                41.05,
                $date,
                false
            ),
            new Currency(
                4,
                'Monero',
                'mon',
                138.87,
                $date,
                false
            ),
            new Currency(
                5,
                'Dash',
                'dash',
                244.37,
                $date,
                true
            ),
        ];
    }
}