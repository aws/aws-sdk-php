<?php
/**
 * Fake STS endpoint for CredentialDaemonProviderTest.
 *
 * Usage: php fake_sts.php <portFile> <requestLogFile>
 *
 * Listens on 127.0.0.1 on a free port and writes the port to the port file.
 * Every request gets an AssumeRole reply with access key ID ASIAASSUMED.
 * The request body of each request is appended to the request log, one per
 * line. The server exits after 30 seconds.
 */
$portFile = $argv[1];
$log = $argv[2];

$server = @stream_socket_server('tcp://127.0.0.1:0', $errno, $errstr);
if (!$server) {
    fwrite(STDERR, "fake sts: cannot listen: {$errstr}\n");
    exit(1);
}
$name = stream_socket_get_name($server, false);
file_put_contents($portFile . '.tmp', substr($name, strrpos($name, ':') + 1));
rename($portFile . '.tmp', $portFile);

$body = '<AssumeRoleResponse xmlns="https://sts.amazonaws.com/doc/2011-06-15/">'
    . '<AssumeRoleResult><Credentials><AccessKeyId>ASIAASSUMED</AccessKeyId>'
    . '<SecretAccessKey>assumed-secret</SecretAccessKey>'
    . '<SessionToken>assumed-token</SessionToken>'
    . '<Expiration>2099-01-01T00:00:00Z</Expiration></Credentials>'
    . '<AssumedRoleUser><AssumedRoleId>AROAEXAMPLE:s</AssumedRoleId>'
    . '<Arn>arn:aws:sts::123456789012:assumed-role/Admin/s</Arn>'
    . '</AssumedRoleUser></AssumeRoleResult>'
    . '<ResponseMetadata><RequestId>r</RequestId></ResponseMetadata>'
    . '</AssumeRoleResponse>';

$deadline = microtime(true) + 30;
while (microtime(true) < $deadline) {
    $conn = @stream_socket_accept($server, 1);
    if (!$conn) {
        continue;
    }
    stream_set_timeout($conn, 5);
    $length = 0;
    while (($header = fgets($conn)) !== false && rtrim($header) !== '') {
        if (stripos($header, 'Content-Length:') === 0) {
            $length = (int) trim(substr($header, strlen('Content-Length:')));
        }
    }
    $request = $length > 0 ? (string) stream_get_contents($conn, $length) : '';
    file_put_contents($log, $request . "\n", FILE_APPEND);
    fwrite(
        $conn,
        "HTTP/1.1 200 OK\r\nContent-Type: text/xml\r\nConnection: close\r\n"
        . 'Content-Length: ' . strlen($body) . "\r\n\r\n" . $body
    );
    fclose($conn);
}
fclose($server);
