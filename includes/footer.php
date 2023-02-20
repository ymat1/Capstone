<?php
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'meathubdb';
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    // We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
    $stmt = $con->prepare('SELECT fullname, phonenumber, email FROM users WHERE id = ?');
    // In this case we can use the account ID to get the account info.
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($fullname, $phonenumber, $email);
    $stmt->fetch();
    $stmt->close();
?>
        </article>
    </main>

    <!-- Start Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; 2022 Group10-WD30 KodeGo</p>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- back to top btn -->
    <a href="#" id="backtoTop">
        <i class="bi bi-arrow-up-square-fill h1 text-warning"></i>
    </a>

    <!-- Main Modal -->
    <div class="modal fade" id="reserve" tabindex="-1" data-bs-backdrop="static" aria-labelledby="reserveLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-light">
                <div class="modal-header bg-success">
                    <div class="modal-title text-white h4" id="reserveLabel">TABLE RESERVATION</div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 align-self-center text-center py-3">
                            <div class="h4 pb-3">Contact Us</div>
                            <p class="my-0"><i class="bi bi-telephone-fill"></i><a href="tel:09065716141"
                                    class="text-decoration-none text-black"> 0906-571-6141</a></p>
                            <p class="my-0 pb-4"><i class="bi bi-envelope-fill"></i><a href="mailto:meathub@support.com"
                                    class="text-decoration-none text-black"> meathub@support.com</a></p>
                        </div>
                        <div class="col-lg-6">
                            <form id="reservation">
                                <div class="h6 text-center">Please fill out this form</div>
                                <div class="mb-3 px-3">
                                    <input type="text" name="full_name" class="form-control" placeholder="Full Name" id="fullName" value="<?=$fullname?>">
                                    <small id="nameError"></small>
                                </div>
                                <div class="mb-3 px-3">
                                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number" id="phone" value="<?=$phonenumber?>">
                                    <small id="phoneError"></small>
                                </div>
                                <div class="mb-3 px-3">
                                    <input type="text" name="email" class="form-control" placeholder="Email" id="email" value="<?=$email?>">
                                    <small id="emailError"></small>
                                </div>
                                <div class="mb-3 px-3">
                                    <select class="form-control" name="number_of_guests" id="numberOfGuests">
                                        <option value="0" selected disabled>Number Of Guests</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                    </select>
                                    <small id="guestError"></small>
                                </div>
                                <div class="mb-3 px-3">
                                    <input type="text" name="date_time" class="form-control" id="dateAndTime" placeholder="Select Date and Time">
                                    <small id="dateError"></small>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Close">
                                    <input type="submit" class="btn btn-success" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="submitted" tabindex="-1" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="submitLabel">
        <div class="modal-dialog">
            <div class="modal-content bg-light">
                <div class="modal-header bg-success">
                    <div class="modal-title text-white h4" id="submitLabel">TABLE RESERVATION</div>
                </div>
                <div class="modal-body">
                    Your table reservation has been received and we look forward to welcoming you soon.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    <!-- nav js -->
    <script type="text/JavaScript" src="./js/nav.js"></script>
    <!-- Emailjs -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <!-- Date and Time js -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="./js/datetime.js"></script>
    <!-- Modal js -->
    <script src="./js/modal.js"></script>
</body>

</html>