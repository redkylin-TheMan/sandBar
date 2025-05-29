<!DOCTYPE html>
<html lang="en">
<?
session_start();
include 'php/databases_link.php';
$article_id = $_GET['article_id'];


$find_article = "SELECT * from articles where id =$article_id;";
$result = $conn->query($find_article);
$row = $result->fetch_assoc();
// 查找文章数据
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><? echo $row['title']; ?></title>
  <link rel="icon" href="images/sandI/logo-favicon-yellow.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700,300i%7CRoboto:400,300i">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/article.css">
  <style>
    .content_image {
      /* position: relative; */

    }
  </style>
</head>

<body>


  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
      <p>Loading...</p>
    </div>
  </div>


  <div class="page">

    <?php
    include 'moudle/header.php';
    ?>
    <div class="container">
      <br>
      <div class="inside_container">
        <h2 class="title"><? echo $row['title']; ?></h2>
        <p class="created_at"><? echo $row['created_at'] ?></p>
        <img class="content_image" src="images/article_image/<? echo $row['image_url'] ?>" alt="">
        <br>
        <br>
        <p class="article-content">
          <? echo $row['content'] ?>
        </p>
      </div>

    </div>
    <?php
    include 'moudle/footer.php';
    ?>

    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </div>
</body>

</html>