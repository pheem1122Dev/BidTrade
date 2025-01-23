<?php 
    session_start();
    include "../include/connect.php";
    include "../include/function.php";

    date_default_timezone_set("Asia/Bangkok"); // ตั้งค่า timezone
    $id_user = $_SESSION["id_user"];
    
    if (!isset($_SESSION["email"])) {
        header("location: ../user/user_login.php");
        exit;
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
    <link href = "styleUser.css" rel = "stylesheet">
    <title>User</title>
</head>
<body>

    <!-- show Bid product if empty $_GET = EMPTY -->
    <?php if(empty($_GET)){ ?>

    <!-- product slide -->
    <div class = "slide-header">
        <h2>Our Bid Today</h2>
    </div>
    <?php
        // ดึงข้อมูลสินค้าและผู้ขายพร้อมกัน
        $sqlproduct = "SELECT p.*, u.username FROM product p JOIN user u ON p.id_seller = u.id_user
        WHERE p.id_seller != '$id_user' AND p.status_product = 'show' ORDER BY p.start_time DESC";
        $resultproduct = mysqli_query($conn, $sqlproduct);

        // จัดกลุ่มสินค้าใน carousel-item
        $items = array_chunk(mysqli_fetch_all($resultproduct, MYSQLI_ASSOC), 2); // แบ่งกลุ่มละ 20 สินค้า
    ?>
    <div id="BidSlide" class="carousel slide">
        <div class="carousel-inner mt-2 pt-2 pb-2">
            <?php foreach ($items as $index => $group): ?>
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <div class="card-wrapper">
                    <?php foreach ($group as $rowproduct): ?>
                    <div class="card" style="width: 18rem;">
                        <img src="../product_pic/<?php echo $rowproduct["product_pic"]; ?>" class="card-img-top" alt = "รูปภาพไม่โหลด...">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $rowproduct["productname"]; ?></h4>
                            <p class="text-truncate"><?php echo $rowproduct["description"]; ?></p>
                            <div class = "text-startprice">
                                <p class="text-muted">ราคาเริ่มต้น</p>
                                <p class="number-startprice">฿<?php echo number_format($rowproduct["price"], 2); ?></p>
                            </div>
                            <div class="card-timeleft">
                                <p class="card-text text-muted text-timeleft">เวลาที่เหลือ</p>
                                <p class="card-text number-timeleft" 
                                    data-start="<?php echo strtotime($rowproduct["start_time"]); ?>" 
                                    data-end="<?php echo strtotime($rowproduct["end_time"]); ?>">
                                    กำลังโหลด...
                                </p>
                            </div>
                            <a href="../bid/bid.php?id_product=<?php echo $rowproduct["id_product"]; ?>" class="btn btn-primary bid-btn w-100">ประมูล</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#BidSlide" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#BidSlide" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
    <?php } ?>

    <!-- make card thats show user information -->
    <div class="container" align = "center">
        <!-- this is User Information -->
        <?php if(isset($_GET["setting"])){ ?> <!-- check if have setting or changeData -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center border-bottom pb-2">User Information</h3>
                    <form action="code.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3 text-center">
                            <label for="email" class="form-label border-bottom pb-2 fw-bold"><i class="bi bi-envelope-at-fill"></i> Email</label>
                            <input type="text" class="form-control bg-light" id="email" name="email" value="<?php echo $_SESSION["email"]; ?>" readonly>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="username" class="form-label border-bottom pb-2 fw-bold"><i class="bi bi-person-square"></i> Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION["username"]; ?>" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="phoneNumber" class="form-label border-bottom pb-2 fw-bold"><i class="bi bi-telephone-fill"></i> Tel</label>
                            <input type="number" class="form-control" name="phoneNumber" value="<?php echo $_SESSION["phoneNumber"]; ?>" required>
                        </div>
                        <div class="mb-3 text-center">
                            <label for="address" class="form-label border-bottom pb-2 fw-bold"><i class="bi bi-house-add-fill"></i> Address</label>
                            <textarea class="form-control" name="address" rows = "3" required><?php echo $_SESSION["address"]; ?></textarea>
                        </div>
                        <div class="mb-3 text-center img-group">
                            <img src="../<?php echo !empty($_SESSION["profile_pic"]) ? "profile_pic/".$_SESSION["profile_pic"] : "include/profile1.png"; ?>">
                            <div class="img-text">
                                <label for="profile_pic" class="form-label border-bottom pb-2 fw-bold"><i class="bi bi-person-circle"></i> Profile Picture</label>
                                <input type="file" class="form-control" name="profile_pic">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-25" name = "setting_changeData">Confirm</button>
                            <a href="user.php" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                    <!-- make form add address and picture -->
                </div>
            </div>
        <?php } ?>
        <!-- this is User Information -->

        <!-- this is User ChangePass -->
        <?php if(isset($_GET["setting"])){ ?>
            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="card-title text-center border-bottom pb-2">Change Password</h3>
                    <form action="code.php" method="post">
                        <div class="mb-3 text-center">
                            <label for="user_pass" class="form-label border-bottom pb-2 fw-bold"><i class="bi bi-lock-fill"></i> Old Password</label>
                            <input type="password" class="form-control" id="user_pass" name="user_pass">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="new_pass" class="form-label border-bottom pb-2 fw-bold"><i class="bi bi-lock-fill"></i> New Password</label>
                            <input type="password" class="form-control" id="new_pass" name="new_pass">
                        </div>
                        <div class="mb-3 text-center">
                            <label for="confirm_pass" class="form-label border-bottom pb-2 fw-bold"><i class="bi bi-lock-fill"></i> Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_pass" name="confirm_pass">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-25" name = "setting_changePass">Confirm</button>
                            <a href="user.php" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
        <!-- this is User ChangePass -->
    </div>

    <?php //echo "<pre>". print_r($_SESSION, true) . "</pre>"; ?>
</body>
</html>

<!-- ส่วนของการเรียกใช้งาน JavaScript สำหรับนับถอยหลัง -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const countdownElements = document.querySelectorAll(".number-timeleft");

        countdownElements.forEach((element) => {
            const startTime = parseInt(element.dataset.start);
            const endTime = parseInt(element.dataset.end);
            const now = Math.floor(Date.now() / 1000);

            // เริ่มฟังก์ชันนับถอยหลัง
            const updateCountdown = () => {
                const currentTime = Math.floor(Date.now() / 1000);
                const timeLeft = endTime - currentTime;

                if (timeLeft > 0) {
                    const days = Math.floor(timeLeft / (24 * 3600));
                    const hours = Math.floor((timeLeft % (24 * 3600)) / 3600);
                    const minutes = Math.floor((timeLeft % 3600) / 60);
                    const seconds = timeLeft % 60;

                    if(days > 0){
                        element.textContent = `${days} วัน ${hours
                        .toString()
                        .padStart(2, "0")}:${minutes
                        .toString()
                        .padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
                    }else{
                        element.textContent = `${hours
                        .toString()
                        .padStart(2, "0")}:${minutes
                        .toString()
                        .padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
                    }
                } else {
                    element.textContent = "หมดเวลา";
                    clearInterval(interval); // หยุดการอัปเดตเมื่อหมดเวลา
                }
            };

            // เรียกใช้งานทุกวินาที
            const interval = setInterval(updateCountdown, 1000);
            updateCountdown(); // เรียกครั้งแรกเพื่อให้แสดงผลทันที

            // console.log("Start Time:", startTime);
            // console.log("End Time:", endTime);
            // console.log("Current Time:", Math.floor(Date.now() / 1000));

            // const userTimeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            // console.log("Time Zone ของผู้ใช้:", userTimeZone);
        });
    });
</script>
