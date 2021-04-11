<?php

namespace App\Http\Controllers;

use App\Http\Models\Instructions;
use App\Http\Models\Rovers;
use App\Http\Services\MoveRoversService;
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
        $cells = $request->cells;
        $currentPosition = $request->currentPosition;

        $arrayInstructions = str_split($instructions);

        $instructionsModel = new Instructions();
        $error = $instructionsModel->checkInstructions($arrayInstructions);

        if ($error) {
            return response()->json([
                'success'      => false,
                'errorMessage' => 'Incorrect instructions! Read the manual'
            ]);
        }

        $roversModel = new Rovers($currentPosition);

        $moveRoversService = new MoveRoversService($roversModel, $cells);

        $resultMoving = $moveRoversService($arrayInstructions);

        if ($resultMoving['errorObstacleFound']) {
            $success = false;
            $errorMessage = 'Obstacle found at position '. $resultMoving['obstaclePosition'].'! Are you drunken? Sequence aborted.';
        } else {
            $success = true;
            $errorMessage = '';
        }

        return response()->json([
            'success'      => $success,
            'errorMessage' => $errorMessage,
            'newPath'      => $resultMoving['newPath']
        ]);

    }

}
