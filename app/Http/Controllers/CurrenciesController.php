<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CurrencyRepositoryInterface;

class CurrenciesController extends Controller
{
    public function index()
    {
        $currencies = app(CurrencyRepositoryInterface::class)->findActive();
        $activeCurrencies = [];
        foreach ($currencies as $currency) {
            $activeCurrencies[] = [
                'id' => $currency->getId(),
                'name' => $currency->getName(),
                'short_name' => $currency->getShortName(),
                'actual_course' => $currency->getActualCourse(),
                'actual_course_date' => $currency->getActualCourseDate()->format('Y-m-d H-i-s'),
                'active' => $currency->isActive()
            ];
        }
        return response()->json($activeCurrencies);
    }
}
