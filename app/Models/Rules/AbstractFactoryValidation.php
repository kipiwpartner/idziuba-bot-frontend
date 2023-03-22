<?php

namespace App\Models\Rules;

interface AbstractFactoryValidation
{
    public function createRules() : AbstractRulesValidation;

}