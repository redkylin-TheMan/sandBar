<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Quantity Update</title>
    <script src="/js/jquery-3.7.1.min.js"></script>
    <script>
        function updateQuantity(action) {
            var productId = 1; // 假设的商品ID
            var quantityChange = action === 'add' ? 1 : -1;
            var productName = `product` + productId;
            console.log(productName);


            $.post('update_quantity.php', {
                product_id: productId,
                action: action,
                quantity_change: quantityChange
            }, function(data) {
                if (data.error) {
                    alert(data.error);
                } else {
                    alert('Quantity updated to ' + data.newQuantity);
                    // 更新页面上的数量显示
                    $('#product').text(data.newQuantity);
                }
            }, 'json');
        }
    </script>
</head>

<body>
    <div>
        Product Quantity: <span id="quantity">100</span>
        <button onclick="updateQuantity('add')">+</button>
        <button onclick="updateQuantity('subtract')">-</button>
    </div>
</body>

</html>