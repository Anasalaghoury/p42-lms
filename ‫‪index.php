<?php
require "config/db.php";
$sql = "SELECT courses.*, COUNT(enrollments.id) AS student_count
FROM courses
LEFT JOIN enrollments ON courses.id = enrollments.course_id
GROUP BY courses.id
ORDER BY courses.created_at DESC";
$stmt = $pdo->query($sql);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة الدورات التدريبية</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="site-header">
        <h1>منصة التدريب الإلكتروني</h1>
        <a href="add_course.php" class="btn-add">+ دورة جديدة</a>
    </header>
    <div class="courses-grid">
        <?php foreach ($courses as $course): ?>
        <div class="course-card">
            <h3><?php echo htmlspecialchars($course["title"]); ?></h3>
            <p class="instructor">المدرب :?> php echo htmlspecialchars($course["instructor"]); 
?></p>
    <p><?php echo htmlspecialchars($course["description"]); ?></p>
    <div class="course-meta">
        <span><?php echo $course["duration_hours"]; ?> ساعة تدريبية </span>
        <span><?php echo $course["student_count"]; ?>طالب مسجل</span>
    </div>
        <a href="course_details.php?id=<?php echo $course['id']; ?>" class="btn-view"> عرض التفاصيل و التسجيل</a>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
