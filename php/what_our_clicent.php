<?
$findClient = "SELECT * FROM `what_our_client`";
$result = $conn->query($findClient);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '    <div class="slide-creative">';
    echo '    <div class="slide-content">';
    echo '      <div class="quotes-creative"><span class="top-quote icon linearicons-quote-close"></span><span';
    echo '          class="bottom-quote icon linearicons-quote-open"></span>';
    echo '        <p>' . $row['word'] . '</p>';
    echo '      </div>';
    echo '      <div class="creative-text">' . $row['name'] . '</div>';
    echo '    </div>';
    echo '  </div>';
  }
} else
  echo '数据没内容';

?>