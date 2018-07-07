<?php

namespace App\Services;

class InMemoryCurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;

    public function __construct($currencies)
    {
        $this->currencies = $currencies;
    }

    public function findAll(): array
    {
        return $this->currencies;
    }

    public function findActive(): array
    {
        $activeCurrencies = [];
        foreach ($this->currencies as $currency) {
            if ($currency->isActive()) {
                $activeCurrencies[] = $currency;
            }
        }
        return $activeCurrencies;
    }

    public function findById(int $id): ?Currency
    {
        foreach ($this->currencies as $currency) {
            if ($currency->getId() == $id) {
                return $currency;
            }
        }
        return null;
    }

    public function save(Currency $currency): void
    {
        $this->currencies[] = $currency;
    }

    public function delete(Currency $currency): void
    {
        foreach ($this->currencies as $key => $sourceCurrency) {
            if ($sourceCurrency->getId() == $currency->getId()) {
                unset($this->currencies[$key]);
                break;
            }
        }
    }
}