<?php

declare(strict_types=1);

namespace App\Controllers;


use Framework\TemplateEngine;
use App\Services\{SettingsService, UserService, ValidatorService};


class SettingsController
{
    public function __construct(
        private TemplateEngine $view,
        private SettingsService $settingsService,
        private UserService $userService,
        private ValidatorService $validatorService
    ) {
    }

    public function settingsView()
    {
        $user = $this->settingsService->getUserData();
        echo $this->view->render("settings.php", [
            'user' => $user
        ]);
    }

    public function changeUserData()
    {
        $this->validatorService->validateUserData($_POST);
        $this->settingsService->updateUserData($_POST);
        $this->settingsService->getUserData();

        redirectTo($_SERVER['HTTP_REFERER']);
    }

    public function changeUserPassword()
    {
        $this->validatorService->validateUserPassword($_POST);
        $this->settingsService->updateUserPassword($_POST);
        redirectTo($_SERVER['HTTP_REFERER']);
    }



    public function newCategory()
    {
        $transactionType = $_SERVER['REQUEST_URI'] === '/addNewIncomeCategory' ? 'income' : 'expense';

        $this->settingsService->isNewCategoryTaker($_POST['newCategory'], $transactionType);
        $this->settingsService->createCategory($_POST['newCategory'], $transactionType);
        $this->userService->getCategories();

        redirectTo($_SERVER['HTTP_REFERER']);
    }

    public function editCategory()
    {
        $transactionType = $_SERVER['REQUEST_URI'] === '/editIncomeCategory' ? 'income' : 'expense';
        $this->settingsService->editCategory($_POST, $transactionType);
        $this->userService->getCategories();

        redirectTo($_SERVER['HTTP_REFERER']);
    }

    public function editLimitForCategory()
    {
        $transactionType = $_SERVER['REQUEST_URI'] === '/editIncomeCategory' ? 'income' : 'expense';
        $this->settingsService->editLimit($_POST, $transactionType);
        $this->userService->getCategories();

        redirectTo($_SERVER['HTTP_REFERER']);
    }

    public function deleteCategory()
    {

        $transactionType = $_SERVER['REQUEST_URI'] === '/deleteIncomeCategory' ? 'income' : 'expense';
        $this->settingsService->deleteCategory((int) $_POST['category'], $transactionType);
        $this->userService->getCategories();

        redirectTo($_SERVER['HTTP_REFERER']);
    }

    public function limitAction(array $param)
    {
        echo json_encode($this->settingsService->getLimit((int) $param['CategoryID']));
    }
    public function sumOfExpenses(array $param)
    {
        echo json_encode($this->settingsService->getSumOfExpenses((int) $param['CategoryID'], $param['date']));
    }
}
