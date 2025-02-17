<?php

namespace Aws\S3\S3Transfer;

interface TransferListenerFactory
{
    public function __invoke(array $config): TransferListener;
}