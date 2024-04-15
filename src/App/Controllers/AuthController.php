<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, UserService, TransactionService, DateService};

class AuthController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private UserService $userService,
        private TransactionService $transactionService,
        private DateService $dateService
    ) {
    }

    public function registerView()
    {
        echo $this->view->render("register.php");
    }

    public function register()
    {
        $this->validatorService->validateRegister($_POST);

        $this->userService->isEmailTaker($_POST['email']);

        $this->userService->create($_POST);

        $this->userService->categoryAssignment();

        $this->userService->getCategories();

        redirectTo('/login');
    }
    public function loginView()
    {
        echo $this->view->render("login.php");
    }

    public function login()
    {
        $this->validatorService->validateLogin($_POST);

        $this->userService->login($_POST);

        $this->userService->getCategories();

        redirectTo('/balance');
    }

    public function currentMonth()
    {
        $this->dateService->getCurrentDate();

        redirectTo('/balance');
    }

    public function previousMonth()
    {
        $this->dateService->getPreviousMonth();

        redirectTo('/balance');
    }

    public function currentYear()
    {

        $this->dateService->getCurrentYear();

        redirectTo('/balance');
    }

    public function customDate()
    {
        $this->dateService->getCustomDate($_POST);

        redirectTo('/balance');
    }

    public function balanceView()
    {

        if (!isset($_SESSION['dateBegin'])) {
            $this->dateService->getCurrentDate();
        }

        $expenses = $this->transactionService->getUserExpenses();
        $incomes = $this->transactionService->getUserIncomes();
        $balance = $this->transactionService->balance();
        $popularExpenses = $this->transactionService->popularExpenses();


        if ($balance >= 0) {
            $result = "<p> Gratulacje.Świetnie zarządzasz finansami!😎 <p>";
        } else {
            $result = "<p class='error'> Jesteś pod kreską! Musisz się bardziej postarać !<p>";
        }


        echo $this->view->render("balance.php", [
            'expenses' => $expenses,
            'incomes' => $incomes,
            'balance' => $balance,
            'result' => $result,
            'popularExpenses' => $popularExpenses
        ]);
    }

    public function logout()
    {
        $this->userService->logout();
        redirectTo('/login');
    }

}
