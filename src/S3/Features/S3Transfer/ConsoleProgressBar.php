<?php

namespace Aws\S3\Features\S3Transfer;

class ConsoleProgressBar implements ProgressBar
{
    public const BLACK_COLOR_CODE = '[30m';
    public const BLUE_COLOR_CODE = '[34m';
    public const GREEN_COLOR_CODE = '[32m';
    public const RED_COLOR_CODE = '[31m';
    public const PLAIN_FORMAT = 'plain';
    public const TRANSFER_FORMAT = 'transfer_format';
    public const COLORED_TRANSFER_FORMAT = 'colored_transfer_format';

    /** @var array|array[] */
    public static array $formats = [
        'plain' => [
            'format' => "[|progress_bar|] |percent|%",
            'parameters' => []
        ],
        'transfer_format' => [
            'format' => "[|progress_bar|] |percent|% |transferred|/|tobe_transferred| |unit|",
            'parameters' => [
                'transferred',
                'tobe_transferred',
                'unit'
            ]
        ],
        'colored_transfer_format' => [
            'format' => "\033|color_code|[|progress_bar|] |percent|% |transferred|/|tobe_transferred| |unit| |message|\033[0m",
            'parameters' => [
                'transferred',
                'tobe_transferred',
                'unit',
                'color_code',
                'message'
            ]
        ],
    ];

    /** @var string */
    private string $progressBarChar;

    /** @var int */
    private int $progressBarWidth;

    /** @var int */
    private int $percentCompleted;

    /** @var ?array */
    private ?array $format;

    /** @var array */
    private array $args;

    /**
     * @param ?string $progressBarChar
     * @param ?int $progressBarWidth
     * @param ?int $percentCompleted
     * @param array|null $format
     * @param array $args
     */
    public function __construct(
        ?string $progressBarChar = null,
        ?int $progressBarWidth = null,
        ?int $percentCompleted = null,
        ?array $format = null,
        array $args = [],
    ) {
        $this->progressBarChar = $progressBarChar ?? '#';
        $this->progressBarWidth = $progressBarWidth ?? 25;
        $this->percentCompleted = $percentCompleted ?? 0;
        $this->format = $format ?? self::$formats['transfer_format'];
        $this->args = $args ?? [];
    }

    /**
     * Set current progress percent.
     *
     * @param int $percent
     *
     * @return void
     */
    public function setPercentCompleted(int $percent): void
    {
        $this->percentCompleted = max(0, min(100, $percent));
    }

    /**
     * @param array $args
     *
     * @return void
     */
    public function setArgs(array $args): void
    {
        $this->args = $args;
    }

    /**
     * Sets an argument.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function setArg(string $key, mixed $value): void
    {
        $this->args[$key] = $value;
    }

    private function renderProgressBar(): string
    {
        $filledWidth = (int) round(($this->progressBarWidth * $this->percentCompleted) / 100);
        return str_repeat($this->progressBarChar, $filledWidth)
            . str_repeat(' ', $this->progressBarWidth - $filledWidth);
    }

    /**
     *
     * @return string
     */
    public function getPaintedProgress(): string
    {
        foreach ($this->format['parameters'] as $param) {
            if (!array_key_exists($param, $this->args)) {
                $this->args[$param] = '';
            }
        }

        $replacements = [
            '|progress_bar|' => $this->renderProgressBar(),
            '|percent|' => $this->percentCompleted,
        ];

        foreach ($this->format['parameters'] as $param) {
            $replacements["|$param|"] = $this->args[$param] ?? '';
        }

        return strtr($this->format['format'], $replacements);
    }
}