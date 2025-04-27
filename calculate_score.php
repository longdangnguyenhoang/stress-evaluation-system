<?php
function calculateScore($postData) {
    $questions = json_decode(file_get_contents('questions.json'), true);
    $rules = json_decode(file_get_contents('rules.json'), true);

    $score = 0;
    $scores = [];

    foreach ($questions as $index => $q) {
        $qid = $q['id'];
        $point = 0;
        if (isset($postData[$qid]) && isset($rules[$qid][$postData[$qid]])) {
            $point = $rules[$qid][$postData[$qid]];
            $score += $point;
        }
        $scores[$index] = $point;
    }

    return [$score, $scores];
}
?>
