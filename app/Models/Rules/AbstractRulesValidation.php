<?php

namespace App\Models\Rules;

use CodeIgniter\HTTP\Request;

interface AbstractRulesValidation
{
    public function validatePost(Request $request) : array;
    public function validateGet() : array;
//    public function validatePost() : array;
//    public function validatePost() : array;

}