<?php include_once "includes/header.php"; ?>
<?php
    include_once "includes/db.php";

    if (!isset($_SESSION['loggedin'])) {
        header('Location: ./index.php');
        exit;
    }
    
    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    
    $stmt = $link->prepare('SELECT fullname, phonenumber, email FROM users WHERE id = ?');
    
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($fullname, $phone, $email);
    $stmt->fetch();
    $stmt->close();
?>

    <section>
        <div class="container py-5">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-9 col-lg-6">
                    <div class="card border-success">
                        <div class="card-body py-5 text-center">
                            <div class="mb-3"><i class="display-1 text-success bi bi-person-circle"></i></div>
                            <h2 class="text-uppercase mb-3 fw-bold text-success">Account Information</h2>
                            <div class="pb-2">Username: <span class="fw-bold ps-2"><?=$_SESSION['username']?></span></div>
                            <div class="pb-2">Full Name: <span class="fw-bold ps-2"><?=$fullname?></span></div>
                            <div class="pb-2">Phone: <span class="fw-bold ps-2"><?=$phone?></span></div>
                            <div class="pb-2">Email: <span class="fw-bold ps-2"><?=$email?></span></div>
                            <div class="d-grid gap-3">
                                <a href="./update.php" class="btn btn-primary mx-5" type="button">Edit Profile</a>
                                <a href="./changepass.php" class="btn btn-primary mx-5" type="button">Change Password</a>
                                <a href="./includes/logout.php" class="btn btn-danger mx-5" type="button">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include_once "./includes/footer.php"; ?>