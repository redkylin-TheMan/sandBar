<?

// 用于输出主页的多格图片的

$findgallery = "SELECT * FROM `gallery_section`";
$result_gallery = $conn->query($findgallery);

if ($result_gallery->num_rows > 0) {
  while ($row = $result_gallery->fetch_assoc()) {
    echo '    <div class="item-' . $row['id'] . ' wow fadeInDown"><a class="thumbnail-minimal"';
    echo '    href="images/gallery-item (' . $row['id'] . ').jpg" data-lightgallery="item"><img';
    echo '      src="images/gallery-item (' . $row['id'] . ').jpg" alt="" /></a></div>';
  }
} else
  echo '数据没内容';
?>