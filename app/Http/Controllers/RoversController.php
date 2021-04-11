<?php

namespace App\Http\Controllers;

use App\Http\Models\Instructions;
use Illuminate\Http\Request;

class RoversController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function instructions(Request $request)
    {
        $instructions = $request->instructions;
        $error = false;

        $arrayInstructions = str_split($instructions);

        foreach ($arrayInstructions as $instruction) {
            if (!in_array(strtoupper($instruction), Instructions::VALID_INSTRUCTIONS)) {
                $error = true;
                break;
            }
        }


        if ($error) {
            return response()->json([
                'success' => false,
                'errorMessage' => 'Incorrect instructions! Read the manual'
            ]);
        }
    }

}
