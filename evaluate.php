<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Kết quả đánh giá stress</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h2>Kết quả đánh giá mức độ stress</h2>

    <?php
    $score = 0;
    $categories = ['Giờ làm', 'Giấc ngủ', 'Tài chính', 'Thời gian nghỉ ngơi', 'Sức khỏe thể chất', 'Quan hệ xã hội', 'Công việc', 'Cảm xúc'];
    $scores = [0, 0, 0, 0, 0, 0, 0, 0];

    // Tập luật (rule-based)
    $mapping = json_decode(file_get_contents('rules.json'), true);

    // Tính tổng điểm và điểm từng yếu tố
    foreach ($mapping as $key => $values) {
      $point = 0;
      if (isset($_POST[$key]) && isset($values[$_POST[$key]])) {
        $point = $values[$_POST[$key]];
        $score += $point;
      }
      $index = intval(substr($key, 1)) - 1; // q1 -> 0, q2 -> 1, ...
      $scores[$index] = $point;
    }

    // Suy luận theo ngưỡng điểm
    $level = "";
    $advice = "";
    if ($score <= 4) {
      $level = "Thấp";
      $advice = "Bạn đang kiểm soát tốt công việc và sức khỏe tinh thần. Tiếp tục duy trì lịch trình ổn định, nghỉ ngơi đủ và duy trì các mối quan hệ xã hội tích cực.";
    } elseif ($score <= 9) {
      $level = "Trung bình";
      $advice = "Bạn có dấu hiệu mệt mỏi hoặc áp lực nhẹ. Nên xem lại khối lượng công việc, đảm bảo giấc ngủ và dành thời gian thư giãn hợp lý mỗi ngày.";
    } elseif ($score <= 14) {
      $level = "Cao";
      $advice = "Bạn đang gặp áp lực đáng kể. Hãy cân nhắc giảm tải công việc, chia sẻ vấn đề với người tin cậy và bắt đầu thực hành các phương pháp giảm stress (thiền, viết nhật ký, thể thao nhẹ…).";
    } else {
      $level = "Nguy hiểm";
      $advice = "Mức độ stress của bạn đang ở mức nghiêm trọng và có thể ảnh hưởng tiêu cực tới sức khỏe tâm thần. Nên cân nhắc tìm đến sự hỗ trợ từ chuyên gia tâm lý hoặc bác sĩ.";
    }
    ?>

    <div class="result-box">
      <h3>Mức độ stress: <?= $level ?></h3>
      <p><strong>Tổng điểm:</strong> <?= $score ?> (theo thang điểm 0–19)</p>
      <p><strong>Khuyến nghị:</strong> <?= $advice ?></p>
      <a href="index.php" class="btn-back">Làm lại khảo sát</a>
    </div>

    <h3>Biểu đồ mức độ ảnh hưởng theo từng yếu tố:</h3>
    <div class="chart-container" style="width: 100%; max-width: 600px; margin: 2rem auto;">
      <canvas id="stressChart"></canvas>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const labels = <?= json_encode($categories) ?>;
    const data = <?= json_encode($scores) ?>;

    const ctx = document.getElementById('stressChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Mức độ ảnh hưởng',
          data: data,
          backgroundColor: '#6366f1',
          borderRadius: 6
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            max: 3,
            ticks: {
              stepSize: 1
            }
          }
        }
      }
    });
  </script>
</body>
</html>
