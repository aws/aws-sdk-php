<?php
/**
 * Fake credential daemon for CredentialDaemonProviderTest.
 *
 * Usage: php fake_credential_daemon.php <socket> <scenarioJsonFile> <requestLogFile>
 *
 * The scenario is a JSON list with one step per connection:
 *   reply               (string) bytes to write. "{{REPEAT}}" in it is replaced
 *                       by the "repeat" bytes.
 *   repeat              ({"char": "a", "count": N}) bytes built here.
 *   newline             (bool, default true) append "\n" to the reply.
 *   delay               (float) seconds to wait before replying.
 *   hold                (float) seconds to keep the connection open after replying.
 *   close_without_reply (bool) close the connection without replying.
 *   reset               (bool) wait for the request, then close the connection
 *                       without reading it, so that the client's read fails
 *                       with a connection reset on Linux.
 *   lines               (list) reply lines, each {"text": string, "pad_to": int|null},
 *                       written with "\n" after each, in place of "reply".
 *                       "\"{{ID}}\"" in a line is replaced by the request's id.
 *                       With pad_to, "{{PAD}}" is replaced by "x" characters so
 *                       that the line is pad_to bytes long.
 *
 * Each request line received is appended to the request log. The socket file
 * exists only once the server listens. The daemon exits when the steps run
 * out, or after 30 seconds.
 */
$path = $argv[1];
$steps = json_decode(file_get_contents($argv[2]), true);
$log = $argv[3];

@unlink($path);
$server = @stream_socket_server('unix://' . $path, $errno, $errstr);
if (!$server) {
    fwrite(STDERR, "fake credential daemon: cannot listen on {$path}: {$errstr}\n");
    exit(1);
}

$deadline = microtime(true) + 30;
foreach ($steps as $step) {
    $conn = false;
    while (!$conn && microtime(true) < $deadline) {
        $conn = @stream_socket_accept($server, 1);
    }
    if (!$conn) {
        break;
    }
    stream_set_timeout($conn, 5);
    if (!empty($step['reset'])) {
        $read = [$conn];
        $write = $except = null;
        stream_select($read, $write, $except, 5);
        usleep(100000);
        file_put_contents($log, "\n", FILE_APPEND);
        fclose($conn);
        continue;
    }
    $line = fgets($conn, 1 << 20);
    file_put_contents($log, $line === false ? "\n" : rtrim($line, "\n") . "\n", FILE_APPEND);

    if (!empty($step['delay'])) {
        usleep((int) ($step['delay'] * 1e6));
    }
    if (isset($step['lines'])) {
        $request = $line === false ? null : json_decode($line, true);
        $id = json_encode(is_array($request) ? ($request['id'] ?? null) : null);
        $step['reply'] = '';
        foreach ($step['lines'] as $replyLine) {
            $text = str_replace('"{{ID}}"', $id, $replyLine['text']);
            if (isset($replyLine['pad_to'])) {
                $fill = $replyLine['pad_to'] - (strlen($text) - strlen('{{PAD}}'));
                $text = str_replace('{{PAD}}', str_repeat('x', max(0, $fill)), $text);
            }
            $step['reply'] .= $text . "\n";
        }
        $step['newline'] = false;
    }
    if (empty($step['close_without_reply'])) {
        $bytes = $step['reply'] ?? '';
        if (isset($step['repeat'])) {
            $fill = str_repeat($step['repeat']['char'], $step['repeat']['count']);
            $bytes = strpos($bytes, '{{REPEAT}}') !== false
                ? str_replace('{{REPEAT}}', $fill, $bytes)
                : $bytes . $fill;
        }
        if (!isset($step['newline']) || $step['newline']) {
            $bytes .= "\n";
        }
        while ($bytes !== '') {
            $written = @fwrite($conn, $bytes);
            if ($written === false || $written === 0) {
                break;
            }
            $bytes = (string) substr($bytes, $written);
        }
        if (!empty($step['hold'])) {
            usleep((int) ($step['hold'] * 1e6));
        }
    }
    fclose($conn);
}

fclose($server);
@unlink($path);
