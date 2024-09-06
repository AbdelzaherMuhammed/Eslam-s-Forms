<?php

class FirstForm
{
    private $name;
    private $email;
    private $age;
    private $gender;
    private $birthday;
    private $phone;
    private $biography;
    private $fullName;

    public function __construct($fullName, $email, $age, $gender, $birthday, $phone, $biography) {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->age = $age;
        $this->gender = $gender;
        $this->birthday = $birthday;
        $this->phone = $phone;
        $this->biography = $biography;
    }

    public function validate() {
        $errors = [];

        if (strlen($this->fullName) < 2 || strlen($this->fullName) > 50) {
            $errors['fullName'] = "Full name should be between 2 and 50 characters long.";
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
        }

        if ($this->age <= 0 || !is_numeric($this->age)) {
            $errors['age'] = "Age should be a positive number.";
        }

        if (empty($this->gender)) {
            $errors['gender'] = "Gender is required.";
        }

        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $this->birthday)) {
            $errors['birthday'] = "Invalid birthday format. Use YYYY-MM-DD.";
        }

        if (!preg_match("/^\d{3}-\d{3}-\d{4}$/", $this->phone)) {
            $errors['phone'] = "Phone number format is invalid. Use 123-456-7890.";
        }

        if (empty($this->biography)) {
            $errors['biography'] = "Biography is required.";
        }

        return $errors;
    }
    public function save()
    {
        // Save to database or any other storage
        return true;
    }
}

// Processing the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer = new FirstForm(
        $_POST['name'],
        $_POST['email'],
        $_POST['age'],
        $_POST['gender'],
        $_POST['birthday'],
        $_POST['phone'],
        $_POST['fullName'],
        $_POST['biography']
    );

    $errors = $customer->validate();
    if (empty($errors)) {
        if ($customer->save()) {
            echo "Customer registered successfully!";
        } else {
            echo "Failed to register customer!";
        }
    } else {
        foreach ($errors as $field => $error) {
            echo "<p>$error</p>";
        }
    }
}

?>
