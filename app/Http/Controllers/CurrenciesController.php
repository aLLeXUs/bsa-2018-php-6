<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    public function index()
    {
        $currencies = app(\App\Services\CurrencyRepositoryInterface::class)->findActive();
        $activeCurrencies = [];
        foreach ($currencies as $currency) {
            $activeCurrencies[] = \App\Services\CurrencyPresenter::present($currency);
        }
        return response()->json($activeCurrencies);
    }

    public function show($id)
    {
        $currency = app(\App\Services\CurrencyRepositoryInterface::class)->findById($id);
        if (!is_null($currency)) {
            return response()->json(\App\Services\CurrencyPresenter::present($currency));
        } else {
            return response()->json([
                'message' => 'Currency not found'
            ], 404);
        }
    }
}
