<?php
include 'calculate_score.php';
include 'get_advice.php';
include 'save_history.php';

list($score, $scores) = calculateScore($_POST);

$categories = json_decode(file_get_contents('categories.json'), true);
list($level, $advice) = getAdvice($score);

// Lưu lịch sử
saveHistory($score, $level, $advice, $scores);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Kết quả đánh giá stress</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Kết quả đánh giá mức độ stress</h2>

  <div class="result-box">
    <h3>Mức độ stress: <?= htmlspecialchars($level) ?></h3>
    <p><strong>Tổng điểm:</strong> <?= htmlspecialchars($score) ?></p>
    <p><strong>Khuyến nghị:</strong> <?= htmlspecialchars($advice) ?></p>
    <a href="index.php" class="btn-back">Làm lại khảo sát</a>
    <a href="history.php" class="btn-history">Xem lịch sử khảo sát</a> <!-- Nút xem lịch sử -->
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
          ticks: { stepSize: 1 }
        }
      }
    }
  });
</script>
</body>
</html>
