<!-- guestbook.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>留言板</title>
</head>

<body>
    <h1>留言板</h1>
    <form action="demo_message_post.php" method="post">
        <label for="name">姓名:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="message">留言:</label>
        <textarea id="message" name="message" required></textarea><br><br>
        <input type="submit" value="提交留言">
    </form>
</body>

</html>