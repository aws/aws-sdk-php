<?php

namespace Aws\S3\Features\S3Transfer;

interface TransferListenerFactory
{
    public function __invoke(array $config): TransferListener;
}