<?php

namespace App\Traits;

use App\Models\OpticienInfo;

trait OpticienInfoTrait
{
    protected function getActiveOpticienInfo()
    {
        return OpticienInfo::where('is_active', true)->first();
    }
} 