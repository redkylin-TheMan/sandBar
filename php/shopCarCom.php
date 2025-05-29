<?php
//先找到购物车表
// 创建一个变量用来存储总价格
$total_price = 0;
$sql = "SELECT product_id,quantity from cart where user_id=$user_id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // echo '成功找到该用户的所有购物车内的物品';
  while ($cart_row = $result->fetch_assoc()) {
    $product_id = $cart_row['product_id'];
    $sql2 = "SELECT product_description,price,brand_name,image_url from products where product_id=$product_id;";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
      $product_row = $result2->fetch_assoc();
      // echo $result2->fetch_assoc()['product_description'];
      echo '    <div class="shop-item row">';
      echo '    <img class="shop-item-image col-2" src="images/goods/' . $product_row['image_url'] . '" alt="">';
      echo '    <div class="product-information col-6">';
      echo '      <p class="information">' . $product_row['product_description'] . '</p>';
      echo '    </div>';
      echo '    <div class="move col">';
      echo '      <div class="number row col"><div class="border-box">';
      echo '        <button onclick="updateQuantity(`subtract`,' . $product_id . ')">-</button>';
      // echo '        <input type="number" id="product' . $product_id . '" class="col" min="0" value="' . $cart_row['quantity'] . '">';
      echo '        <span id="product' . $product_id . '" >' . $cart_row['quantity'] . '</span>';
      echo '        <button onclick="updateQuantity(`add`,' . $product_id . ')">+</button></div>';
      echo '      </div>';
      echo '      <div class="shop-item-btn">';
      echo '        <div class="yes"></div>';
      echo '        <div class="drop-item"><button onclick="removeFromCart(' . $product_id . ')">不要啦</button></div>';
      echo '      <p class="shop-item-price">' . $product_row['price'] . '</p>';

      echo '      </div>';
      echo '    </div>';
      echo '  </div>';
      $total_price += $product_row['price'] * $cart_row['quantity'];
    } else
      echo '商品id无效';
    // 根据当前的商品id找到对应的商品信息
  }
}
