<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class StartBeforeEndDate implements Rule
{
    public function passes($attribute, $value)
    {
        $startDate = Carbon::createFromFormat('Y-m-d', request()->input('start_date'));
        $endDate = Carbon::createFromFormat('Y-m-d', $value);

        // Ensure both dates are valid instances of Carbon
        if (!$startDate || !$endDate) {
            return false;
        }

        // Check if start date is before end date
        return $startDate->lessThan($endDate);
    }

    public function message()
    {
        return 'The start date must be before the end date.';
    }
}
