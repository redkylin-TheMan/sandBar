<?
session_start();
include 'databases_link.php';
$user_id = $_SESSION['user_id'];  //查找用户id
// 根据用户id删除购物车表里所有相关的数据
$findUser = "DELETE FROM cart where user_id=$user_id;";
if ($conn->query($findUser))
  echo json_encode(['message' => '删除失败']);
else
  echo json_encode(['message' => '删除成功']);
$conn->close();
?>