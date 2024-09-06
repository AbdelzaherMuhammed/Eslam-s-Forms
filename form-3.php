<?php
require 'ThirdTask.php'; // Include the User class

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form inputs
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $mobileNo = $_POST['mobileNo'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $details = $_POST['details'];

    // Create a new User object
    $user = new ThirdTask($firstName, $lastName, $email, $mobileNo, $password, $confirmPassword, $details);

    // Validate the inputs and get errors (if any)
    $errors = $user->validate();

    if (empty($errors)) {
        // If no errors, save the user (for now, just output the data)
        $user->save();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Register User</title>
</head>
<body>
<div class="container mt-5">
    <h2>User Registration</h2>
    <form method="POST" action="">
        <!-- First Name -->
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name" value="<?php echo htmlspecialchars($_POST['firstName'] ?? ''); ?>">
            <?php if (!empty($errors['firstName'])): ?>
                <small class="text-danger"><?php echo $errors['firstName']; ?></small>
            <?php endif; ?>
        </div>

        <!-- Last Name -->
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name" value="<?php echo htmlspecialchars($_POST['lastName'] ?? ''); ?>">
            <?php if (!empty($errors['lastName'])): ?>
                <small class="text-danger"><?php echo $errors['lastName']; ?></small>
            <?php endif; ?>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
            <?php if (!empty($errors['email'])): ?>
                <small class="text-danger"><?php echo $errors['email']; ?></small>
            <?php endif; ?>
        </div>

        <!-- Mobile Number -->
        <div class="form-group">
            <label for="mobileNo">Mobile No</label>
            <input type="text" class="form-control" id="mobileNo" name="mobileNo" placeholder="Enter Mobile No" value="<?php echo htmlspecialchars($_POST['mobileNo'] ?? ''); ?>">
            <?php if (!empty($errors['mobileNo'])): ?>
                <small class="text-danger"><?php echo $errors['mobileNo']; ?></small>
            <?php endif; ?>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
            <?php if (!empty($errors['password'])): ?>
                <small class="text-danger"><?php echo $errors['password']; ?></small>
            <?php endif; ?>
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
            <?php if (!empty($errors['confirmPassword'])): ?>
                <small class="text-danger"><?php echo $errors['confirmPassword']; ?></small>
            <?php endif; ?>
        </div>

        <!-- Details -->
        <div class="form-group">
            <label for="details">Details</label>
            <textarea class="form-control" id="details" name="details" placeholder="Enter Details"><?php echo htmlspecialchars($_POST['details'] ?? ''); ?></textarea>
            <?php if (!empty($errors['details'])): ?>
                <small class="text-danger"><?php echo $errors['details']; ?></small>
            <?php endif; ?>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
