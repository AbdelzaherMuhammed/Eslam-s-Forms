<?php

class SecondTask
{
    private $firstName;
    private $lastName;
    private $areaCode;
    private $phone;
    private $email;
    private $address;

    public function __construct($firstName, $lastName, $areaCode, $phone, $email, $address)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->areaCode = $areaCode;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
    }

    public function validate()
    {
        $errors = [];

        if (empty($this->firstName)) {
            $errors['firstName'] = "First Name is required.";
        }
        if (empty($this->lastName)) {
            $errors['lastName'] = "Last Name is required.";
        }
        if (empty($this->areaCode) || empty($this->phone)) {
            $errors['phone'] = "Phone Number is required.";
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email address is not valid.";
        }
        if (empty($this->address['streetAddress']) || empty($this->address['city']) ||
            empty($this->address['state']) || empty($this->address['zip']) || empty($this->address['country'])) {
            $errors['address'] = "Delivery Address is required.";
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
    $address = [
        'streetAddress' => $_POST['streetAddress'],
        'streetAddress2' => $_POST['streetAddress2'],
        'city' => $_POST['city'],
        'state' => $_POST['state'],
        'zip' => $_POST['zip'],
        'country' => $_POST['country']
    ];

    $delivery = new SecondTask(
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['areaCode'],
        $_POST['phone'],
        $_POST['email'],
        $address
    );

    $errors = $delivery->validate();
    if (empty($errors)) {
        if ($delivery->save()) {
            echo "Delivery information saved successfully!";
        } else {
            echo "Failed to save delivery information!";
        }
    } else {
        foreach ($errors as $field => $error) {
            echo "<p>$error</p>";
        }
    }
}

?>
