<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Boolpress;

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

    public function inRandomOrder () {

        $boolpress = Boolpress::inRandomOrder()->limit(4)->get();
        return response()->json([
            'response' => true,
            'results' =>  ['data' => $boolpress],
        ]);

    }
}
