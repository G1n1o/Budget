<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class UserService
{
    public function __construct(private Database $db)
    {
    }

    public function isEmailTaker(string $email)
    {
        $emailCount = $this->db->query(
            "SELECT COUNT(*) FROM users WHERE email = :email",
            [
                'email' => $email
            ]
        )->count();

        if ($emailCount > 0) {
            throw new ValidationException(['email' => 'Podany email istenieje już w bazie']);
        }
    }

    public function create(array $formData)
    {

        $password = password_hash($formData['password'], PASSWORD_BCRYPT, ["cost" => 12]);


        $this->db->query(
            "INSERT INTO users(email, password, user_name, last_name)
            VALUES(:email, :password, :user_name, :last_name)",
            [
                'email' => $formData['email'],
                'password' => $password,
                'user_name' => $formData['username'],
                'last_name' => $formData['lastname']

            ]
        );
        session_regenerate_id();

        $_SESSION['user'] = $this->db->id();
        $_SESSION['userName'] = $formData['username'];
    }

    public function login(array $formData)
    {
        $user = $this->db->query(
            "SELECT * FROM users WHERE email=:email",
            [
                'email' => $formData['email']
            ]
        )->find();


        $passwordMatch = password_verify(
            $formData['password'],
            $user['password'] ?? ''
        );

        if (!$user || !$passwordMatch) {
            throw new ValidationException(['password' => ['Niepoprawne dane logowania']]);
        }
        session_regenerate_id();
        $_SESSION['user'] = $user['id'];
        $_SESSION['userName'] = $user['user_name'];
    }

    public function categoryAssignment()
    {
        $this->db->query(
            "INSERT INTO expense_category_assigned_to_users (name, user_id)
        SELECT name, :user_id FROM expense_category_default",
            [
                'user_id' =>  $_SESSION['user']
            ]
        );
        $this->db->query(
            "INSERT INTO income_category_assigned_to_users (name, user_id)
            SELECT name, :user_id FROM income_category_default",
            [
                'user_id' =>  $_SESSION['user']
            ]
        );
    }

    public function getCategories()
    {
        $expensesCategory = $this->db->query(
            "SELECT id, name FROM expense_category_assigned_to_users WHERE user_id = :user_id",
            [
                'user_id' =>  $_SESSION['user']
            ]
        )->findAll();

        $_SESSION['expensesCategory'] = $expensesCategory;

        $incomesCategory = $this->db->query(
            "SELECT id, name FROM income_category_assigned_to_users WHERE user_id = :user_id",
            [
                'user_id' =>  $_SESSION['user']
            ]
        )->findAll();

        $_SESSION['incomesCategory'] = $incomesCategory;
    }


    public function logout()
    {
        //unset($_SESSION['user']);
        session_destroy();

        //session_regenerate_id();
        $params = session_get_cookie_params();
        setcookie(
            'PHPSESSID',
            '',
            time() - 3600,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }
}
