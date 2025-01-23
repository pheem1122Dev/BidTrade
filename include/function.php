<?php
    #เช็ค email ว่ามีอยู่ในระบบมั้ย ถ้ามีให้ส่งข้อมูลกลับไป
    function checkMail($conn,$table_name,$email){
        $sqlcheck = "SELECT * FROM $table_name WHERE email = '$email'";
        $resultcheck = mysqli_query($conn, $sqlcheck);
        return $resultcheck;
    }

    #เปลื่ยนสถานะของ table_name ในระบบ
    function changeStatus($conn, $table_name,$name,$name_value,$status_name,$status_value){
        $sqlchange = "UPDATE $table_name SET $status_name = '$status_value' WHERE $name = '$name_value'";
        $resultchange = mysqli_query($conn, $sqlchange);
        return $resultchange;
    }


    #ดึงข้อมูลจาก category โดยใช้ id_cat ในระบบ
    function productCat($conn, $id_cat){
        if($id_cat == "all"){
            $sqlcat = "SELECT * FROM category";
        }
        else{
            $sqlcat = "SELECT * FROM category WHERE id_cat = '$id_cat'";
        }
        $resultcat = mysqli_query($conn, $sqlcat);
        return $resultcat;
    }

    #ลบ url ที่ได้จาก GET ออกไป เพื่อความปลอดภัย
    function clearURL($name){
        echo "<script> window.history.replaceState({}, document.title, '$name'); </script>";
    }
?>