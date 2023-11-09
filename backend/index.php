<?php

function getIp(): string {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $_SERVER['REMOTE_ADDR'];
}

function addLog($message): void {
    $handle = fopen('php://stdout', 'w');
    fwrite($handle, $message . PHP_EOL);
    fclose($handle);
}

$logMessage = sprintf(
    '%s: --- Response from %s ---',
    (new DateTime())->format('Y-m-d H:i:s'),
    getIp()
);
addLog($logMessage);

header('Access-Control-Allow-Origin: *');

echo json_encode([
    'hello' => 'world'
]);
