<?php

namespace Aws\S3\Features\S3Transfer;

abstract class ListenerNotifier
{
    abstract protected function notify(string $event, array $params = []): void;
}