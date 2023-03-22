<?php

namespace App\Models\Rules\Auth;

use App\Models\Rules\AbstractFactoryValidation;
use App\Models\Rules\AbstractRulesValidation;

class RulesAuthFactory implements AbstractFactoryValidation
{

    /**
     * @return AbstractRulesValidation
     */
    public function createRules() : AbstractRulesValidation
    {
        return new RulesAuthValidation();
    }
}