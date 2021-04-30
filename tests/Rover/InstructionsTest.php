<?php
declare(strict_types=1);

namespace Tests\Rover;


use App\Http\Models\Instructions;
use Tests\TestCase;

class InstructionsTest extends TestCase
{

    private $validArrayInstructions;

    public function setUp(): void
    {
        $this->validArrayInstructions = ['L', 'R', 'B'];
    }

    public function testValidArrayInstructions()
    {
        $instructionsModel = new Instructions();
        $error = $instructionsModel->checkInstructions($this->validArrayInstructions);

        self::assertFalse($error);
    }

    public function testIncorrectArrayInstructions()
    {
        $arrayInstructions = [''];

        $instructionsModel = new Instructions();
        $error = $instructionsModel->checkInstructions($arrayInstructions);

        self::assertTrue($error);

    }
}
