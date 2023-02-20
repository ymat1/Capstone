<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, otherwise redirect to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ./login.php");
        exit;
    }
    
    // Include config file
    require_once "./includes/db.php";
    
    // Define variables and initialize with empty values
    $new_fullname = $new_phone = "";
    $new_fullname_err = $new_phone_err = $update_success = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        // Validate full name
        if(empty(trim($_POST["new_fullname"]))) {
            $new_fullname_err = "Please enter your full name.";
        }
        elseif(!preg_match('/^([A-Za-z]+){3,}\s([A-Za-z]+){3,}$/', trim($_POST["new_fullname"]))) {
            $new_fullname_err = "Name and Surname are required and can only contain letters.";
        }
        else{
            $new_fullname = trim($_POST["new_fullname"]);
        }

        // Validate phone number
        if(empty(trim($_POST["new_phone"]))) {
            $new_phone_err = "Please enter your phone number.";
        }
        elseif(!preg_match('/^([0-9]{11,11})$/', trim($_POST["new_phone"]))) {
            $new_phone_err = "Please enter a valid phone number.";
        }
        else{
            $new_phone = trim($_POST["new_phone"]);
        }
            
        // Check input errors before updating the database
        if(empty($new_fullname_err) && empty($new_phone_err)){
            // Prepare an update statement
            $sql = "UPDATE users SET fullname = ?, phonenumber = ? WHERE id = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssi", $param_fullname, $param_phone, $param_id);
                
                // Set parameters
                $param_fullname = $new_fullname;
                $param_phone = $new_phone;
                $param_id = $_SESSION["id"];
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Name and phone updated successfully. Redirect to Profile page
                    sleep(1);
                    header("location: ./profile.php");
                    exit();
                } else{
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeatHub</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./images/icon/favicon.ico">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Owl carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Owl carousel theme CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Date and time Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
</head>

<body class="bg-success">

    <div class="container pt-5 position-absolute top-50 start-50 translate-middle">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-9 col-lg-6">
                <div class="card">
                    <div class="card-body p-5">
                        <h2 class="text-uppercase mb-5 fw-bold text-success">Update Information</h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                            <div class="form-floating mb-3">
                                <input type="text" name="new_fullname" class="form-control <?php echo (!empty($new_fullname_err)) ? 'is-invalid' : ''; ?>" id="floatingNewName" placeholder="New full name" value="<?php echo $new_fullname; ?>">
                                <label for="floatingNewName">New full name</label>
                                <span class="invalid-feedback"><?php echo $new_fullname_err; ?></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" name="new_phone" class="form-control <?php echo (!empty($new_phone_err)) ? 'is-invalid' : ''; ?>" id="floatingNewPhone" placeholder="New phone number">
                                <label for="floatingNewPhone">New phone number</label>
                                <span class="invalid-feedback"><?php echo $new_phone_err; ?></span>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-secondary ml-2" href="./profile.php">Cancel</a>
                                <input type="submit" class="btn btn-primary" value="Confirm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- AOS Init -->
    <script type="text/JavaScript" src="./js/aos.js"></script>

    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- owl carousel js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- external carousel js -->
    <script src="./js/carousel.js"></script>

    <!-- back to top js -->
    <script type="text/JavaScript" src="./js/btt.js"></script>
    <!-- Emailjs -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <!-- Date and Time js -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="./js/datetime.js"></script>
</body>

</html>