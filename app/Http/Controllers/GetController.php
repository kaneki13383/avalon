<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

class GetController extends Controller
{
    public function __invoke()
    {
        return 11111;
    }
}
