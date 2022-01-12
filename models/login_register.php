<?php

class Login extends Database
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function login()
    {
        if ($this->checkEmail() == false) {
            echo 2;
            exit();
        }

        if ($this->validateEmail() == false) {
            echo 3;
            exit();
        }

        if ($this->validatePassword() == false) {
            echo 4;
            exit();
        }

        if ($this->loginAccount() != false) {
            echo 1;
            exit();
        } else {
            echo 5;
            exit();
        }
    }

    private function checkEmail()
    {
        $result = '';
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    private function validateEmail()
    {
        $result = '';

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->email]);

        if ($stmt->rowCount() > 0) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    private function validatePassword()
    {
        $result = '';

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->email]);

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetchAll();

            foreach ($row as $pass) {
                $dbPass = $pass['password'];

                if (password_verify($this->password, $dbPass)) {
                    $result = true;
                } else {
                    $result = false;
                }

                return $result;
            }
        }
    }

    private function loginAccount()
    {
        $result = '';

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->email]);

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetchAll();
            return $_SESSION['user'] = $row['id'];
        } else {
            $result = false;
            return $result;
        }
    }
}

class Register extends Database
{
    private $name;
    private $email;
    private $password;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function create()
    {
        if ($this->checkName() == false) {
            echo 2;
            exit();
        }

        if ($this->checkEmail() == false) {
            echo 3;
            exit();
        }

        if ($this->checkPassword() == false) {
            echo 4;
            exit();
        }

        if ($this->validateEmail() == false) {
            echo 5;
            exit();
        }

        if ($this->validatePassword() == false) {
            echo 6;
            exit();
        }

        if ($this->createAccount() == false) {
            echo 7;
            exit();
        } else {
            echo 1;
            exit();
        }
    }

    private function checkName()
    {
        $result = '';

        if (empty($this->name)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function checkEmail()
    {
        $result = '';

        if (empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function checkPassword()
    {
        $result = '';

        if (empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function validateEmail()
    {
        $result = '';

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function validatePassword()
    {
        $result = '';
        $passwordRegex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,18}$/";

        if (!preg_match($passwordRegex, $this->password)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function createAccount()
    {
        $result = '';

        $sql = "INSERT INTO users (name, email, password)";
        $sql .= "VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $newPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->execute([$this->name, $this->email, $newPassword]);

        if ($stmt->rowCount() > 0) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}
