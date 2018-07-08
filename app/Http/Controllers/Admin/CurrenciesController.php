<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = app(\App\Services\CurrencyRepositoryInterface::class)->findAll();
        $presentedCurrencies = [];
        foreach ($currencies as $currency) {
            $presentedCurrencies[] = \App\Services\CurrencyPresenter::present($currency);
        }
        return view('currencies', ['currencies' => $presentedCurrencies]);
    }
}
