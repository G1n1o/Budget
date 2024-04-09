<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\DateService;
use App\Controllers\AuthController;

class DateController
{
    public function __construct(
        private TemplateEngine $view,
        private DateService $dateService,
        private AuthController $authController
    ) {
    }

    public function currentMonth()
    {
        $this->dateService->getCurrentDate();
        redirectTo('/balance');
    }

    public function previousMonth()
    {
        $this->dateService->getPreviousMonth();
        $this->authController->balanceView();
    }
}
