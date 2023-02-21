<?php include_once "includes/header.php"; ?>

    <!-- Start Banner -->
    <div id="bannerC" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#bannerC" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#bannerC" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#bannerC" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#bannerC" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#bannerC" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./images/banner1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./images/banner2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./images/banner3.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./images/banner4.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./images/banner5.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerC" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerC" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- End Banner -->

    <!-- Start Reservation -->
    <section class="bg-light text-center division">
        <?php
            if (isset($_SESSION["loggedin"])) {
                echo "<div>
                    <div class='h5 pb-2'>Welcome back <span class='text-success'>". $_SESSION["username"] ."</span>! We knew you couldn't resist our menu. Your belly knows best.</div>
                    <button class='btn btn-success btn-lg' data-bs-toggle='modal' data-bs-target='#reserve'>Make A Reservation</button>
                </div>";
            }
        ?>
        <div class="container py-5" data-aos="fade-up" data-aos-duration="1500">
            <div class="d-md-flex align-items-center align-self-center">
                <div class="h1 pe-md-3">
                    <div class="text-warning">MeatHub</div>
                    <div class="my-4">"MEAT YOUR MAKER"</div>
                </div>
                <img class="img-fluid w-75 d-none d-md-block rounded-2" src="images/reserve.jpg" alt="">
            </div>
        </div>
    </section>
    <!-- End Reservation -->

    <!-- Start Contact Us -->
    <section id="contactus" class="division">
        <div class="container py-5" data-aos="fade-up" data-aos-duration="1500">
            <div class="h2">Get in touch</div>
            <div class="h6 py-3">
                <p>
                    Want to get in touch? We'd love to hear from you. Here's how you can reach us...
                </p>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4 text-center">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <div class="h1">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="h5 pb-3">Phone Numbers</div>
                        <p><a href="tel:09065716141" class="text-decoration-none text-black">0906-571-6141</a>
                        </p>
                        <p><a href="tel:09065716142" class="text-decoration-none text-black">0906-571-6142</a>
                        </p>
                        <p><a href="tel:09065716143" class="text-decoration-none text-black">0906-571-6143</a>
                        </p>
                        <p><a href="tel:09065716144" class="text-decoration-none text-black">0906-571-6144</a>
                        </p>
                        <p><a href="tel:09065716145" class="text-decoration-none text-black">0906-571-6145</a>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light">
                        <div class="h1">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div class="h5 pb-3">Emails</div>
                        <p><a href="mailto:support@meathub.site"
                                class="text-decoration-none text-black">support@meathub.site</a></p>
                        <p><a href="mailto:rb.support@meathub.site"
                                class="text-decoration-none text-black">rb.support@meathub.site</a></p>
                        <p><a href="mailto:ap.support@meathub.site"
                                class="text-decoration-none text-black">ap.support@meathub.site</a></p>
                        <p><a href="mailto:co.support@meathub.site"
                                class="text-decoration-none text-black">co.support@meathub.site</a></p>
                        <p><a href="mailto:so.support@meathub.site"
                                class="text-decoration-none text-black">so.support@meathub.site</a></p>
                    </div>
                </div>
            </div>
            <div class="text-center py-5">
                <p class="h2">
                    Here you can make a reservation or just walkin to our restaurant
                </p>
                <button class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#reserve">
                    Make A Reservation
                </button>
            </div>
            <div id="map" class="row">
                <iframe class="col-lg-12 align-self-center"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.747244000973!2d121.02182529999999!3d14.5564414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c90584047155%3A0xe40b7062b9faf9a2!2sAyala%20Ave%2C%20Makati%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1670041173426!5m2!1sen!2sph"
                    width="600" height="450" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
    <!-- End Contact Us -->
    <div class="container">
        <div class="embedsocial-hashtag" data-ref="b587628f38e9894bd7969309ad599b5859cde7c9"></div> <script> (function(d, s, id) { var js; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "https://embedsocial.com/cdn/ht.js"; d.getElementsByTagName("head")[0].appendChild(js); }(document, "script", "EmbedSocialHashtagScript")); </script>
    </div>

<?php include_once "includes/footer.php"; ?>