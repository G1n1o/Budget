<?php

declare(strict_types=1);

namespace App\Services;

use DateTime;


class DateService
{
    public function getCurrentDate()
    {
        $currentDate = new DateTime('now');
        $currentDate->setDate((int) $currentDate->format('Y'), (int) $currentDate->format('m'), 1);

        $_SESSION['dateBegin'] = $currentDate->format('Y-m-d');
        $_SESSION['dateEnd'] = $currentDate->format('Y-m-t');
        $_SESSION['title'] = 'Bieżący miesiąc';
    }

    public function getPreviousMonth()
    {
        $currentDate = new DateTime('now');
        $currentDate->setDate((int) $currentDate->format('Y'), (int) $currentDate->format('m'), 1);
        $currentDate->modify('-1 month');

        $_SESSION['dateBegin'] = $currentDate->format('Y-m-d');
        $_SESSION['dateEnd'] = $currentDate->format('Y-m-t');
        $_SESSION['title'] = 'Poprzedni miesiąc';
    }

    public function getCurrentYear()
    {
        $currentDate = new DateTime('now');
        $currentDate->setDate((int) $currentDate->format('Y'), 1, 1);


        $_SESSION['dateBegin'] = $currentDate->format('Y-m-d');

        $currentDate->modify('last day of December ' . $currentDate->format('Y'));

        $_SESSION['dateEnd'] = $currentDate->format('Y-m-t');
        $_SESSION['title'] = 'Obecny rok';
    }

    public function getCustomDate(array $formData)
    {
        $_SESSION['dateBegin'] = $_POST['begin'];
        $_SESSION['dateEnd'] = $_POST['end'];
        $_SESSION['title'] = "od " . $_POST['begin'] . " do " . $_POST['end'];
    }
}
