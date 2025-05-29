<!-- products.html -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>商品列表</title>
</head>

<body>
  <h1>商品列表</h1>
  <ul>
    <?php
    // 假设你已经连接了数据库
    $query = "SELECT product_id, product_name FROM products";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <li><a
          href="product_detail.php?product_id=<?php echo $row['product_id']; ?>">商品<?php echo $row['product_name']; ?></a>
      </li>
      <?php
    }
    mysqli_free_result($result);
    ?>
  </ul>
</body>

</html>