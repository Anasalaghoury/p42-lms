<?php
require "config/db.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $insttructor = trim($_POST["insttructor"]);
    $duration = intval($_POST["duration_hours"]);
    $stmt = $pdo->prepare("INSERT INTO courses (title, description, insttructor, duration_hours) VALUES (:title, :description, :insttructor, :duration)");
    $stmt->execute([
        "title" => $title,
        "description" => $description,
        "insttructor" => $insttructor,
        "duration" => $duration
    ]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة دورة جديدة</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
     <div class="panel form-panel">
        <h1>إضافة دورة تدريبية جديدة</h1>
        <form method="POST">
            <label for="title">عنوان الدورة</label>
            <input type="text" id="title" mame="title" required>
            <label for="insttructor">اسم المدرب</label>
            <input type="text" id="insttructor" mame="insttructor" required>
            <label for="duration">عدد ساعات الدورة</label>
            <input type="number" id="duration_hours" mame="duration_hours" min="1" required>
            <label for="description">وصف الدورة </label>
            <textarea id="description" mame="description" rows="4" required></textarea>
            <button type="submit">حفظ الدورة</button>
            <a href="index.php" class="btn-cancel">إلغاء</a>
        </form>
     </div>
</body>
</html>

