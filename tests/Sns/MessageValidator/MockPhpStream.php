<?php
namespace Aws\Test\Sns\MessageValidator;

class MockPhpStream
{
    private static $startingData = '';
    private $index;
    private $length;
    private $data;

    public static function setStartingData($data)
    {
        self::$startingData = $data;
    }

    public function __construct()
    {
        $this->data = self::$startingData;
        $this->index = 0;
        $this->length = strlen(self::$startingData);
    }

    public function stream_open($path, $mode, $options, &$opened_path)
    {
        return true;
    }

    public function stream_close()
    {
    }

    public function stream_stat()
    {
        return array();
    }

    public function stream_flush()
    {
        return true;
    }

    public function stream_read($count)
    {
        $length = min($count, $this->length - $this->index);
        $data = substr($this->data, $this->index);
        $this->index = $this->index + $length;

        return $data;
    }

    public function stream_eof()
    {
        return ($this->index >= $this->length);
    }

    public function stream_write($data)
    {
        return 0;
    }
}
