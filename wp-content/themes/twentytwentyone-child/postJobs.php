<?php
/* Template Name: Post Jobs */
get_header();
?>

<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: home");
} else {
    if (isset($_REQUEST['logout'])) {
        session_unset();
        session_destroy();
        header("location: home");
    }
    include 'contactDB.php';
    include 'createJobDetails.php';

    if (isset($_REQUEST['post_job_btn'])) {
        $profilename = $_REQUEST['profilename'];
        $location = $_REQUEST['location'];
        $package = $_REQUEST['package'];
        $experience = $_REQUEST['experience'];
        $skills = $_REQUEST['skills'];
        $qualification = $_REQUEST['qualification'];
        $sql = "INSERT INTO $tablename (profilename, location, package, experience, skills, qualification) VALUES ('$profilename','$location','$package','$experience','$skills','$qualification')";
        if (mysqli_query($conn, $sql)) {
            function_alert("Record inserted successfully");
        } else {
            // echo 'Could not insert record: ' . mysqli_error($conn);            
            function_alert("error occured");
        }
    }
    function function_alert($message)
    {
        echo "<script>alert('$message');</script>";
    }

?>

    <div class=" banner-image w-100  d-flex justify-content-center align-itmes-center ">
        <div class="content text-center">
            <h1 class="text-black center">
                Digital Agency That<br> Give you Best Mind.
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <h5>Welcome: <?php echo $_SESSION['login_user']; ?></h5>

            </div>
            <div class="col-lg-4 col-sm-4"></div>
            <div class="col-lg-4 col-sm-4">
                <div class="align-self-end">
                    <form method="POST">
                        <input type="submit" value="Logout" name="logout" class="btn btn-outline-danger">
                    </form>
                </div>
            </div>

        </div>
    </div>

    <section class="search-job">
    </section>

    <section class="container-sec-one">
        <div class="container">
            <div class="row pt-5">
                <div class="col-lg-12 col-md-12 col-sm-12 job-content">
                    <h3 class="center">Hire the Best Minds of industry.</h3>
                    <form class="post-jobs" id="post-jobs" method="POST" action="">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 w-100">
                                    <input type="text" name="profilename" placeholder="Profile Name" required></input>
                                </div>
                                <div class="col-lg-4 w-100">
                                    <input type="text" name="location" placeholder="Job Location" required></input>
                                </div>
                                <div class="col-lg-4 w-100">
                                    <input type="text" name="package" placeholder="Package in Lac" required></input>
                                </div>
                                <div class="col-lg-4 w-100">
                                    <input type="text" name="experience" placeholder="Desired Experience (In Year)" required></input>
                                </div>
                                <div class="col-lg-4 w-100">
                                    <input type="text" name="skills" placeholder="Skills you Look" required></input>
                                </div>
                                <div class="col-lg-4 w-100">
                                    <input type="text" name="qualification" placeholder="Desired Quelification" required></input>
                                </div>
                                <div class="col-lg-4 ">
                                    <button type="submit" name="post_job_btn" value="submit" class="submit" onclick="save_data();">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>

<?php
get_footer();
?>