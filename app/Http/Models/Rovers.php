<?php
declare(strict_types=1);

namespace App\Http\Models;

class Rovers
{
    private $currentPosition;

    public function __construct(int $currentPosition)
    {
        $this->currentPosition = $currentPosition;
    }

    public function getCurrentPosition(): int
    {
        return $this->currentPosition;
    }

    public function setCurrentPosition(int $currentPosition): void
    {
        $this->currentPosition = $currentPosition;
    }
}
