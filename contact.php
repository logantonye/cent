
<?php
include "header.php";
?>


            <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-spring">
                    <img src="assets/img/breadcrumb/br-shape-1.png" alt="Image" class="br-shape-one xs-none">
                    <img src="assets/img/breadcrumb/br-shape-2.png" alt="Image" class="br-shape-two xs-none">
                    <img src="assets/img/breadcrumb/br-shape-3.png" alt="Image" class="br-shape-three moveHorizontal sm-none">
                    <img src="assets/img/breadcrumb/br-shape-4.png" alt="Image" class="br-shape-four moveVertical sm-none">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-8 col-sm-8">
                                <div class="breadcrumb-title">
                                    <h2>Contact Us</h2>
                                    <ul class="breadcrumb-menu list-style">
                                        <li><a href="index.html">Home </a></li>
                                        <li>Contact</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-4 col-sm-4 xs-none">
                                <div class="breadcrumb-img">
                                    <img src="assets/img/breadcrumb/br-shape-5.png" alt="Image" class="br-shape-five animationFramesTwo">
                                    <img src="assets/img/breadcrumb/br-shape-6.png" alt="Image" class="br-shape-six bounce">
                                    <img src="assets/img/service/breadcrumb-12.png" alt="Image">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- Contact section start -->
                <section class="contact-wrap pt-100">
                    <div class="container">
                        <div class="row justify-content-center pb-75">
                            <div class="col-lg-4 col-md-6">
                                <div class="contact-item">
                                    <span class="contact-icon" style="background-color:#fcb529">
                                        <i class="flaticon-map"></i>
                                    </span>
                                    <div class="contact-info">
                                        <h3>Our Location</h3>
                                        <p>2767 Sunrise Street, 10th Avenue, New York, USA
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="contact-item">
                                     <span class="contact-icon" style="background-color:#fcb529">
                                        <i class="flaticon-email-2"></i>
                                    </span>
                                    <div class="contact-info">
                                        <h3>Email Us</h3>
                                        <a href="mailto:support@centenialtrade.com">support@centenialtrade.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="contact-item">
                                     <span class="contact-icon" style="background-color:#fcb529">
                                        <i class="flaticon-phone-call"></i>
                                    </span>
                                    <div class="contact-info">
                                        <h3>Call us</h3>
                                        <a href="tel:88098787868">+44 587 154765</a>
                                        <a href="tel:88098787869">+55 576 234532</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comp-map pb-100">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8385385572983!2d144.95358331584498!3d-37.81725074201705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia!5e0!3m2!1sen!2sbd!4v1612419490850!5m2!1sen!2sbd"></iframe>
                        </div>
                    </div>
                    <div class="contact-form-area ptb-100 bg-albastor">
                        <img src="assets/img/contact-shape-1.png" alt="Image" class="contact-shape-one animationFramesTwo">
                        <img src="assets/img/contact-shape-2.png" alt="Image" class="contact-shape-two bounce">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                                    <div class="content-title style1 text-center mb-40">
                                        <span>Send Us A Message</span>
                                        <h2>Do You have Any Questions?</h2>
                                    </div>
                                    <div class="contact-form">
                                        <form class="form-wrap" id="contactForm">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="name" placeholder="Your Name*" id="name"
                                                            required data-error="Please enter your name">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" name="email" id="email" required
                                                            placeholder="Your Email*" data-error="Please enter your email*">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="number" name="phone" id="phone" required
                                                            placeholder="Phone Number" data-error="Please enter your phone number">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="msg_subject" placeholder="Subject"
                                                            id="msg_subject" required data-error="Please enter your subject">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group v1">
                                                        <textarea name="message" id="message" placeholder="Your Messages.."
                                                            cols="30" rows="10" required
                                                            data-error="Please enter your message"></textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn style1 w-100 d-block">Send Message </button>
                                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Contact section end -->

            </div>
            <!-- Content Wrapper End -->

 
<?php
include "footer.php";
?>

        </div>
        <!-- Page Wrapper End -->
        
        <!-- Back-to-top button Start -->
         <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>
        <!-- Back-to-top button End -->

       <!-- Link of JS files -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/form-validator.min.js"></script>
        <script src="assets/js/contact-form-script.js"></script>
        <script src="assets/js/aos.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/odometer.min.js"></script>
        <script src="assets/js/fancybox.js"></script>
        <script src="assets/js/jquery.appear.js"></script>
        <script src="assets/js/tweenmax.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

</html>