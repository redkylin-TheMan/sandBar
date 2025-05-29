<?php
session_start();
// session_destroy();
include 'php/databases_link.php';

?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>沙洲SandBar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="images/sandI/logo-favicon-yellow.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700,300i%7CRoboto:400,300i">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    .ie-panel {
      display: none;
      background: #212121;
      padding: 10px 0;
      box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
      clear: both;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    html.ie-10 .ie-panel,
    html.lt-ie-10 .ie-panel {
      display: block;
    }
  </style>
</head>

<body>
  <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
        src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
        alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
  </div>
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
      <p>Loading...</p>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {


      // 检查用户登录状态的函数
      function checkLoginStatus() {
        // 跳转测试
        fetch('php/check-login.php')
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

  <div class="page">
    <!-- Page Header-->
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
                  <li class="rd-navbar-nav">
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="#home">主页</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#services">服务</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#gallery">展示</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="#coaches">教练</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="shop.php">商店</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="article_show_all.php">博客</a>
                  </li>
                  <li class="rd-nav-item" id="login"><a class="rd-nav-link" href="login.php">登录</a>
                  </li>
                  <li class="rd-nav-item" id="avatar"><a class="rd-nav-link" href="personal_homepage.php">
                      <?php
                      echo "<img class='avatar' src='images/userAvatar/default/" . $_SESSION["avatar"] . "' alt='用户头像'>";
                      ?></a>
                  </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <!--Main section-->
    <section class="section main-section media-overlay" data-type="anchor"
      style="background-image:url('images/background-1.png')">
      <div class="container">
        <div class="row justify-content-md-end justify-content-sm-start">
          <div class="col-lg-4 col-sm-8 col-12 text-md-right">
            <h1 class="big big-title wow fadeInRight"><span>只有最</span><span>适合你的</span></h1>
            <p class="wow fadeInRight offset-top-30" data-wow-delay=".1s">
              探索未知，装备先行。精选户外用品，伴您征服每一座山峰，穿越每一片丛林。品质保证，让冒险更安心，让旅程更精彩！立即选购，开启您的户外探险之旅！
            </p><a class="wow fadeInRight button button-primary button-md" href="shop.php" data-wow-delay=".2s">商店
            </a>
          </div>
        </div>
      </div>
    </section>
    <!--Service-->
    <section class="section section-lg" id="services" data-type="anchor">
      <div class="container">
        <div class="row row-50 justify-content-start">
          <div class="col-md-6 col-lg-3 col-12 wow fadeIn" data-wow-delay=".1s">
            <figure class="service-box">
              <div class="square-figure"><span class="icon linearicons-medal-empty"></span></div>
              <figcaption>
                <h5>优良的品质</h5>
                <p>在我们的网站您可以找到最高品质的设备以及器材</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-6 col-lg-3 col-12 wow fadeIn" data-wow-delay=".2s">
            <figure class="service-box">
              <div class="square-figure"><span class="icon linearicons-dumbbell"></span></div>
              <figcaption>
                <h5>一站式购物</h5>
                <p>提供从徒步装备、露营设备到水上运动用品等全方位的户外用品，满足不同用户的需求。</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-6 col-lg-3 col-12 wow fadeIn" data-wow-delay=".3s">
            <figure class="service-box">
              <div class="square-figure"><span class="icon linearicons-document"></span></div>
              <figcaption>
                <h5>独特的定制</h5>
                <p>我们可以依据会员提供的各项数据指定最适合您的设备</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-6 col-lg-3 col-12 wow fadeIn" data-wow-delay=".4s">
            <figure class="service-box">
              <div class="square-figure"><span class="icon linearicons-users2"></span></div>
              <figcaption>
                <h5>户外团队</h5>
                <p>我们这里有最专业的团队，并且会定时组织一起进行户外活动。</p>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
    </section>
    <!--CTA section-->
    <!--CTA section-->

    <!--Gallery section-->
    <section class="section section-lg bg-gray-lighten" id="gallery" data-type="anchor">
      <div class="container">
        <div class="gallery-wrap">
          <div class="floating-items" data-lightgallery="group">
            <? include 'php/gallery-item.php' ?>
          </div>
          <div class="gallery-content-wrap wow fadeInRight" data-wow-delay=".4s">
            <div class="gallery-info">
              <h2><span> 欢迎</span>来到我们的<br><span> 沙洲</span></h2>
              <p>
                “沙洲户外，与您同行每一步。在崎岖的山路上，在广阔的天地间，我们用专业的装备和不懈的追求，为您的探险之旅提供坚实的后盾。选择沙洲，选择一份信任，选择一份激情。让我们的高品质装备伴随您征服每一座高峰，穿越每一片丛林，体验每一次心跳。沙洲户外，您户外旅程的最佳伙伴。”
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--CTA section 2-->
    <section class="section cta-creative media-overlay" style="background-image:url('images/background-3.png')">
      <div class="container">
        <div class="row row-30">
          <div class="col">
            <div class="col-xl-5 col-sm-10 col-12 col-md-8 wow fadeInLeft">
              <h2 class="big big-title">是时候<br>跨入沙洲</h2>
              <p class="offset-top-30">
                “探索无界限，装备随心选。我们提供全方位户外装备，从徒步到攀登，从露营到水上冒险，每一件产品都经过精心挑选，确保您在每一次探险中都能享受到无与伦比的舒适与安全。加入我们的户外社区，分享您的旅程，获取灵感，让每一次出发都充满期待。立即访问，为您的下一次户外之旅做好准备！”
              </p><a class="button button-primary button-md" href="#" data-custom-scroll-to="join-now">Join now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Slider Modern-->
    <!--Slider Modern-->
    <section class="section section-lg slider-modern" id="coaches" data-type="anchor">
      <div class="container">
        <div class="row justify-content-center">
          <h2 class="text-uppercase">我们的教练</h2>
        </div>
      </div>
      <div class="container">
        <div class="owl-carousel owl-creative fadeInUp wow" data-xl-items="3" data-lg-items="2" data-sm-items="2"
          data-items="1" data-dots="true" data-nav="true" data-stage-padding="0" data-loop="true" data-margin="50"
          data-mouse-drag="false" data-navigation-container="#owl-carousel-nav" data-dots-each="1" data-center="true"
          data-autoplay="false">
          <? include 'php/Slider_Modern.php' ?>
        </div>
      </div>
    </section>
    <!--Counters-->
    <section class="section counters-section">
      <div class="container">
        <div class="row justify-content-center border-classic border-classic-big">
          <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay=".3s">
            <div class="counter-creative">
              <div class="counter-creative-number"><span class="counter">130</span></div>
              <h6 class="counter-creative-title">Clients</h6>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 wow fadeInUp">
            <div class="counter-creative">
              <div class="counter-creative-number"><span class="counter">25</span></div>
              <h6 class="counter-creative-title">Coaches</h6>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 wow fadeInUp">
            <div class="counter-creative">
              <div class="counter-creative-number"><span class="counter">09</span></div>
              <h6 class="counter-creative-title">awards</h6>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 wow fadeInRight" data-wow-delay=".3s">
            <div class="counter-creative">
              <div class="counter-creative-number"><span class="counter">25</span></div>
              <h6 class="counter-creative-title">Groups</h6>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Slider Creative-->
    <!-- Slider Creative-->
    <section class="section slider-creative bg-gray-lighten">
      <div class="container">
        <div class="row justify-content-lg-between justify-content-center dots-creative">
          <div class="col-xl-6 col-md-12 col-12 wow fadeInLeft">
            <h2 class="creative-title">我们的客户<span> 说什么</span></h2>
            <div class="slider-creative-content">
              <!-- Slick Carousel-->
              <div class="slick-slider carousel-parent" data-arrows="true" data-loop="true" data-dots="false"
                data-swipe="false" data-items="1" data-child="#child-carousel" data-for="#child-carousel">
                <?php
                include 'php/what_our_clicent.php';
                ?>
              </div>
            </div><a class="button button-primary button-md" href="#">leave your Review</a>
          </div>
          <div class="col-xl-4 col-md-12 col-sm-12 col-12 wow fadeInRight">
            <div class="slick-slider slick-child" id="child-carousel" data-for=".carousel-parent" data-arrows="false"
              data-loop="true" data-dots="true" data-swipe="false" data-items="2" data-sm-items="2" data-xl-items="1"
              data-lg-items="3" data-md-items="2">
              <? include 'php/what_our_clicent_image.php' ?>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!--Blog-->
    <!--Blog-->

    <section class="section section-lg">
      <div class="container">
        <div class="row row-50 justify-content-center no-gutters">
          <div class="col-12 text-center">
            <h2 class="text-uppercase">我们的博客</h2>
          </div>
          <div class="col-xl-4 col-bordered col-lg-6 col-sm-10 col-12 fadeInLeft wow" data-wow-delay=".2s">
            <div class="post-classic">
              <div class="post-preview"><img src="images/post-img-1.png" alt="" />
              </div>
              <div class="post-title">
                <h4><a href="article.php?article_id=1">2024国庆希夏暴雪，北线成功突围</a></h4>
              </div>
              <div class="post-description">希夏暴雪，俄热出山，齐腰深的雪走了，6040的垭口翻了，八级的大风吹了，小菜狗子当了，完美。
                啥也不说，先上行程表。
                2024国庆希夏暴雪，北线成功突围
                前话...</div><a class="button button-primary button-md" href="article.php?article_id=1">read more</a>
              <div class="post-date">nov 03<span></span>2024</div>
            </div>
          </div>
          <div class="col-xl-4 col-bordered col-lg-6 col-sm-10 col-12 wow fadeInUp" data-wow-delay=".3s">
            <div class="post-classic">
              <div class="post-preview"><img src="images/post-img-2.png" alt="" />
              </div>
              <div class="post-title">
                <h4><a href="article.php?article_id=2">巨人之旅--6天6夜330公里
                  </a></h4>
              </div>
              <div class="post-description">
                总结一下：330公里，3个珠穆朗玛峰的爬升，闭环赛事，关门时间150小时，参赛容量上限1100人。除开直通者，来者不限，只要你够胆，尽管来抽签！当然，赛事主办方对于国家配额，拥有最终解释权。...</div>
              <a class="button button-primary button-md" href="article.php?article_id=2">read more</a>
              <div class="post-date">nov 13<span></span>2024</div>
            </div>
          </div>
          <div class="col-xl-4 col-bordered col-lg-6 col-sm-10 col-12 wow fadeInRight" data-wow-delay=".2s">
            <div class="post-classic">
              <div class="post-preview"><img src="images/post-img-3.png" alt="" />
              </div>
              <div class="post-title">
                <h4><a href="article.php?article_id=3">新驴请教装备的选择
                  </a></h4>
              </div>
              <div class="post-description">新驴，想在周末去参加家里一些论坛组织的穿越。还没开始参加。。想先买套装备应付着。

                抓绒衣已经有了，是以前骑单车的时候买的凯乐石的。快干衣用的是迪卡奴的，健身房跑步穿，勉强也能应付，现在夏天马上到了，保暖内衣暂时还用不到。...</div><a
                class="button button-primary button-md" href="article.php?article_id=3">read more</a>
              <div class="post-date">nov 5<span></span>2024</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Footer-->
    <?php include 'moudle/footer.php' ?>

  </div>
  <div class="snackbars" id="form-output-global"></div>
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
  <!-- coded by Drel-->
</body>
<script>
  $(document).ready(function() {
    $('nav a').click(function(e) {
      e.preventDefault();
      var target = $(this).attr('href');
      $('html, body').animate({
        scrollTop: $(target).offset().top
      }, 500);
    });
  });
</script>

</html>