<?php
/* Template Name: Login / Registration */
get_header();
?>

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

<div class=" bg-primary w-100  d-flex justify-content-center align-itmes-center ">
    <div class="content text-center">
        <h2 class="text-white">HireRekrut Hiring Suite for Employes</h2>
        <h3 class="text-white">From Campus to Senior Level Hiring</h3>
    </div>
</div>

<section class="container-sec-one">
    <div class="container">
        <div class="py-5">
            <div class="row">
                <div class="col-sm-6 col-md-6 center">
                    <button type="button" class="hiring-reg-btn btn btn-primary" data-toggle="modal" data-target="#RegModal">Registration</button>
                    <div class="modal" id="RegModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">Registration</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
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

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 center">
                    <button type="button" class="hiring-login-btn btn btn-primary" data-toggle="modal" data-target="#LoginModal">Login</button>
                    <div class="modal" id="LoginModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Login</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="modal-body">
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
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php
get_footer();
?>