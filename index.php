<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đánh giá mức độ stress</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h2>Khảo sát đánh giá mức độ stress</h2>
    <p class="intro">Vui lòng trả lời các câu hỏi dưới đây để hệ thống có thể đánh giá mức độ stress hiện tại của bạn.</p>
    <form method="post" action="evaluate.php" class="survey-form">

      <?php
      $questions = json_decode(file_get_contents('questions.json'), true);
      foreach ($questions as $q) {
          echo '<div class="question">';
          echo '<label>' . htmlspecialchars($q['label']) . '</label><br>';
          echo '<select name="' . htmlspecialchars($q['name']) . '" required>';
          echo '<option value="">-- Chọn --</option>';
          foreach ($q['options'] as $value => $text) {
              echo '<option value="' . htmlspecialchars($value) . '">' . htmlspecialchars($text) . '</option>';
          }
          echo '</select>';
          echo '</div>';
      }
      ?>

      <button type="submit" class="submit-btn">Xem kết quả đánh giá</button>
    </form>
  </div>
</body>
</html>
