<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <form action="customer_register.php" method="POST" id="customerForm">
        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name">
            <small class="text-danger" id="fullNameError"></small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            <small class="text-danger" id="emailError"></small>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age">
            <small class="text-danger" id="ageError"></small>
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday">
            <small class="text-danger" id="birthdayError"></small>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="123-456-7890">
            <small class="text-danger" id="phoneError"></small>
        </div>
        <div class="form-group">
            <label for="biography">Biography</label>
            <textarea class="form-control" id="biography" name="biography" rows="4" placeholder="Tell us about yourself"></textarea>
            <small class="text-danger" id="biographyError"></small>
        </div>
        <div class="form-group" style="border: 1px solid #ced4da; padding: 10px; border-radius: 5px;">
            <label>Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                <label class="form-check-label" for="female">Female</label>
            </div>
            <small class="text-danger" id="genderError"></small>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="terms" name="terms">
            <label class="form-check-label" for="terms">I accept the terms and conditions</label>
            <small class="text-danger" id="termsError"></small>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save Customer</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#customerForm").on("submit", function (e) {
            let valid = true;
            $(".text-danger").text(""); // Clear previous error messages

            if ($("#fullName").val().length < 2 || $("#fullName").val().length > 50) {
                $("#fullNameError").text("Full name should be between 2 and 50 characters long");
                valid = false;
            }
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test($("#email").val())) {
                $("#emailError").text("Email address is not valid");
                valid = false;
            }
            if ($("#age").val() <= 0) {
                $("#ageError").text("Age should be a positive number");
                valid = false;
            }
            if (!$("input[name='gender']:checked").val()) {
                $("#genderError").text("Gender is required");
                valid = false;
            }
            const phonePattern = /^\d{3}-\d{3}-\d{4}$/;
            if (!phonePattern.test($("#phone").val())) {
                $("#phoneError").text("Invalid phone number format, valid formats are 123-456-7890");
                valid = false;
            }
            if ($("#biography").val().trim() === "") {
                $("#biographyError").text("Biography is required");
                valid = false;
            }
            if (!$("#terms").is(":checked")) {
                $("#termsError").text("You must accept the terms and conditions");
                valid = false;
            }

            if (!valid) {
                e.preventDefault(); // Prevent form submission if validation fails
            }
        });
    });
</script>
</body>
</html>
