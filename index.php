<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đánh giá mức độ stress</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container">
    <h2>Khảo sát đánh giá mức độ stress</h2>
    <p class="intro">
      Vui lòng trả lời các câu hỏi dưới đây để hệ thống có thể đánh giá mức độ stress hiện tại của bạn.
    </p>
    <form method="post" action="evaluate.php" class="survey-form">
      <div class="question">
        <label>1. Bạn làm việc trung bình bao nhiêu giờ mỗi ngày?</label><br>
        <select name="q1" required>
          <option value="">-- Chọn --</option>
          <option value="under8">Dưới 8 giờ</option>
          <option value="8to10">8-10 giờ</option>
          <option value="over10">Trên 10 giờ</option>
        </select>
      </div>

      <div class="question">
        <label>2. Chất lượng giấc ngủ của bạn như thế nào?</label><br>
        <select name="q2" required>
          <option value="">-- Chọn --</option>
          <option value="good">Ngủ sâu, đủ giấc</option>
          <option value="average">Bình thường</option>
          <option value="poor">Khó ngủ, hay tỉnh giấc</option>
        </select>
      </div>

      <div class="question">
        <label>3. Khối lượng công việc bạn đang đảm nhiệm?</label><br>
        <select name="q3" required>
          <option value="">-- Chọn --</option>
          <option value="low">Thấp</option>
          <option value="medium">Vừa phải</option>
          <option value="high">Cao, quá tải</option>
        </select>
      </div>

      <div class="question">
        <label>4. Bạn có thường xuyên vận động thể chất?</label><br>
        <select name="q4" required>
          <option value="">-- Chọn --</option>
          <option value="yes">Có</option>
          <option value="rarely">Thỉnh thoảng</option>
          <option value="no">Không bao giờ</option>
        </select>
      </div>

      <div class="question">
        <label>5. Bạn có cảm thấy lo âu hoặc căng thẳng kéo dài?</label><br>
        <select name="q5" required>
          <option value="">-- Chọn --</option>
          <option value="no">Không</option>
          <option value="medium">Thỉnh thoảng</option>
          <option value="high">Thường xuyên</option>
        </select>
      </div>

      <div class="question">
        <label>6. Mối quan hệ với đồng nghiệp và cấp trên của bạn như thế nào?</label><br>
        <select name="q6" required>
          <option value="">-- Chọn --</option>
          <option value="good">Tốt</option>
          <option value="normal">Bình thường</option>
          <option value="conflict">Thường xảy ra mâu thuẫn</option>
        </select>
      </div>

      <div class="question">
        <label>7. Bạn có đang gặp áp lực về tài chính không?</label><br>
        <select name="q7" required>
          <option value="">-- Chọn --</option>
          <option value="no">Không</option>
          <option value="some">Ít</option>
          <option value="often">Thường xuyên</option>
        </select>
      </div>

      <div class="question">
        <label>8. Bạn có cảm thấy mệt mỏi kéo dài không rõ lý do?</label><br>
        <select name="q8" required>
          <option value="">-- Chọn --</option>
          <option value="no">Không</option>
          <option value="sometimes">Thỉnh thoảng</option>
          <option value="always">Luôn luôn</option>
        </select>
      </div>

      <button type="submit" class="submit-btn">Xem kết quả đánh giá</button>
    </form>
  </div>
</body>
</html>
