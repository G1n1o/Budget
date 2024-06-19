<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use DateTime;
use Framework\Exceptions\ValidationException;

class SettingsService
{
    public function __construct(private Database $db)
    {
    }

    public function getUserData()
    {
        return $this->db->query(
            "SELECT * FROM users WHERE id = :id",
            [
                'id' => $_SESSION['user']
            ]
        )->find();
    }

    public function updateUserData(array $formData)
    {
        $this->db->query(
            "UPDATE users
            SET user_name = :username,
            last_name = :lastname,
            email = :email 
            WHERE id = :user_id",
            [
                'username' => $formData['username'],
                'lastname' => $formData['lastname'],
                'email' => $formData['email'],
                'user_id' => $_SESSION['user']
            ]
        );

        $_SESSION['userName'] = $formData['username'];
    }

    public function updateUserPassword(array $formData)
    {
        $password = password_hash($formData['newPassword'], PASSWORD_BCRYPT, ["cost" => 12]);

        $this->db->query(
            "UPDATE users
            SET password = :password
            WHERE id = :user_id",
            [
                'password' => $password,
                'user_id' => $_SESSION['user']
            ]
        );
    }

    public function isNewCategoryTaker(string $categoryName, string $transactionType)
    {
        $categoryCount = $this->db->query(
            "SELECT COUNT(*) FROM {$transactionType}_category_assigned_to_users WHERE user_id = :user_id AND name = :categoryName",
            [
                'user_id' => $_SESSION['user'],
                'categoryName' => $categoryName
            ]
        )->count();

        if ($categoryCount > 0) {
            throw new ValidationException(['name' => ['Taka kategoria już istnieje']]);
        }
    }

    public function createCategory(string $categoryName, string $transactionType)
    {

        $this->db->query(
            "INSERT INTO {$transactionType}_category_assigned_to_users
            VALUES( NULL, :user_id, :categoryName )",
            [
                'user_id' => $_SESSION['user'],
                'categoryName' => $categoryName
            ]
        );
    }

    public function editCategory(array $formData, string $transactionType)
    {

        $this->db->query(
            "UPDATE {$transactionType}_category_assigned_to_users
            SET name = :categoryName WHERE id = :id AND user_id = :user_id",
            [
                'id' => $formData['category'],
                'user_id' => $_SESSION['user'],
                'categoryName' => $formData['newNameCategory']
            ]
        );
    }

    public function editLimit(array $formData, string $transactionType)
    {

        $this->db->query(
            "UPDATE {$transactionType}_category_assigned_to_users
            SET limits = :newLimit WHERE id = :id AND user_id = :user_id",
            [
                'id' => $formData['category'],
                'user_id' => $_SESSION['user'],
                'newLimit' => $formData['newLimit']
            ]
        );
    }

    public function deleteCategory(int $id, string $transactionType)
    {
        $this->db->query(
            "DELETE FROM {$transactionType}_category_assigned_to_users
            WHERE id=:id AND user_id=:user_id",
            [
                'id' => $id,
                'user_id' => $_SESSION['user']
            ]
        );
    }

    public function getLimit(int $id) {
        return $this->db->query(
            "SELECT limits FROM expense_category_assigned_to_users WHERE id = :id",
            [
                'id' => $id
            ]
        )->find();

    }

    public function getSumOfExpenses(int $categoryId, string $date) {

        $expenseDate = new DateTime($date);
        $year = $expenseDate->format('Y');
        $month = $expenseDate->format('m');


        return $this->db->query(
            "SELECT SUM(amount) as SumOfExpenses FROM expenses WHERE YEAR(date_of_expense)= :year AND MONTH(date_of_expense)=:month AND expense_category_assigned_to_user_id=:categoryId", [
                'year' => $year,
                'month' => $month,
                'categoryId' => $categoryId
            ]
        )->find();
    }
}
