<?php

namespace App\Service;

class LateFeeCalculator
{

    public function calculateLateFee(\DateTime $dueDate, \DateTime $returnDate)
    {
        $daysLate = $returnDate->diff($dueDate)->days;

        // Si la date de retour est avant la date d'échéance ou le jour même
        if ($returnDate < $dueDate || $daysLate === 0)
        {
            return 0;
        }
        // Sinon (date de retour après la date d'échéance)
        else
        {
            return $daysLate * 0.5;
        }
    }
}

