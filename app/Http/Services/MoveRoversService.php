<?php
declare(strict_types=1);

namespace App\Http\Services;


use App\Http\Models\Instructions;
use App\Http\Models\Rovers;

final class MoveRoversService
{
    private $rovers;
    private $cells;
    private $errorObstacleFound;
    private $obstaclePosition;

    public function __construct(Rovers $rovers, array $cells)
    {
        $this->rovers = $rovers;
        $this->cells = $cells;
        $this->errorObstacleFound = false;
        $this->obstaclePosition = '';
    }

    public function __invoke(array $instructions)
    {

        foreach ($instructions as $instruction) {

            switch (strtoupper($instruction)) {
                case Instructions::INSTRUCTIONS['LEFT']:
                    $this->moveLeft();
                    break;
                case Instructions::INSTRUCTIONS['RIGHT']:
                    $this->moveRight();
                    break;

                case Instructions::INSTRUCTIONS['FORWARD']:
                    $this->moveForward();
                    break;

                case Instructions::INSTRUCTIONS['BACK']:
                    $this->moveBack();
                    break;
                default:
                    throw new \Exception('not an option!');
            }

            if ($this->errorObstacleFound) {
                break;
            }
        }

        return [
            'errorObstacleFound' => $this->errorObstacleFound,
            'obstaclePosition' => $this->obstaclePosition
        ];
    }

    private function moveLeft () : void
    {
        $nextPosition = $this->rovers->getCurrentPosition() - 1;

        $isObstacle = $this->checkIfObstacle($nextPosition);

        if (!$isObstacle) {
            $this->rovers->setCurrentPosition($nextPosition);
        }

    }

    private function moveRight () : void
    {
        $nextPosition = $this->rovers->getCurrentPosition() + 1;

        $isObstacle = $this->checkIfObstacle($nextPosition);

        if (!$isObstacle) {
            $this->rovers->setCurrentPosition($nextPosition);
        }
    }

    private function moveForward () : void
    {
        $nextPosition = $this->rovers->getCurrentPosition() - 20;

        $isObstacle = $this->checkIfObstacle($nextPosition);

        if (!$isObstacle) {
            $this->rovers->setCurrentPosition($nextPosition);
        }
    }

    private function moveBack() : void
    {
        $nextPosition = $this->rovers->getCurrentPosition() + 20;

        $isObstacle = $this->checkIfObstacle($nextPosition);

        if (!$isObstacle) {
            $this->rovers->setCurrentPosition($nextPosition);
        }
    }

    private function checkIfObstacle (int $nextPosition) : bool
    {
        $isObstacle = $this->cells[$nextPosition - 1]['isObstacle'];
        if ($isObstacle) {
            $this->errorObstacleFound = true;
            $this->obstaclePosition = $nextPosition;
        }
        return $isObstacle;
    }
}
