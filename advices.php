<?php
function getAdvice($score) {
    if ($score <= 4) {
        return [
            "level" => "Thấp",
            "advice" => "Bạn đang kiểm soát tốt công việc và sức khỏe tinh thần. Tiếp tục duy trì lịch trình ổn định, nghỉ ngơi đủ và duy trì các mối quan hệ xã hội tích cực."
        ];
    } elseif ($score <= 9) {
        return [
            "level" => "Trung bình",
            "advice" => "Bạn có dấu hiệu mệt mỏi hoặc áp lực nhẹ. Nên xem lại khối lượng công việc, đảm bảo giấc ngủ và dành thời gian thư giãn hợp lý mỗi ngày."
        ];
    } elseif ($score <= 14) {
        return [
            "level" => "Cao",
            "advice" => "Bạn đang gặp áp lực đáng kể. Hãy cân nhắc giảm tải công việc, chia sẻ vấn đề với người tin cậy và bắt đầu thực hành các phương pháp giảm stress (thiền, viết nhật ký, thể thao nhẹ…)."
        ];
    } else {
        return [
            "level" => "Nguy hiểm",
            "advice" => "Mức độ stress của bạn đang ở mức nghiêm trọng và có thể ảnh hưởng tiêu cực tới sức khỏe tâm thần. Nên cân nhắc tìm đến sự hỗ trợ từ chuyên gia tâm lý hoặc bác sĩ."
        ];
    }
}
?>
