<?php
function getAdvice($score) {
    $advices = json_decode(file_get_contents('advices.json'), true);

    foreach ($advices as $a) {
        if ($score >= $a['min'] && $score <= $a['max']) {
            return [$a['level'], $a['advice']];
        }
    }

    // Nếu không match cái nào (trường hợp hiếm)
    return ["Không xác định", "Không tìm thấy khuyến nghị phù hợp với điểm số hiện tại."];
}
?>
