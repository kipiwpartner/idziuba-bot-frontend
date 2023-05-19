<?php

namespace App\Models\Validations\Auth;

use App\Models\Validations\AbstractFactoryValidation;
use App\Models\Validations\AbstractRulesValidation;

class LoginValidationFactory implements AbstractFactoryValidation
{

    /**
     * @return AbstractRulesValidation
     */
    public function createRules() : AbstractRulesValidation
    {
        return new LoginValidation();
    }
}