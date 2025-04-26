<?php
$questions_json = file_get_contents('questions.json');
$questions_data = json_decode($questions_json, true);
?>

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
    <p class="intro">
      Vui lòng trả lời các câu hỏi dưới đây để hệ thống có thể đánh giá mức độ stress hiện tại của bạn.
    </p>
    <form method="post" action="evaluate.php" class="survey-form">

      <?php
      // Hiển thị câu hỏi
      foreach ($questions_data['questions'] as $question) {
        echo '<div class="question">';
        echo '<label for="' . $question['id'] . '">' . $question['question'] . '</label><br>';
        echo '<select name="' . $question['id'] . '" required>';
        echo '<option value="">-- Chọn --</option>';
        foreach ($question['options'] as $option) {
          echo '<option value="' . $option['value'] . '">' . $option['label'] . '</option>';
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
