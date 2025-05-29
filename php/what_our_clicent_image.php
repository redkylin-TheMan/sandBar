<?
$findClient_image = "SELECT * FROM `what_our_client`";
$result_client_image = $conn->query($findClient_image);

if ($result_client_image->num_rows > 0) {
  while ($row = $result_client_image->fetch_assoc()) {
    echo '    <div class="slide-creative-small">';
    echo '    <div class="preview-wrap"><img src="images/client/' . $row['image_url'] . '.jpg" alt="" />';
    echo '    </div><span>- ' . $row['days'] . ' lbs</span>';
    echo '  </div>';
  }
} else
  echo '数据没内容';

$conn->close();
?>