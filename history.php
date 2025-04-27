<?php
$historyFile = 'history.json';

if (file_exists($historyFile)) {
    $history = json_decode(file_get_contents($historyFile), true);
    if (!is_array($history)) {
        $history = [];
    }
} else {
    $history = [];
}

// Xử lý yêu cầu xóa lịch sử
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_history'])) {
    file_put_contents($historyFile, json_encode([]));  // Xóa tất cả dữ liệu trong history.json
    $history = []; // Cập nhật lại mảng $history để hiển thị lại sau khi xóa
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lịch sử khảo sát</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Lịch sử khảo sát mức độ stress</h2>

    <?php if (count($history) > 0): ?>
        <table class="history-table">
            <thead>
                <tr>
                    <th>Thời gian</th>
                    <th>Điểm</th>
                    <th>Mức độ</th>
                    <th>Khuyến nghị</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($history as $entry): ?>
                    <tr>
                        <td><?= htmlspecialchars($entry['timestamp']) ?></td>
                        <td><?= htmlspecialchars($entry['score']) ?></td>
                        <td><?= htmlspecialchars($entry['level']) ?></td>
                        <td><?= htmlspecialchars($entry['advice']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Chưa có lịch sử khảo sát nào.</p>
    <?php endif; ?>

    <div class="action-buttons">
        <form method="POST" style="display: inline;">
            <button type="submit" name="delete_history" class="btn-delete">Xóa tất cả lịch sử</button>
            <a href="index.php" class="btn-back">Quay lại khảo sát</a>
        </form>
    </div>
</div>
</body>
</html>
