<?php
class FourthTask {
    private $username;
    private $password;
    private $confirmPassword;
    private $gender;
    private $email;

    public function __construct($username, $gender, $email, $password, $confirmPassword) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->gender = $gender;
    }

    // Function to validate input fields
    public function validate() {
        $errors = [];

        if (strlen($this->username) < 5) {
            $errors['username'] = "The username must be at least 5 characters long.";
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "The email must be a valid email address.";
        }

        if (empty($this->password)) {
            $errors['password'] = "The password field is required.";
        }

        if ($this->password !== $this->confirmPassword) {
            $errors['confirmPassword'] = "The confirm password does not match the password.";
        }

        if (empty($this->gender)) {
            $errors['gender'] = "The gender field is required.";
        }

        return $errors;
    }

    // Function to "save" user data (for now, let's just output it)
    public function save() {
        echo "<p style='color:green;'>User registered successfully with the following details:</p>";
        echo "Username: $this->username <br>";
        echo "Email: $this->email <br>";
        echo "Gender: $this->gender <br>";
    }
}
?>
