<?php
/* Template Name: Search Jobs */
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
    $profilename = $location = $package = $experience = $skills = $qualification = $date = "";

    $sql = "SELECT * FROM $tablename ORDER BY id DESC";
    $result = $conn->query($sql);

    $rowcount = mysqli_num_rows($result);
?>

    <div class=" banner-image w-100  d-flex justify-content-center align-itmes-center ">
        <div class="content text-center">
            <h2 class="text-black">
                Digital Agency That<br> Thrives on Your Success
            </h2>
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


    <?php
    for ($i = 0; $i < $rowcount; $i++) {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $profilename = $row["profilename"];
            $location = $row["location"];
            $package = $row["package"];
            $experience = $row["experience"];
            $date = $row["date"];
            $qualification = $row["qualification"];
            $skills = $row["skills"];
    ?>
            <section class="container-sec-one">
                <div class="container">
                    <div class="row pt-5">
                        <div class="col-lg-3 col-sm-3 col-md-3">
                            <div class="content_node" id="content_node">
                                <a></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 job-content" id="replicate-op">
                            <span class="new-job-open">New</span>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 col-sm-8 col-md-8 job-content-left">
                                        <div class="icon_cls_column" id="show-result-1"></div>

                                        <h2 class="capitalize"><?php echo $profilename; ?></h2>
                                        <span class="view-location capitalize"><i class="fa fa-map-marker"></i><?php echo $location; ?></span>
                                        <span><i class="fa fa-inr"></i><?php echo $package; ?> LPA</span>
                                        <span><strong>Experience </strong><?php echo $experience; ?> Years</span>
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                            <div class="row top-buffer">
                                                <span class="capitalize"><i class="fa fa-check"></i><?php echo $skills; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-md-4 job-content-right">
                                        <div class="icon_cls_column" id="show-result-1"></div>

                                        <span class="posted-days"><i class="fa fa-play"></i>Posted On: <?php echo $date; ?></span>
                                        <span class="expires mt-4"><i class="fa fa-flag"></i>Qualifications: <?php echo $qualification; ?></span>
                                        <div class="center py-5">
                                            <a class="btn btn-primary btn-width">Apply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php
        }
    }
    // Free result set
    $result->free_result();

    $conn->close();
}
?>

<?php
get_footer();
?>