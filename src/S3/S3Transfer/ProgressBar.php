<?php

namespace Aws\S3\S3Transfer;

interface ProgressBar
{
    public function getPaintedProgress(): string;

    public function setArgs(array $args);

    public function setArg(string $key, mixed $value);

    public function setPercentCompleted(int $percent): void;
}