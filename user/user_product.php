<?php
    include "../include/connect.php";
    session_start();
    $id_user = $_SESSION["id_user"];
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
    <link href = "../bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href = "styleProduct.css" rel = "stylesheet">
    <title>MyProduct</title>
</head>
<body>
    <div class="card">
        <div class = "card-header fs-2 fw-bold">My Product <a class = "btn"><i class="bi bi-plus-lg"></i> Add Product</a></div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT p.*,c.name_cat FROM product p JOIN category c ON p.id_cat = c.id_cat WHERE p.id_seller = '$id_user'";
                        $result = $conn->query($query);

                        foreach($result as $row){
                    ?>
                    <tr>
                        <td><?php echo $row["id_product"]; ?></td>
                        <td class = "product-img">
                            <img src = "../product_pic/<?php echo $row["product_pic"]; ?>">
                            <label><?php echo $row["productname"]; ?></label>
                        </td>
                        <td><?php echo $row["name_cat"]; ?></td>
                        <td>฿<?php echo $row["price"]; ?></td>
                        <td>
                            <a href = "user_product.php?change=<?php echo $row["id_product"]; ?>" class = "btn btn-primary">Change</a>
                            <a href = "user_product.php?del=<?php echo $row["id_product"]; ?>" class = "btn btn-danger">Del</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>