<?php
function calculateScore($responses) {
    $mapping = json_decode(file_get_contents('rules.json'), true);
    $categories = json_decode(file_get_contents('categories.json'), true);

    $score = 0;
    $scores = array_fill(0, count($categories), 0); // tự động theo số lượng categories

    foreach ($mapping as $key => $values) {
        $point = 0;
        if (isset($responses[$key]) && isset($values[$responses[$key]])) {
            $point = $values[$responses[$key]];
            $score += $point;
        }
        $index = intval(substr($key, 1)) - 1; 
        if (isset($scores[$index])) {
            $scores[$index] = $point;
        }
    }

    return [
        'score' => $score,
        'scores' => $scores,
        'categories' => $categories
    ];
}
?>
