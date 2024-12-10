<?php

namespace App\Service;

class LateFeeCalculator
{

    public function calculateLateFee(\DateTime $dueDate, \DateTime $returnDate)
    {
        $daysLate = $returnDate->diff($dueDate)->days;

        if ($returnDate < $dueDate) {
            return 0;
        } elseif ($daysLate <= 0) {
            return 0;
        } else {
            return $daysLate * 0.5;
        }
    }
}

