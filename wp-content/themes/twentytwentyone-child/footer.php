<section class="footer-sec">
    <footer class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 center">
                <a href="#" class="brand-logo">
                    <img class="footer-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Logo.png" style="filter: invert(100%);">
                </a>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-5">
                <div class="SupportedContent">
                    <h3 class="content-heading">Company</h3>
                    <ul class="footer-nav">
                        <li class="footer-item active">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'custom-footer-two',
                                'container_class' => 'custom-menu-class'
                            ));
                            ?>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-5 col-sm-5">
                <div class="SupportedContent">
                    <h3 class="content-heading">Services</h3>
                    <ul class="footer-nav">
                        <li class="footer-item active">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'custom-footer-first',
                                'container_class' => 'custom-menu-class'
                            ));
                            ?>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 center">
                <div class="row center">
                    <h4>Connect with us</h4>
                </div>
                <div class="row center py-3">
                    <ul class="inline-list">
                        <li>
                            <a class="social-link" href="https://linkedin.com/company/hirerecruit">
                                <div class="icon_cls_column">
                                    <i class="fa fa-linkedin"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="social-link" href="https://www.facebook.com/profile.php?id=100066919565766">
                                <div class="icon_cls_column">
                                    <i class="fa fa-facebook-f"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="social-link" href="">
                                <div class="icon_cls_column">
                                    <i class="fa fa-instagram"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row center py-3">
                    <div class="container">
                        <h4 class="text-uppercase">Hier Rekrut</h4>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <hr>
    <div class="footer-copyright text-center">© 2022 Copyright:
        <a href="https://technogetic.com/">Technogetic</a>
    </div>

</section>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
<!-- <script src="<?php //echo get_stylesheet_directory_uri(); 
                    ?>/assets/js/jquery.counterup.min.js"></script> -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js?ver=5.2.3'></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/script.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/bootstrap-drawer.js"></script>