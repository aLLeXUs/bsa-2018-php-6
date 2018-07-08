<?php

namespace App\Http\Controllers\Api\Admin;

use App\Services\Currency;
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
        $activeCurrencies = [];
        foreach ($currencies as $currency) {
            $activeCurrencies[] = \App\Services\CurrencyPresenter::present($currency);
        }
        return response()->json($activeCurrencies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $repository = app(\App\Services\CurrencyRepositoryInterface::class);
        $currency = new Currency(
            $repository->getStoreId(),
            $request->input('name'),
            $request->input('short_name'),
            $request->input('actual_course'),
            \DateTime::createFromFormat('Y-m-d H-i-s', $request->input('actual_course_date')),
            $request->input('active')
        );
        $repository->save($currency);
        return response()->json(\App\Services\CurrencyPresenter::present($currency));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $repository = app(\App\Services\CurrencyRepositoryInterface::class);
        $currency = $repository->findById($id);
        if (!is_null($currency)) {
            if (!empty($request->input('name'))) {
                $currency->setName($request->input('name'));
            }
            if (!empty($request->input('short_name'))) {
                $currency->setShortName($request->input('short_name'));
            }
            if (!empty($request->input('actual_course'))) {
                $currency->setActualCourse($request->input('actual_course'));
            }
            if (!empty($request->input('actual_course_date'))) {
                $currency->setActualCourseDate(\DateTime::createFromFormat('Y-m-d H-i-s', $request->input('actual_course_date')));
            }
            if (!empty($request->input('active'))) {
                $currency->setActive($request->input('active'));
            }
            $repository->save($currency);
            return response()->json(\App\Services\CurrencyPresenter::present($currency));
        } else {
            return response()->json([
                'message' => 'Currency not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repository = app(\App\Services\CurrencyRepositoryInterface::class);
        $currency = $repository->findById($id);
        if (!is_null($currency)) {
            $repository->delete($currency);
            return response()->json([
                'message' => 'Currency deleted'
            ]);
        } else {
            return response()->json([
                'message' => 'Currency not found'
            ], 404);
        }
    }
}
