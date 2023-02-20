<?php include_once "./includes/header.php"; ?>
<?php require_once "./includes/db.php";
    
    // Define variables and initialize with empty values
    $fullname = $phone = $email = $username = $password = $confirm_password = "";
    $fullname_err = $phone_err = $email_err = $username_err = $password_err = $confirm_password_err = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Validate full name
        if(empty(trim($_POST["fullname"]))) {
            $fullname_err = "Please enter your full name.";
        }
        elseif(!preg_match('/^([A-Za-z]+){3,}\s([A-Za-z]+){3,}$/', trim($_POST["fullname"]))) {
            $fullname_err = "Name and Surname are required and can only contain letters.";
        }
        else{
            $fullname = trim($_POST["fullname"]);
        }

        // Validate phone number
        if(empty(trim($_POST["phone"]))) {
            $phone_err = "Please enter your phone number.";
        }
        elseif(!preg_match('/^([0-9]{11,11})$/', trim($_POST["phone"]))) {
            $phone_err = "Please enter a valid phone number.";
        }
        else{
            $phone = trim($_POST["phone"]);
        }

        // Validate email
        if(empty(trim($_POST["email"]))) {
            $email_err = "Please enter an email address.";
        }
        elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please enter a valid email address.";
        }
        else{
            $email = trim($_POST["email"]);
        }

        // Validate username
        if(empty(trim($_POST["username"]))) {
            $username_err = "Please enter a username.";
        }
        elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
            $username_err = "Username can only contain letters, numbers, and underscores.";
        }
        else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE username = ?";
            
            if($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                // Set parameters
                $param_username = trim($_POST["username"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)) {
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1) {
                        $username_err = "This username is already taken.";
                    }
                    else{
                        $username = trim($_POST["username"]);
                    }
                }
                else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        
        // Validate password
        if(empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";     
        }
        elseif(strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have atleast 6 characters.";
        }
        else{
            $password = trim($_POST["password"]);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm password.";     
        }
        else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Password did not match.";
            }
        }
        
        // Check input errors before inserting in database
        if(empty($fullname_err) && empty($phone_err) && empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
            
            // Prepare an insert statement
            $sql = "INSERT INTO users (fullname, phonenumber, email, username, password) VALUES (?, ?, ?, ?, ?)";
            
            if($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssss", $param_fullname, $param_phone, $param_email, $param_username, $param_password);
                
                // Set parameters
                $param_fullname = $fullname;
                $param_phone = $phone;
                $param_email = $email;
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    sleep(1);
                    header("location: ./login.php");
                }
                else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        
        // Close connection
        mysqli_close($link);
    }
?>

    <section>
        <div class="container py-5">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-9 col-lg-6">
                    <div class="card border-success">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase mb-5 fw-bold text-success">Sign Up</h2>
                            <p class="pb-3">Please fill this form to create an account.</p>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" name="fullname" class="form-control <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" id="floatingFullName" placeholder="Full Name" value="<?php echo $fullname; ?>">
                                    <label for="floatingFullName">Full name</label>
                                    <span class="invalid-feedback"><?php echo $fullname_err; ?></span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="tel" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" id="floatingPhone" placeholder="Phone number" value="<?php echo $phone; ?>">
                                    <label for="floatingPhone">Phone number</label>
                                    <span class="invalid-feedback"><?php echo $phone_err; ?></span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" id="floatingEmail" placeholder="Email" value="<?php echo $email; ?>">
                                    <label for="floatingEmail">Email</label>
                                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="floatingUsername" placeholder="Username" value="<?php echo $username; ?>">
                                    <label for="floatingUsername">Username</label>
                                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="floatingPassword" placeholder="Password" value="<?php echo $password; ?>">
                                    <label for="floatingPassword">Password</label>
                                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" id="floatingConfirmPass" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
                                    <label  for="floatingConfirmPass">Confirm Password</label>
                                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                </div>
                                <div>
                                    <input type="submit" class="btn btn-success float-end" value="Sign Up">
                                </div>
                                <p>Already have an account? <a href="./login.php" class="text-decoration-none text-success">Login here</a>.</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include_once "./includes/footer.php"; ?>