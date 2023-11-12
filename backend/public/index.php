<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php'; // todo routing etc

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

//addLog($logMessage);
\Services\H::log($logMessage);

header('Access-Control-Allow-Origin: *');

echo json_encode([
    'hello' => 'world'
]);
