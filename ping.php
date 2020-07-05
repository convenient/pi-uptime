<?php
set_error_handler(function ($severity, $message, $file, $line) {
    throw new \ErrorException($message, $severity, $severity, $file, $line);
});

exec('uptime', $uptimeOutput, $return);

if ($return === 0) {
    $uptimeOutput = implode(PHP_EOL, array_filter($uptimeOutput));
} else {
    $uptimeOutput = 'error running `uptime`';
}

$time = time();
file_put_contents(
    __DIR__ . '/data.json',
    json_encode(
        [
            'datetime' => date('Y-m-d-H-i-s', $time),
            'timestamp' => $time,
            'uptime' => $uptimeOutput
        ]
    )
);