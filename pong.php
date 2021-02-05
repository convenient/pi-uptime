<?php
set_error_handler(function ($severity, $message, $file, $line) {
    throw new \ErrorException($message, $severity, $severity, $file, $line);
});

$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);

$lastPush = $data['timestamp'];
echo "lastPush at $lastPush" . PHP_EOL;

$sixHoursAgo = strtotime('-2 hours');
echo "timeAgo at $sixHoursAgo" . PHP_EOL;
if ($lastPush <= $sixHoursAgo) {
    echo "failure" . PHP_EOL;
    exit(1);
}

echo "pass" . PHP_EOL;
exit(0);
