<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <div class="register-form-wrapper">
        <form action="register_process.php" method="POST" class="register-form">
            <div class="register-header">
                <h1>Artspace</h1>
                <h2>Register</h2>
            </div>
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            
            <h3>Where do you live?</h3>
            <input type="text" name="street" placeholder="Street" required>
            <input type="text" name="housenumber" placeholder="House Number" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="zipcode" placeholder="zipcode" required>
            <input type="text" name="country" placeholder="Country" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="text" name="mobile" placeholder="Mobile Number">
            
            <h3>Account Details</h3>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="member_number" placeholder="Member Number : 2001" required>
            
            <div class="terms">
                <input type="checkbox" name="terms" required checked>
                <label for="terms">I agree to the <a href="terms.php" target="_blank">Terms and Conditions</a></label>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>