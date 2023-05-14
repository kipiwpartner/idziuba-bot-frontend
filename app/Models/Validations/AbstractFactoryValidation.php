<?php

namespace App\Models\Validations;

interface AbstractFactoryValidation
{
    public function createRules() : AbstractRulesValidation;

}