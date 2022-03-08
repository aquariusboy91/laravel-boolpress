<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $boolpress = Boolpress::paginate(10);

        return response()->json([
            'response' => true,
            'results' =>  $boolpress,
        ]);
    }
}
