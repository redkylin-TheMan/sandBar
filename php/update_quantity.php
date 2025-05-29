<?php
include 'databases_link.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['product_id'];
    $action = $_POST['action']; // 'add' or 'subtract'
    $quantityChange = $_POST['quantity_change']; // 1 for add, -1 for subtract

    // 如果数据库里的数量为0，就不能再减了
    $sql = "SELECT quantity FROM cart WHERE product_id=$productId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentQuantity = $row['quantity'];

        if ($action === 'add') {
            $newQuantity = $currentQuantity + $quantityChange;
        } elseif ($action === 'subtract') {
            $newQuantity = max(0, $currentQuantity + $quantityChange);
        } else {
            echo json_encode(['error' => 'Invalid action']);
            exit;
        }
        // 更新数据库
        $sql = "UPDATE cart SET quantity=$newQuantity WHERE product_id=$productId";
        $conn->query($sql);
    } else {
        echo json_encode(['error' => 'Product not found']);
        exit;
    }



    echo json_encode(['success' => 'Quantity updated', 'newQuantity' => $newQuantity]);
}
