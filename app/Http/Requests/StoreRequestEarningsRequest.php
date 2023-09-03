<?php

namespace App\Http\Requests;

use App\Models\Income;
use App\Models\IncomeRequest;
use App\Models\RegisteredPackage;
use Closure;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequestEarningsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $package = RegisteredPackage::with('package')->where('user_id', auth()->user()->id)->firstOrFail();
        $total_earn = Income::where('registered_package_id', $package->id)->sum('amount');
        $total_release = IncomeRequest::where('registered_package_id', $package->id)->whereIn('status', ['A', 'P'])->sum('amount');
        $redeemable = $total_earn - $total_release;
        $max = 40;
        if ($redeemable < $max) {
            $max = $redeemable;
        }
        return [
            'amount' => [
                'required',
                'integer',
                'max:' . $max,
                function (string $attribute, mixed $value, Closure $fail) {
                    if (IncomeRequest::whereDate('created_at', today())->exists()) {
                        $fail("Only one request per day is allowed.");
                    }
                },
            ], //, 'min:10'
        ];
    }
}
