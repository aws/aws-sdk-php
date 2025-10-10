<?php

namespace Aws\S3\S3Transfer\Models;

use Aws\S3\S3Transfer\Progress\TransferListener;
use InvalidArgumentException;

abstract class TransferRequest
{
    public static array $configKeys = [
        'track_progress' => 'bool',
    ];

    /** @var array  */
    protected array $listeners;

    /** @var TransferListener|null  */
    protected ?TransferListener $progressTracker;

    /** @var array */
    protected array $config;

    /**
     * @param array $listeners
     * @param TransferListener|null $progressTracker
     * @param array $config
     */
    public function __construct(
        array $listeners,
        ?TransferListener $progressTracker,
        array $config
    ) {
        $this->listeners = $listeners;
        $this->progressTracker = $progressTracker;
        $this->config = $config;
    }

    /**
     * Get current listeners.
     *
     * @return array
     */
    public function getListeners(): array
    {
        return $this->listeners;
    }

    /**
     * Get the progress tracker.
     *
     * @return TransferListener|null
     */
    public function getProgressTracker(): ?TransferListener
    {
        return $this->progressTracker;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $defaultConfig
     *
     * @return void
     */
    public function updateConfigWithDefaults(array $defaultConfig): void
    {
        foreach (static::$configKeys as $key => $_) {
            if (isset($defaultConfig[$key]) && empty($this->config[$key])) {
                $this->config[$key] = $defaultConfig[$key];
            }
        }
    }

    /**
     * For validating config. By default, it provides an empty
     * implementation.
     * @return void
     */
    public function validateConfig(): void {
        foreach (static::$configKeys as $key => $type) {
            if (isset($this->config[$key])
                && !call_user_func('is_' . $type, $this->config[$key])) {
                throw new InvalidArgumentException(
                    "The provided config `$key` must be $type."
                );
            }
        }
    }
}
