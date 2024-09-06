<?php
class ThirdTask {
    private $firstName;
    private $lastName;
    private $email;
    private $mobileNo;
    private $password;
    private $confirmPassword;
    private $details;

    public function __construct($firstName, $lastName, $email, $mobileNo, $password, $confirmPassword, $details) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->mobileNo = $mobileNo;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->details = $details;
    }

    // Function to validate input fields
    public function validate() {
        $errors = [];

        if (strlen($this->firstName) < 5) {
            $errors['firstName'] = "The first name must be at least 5 characters long.";
        }

        if (empty($this->lastName)) {
            $errors['lastName'] = "The last name field is required.";
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "The email must be a valid email address.";
        }

        if (!is_numeric($this->mobileNo)) {
            $errors['mobileNo'] = "The mobile number must be a number.";
        }

        if (empty($this->password)) {
            $errors['password'] = "The password field is required.";
        }

        if ($this->password !== $this->confirmPassword) {
            $errors['confirmPassword'] = "The confirm password does not match the password.";
        }

        if (empty($this->details)) {
            $errors['details'] = "The details field is required.";
        }

        return $errors;
    }

    // Function to "save" user data (for now, let's just output it)
    public function save() {
        echo "<p style='color:green;'>User registered successfully with the following details:</p>";
        echo "First Name: $this->firstName <br>";
        echo "Last Name: $this->lastName <br>";
        echo "Email: $this->email <br>";
        echo "Mobile No: $this->mobileNo <br>";
        echo "Details: $this->details <br>";
    }
}
?>
