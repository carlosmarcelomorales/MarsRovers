<?php

namespace Tests\Feature;

use App\Http\Models\Rovers;
use Faker\Factory;
use Tests\TestCase;

class RoversTest extends TestCase
{

    private $roversPosition;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $faker = Factory::create();

        $this->roversPosition = $faker->unique()->numberBetween(1,400);

    }

    public function testRoversGetCurrentPosition()
    {
        $rovers = new Rovers($this->roversPosition);

        self::assertEquals($rovers->getCurrentPosition(), $this->roversPosition);
    }

    public function testRoversSetCurrentPosition()
    {
        $rovers = new Rovers($this->roversPosition);

        $rovers->setCurrentPosition($this->roversPosition + 1);

        self::assertEquals($rovers->getCurrentPosition(), $this->roversPosition + 1);
    }

}
