<?php
include 'contactDB.php';
include 'createRoleTable.php';
$nameErr = $mobErr = $cnameErr = $dnameErr = $emailErr = $cityErr = $repassErr = "";

if ((isset($_REQUEST['submit_reg_btn'])) && (isset($_REQUEST['radio']))) {
    $type = $_REQUEST['radio'];
    $name = $_REQUEST['UserName'];
    $mobno = $_REQUEST['MobNo'];
    $cname = $_REQUEST['CompanyName'];
    $dname = $_REQUEST['DesigName'];
    $email = $_REQUEST['email'];
    $city = $_REQUEST['City'];
    $password = $_REQUEST['Password'];
    $repassword = $_REQUEST['rePassword'];

    if (empty($name)) {
        $nameErr = "* Enter The Name";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only Letters and White Spaces Allowed.";
    } elseif (empty($mobno)) {
        $mobErr = "* Plese Fill the Mobile Number";
    } elseif (preg_match("/^[0-9]*$/", $mobno)) {
        $mobErr = "* Fill a Valid Numeber";
    }
    //  elseif (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $mobno)) {
    //     $mobErr = "* Fill a Valid Numeber";
    // }
    elseif (empty($cname)) {
        $cnameErr = "* Plese Fill the Company Name";
    } elseif (empty($dname)) {
        $dnameErr = "* What's your Position";
    } elseif (empty($email)) {
        $mobErr = "* Please Fill the Mobile Number";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "* Filled a valid email address";
    } elseif (empty($city)) {
        $cityErr = "* Plese Fill the Mobile Number";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $city)) {
        $cityErr = "* Enter Valid City Name";
    } elseif (!($password === $repassword)) {
        $repassErr = "* Password is not Matched";
    } else {
        $sql = "INSERT INTO $roletablename VALUES ('$type','$name','$mobno','$cname','$dname','$email','$city','$password')";
        if (mysqli_query($conn, $sql)) {
            function_alert("Record inserted successfully");
        } else {
            // echo 'Could not insert record: ' . mysqli_error($conn);            
            function_alert("email already Registered");
        }
    }
    mysqli_close($conn);
}

if (isset($_REQUEST['submit_lgin_btn'])) {
    session_start();
    $email = $_REQUEST['email'];
    $password = $_REQUEST['Password'];

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM $roletablename WHERE email='" . $email . "' AND password='" . $password . "'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $type = $row["type"];
            $name = $row["name"];
            if ($type == 1) {
                $login_user = $row["name"];
                $_SESSION['login_user'] = $name;
                header("location: post-jobs");
            } else {
                $login_user = $row["name"];
                $_SESSION['login_user'] = $name;
                header("location: search-jobs");
            }
        }
    } else {
        function_alert("All fields are required!");
    }

    $conn->close();
}

function function_alert($message)
{
    echo "<script>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon-16x16.png">
    <title>Hirerekrut</title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/123456abc.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap-drawer.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
</head>
<style>
    .counter-sec-outer {
        background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/bg-2_02.jpg');
        background-position: center;
        background-size: cover;
    }

    .outer-banner-section-image {
        background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/headerimg.jpeg');
        background-size: cover;
    }

    .sec_value {
        background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/value.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .container-recruitment-img {
        background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Recruitmentsolution.png');
        background-size: cover;
    }

    .outer-payrollservice-img {
        background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/payroll.png');
        background-size: cover;
        background-position: center;
    }

    .outer-banner-jobseeker-image {
        background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/jobseeker.png');
        background-size: cover;
        background-position: center;
    }
</style>

<body>
    <header class="header">

        <nav class="navbar navbar-expand-lg fixed-top py-3 navbar-1 morez-index">
            <div class="container">
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <img class="nav-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Logo.png" alt="MDB Logo" loading="lazy" />
                </a>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active-1">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'custom-menu',
                                'container_class' => 'custom-menu-class'
                            ));
                            ?>
                        </li>
                        <li class="nav-item active-1">
                            <button type="button" class="btn nav-btn" data-toggle="drawer" data-target="#drawer-1">Login</button>
                            <div class="drawer drawer-right slide" tabindex="-1" role="dialog" aria-labelledby="drawer-1-title" aria-hidden="true" id="drawer-1">
                                <div class="drawer-content drawer-content-scrollable" role="document">
                                    <div class="drawer-header">
                                        <h4 class="drawer-title" id="drawer-1-title">Login</h4>
                                    </div>
                                    <div class="drawer-body">
                                        <form class="contact-form" id="login-form" method="POST" action="">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12 w-100">
                                                        <input type="email" name="email" placeholder="Registered Email ID" required></input>
                                                        <span class="errorinput"><?php echo $emailErr; ?> </span>
                                                    </div>
                                                    <div class="col-lg-12 w-100">
                                                        <input type="password" name="Password" placeholder="Password" required></input>
                                                        <span class="errorinput"><?php echo $passErr; ?> </span>
                                                    </div>
                                                    <div class="col-lg-12 ">
                                                        <button type="submit" name="submit_lgin_btn" value="submit" class="submit" onclick="save_data();">Login</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="drawer" aria-label="Close">Close</button>
                                    </div>
                                    <div class="drawer-footer">
                                        <button type="button" class="btn btn-danger btn-block" data-dismiss="drawer" aria-label="Close">Close</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item active-1">
                            <button type="button" class="btn nav-btn" data-toggle="drawer" data-target="#drawer-2">Registration</button>
                            <div class="drawer drawer-left slide" tabindex="-1" role="dialog" aria-labelledby="drawer-2-title" aria-hidden="true" id="drawer-2">
                                <div class="drawer-content" role="document">
                                    <div class="drawer-header">
                                        <h4 class="drawer-title" id="drawer-2-title">Registration</h4>
                                    </div>
                                    <div class="drawer-body">
                                        <form class="contact-form" id="registration-form" method="POST" action="">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12 w-100">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6"><input type="radio" name="radio" value="1"> <label for="postjob">Post Job</label></div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6"><input type="radio" name="radio" value="0"> <label for="jobseeker">Job Seeker</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 w-100">
                                                        <input type="text" name="UserName" placeholder="Name" value="<?php echo $_REQUEST['UserName']; ?>" required></input>
                                                        <span class="errorinput"><?php echo $nameErr; ?> </span>
                                                    </div>
                                                    <div class="col-lg-12 w-100">
                                                        <input type="text" name="MobNo" placeholder="Contact Number" value="<?php echo $_REQUEST['MobNo']; ?>" required></input>
                                                        <span class="errorinput"><?php echo $mobErr; ?> </span>
                                                    </div>
                                                    <div class="col-lg-12 w-100">
                                                        <input type="text" name="CompanyName" placeholder="Company Name" value="<?php echo $_REQUEST['CompanyName']; ?>" required></input>
                                                        <span class="errorinput"><?php echo $cnameErr; ?> </span>
                                                    </div>
                                                    <div class="col-lg-12 w-100">
                                                        <input type="text" name="DesigName" placeholder="Designation Name" value="<?php echo $_REQUEST['DesigName']; ?>" required></input>
                                                        <span class="errorinput"><?php echo $dnameErr; ?> </span>
                                                    </div>
                                                    <div class="col-lg-12 w-100">
                                                        <input type="email" name="email" placeholder="Enter your email" value="<?php echo $_REQUEST['email']; ?>" required></input>
                                                        <span class="errorinput"><?php echo $emailErr; ?> </span>
                                                    </div>
                                                    <div class="col-lg-12 w-100">
                                                        <input type="text" name="City" placeholder="City" value="<?php echo $_REQUEST['City']; ?>" required></input>
                                                        <span class="errorinput"><?php echo $cityErr; ?> </span>
                                                    </div>
                                                    <div class="col-lg-12 w-100">
                                                        <input type="password" name="Password" placeholder="Set Password" value="<?php echo $_REQUEST['Password']; ?>" required></input>
                                                    </div>
                                                    <div class="col-lg-12 w-100">
                                                        <input type="password" name="rePassword" placeholder="Confirm Password" value="<?php echo $_REQUEST['Password']; ?>" required></input>
                                                        <span class="errorinput"><?php echo $repassErr; ?> </span>
                                                    </div>
                                                    <div class="col-lg-12 ">
                                                        <button type="submit" name="submit_reg_btn" value="submit" class="submit" onclick="save_data();">Register</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="drawer-footer">
                                        <button type="button" class="btn btn-danger btn-block" data-dismiss="drawer" aria-label="Close">Close</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
</body>

</html>