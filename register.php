<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>欢迎登陆(●'◡'●)ﾉ♥</title>
  <link rel="icon" href="images/sandI/logo-favicon-yellow.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700,300i%7CRoboto:400,300i">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="/js/jquery-3.7.1.min.js"></script>

  <style>
    .form-wrap {
      margin-top: 0;
    }
  </style>
</head>

<body>
  <!-- <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
        src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
        alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
  </div> -->
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
      <p>Loading...</p>
    </div>
  </div>


  <div class="page">
    <?php include 'moudle/header.php' ?>

    <section class="section cta-section" id="join-now" style="background-image:url('images/sandI/background-2.png')">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-sm-10 col-12 col-md-8 wow fadeInLeft">
            <div class="cta-wrap">
              <h2 class="creative-title">start<span> your<br></span><span>workout</span> now</h2>
              <p>输入您的用户名和邮箱就可以立刻加入我们并且享有我们的第一次免费咨询服务</p>
              <div class="cta-event-time">only 5 days</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-5 col-sm-10 col-12 col-md-8 wow fadeInUp" data-wow-delay=".2s">


            <form class="rd-form rd-mailform-wrap rd-form-centered" action="php/register.php" method="post">
              <div class="form-wrap">
                <input class="form-input" type="text" name="username" required placeholder="用户名"><br>
              </div>
              <div class="form-wrap">
                <input class="form-input" type="password" id="password" name="password" required placeholder="密码"><br>
              </div>
              <div class="form-wrap">
                <input class="form-input" type="password" id="confirm_password" name="confirm_password" required
                  placeholder="确认密码"><br>
              </div>
              <div class="form-wrap">
                <input class="form-input" type="email" name="email" required placeholder="邮箱"><br>
              </div>
              <p id="passwordError"></p>
              <input type="submit" name="register" value="注册" class="button button-primary button-md">
            </form>

          </div>
        </div>
      </div>
    </section>
    <?php include 'moudle/footer.php' ?>

  </div>



  <!-- <div class="snackbars" id="form-output-global"></div> -->

  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
  <script>

    console.log($("#confirm_password"));


    $(document).ready(function () {
      // 当用户离开确认密码输入框时触发
      $("#confirm_password").on('blur', function () {
        var password = $("#password").val();
        var confirmPassword = $("#confirm_password").val();

        if (password !== confirmPassword) {
          // 如果两次密码不一致，显示错误消息
          $("#passwordError").text("两次输入的密码不一致。").css("color", "red");
        } else {
          // 如果两次密码一致，清除错误消息
          $("#passwordError").text("");
        }
      });

      // 提交表单时触发
      $("form").on('submit', function (e) {
        var password = $("#password").val();
        var confirmPassword = $("#confirm_password").val();

        if (password !== confirmPassword) {
          // 如果两次密码不一致，阻止表单提交并显示错误消息
          $("#passwordError").text("两次输入的密码不一致。").css("color", "red");
          e.preventDefault(); // 阻止表单提交
        }
      });
    });
  </script>
</body>

</html>