<?php
session_start()

  ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {


    // 检查用户登录状态的函数
    function checkLoginStatus() {
      // window.location.href = 'http://sandbar/php/check-login.php'
      // 跳转测试
      fetch('php/check-login.php') // 假设你有一个后端脚本来检查登录状态
        .then(response => response.json())
        .then(data => {
          if (data.logged_in) {
            document.getElementById('login').style.display = 'none';
            document.getElementById('avatar').style.display = 'inline-block';
            // console.log('用户登录成功');

          } else {
            document.getElementById('login').style.display = 'inline-block';
            document.getElementById('avatar').style.display = 'none';
            // console.log('用户尚未登录');
          }
        })
        .catch(error => console.error('Error:', error));
    }

    // 页面加载完成后检查登录状态
    checkLoginStatus();
  });
</script>

<header class="section page-header" id="home">
  <!-- RD Navbar-->
  <div class="rd-navbar-wrap" style="height: 98px;">
    <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
      data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
      data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static"
      data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px"
      data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
      <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse">
        <span></span>
      </div>
      <div class="rd-navbar-main-outer">
        <div class="rd-navbar-main">
          <!-- RD Navbar Panel-->
          <div class="rd-navbar-panel">
            <!-- RD Navbar Toggle-->
            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
            <!-- RD Navbar Brand-->
            <div class="rd-navbar-brand"><a class="brand" href="index.php"><img src="images/sandI/navbar_logo.png"
                  alt="" width="145" height="38" /></a>
            </div>
            <div class="rd-navbar-collapse">
              <div class="navbar-collapse-content">
                <div class="logo-caption"><span>professional</span><span>Outdoor utensils studio</span></div>
                <ul class="social-links">
                  <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                  <li><a class="icon mdi-instagram mdi" href="#"></a></li>
                  <li><a class="icon icon-sm mdi mdi-youtube-play" href="#"></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="rd-navbar-main-element">
            <div class="rd-navbar-nav-wrap">
              <!-- RD Navbar Nav-->
              <ul class="rd-navbar-nav">
                <li class="rd-nav-item active"><a class="rd-nav-link" href="index.php">主页</a>
                </li>
                <li class="rd-nav-item"><a class="rd-nav-link" href="index.php#services">服务</a>
                </li>
                <li class="rd-nav-item"><a class="rd-nav-link" href="index.php#gallery">展示</a>
                </li>
                <li class="rd-nav-item"><a class="rd-nav-link" href="index.php#coaches">教练</a>
                </li>
                <li class="rd-nav-item"><a class="rd-nav-link" href="shop.php">商店</a>
                </li>
                <li class="rd-nav-item"><a class="rd-nav-link" href="article_show_all.php">博客</a>
                </li>
                <li class="rd-nav-item" id="login"><a class="rd-nav-link" href="login.php">登录</a>
                </li>
                <li class="rd-nav-item dropdown" id="avatar">
                  <a class="rd-nav-link " href="personal_homepage.php">
                    <?php
                    echo "<img class='avatar' style='height:50px;width:50px' src='images/userAvatar/default/" . $_SESSION["avatar"] . "' alt='用户头像'>";
                    ?>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>