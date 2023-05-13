<?php

namespace App\Models\Rules;

use CodeIgniter\HTTP\Request;

interface AbstractRulesValidation
{
    public function validatePost(Request $request) : array;
    public function validateGet(Request $request) : array;
    public function validatePut(Request $request) : array;
    public function validateDelete(Request $request) : array;
    public function validatePatch(Request $request) : array;
}