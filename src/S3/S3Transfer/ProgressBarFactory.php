<?php

namespace Aws\S3\S3Transfer;

interface ProgressBarFactory
{
    public function __invoke(): ProgressBar;
}