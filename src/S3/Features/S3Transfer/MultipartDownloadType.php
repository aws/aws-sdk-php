<?php

namespace Aws\S3\Features\S3Transfer;

class MultipartDownloadType
{
    private static string $rangedGetType = 'rangedGet';
    private static string $partGetType = 'partGet';

    /** @var string */
    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString(): string {
        return $this->value;
    }

    /**
     * @param MultipartDownloadType $type
     *
     * @return bool
     */
    public function equals(MultipartDownloadType $type): bool
    {
        return $this->value === $type->value;
    }

    /**
     * @return MultipartDownloadType
     */
    public static function rangedGet(): MultipartDownloadType {
        return new static(self::$rangedGetType);
    }

    /**
     * @return MultipartDownloadType
     */
    public static function partGet(): MultipartDownloadType {
        return new static(self::$partGetType);
    }
}