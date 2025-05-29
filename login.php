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
            <form class="rd-form rd-mailform rd-form-centered" data-form-output="form-output-global"
              data-form-type="contact" method="post" action="/php/login.php">
              <div class="form-wrap">
                <input class="form-input" id="contact-name" type="text" name="username" data-constraints="@Required"
                  required>
                <label class="form-label" for="contact-name">用户名</label>
              </div>

              <div class="form-wrap">
                <input class="form-input" type="password" id="contact-password" name="password"
                  data-constraints="@Required @password" required>
                <label for="contact-password" class="form-label">密码</label>
              </div>

              <button class="button button-primary button-md" type="submit" name="login">立即登录</button>
              <div class="register" style="margin-top: 2rem;"><a href="register.php">没有账号？立即注册！</a></div>
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
</body>

</html>