<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, TransactionService};

class TransactionController
{
  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validatorService,
    private TransactionService $transactionService
  ) {
  }

  public function addTransactionView()
  {
    echo $this->view->render("transactions/addTransaction.php");
  }

  public function addTransaction()
  {
    $transactionType = $_SERVER['REQUEST_URI'] === '/addExpense' ? 'expenses' : 'incomes';

    $this->validatorService->validateTransaction($_POST);

    $this->transactionService->addTransaction($_POST, $transactionType);

    redirectTo('/balance');
  }

  public function editExpenseView(array $params)
  {

    $transaction =  $this->transactionService->getUserExpense($params['expense']);

    if (!$transaction) {
      redirectTo('/balance');
    }

    echo $this->view->render(
      'transactions/editExpense.php',
      [
        'transaction' => $transaction
      ]
    );
  }

  public function editIncomeView(array $params)
  {

    $transaction =  $this->transactionService->getUserIncome($params['income']);

    if (!$transaction) {
      redirectTo('/balance');
    }

    echo $this->view->render(
      'transactions/editIncome.php',
      [
        'transaction' => $transaction
      ]
    );
  }

  public function editExpense(array $params)
  {
    $transaction =  $this->transactionService->getUserExpense($params['expense']);

    if (!$transaction) {
      redirectTo('/balance');
    }

    $this->validatorService->validateTransaction($_POST);
    $this->transactionService->updateExpense($_POST, $transaction['id']);

    redirectTo('/balance');
  }
  public function editIncome(array $params)
  {
    $transaction =  $this->transactionService->getUserIncome($params['income']);

    if (!$transaction) {
      redirectTo('/balance');
    }

    $this->validatorService->validateTransaction($_POST);
    $this->transactionService->updateIncome($_POST, $transaction['id']);

    redirectTo('/balance');
  }


  public function delete(array $params)
  {
    $transactionType = (strpos($_SERVER['REQUEST_URI'], "/addExpense") === 0) ? 'expense' : 'income';

    $this->transactionService->delete((int) $params[$transactionType], $transactionType );
    redirectTo('/balance');
  }
}
