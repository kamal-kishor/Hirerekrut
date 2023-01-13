<?php
/* Template Name: Contact Us */
get_header();
?>

<?php
include 'contactDB.php';
include 'createTable.php';
$nameErr = $emailErr = $subjectErr = "";

// header('Content-Type: application/json');
// $sql = "SELECT * FROM $tablename";
// $result = mysqli_query($conn, $sql) or die("sql failed");
// $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
// $json_data = json_encode($output);
// $file_name = "My-" . date("d-m-Y") . ".json";
// if (file_put_contents("first.json", $json_data)) {
//     echo "file created";
// } else {
//     echo "file not created";
// }

if (isset($_REQUEST['submit_btn'])) {
    $name = $_REQUEST['UserName'];
    $email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $msg = $_REQUEST['msg'];

    if (empty($name)) {
        $nameErr = "* Enter The Name";
    } elseif (empty($email)) {
        $emailErr = "* Please Fill the Email Field";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $nameErr = "Only Letters and White Spaces Allowed.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "filled valid email address";
    } elseif (empty($subject)) {
        $subErr = "* Please Enter Subject Title";
    } else {

        // $formcontent = "From: " . $name . "\n Message: " . $msg;
        // $maiTo = "kamal.joshi@technogetic.com";
        // mail($maiTo,$subject,$formcontent) or die("Error!");
        // echo "Thank YOu";

        // $mailheader = "From: " . $name . "<" . $email . ">\r\n";
        // $recipient = "info@hirerekrut.com";
        // $recipient = "kamal.joshi@technogetic.com";
        // mail($recipient, $subject, $message, $mailheader)
        //     or die("Error!");
        // echo "Message send";

        // $fromName = "HireRekrut";
        // $fromEmail = "info@hirerekrut.com";
        // $replyTo = $email;
        // $toEmail = "kamal.joshi@technogetic.com";
        // $Message = 'Name: ' . $name . '<br>Email:- ' . $email . '<br>Subject:- ' . $subject . '<br>Message:- ' . $msg;

        // $headers = "MIME-Version: 1.0/n";
        // $header .= "Content-type: text/html; charset=iso-8859-1\n";
        // $header .= "From: " . $fromEmail . " <" . $fromEmail . ">\n";
        // $header .= "Reply-To: " . $replyTo . "\n";
        // $header .= "X-Sender: <" . $fromEmail . ">\n";
        // $header .= "X-Mailer: PHP\n";
        // $header .= "X-Priority: 1\n";
        // $header .= "Return-Path: <" . $fromEmail . ">\n";

        // if (mail($toemail, $subject, $message, $headers, '-f' . $fromEmail)) {
        //     $hide = 1;
        //     echo 'Thank you' . $name;
        // } else {
        //     echo 'Server failed to send the message.';
        // }

        $sql = "INSERT INTO $tablename VALUES ('$name','$email','$subject','$msg')";
        if (mysqli_query($conn, $sql)) {
            function_alert("Record inserted successfully");
        } else {
            echo 'Could not insert record: ' . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
?>
<header>
    <div class="outer-banner-section-image">
        <div class=" banner-image w-100 d-flex justify-content-center align-itmes-center ">
            <div class="content text-center">
                <h2 class="text-black"> Contact Us </h2>
            </div>
        </div>
    </div>
</header>

<body>
    <div class="cls-one-section pg-service-one contact_us">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="main-short-cd">
                        <div class="short-cd-con">
                            <h4 class="head-mn">Get in Tuch</h4>
                            <p>Drop us a message and we will contact you back shortly</p>
                        </div>
                        <?php
                        // if (!isset($hide)) {
                        ?>
                        <form class="contact-form" method="POST" action="" onsubmit="sendEmail(); reset(); return false;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 w-100">
                                        <input type="text" name="UserName" placeholder="Enter Your Name" value="<?php echo $_REQUEST['UserName']; ?>"></input>
                                        <span class="errorinput"><?php echo $nameErr; ?> </span>
                                    </div>
                                    <div class="col-lg-12 w-100">
                                        <input type="email" name="email" placeholder="Enter your email" value="<?php echo $_REQUEST['email']; ?>"></input>
                                        <span class="errorinput"><?php echo $emailErr; ?> </span>
                                    </div>
                                    <div class="col-lg-12 w-100">
                                        <input type="text" name="subject" placeholder="subject" value="<?php echo $_REQUEST['subject']; ?>"></input>
                                        <span class="errorinput"><?php echo $subjectErr; ?> </span>
                                    </div>
                                    <div class="col-lg-12 w-100">
                                        <textarea name="msg" placeholder="Write something.." style="height:200px"></textarea>
                                    </div>
                                    <div class="col-lg-12 ">
                                        <button type="submit" name="submit_btn" value="submit" class="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        // }
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-details">
                        <div class="ad-txt-outer">
                            <div class="row">
                                <div class="col">
                                    <p>
                                        <i class="fas fa-location-arrow"></i>
                                        <span class="span-con">Near PNB Bank Jaspuriya Lane, Ramnagar, Uttarakhand, 244715</span>
                                    </p>
                                    <p>
                                        <i class="fas fa-phone"></i>
                                        <a href="phone:+919027484435"><span class="span-con">9027484435</span></a>
                                    </p>
                                    <p>
                                        <i class="far fa-envelope-open"></i>
                                        <a class="link-ph" href="mailto:info@technogetic.com"> <span class="span-con">info@technogetic.com</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="map-details">
                        <div class="ad-loc-outer">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d217.26424252041488!2d79.1267308800807!3d29.392889061036932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1668510299819!5m2!1sen!2sin" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

<?php
get_footer();
?>