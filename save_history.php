<?php
function saveHistory($score, $level, $advice, $details) {
    $historyFile = 'history.json';

    $entry = [
        'timestamp' => date('Y-m-d H:i:s'),
        'score' => $score,
        'level' => $level,
        'advice' => $advice,
        'details' => $details
    ];

    if (file_exists($historyFile)) {
        $history = json_decode(file_get_contents($historyFile), true);
        if (!is_array($history)) {
            $history = [];
        }
    } else {
        $history = [];
    }

    $history[] = $entry;

    file_put_contents($historyFile, json_encode($history, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}
?>
