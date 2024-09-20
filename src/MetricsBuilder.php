<?php

namespace Aws;

/**
 * @internal
 */
final class MetricsBuilder
{
    const COMMAND_METRICS_BUILDER = "CommandMetricsBuilder";
    const RESOURCE_MODEL = "A";
    const WAITER = "B";
    const PAGINATOR = "C";
    const RETRY_MODE_LEGACY = "D";
    const RETRY_MODE_STANDARD = "E";
    const RETRY_MODE_ADAPTIVE = "F";
    const S3_TRANSFER = "G";
    const S3_CRYPTO_V1N = "H";
    const S3_CRYPTO_V2 = "I";
    const ENDPOINT_OVERRIDE = "N";
    const ACCOUNT_ID_ENDPOINT = "O";
    const ACCOUNT_ID_MODE_PREFERRED = "P";
    const ACCOUNT_ID_MODE_DISABLED = "Q";
    const ACCOUNT_ID_MODE_REQUIRED = "R";
    const SIGV4A_SIGNING = "S";
    const RESOLVED_ACCOUNT_ID = "T";
    const FLEXIBLE_CHECKSUMS_REQ_CRC32 = "U";
    const FLEXIBLE_CHECKSUMS_REQ_CRC32C = "V";
    const FLEXIBLE_CHECKSUMS_REQ_CRC64 = "W";
    const FLEXIBLE_CHECKSUMS_REQ_SHA1 = "X";
    const FLEXIBLE_CHECKSUMS_REQ_SHA256 = "Y";

    /** @var int */
    private static $MAX_METRICS_SIZE = 1024; // 1KB or 1024 B
    /** @var string */
    private static $METRIC_SEPARATOR = ",";
    /** @var array $metrics */
    private $metrics;
    /** @var int $metricsSize */
    private $metricsSize;

    public function __construct()
    {
        $this->metrics = [];
        // The first metrics does not include the separator
        // therefore it is reduced by default.
        $this->metricsSize = -(strlen(self::$METRIC_SEPARATOR));
    }

    /**
     * Build the metrics string value.
     *
     * @return string
     */
    public function build(): string
    {
        if (empty($this->metrics)) {
            return "";
        }

        return $this->encode();
    }

    /**
     * Encodes the metrics by separating each metric
     * with a comma. Example: for the metrics[A,B,C] then
     * the output would be "A,B,C".
     *
     * @return string
     */
    private function encode(): string
    {
        return implode(self::$METRIC_SEPARATOR, array_keys($this->metrics));
    }

    /**
     * Appends a metric into the internal metrics holder.
     * It checks if the metric can be appended before doing so.
     * If the metric can be appended then, it is added into the
     * metrics holder and the current metrics size is increased
     * by summing the length of the metric being appended plus the length
     * of the separator used for encoding.
     * Example: $currentSize = $currentSize + len($newMetric) + len($separator)
     *
     * @param string $metric
     *
     * @return void
     */
    public function append(string $metric): void
    {
        if (!$this->canMetricBeAppended($metric)) {
            return;
        }

        $this->metrics[$metric] = true;
        $this->metricsSize += strlen($metric) + strlen(self::$METRIC_SEPARATOR);
    }

    /**
     * Validates if a metric can be appended by verifying if the current
     * metrics size plus the new metric plus the length of the separator
     * exceeds the metrics size limit. It also checks if the metric already
     * exists, if so then it returns false.
     * Example: metric can be appended just if:
     *  $currentSize + len($newMetric) + len($metricSeparator) <= MAX_SIZE
     *  and:
     * $newMetric not in $existentMetrics
     *
     * @param string $newMetric
     *
     * @return bool
     */
    private function canMetricBeAppended(string $newMetric): bool
    {
        if ($this->metricsSize
            + (strlen($newMetric) + strlen(self::$METRIC_SEPARATOR))
            > self::$MAX_METRICS_SIZE
        ) {
            @trigger_error(
                "The metric `{$newMetric}` "
                . "can not be added due to size constraints",
                E_USER_WARNING
            );

            return false;
        }

        if (isset($this->metrics[$newMetric])) {
            @trigger_error(
                'The metric ' . $newMetric. ' is already appended!',
                E_USER_WARNING
            );

            return false;
        }

        return true;
    }

    /**
     * Returns the metrics builder from the property @context of a command.
     *
     * @param Command $command
     *
     * @return MetricsBuilder
     */
    public static function fromCommand(CommandInterface $command): MetricsBuilder
    {
        return $command->getMetricsBuilder();
    }

    public static function appendMetricsCaptureMiddleware(
        HandlerList $handlerList,
        $metric
    ): void
    {
        $handlerList->appendBuild(
            Middleware::tap(
                function (CommandInterface $command) use ($metric) {
                    self::fromCommand($command)->append(
                        $metric
                    );
                }
            ),
            'metrics-capture-'.$metric
        );
    }
}
