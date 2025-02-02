<?php

namespace Aws\S3\Features\S3Transfer;

interface ProgressBarFactory
{
    public function __invoke(): ProgressBar;
}