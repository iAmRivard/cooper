<?php

namespace App\Helpers;

//Models

use App\Emuns\Credito\StateCreditoEnum;
use App\Models\Credito;

class CreditoHelpers
{
    /**
     * Undocumented function
     *
     * @param string $ctr_id
     * @return boolean
     * 0 = NOT ACTIVE
     * 1 = ACTIVE
     */
    public static function validateState(string $ctr_id): bool
    {
        $crt = Credito::where('id', $ctr_id)->first();

        $status = StateCreditoEnum::ACTIVE->value;
        if ($crt->estado == StateCreditoEnum::NOT_ACTIVE->value) {
            $status = StateCreditoEnum::NOT_ACTIVE->value;
        }

        return $status;
    }
}
