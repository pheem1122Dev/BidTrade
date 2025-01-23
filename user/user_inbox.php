<?php 
    session_start();
    include "../include/connect.php";
    include "../include/function.php";
    $id_user = $_SESSION["id_user"];

    date_default_timezone_set("Asia/Bangkok"); // ตั้งค่า timezone
    if (!isset($_SESSION["email"])) {
        header("location: ../user/user_login.php");
        exit;
    }

    $isSender = isset($_GET["sendmail"]) ? "id_send" : "id_receive";

    //All inbox i.id_receive
    $sqlprofile = "SELECT i.*,u.* FROM inbox i JOIN user u ON i.id_send = u.id_user 
    WHERE i.$isSender = '$id_user' GROUP BY i.id_send";
    $resultprofile = $conn->query($sqlprofile);
    $_SESSION["numofmail"] = isset($_GET["sendmail"]) ? $_SESSION["numofmail"] : $resultprofile->num_rows;

    //sendmail i.id_send
    $sqlsend_mail = "SELECT i.*,u.* FROM inbox i JOIN user u ON i.id_send = u.id_user 
    WHERE i.$isSender = '$id_user' GROUP BY i.id_receive";
    $resultsend_mail = $conn->query($sqlsend_mail);

    //spam mail i.id_receive
    if ($resultprofile && $resultprofile->num_rows > 0) {
        $rows = $resultprofile->fetch_all(MYSQLI_ASSOC);

        foreach ($rows as $row) {
            $spam_id = $row['id_send'];

            $sqlspam = "SELECT i.*, u.* FROM inbox i JOIN user u ON i.id_send = u.id_user
            WHERE i.$isSender = '$id_user' GROUP BY i.id_send, i.header_inbox HAVING COUNT(*) > 1";
            $resultspam = $conn->query($sqlspam);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../include/header.php"; ?>
    <link href = "../include/header.css" rel = "stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "../css/bootstrap.min.css" rel = "stylesheet">
    <script src = "../js/bootstrap.bundle.min.js"></script>
    <link href="../bootstrap-icons" rel="stylesheet">
    <link href = "styleInbox.css" rel = "stylesheet">
    <title>Inbox</title>
</head>
<body>

    <div class="row">
        <!-- left side -->
        <div class="col-md-2">
            <div class = "left-side">
                <button class = "compose-mail btn btn-info"><i class="bi bi-pen-fill"></i> compose</button>
                <div class = "link-group d-flex flex-column">
                    <a href = "user_inbox.php<?php echo isset($_GET['inbox']) ? "" : "?inbox"; ?>" class = "text-decoration-none border-bottom"><i class="bi bi-envelope-arrow-down-fill"></i> Inbox(<?php echo $_SESSION["numofmail"]; ?>)</a>
                    <a href = "user_inbox.php<?php echo isset($_GET['sendmail']) ? "" : "?sendmail"; ?>" class = "text-decoration-none border-bottom"><i class="bi bi-send-fill"></i> send mail</a>
                    <a href = "user_inbox.php<?php echo isset($_GET['spam']) ? "" : "?spam"; ?>" class = "text-decoration-none border-bottom"><i class="bi bi-exclamation-circle-fill"></i> spam</a>
                    <a href = "#" class = "text-decoration-none border-bottom"><i class="bi bi-trash-fill"></i> deleted</a>
                </div>
            </div>
        </div>

        <!-- inbox page -->
        <?php if(isset($_GET['inbox'])){ ?>
        <div class="col-md-3">
            <?php if($resultprofile->num_rows > 0){
                foreach($resultprofile as $rowprofile){ 
            ?>
            <a href = "user_inbox.php?inbox=<?php echo $rowprofile["id_send"]; ?>" class = "card-inbox-mail text-decoration-none">
                <img src="<?php echo !empty($rowprofile["profile_pic"]) ? "../profile_pic/".$rowprofile["profile_pic"] 
                            : "../include/profile1.png"; ?>" alt="Profile Picture">
                <div class="text-container">
                    <label class = "username"><?php echo $rowprofile["username"]; ?></label>
                    <label class = "header-inbox"><?php echo $rowprofile["header_inbox"]; ?></label>
                    <p><?php echo $rowprofile["description_inbox"]; ?></p>
                </div>
            </a>
            <?php }}else{ ?>
                <div class = "card-no-mail">
                    <img src = "../include/no-mail-removebg.png">
                    <label>ไม่มี inbox</label>
                </div>
            <?php } ?>
        </div>
        <?php } ?>

        <!-- send mail page -->
        <?php if(isset($_GET['sendmail'])){ ?>
        <div class="col-md-3">
            <?php if($resultsend_mail->num_rows > 0){
                foreach($resultsend_mail as $rowsend_mail){ 
            ?>
            <a href = "user_inbox.php?sendmail=<?php echo $rowsend_mail["id_send"]; ?>" class = "card-inbox-mail text-decoration-none">
                <img src="<?php echo !empty($rowsend_mail["profile_pic"]) ? "../profile_pic/".$rowsend_mail["profile_pic"] 
                            : "../include/profile1.png"; ?>" alt="Profile Picture">
                <div class="text-container">
                    <label class = "username"><?php echo $rowsend_mail["username"]; ?></label>
                    <label class = "header-inbox"><?php echo $rowsend_mail["header_inbox"]; ?></label>
                    <p><?php echo $rowsend_mail["description_inbox"]; ?></p>
                </div>
            </a>
            <?php }}else{ ?>
                <div class = "card-no-mail">
                    <img src = "../include/no-mail-removebg.png">
                    <label>ไม่มี send mail</label>
                </div>
            <?php } ?>
        </div>
        <?php } ?>
        <!-- send mail page -->

        <!-- spam page -->
        <?php if(isset($_GET['spam'])){ ?>
        <div class="col-md-3">
            <?php if($resultspam->num_rows > 0){
                foreach($resultspam as $rowspam){ 
            ?>
            <a href = "user_inbox.php?spam=<?php echo $rowspam["id_send"]; ?>" class = "card-inbox-mail text-decoration-none">
                <img src="<?php echo !empty($rowspam["profile_pic"]) ? "../profile_pic/".$rowspam["profile_pic"] 
                            : "../include/profile1.png"; ?>" alt="Profile Picture">
                <div class="text-container">
                    <label class = "username"><?php echo $rowspam["username"]; ?></label>
                    <label class = "header-inbox"><?php echo $rowspam["header_inbox"]; ?></label>
                    <p><?php echo $rowspam["description_inbox"]; ?></p>
                </div>
            </a>
            <?php }}else{ ?>
                <div class = "card-no-mail">
                    <img src = "../include/no-mail-removebg.png">
                    <label>ไม่มีแสปม inbox</label>
                </div>
            <?php } ?>
        </div>
        <?php } ?>
        <!-- spam page -->

        <!-- inbox description -->
        <div class="col-md-7">
            <!-- inbox sender -->
            <?php if(!empty($_GET["inbox"]) || !empty($_GET["spam"]) || !empty($_GET["sendmail"])){
                $key_get = !empty($_GET["inbox"]) ? "inbox" 
                : (!empty($_GET["spam"]) ? "spam" : "sendmail");
                $id_inbox = $_GET[$key_get];

                $sqlmail = "SELECT i.*, u.* FROM inbox i JOIN user u ON i.id_send = u.id_user
                WHERE u.id_user = '$id_inbox'";
                $resultmail = $conn->query($sqlmail);
                $rowmail = $resultmail->fetch_assoc();

                $timestamp = strtotime($rowmail["inboxTime"]); // แปลงเวลาจากฐานข้อมูลเป็น timestamp
                $formattedTime = date("H:i, l", $timestamp); // แปลง timestamp เป็น time, days
            ?>
            <div class="email-container">
                <!-- Header -->
                <div class="email-header">
                    <img src="<?php echo !empty($rowmail["profile_pic"]) ? "../profile_pic/".$rowmail["profile_pic"] 
                            : "../include/profile1.png"; ?>">
                    <div class="sender-info">
                        <h2><?php echo $rowmail["username"]; ?></h2>
                        <p><?php echo $formattedTime; ?></p>
                    </div>
                </div>
                
                <!-- Subject -->
                <div class="email-subject">
                    <h3><?php echo $rowmail["header_inbox"]; ?></h3>
                </div>
                
                <!-- Email Body -->
                <div class="email-body">
                    <p><?php echo nl2br($rowmail["description_inbox"]); ?></p>
                </div>
                
                <!-- Action Buttons -->
                <div class="email-actions">
                    <a href = "user_inbox.php?<?php echo $key_get."=".$id_inbox; ?>&reply" class = "text-decoration-none"><i class="bi bi-reply-fill"></i> Reply</a>
                    <a href = "#" class = "text-decoration-none"><i class="bi bi-forward-fill"></i> Forward</a>
                    <a href = "#" class = "text-decoration-none"><i class="bi bi-trash-fill"></i> Delete</a>
                </div>
            </div>
            <?php } ?>
            <!-- inbox sender-->

            <!-- inbox Replay -->
            <?php if(isset($_GET["reply"])){
                $sqlsender = "SELECT i.*, u.* FROM inbox i JOIN user u ON i.id_send = u.id_user
                WHERE u.id_user = '$id_inbox'";
                $resultsender = $conn->query($sqlsender);
                $rowsender = $resultsender->fetch_assoc();
            ?>
            <div class="email-container">
                <!-- Header -->
                <div class="email-header">
                    <img src="<?php echo !empty($_SESSION["profile_pic"]) ? "../profile_pic/".$_SESSION["profile_pic"] 
                            : "../include/profile1.png"; ?>">
                    <div class="reply-sender-info">
                        <h2><i class="bi bi-reply-fill"></i> To: <?php echo $rowsender["username"]; ?></h2>
                    </div>
                </div>

                <!-- Email Body -->
                <div class="add-email-body">
                    <form method = "post" action = "code.php">
                        <input type = "hidden" name = "id_receive" value = "<?php echo $id_inbox; ?>">
                        <input type = "hidden" name = "header_inbox" value = "<?php echo $rowmail["header_inbox"]; ?>">
                        <textarea id = "txtBody" name = "description_inbox" autofocus></textarea>
                        <button type = "submit" name = "add_reply_mail" class = "btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
            <?php } ?>
            <!-- inbox Replay-->
        </div>
        <!-- inbox description -->
    </div>
</body>
</html>

<script>
    const txtBody = document.getElementById("txtBody");
    txtBody.addEventListener("input", function () {
        this.style.height = "auto"; // รีเซ็ตความสูงก่อนคำนวณใหม่
        this.style.height = this.scrollHeight + "px"; // ตั้งความสูงตามเนื้อหา
    });
</script>