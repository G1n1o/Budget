<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{
    AuthController,
    HomeController,
    TransactionController,
    ErrorController,
    SettingsController
};
use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};

function registerRoutes(App $app)
{
    $app->get('/', [HomeController::class, 'home'])->add(GuestOnlyMiddleware::class);
    $app->get('/register', [AuthController::class, 'registerView'])->add(GuestOnlyMiddleware::class);
    $app->post('/register', [AuthController::class, 'register'])->add(GuestOnlyMiddleware::class);
    $app->get('/login', [AuthController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
    $app->post('/login', [AuthController::class, 'login'])->add(GuestOnlyMiddleware::class);
    $app->get('/logout', [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class);
    $app->get('/balance', [AuthController::class, 'balanceView'])->add(AuthRequiredMiddleware::class);
    $app->get('/currentMonth', [AuthController::class, 'currentMonth'])->add(AuthRequiredMiddleware::class);
    $app->get('/previousMonth', [AuthController::class, 'previousMonth'])->add(AuthRequiredMiddleware::class);
    $app->get('/currentYear', [AuthController::class, 'currentYear'])->add(AuthRequiredMiddleware::class);
    $app->post('/balance', [AuthController::class, 'customDate'])->add(AuthRequiredMiddleware::class);
    $app->get('/addExpense', [TransactionController::class, 'addTransactionView'])->add(AuthRequiredMiddleware::class);
    $app->post('/addExpense', [TransactionController::class, 'addTransaction'])->add(AuthRequiredMiddleware::class);
    $app->get('/addIncome', [TransactionController::class, 'addTransactionView'])->add(AuthRequiredMiddleware::class);
    $app->post('/addIncome', [TransactionController::class, 'addTransaction'])->add(AuthRequiredMiddleware::class);
    $app->get('/addExpense/{expense}', [TransactionController::class, 'editExpenseView'])->add(AuthRequiredMiddleware::class);
    $app->get('/addIncome/{income}', [TransactionController::class, 'editIncomeView'])->add(AuthRequiredMiddleware::class);
    $app->post('/addExpense/{expense}', [TransactionController::class, 'editExpense'])->add(AuthRequiredMiddleware::class);
    $app->post('/addIncome/{income}', [TransactionController::class, 'editIncome'])->add(AuthRequiredMiddleware::class);
    $app->delete('/addExpense/{expense}', [TransactionController::class, 'delete'])->add(AuthRequiredMiddleware::class);
    $app->delete('/addIncome/{income}', [TransactionController::class, 'delete'])->add(AuthRequiredMiddleware::class);
    $app->get('/settings', [SettingsController::class, 'settingsView'])->add(AuthRequiredMiddleware::class);
    $app->post('/addNewIncomeCategory', [SettingsController::class, 'newCategory'])->add(AuthRequiredMiddleware::class);
    $app->post('/editIncomeCategory', [SettingsController::class, 'editCategory'])->add(AuthRequiredMiddleware::class);
    $app->post('/deleteIncomeCategory', [SettingsController::class, 'deleteCategory'])->add(AuthRequiredMiddleware::class);
    $app->post('/addNewExpenseCategory', [SettingsController::class, 'newCategory'])->add(AuthRequiredMiddleware::class);
    $app->post('/editExpenseCategory', [SettingsController::class, 'editCategory'])->add(AuthRequiredMiddleware::class);
    $app->post('/deleteExpenseCategory', [SettingsController::class, 'deleteCategory'])->add(AuthRequiredMiddleware::class);
    $app->post('/changeUserData',[SettingsController::class, 'changeUserData'])->add(AuthRequiredMiddleware::class);
    $app->post('/changeUserPassword',[SettingsController::class, 'changeUserPassword'])->add(AuthRequiredMiddleware::class);
    $app->setErrorHandler([ErrorController::class, 'notFound']);
}
