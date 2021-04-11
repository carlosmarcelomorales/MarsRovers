<?php
declare(strict_types=1);

namespace App\Http\Models;

final class Instructions
{
    const VALID_INSTRUCTIONS = ['F','B', 'L', 'R'];
    const INSTRUCTIONS = [
        'LEFT' => 'L',
        'RIGHT' => 'R',
        'FORWARD' => 'F',
        'BACK' => 'B'
    ];

    public function checkInstructions(array $instructions) : bool
    {
        $error = false;
        foreach ($instructions as $instruction) {
            if (!in_array(strtoupper($instruction), Instructions::VALID_INSTRUCTIONS)) {
                $error = true;
                break;
            }
        }
        return $error;
    }

}
