<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class TransactionService
{
    public function __construct(private Database $db)
    {
    }
    public function addTransaction(array $formData, string $transactionType)
    {
        $formattedDate = "{$formData['date']} 00:00:00";

        $this->db->query(
            "INSERT INTO {$transactionType} VALUES (NULL, :user_id, :category, :amount, :date, :comment)",
            [
                'user_id' => $_SESSION['user'],
                'category' => $formData['category'],
                'amount' => $formData['amount'],
                'date' => $formattedDate,
                'comment' => $formData['comment']
            ]
        );
    }

    public function getUserExpenses()
    {
        return $this->db->query(
            "SELECT expenses.id, amount, name, date_of_expense, expense_comment, DATE_FORMAT(date_of_expense, '%d-%m-%Y') as formatted_date 
            FROM expenses 
            JOIN expense_category_assigned_to_users 
            ON expenses.expense_category_assigned_to_user_id = expense_category_assigned_to_users.id 
            AND expenses.date_of_expense BETWEEN :date_begin AND :date_end
            WHERE expenses.user_id = :user_id
            ORDER BY date_of_expense DESC",
            [
                'user_id' => $_SESSION['user'],
                'date_begin' => $_SESSION['dateBegin'],
                'date_end' => $_SESSION['dateEnd']
            ]
        )->findAll();
    }

    public function getUserIncomes()
    {
        return $this->db->query(
            "SELECT incomes.id, amount, name, date_of_income, income_comment, DATE_FORMAT(date_of_income, '%d-%m-%Y') as formatted_date 
            FROM incomes 
            JOIN income_category_assigned_to_users 
            ON incomes.income_category_assigned_to_user_id = income_category_assigned_to_users.id 
            WHERE incomes.user_id = :user_id
            AND incomes.date_of_income BETWEEN :date_begin AND :date_end
            ORDER BY date_of_income DESC",
            [
                'user_id' => $_SESSION['user'],
                'date_begin' => $_SESSION['dateBegin'],
                'date_end' => $_SESSION['dateEnd']
            ]
        )->findAll();
    }

    public function balance()
    {
        $params = [
            'user_id' => $_SESSION['user'],
            'date_begin' => $_SESSION['dateBegin'],
            'date_end' => $_SESSION['dateEnd']
        ];

        $totalExpenses = $this->db->query(
            "SELECT SUM(amount) AS sum FROM expenses WHERE user_id = :user_id AND date_of_expense BETWEEN :date_begin AND :date_end",
            $params
        )->find();

        $totalIncomes = $this->db->query(
            "SELECT SUM(amount) AS sum FROM incomes WHERE user_id = :user_id AND date_of_income BETWEEN :date_begin AND :date_end",
            $params
        )->find();

        $balance = (int) $totalIncomes['sum'] - (int)$totalExpenses['sum'];


        return $balance;
    }

    public function popularExpenses()
    {
        return $this->db->query(
            "SELECT SUM(expenses.amount) AS sum, name FROM expenses 
            JOIN expense_category_assigned_to_users 
            ON expenses.expense_category_assigned_to_user_id = expense_category_assigned_to_users.id 
            WHERE expenses.user_id = :user_id 
            AND expenses.date_of_expense BETWEEN :date_begin AND :date_end 
            GROUP BY expense_category_assigned_to_users.name",
            [
                'user_id' => $_SESSION['user'],
                'date_begin' => $_SESSION['dateBegin'],
                'date_end' => $_SESSION['dateEnd']
            ]
        )->findAll();
    }


    public function getUserExpense(string $id)
    {
        return $this->db->query(
            "SELECT expenses.expense_category_assigned_to_user_id, expenses.id, amount, name, date_of_expense, expense_comment, DATE_FORMAT(date_of_expense, '%Y-%m-%d') as formatted_date 
            FROM expenses 
            JOIN expense_category_assigned_to_users 
            ON expenses.expense_category_assigned_to_user_id = expense_category_assigned_to_users.id 
            WHERE expenses.id =:id AND expenses.user_id = :user_id",
            [
                'id' => $id,
                'user_id' => $_SESSION['user']
            ]
        )->find();
    }

    public function getUserIncome(string $id)
    {
        return $this->db->query(
            "SELECT incomes.income_category_assigned_to_user_id, incomes.id, amount, name, date_of_income, income_comment, DATE_FORMAT(date_of_income, '%Y-%m-%d') as formatted_date 
            FROM incomes 
            JOIN income_category_assigned_to_users 
            ON incomes.income_category_assigned_to_user_id = income_category_assigned_to_users.id 
            WHERE incomes.id =:id AND incomes.user_id = :user_id",
            [
                'id' => $id,
                'user_id' => $_SESSION['user']
            ]
        )->find();
    }

    public function updateExpense(array $formData, int $id)
    {
        $formattedDate = "{$formData['date']} 00:00:00";

        $this->db->query(
            "UPDATE expenses
            SET amount = :amount,
            date_of_expense = :date,
            expense_comment = :comment,
            expense_category_assigned_to_user_id = :category
            WHERE id=:id AND user_id=:user_id",
            [
                'amount' => $formData['amount'],
                'date' => $formattedDate,
                'category' => $formData['category'],
                'comment' => $formData['comment'],
                'id' => $id,
                'user_id' => $_SESSION['user']
            ]
        );
    }

    public function updateIncome(array $formData, int $id)
    {
        $formattedDate = "{$formData['date']} 00:00:00";

        $this->db->query(
            "UPDATE incomes
            SET amount = :amount,
            date_of_income = :date,
            income_comment = :comment,
            income_category_assigned_to_user_id = :category
            WHERE id=:id AND user_id=:user_id",
            [
                'amount' => $formData['amount'],
                'date' => $formattedDate,
                'category' => $formData['category'],
                'comment' => $formData['comment'],
                'id' => $id,
                'user_id' => $_SESSION['user']
            ]
        );
    }

    public function delete(int $id, string $transactionType)
    {
        $transactionType .= "s";

        $this->db->query(
            "DELETE FROM {$transactionType} WHERE id=:id AND user_id=:user_id ",
            [
                'id' => $id,
                'user_id' => $_SESSION['user']
            ]
        );
    }
}
