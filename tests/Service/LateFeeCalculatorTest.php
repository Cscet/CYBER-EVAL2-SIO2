<?php

namespace App\Tests\Service;

use App\Service\LateFeeCalculator;
use PHPUnit\Framework\TestCase;

class LateFeeCalculatorTest extends TestCase
{
    public function testCalculateFeeWithLate(): void
    {
        $calculator = new LateFeeCalculator();
        $dueDate = new \DateTime('2024-01-01');
        $returnDate = new \DateTime('2024-01-04'); // 3 jours de retard

        $this->assertEquals(1.5, $calculator->calculateLateFee($dueDate, $returnDate));
    }

    public function testCalculateFeeAdTime()
    {
        $calculator = new LateFeeCalculator();

        $dueDate = new \DateTime('2024-01-01');
        $returnDate = new \DateTime('2024-01-01');

        $this->assertEquals(0, $calculator->calculateLateFee($dueDate, $returnDate));

    }

    public function testCalculateFeeWithAdvance()
    {
        $calculator = new LateFeeCalculator();

        $dueDate = new \DateTime('2024-01-05');
        $returnDate = new \DateTime('2024-01-01');

        $this->assertEquals(0, $calculator->calculateLateFee($dueDate, $returnDate));

    }

}
