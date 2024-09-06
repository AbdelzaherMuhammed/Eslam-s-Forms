<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Information Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <form action="SecondTask.php" method="POST" id="deliveryForm">
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
            <small class="text-danger" id="firstNameError"></small>
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
            <small class="text-danger" id="lastNameError"></small>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" id="areaCode" name="areaCode" placeholder="Area Code">
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                </div>
            </div>
            <small class="text-danger" id="phoneError"></small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            <small class="text-danger" id="emailError"></small>
        </div>
        <div class="form-group">
            <label for="address">Delivery Address</label>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="Street Address">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control mt-2" id="streetAddress2" name="streetAddress2" placeholder="Street Address Line 2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control mt-2" id="city" name="city" placeholder="City">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control mt-2" id="state" name="state" placeholder="State/Province">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control mt-2" id="zip" name="zip" placeholder="Postal/Zip Code">
                </div>
                <div class="col-md-6">
                    <select class="form-control mt-2" name="country" id="country">
                        <option value="">Select</option>
                        <option value="Egypt">Egypt</option>
                        <option value="USA">USA</option>
                        <option value="Germany">Germany</option>
                    </select>
                </div>
            </div>
            <small class="text-danger" id="addressError"></small>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Next</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#deliveryForm").on("submit", function (e) {
            let valid = true;
            $(".text-danger").text(""); // Clear previous error messages

            if ($("#firstName").val().trim() === "") {
                $("#firstNameError").text("This field is required.");
                valid = false;
            }
            if ($("#lastName").val().trim() === "") {
                $("#lastNameError").text("This field is required.");
                valid = false;
            }
            if ($("#areaCode").val().trim() === "" || $("#phone").val().trim() === "") {
                $("#phoneError").text("This field is required.");
                valid = false;
            }
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test($("#email").val())) {
                $("#emailError").text("This field is required.");
                valid = false;
            }
            if ($("#streetAddress").val().trim() === "" || $("#city").val().trim() === "" ||
                $("#state").val().trim() === "" || $("#zip").val().trim() === "" || $("#country").val().trim() === "") {
                $("#addressError").text("This field is required.");
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
