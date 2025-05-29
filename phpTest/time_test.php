<!-- clock.html -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>实时时钟</title>
</head>

<body>
  <h1>当前时间：</h1>
  <div id="current-time"></div>
  <script>
    // clock.js
    document.addEventListener('DOMContentLoaded', function () {
      function updateTime() {
        fetch('/php/get_time.php')
          .then(response => response.json())
          .then(data => {
            document.getElementById('current-time').textContent = data.time;
          })
          .catch(error => console.error("Error:", error));
      }

      // 每 1 秒更新一次时间
      setInterval(updateTime, 1000);
    });
  </script>
</body>

</html>