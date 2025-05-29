<?php
if (isset($_GET['param'])) {
  // 处理请求参数
  $param = $_GET['param'];
  // 执行一些操作...
  // 返回响应
  echo "Received parameter: " . $param;
}
?>