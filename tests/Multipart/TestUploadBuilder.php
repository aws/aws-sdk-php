<?php
namespace Aws\Test\Multipart;

use Aws\Multipart\UploadState;
use Aws\Multipart\AbstractUploadBuilder;

/**
 * Concrete UploadBuilder for the purposes of the following test.
 */
class TestUploadBuilder extends AbstractUploadBuilder
{
    protected $config = [
        'part'    => [
            'min_size' => 5242880,
            'max_size' => 5368709120,
            'max_num'  => 10000,
            'param'    => 'PartNumber',
        ],
        'id' => ['foo', 'bar', 'baz'],
        'initiate' => [
            'command' => 'CreateMultipartUpload',
            'params'  => [],
        ],
        'upload' => [
            'command' => 'UploadPart',
            'params'  => [],
        ],
        'complete' => [
            'command' => 'CompleteMultipartUpload',
            'params'  => [],
        ],
        'abort' => [
            'command' => 'AbortMultipartUpload',
            'params'  => [],
        ],
    ];

    public function __construct(array $params = [])
    {
        $this->uploadId = $params + $this->uploadId;
    }

    protected function loadStateByUploadId(array $params = [])
    {
        return new UploadState($params);
    }

    protected function prepareParams()
    {
        // No-op
    }

    protected function determinePartSize()
    {
        return 5;
    }

    protected function getCreatePartFn()
    {
        return function () {};
    }

    protected function getCompleteParamsFn()
    {
        return function () {};
    }

    protected function getResultHandlerFn()
    {
        return function () {};
    }
}