<?php

namespace App\Services;

use App\Models\Income;
use App\Models\RegisteredPackage;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class IncomeCalculationService
{
    public static function calculate($user_id)
    {
        $packages = RegisteredPackage::with('package')->where('user_id', $user_id)->get();
        foreach ($packages as $package) {
            $max_earn_date = Income::where("registered_package_id", $package->id)->max('earning_date');
            if (empty($max_earn_date)) {
                $max_earn_date = $package->registered_date;
            }
            if ($max_earn_date == now()->format('Y-m-d')) {
                continue;
            }
            $date_range = CarbonPeriod::create(Carbon::parse($max_earn_date)->addDay(), now())->toArray();
            foreach ($date_range as $date) {
                $income = new Income();
                $income->registered_package_id = $package->id;
                $income->earning_date = $date;
                $income->amount = $package->package->daily_income;
                $income->save();
            }
        }
    }
}
