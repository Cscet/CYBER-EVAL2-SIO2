<?php

namespace App\Service;

class LateFeeCalculator
{

    public function calculateLateFee(\DateTime $dueDate, \DateTime $returnDate)
    {
        $daysLate = $returnDate->diff($dueDate)->days;

        // Si la date de retour est avant la date d'échéance
        if ($returnDate < $dueDate)
        {
            return 0;
        }
        // Si la date de retour est le jour de l'échéance
        elseif ($daysLate === 0)
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

