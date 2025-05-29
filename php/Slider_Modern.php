<?

$findClient_image = "SELECT * FROM `Slider_Modern`";
$result_client_image = $conn->query($findClient_image);

if ($result_client_image->num_rows > 0) {
  while ($row = $result_client_image->fetch_assoc()) {
    echo '    <div class="slide-box">';
    echo '    <div class="slide-preview"><img src="images/Slider Modern/' . $row['image_url'] . '.png" alt="" />';
    echo '    </div>';
    echo '    <div class="slide-description">';
    echo '      <h4>' . $row['name'] . '</h4><span>' . $row['type'] . '</span>';
    echo '    </div>';
    echo '    <div class="slide-links">';
    echo '      <ul class="social-links">';
    echo '        <li><a class="icon mdi mdi-facebook" href="#"></a></li>';
    echo '        <li><a class="icon mdi-instagram mdi" href="#"></a></li>';
    echo '        <li><a class="icon icon-sm mdi mdi-youtube-play" href="#"></a></li>';
    echo '      </ul>';
    echo '    </div>';
    echo '  </div>';
  }
} else
  echo '数据没内容';

?>