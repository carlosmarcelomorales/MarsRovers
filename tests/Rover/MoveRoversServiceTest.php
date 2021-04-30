<?php
declare(strict_types=1);

namespace Tests\Rover;

use App\Http\Models\Rovers;
use App\Http\Services\MoveRoversService;
use Tests\TestCase;

class MoveRoversServiceTest extends TestCase
{

    public function testValidMoveRight()
    {
        $rovers = new Rovers(1);
        $cells = [
            [
                'id' => 1,
                'isObstacle' => false
            ],
            [
                'id' => 2,
                'isObstacle' => false
            ],
        ];

        $arrayInstructions = ['R'];

        $moveRoversService = new MoveRoversService($rovers, $cells);

        $resultMoving = $moveRoversService($arrayInstructions);

        self::assertFalse($resultMoving['errorObstacleFound']);
        self::assertEquals($rovers->getCurrentPosition(), 2);
    }

    public function testValidMoveLeft()
    {

        $rovers = new Rovers(2);
        $cells = [
            [
                'id' => 1,
                'isObstacle' => false
            ],
            [
                'id' => 2,
                'isObstacle' => false
            ],
        ];

        $arrayInstructions = ['L'];

        $moveRoversService = new MoveRoversService($rovers, $cells);

        $resultMoving = $moveRoversService($arrayInstructions);

        self::assertFalse($resultMoving['errorObstacleFound']);
        self::assertEquals($rovers->getCurrentPosition(), 1);
    }

    public function testValidMoveUp()
    {

        $rovers = new Rovers(21);
        $cells = [
            [
                'id' => 1,
                'isObstacle' => false
            ],
            [
                'id' => 21,
                'isObstacle' => false
            ],
        ];

        $arrayInstructions = ['F'];

        $moveRoversService = new MoveRoversService($rovers, $cells);

        $resultMoving = $moveRoversService($arrayInstructions);

        self::assertFalse($resultMoving['errorObstacleFound']);
        self::assertEquals($rovers->getCurrentPosition(), 1);
    }

    public function testValidMoveDown()
    {

        $rovers = new Rovers(2);

        $cells[0] =[
            'id' => 1,
            'isObstacle' => false
        ];
        $cells[21] = [
            'id' => 21,
            'isObstacle' => false
        ];

        $arrayInstructions = ['B'];

        $moveRoversService = new MoveRoversService($rovers, $cells);

        $resultMoving = $moveRoversService($arrayInstructions);

        self::assertFalse($resultMoving['errorObstacleFound']);
        self::assertEquals($rovers->getCurrentPosition(), 22);
    }

    public function testFindObstacle()
    {
        $rovers = new Rovers(1);
        $cells = [
            [
                'id' => 1,
                'isObstacle' => false
            ],
            [
                'id' => 2,
                'isObstacle' => true
            ],
        ];

        $arrayInstructions = ['R'];

        $moveRoversService = new MoveRoversService($rovers, $cells);

        $resultMoving = $moveRoversService($arrayInstructions);

        self::assertTrue($resultMoving['errorObstacleFound']);
        self::assertEquals($rovers->getCurrentPosition(), 1);
    }

}
