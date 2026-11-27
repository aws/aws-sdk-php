<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

/**
 * @generated Do not edit.
 */

return (static function (): \Generator {
    yield '000 region is not a valid DNS-suffix' => [
        'documentation' => 'region is not a valid DNS-suffix',
        'expect' => [
            'error' => 'Invalid region: region was not a valid DNS name.'
        ],
        'params' => [
            'Region' => 'a b',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '001 Invalid access point ARN: Not S3' => [
        'documentation' => 'Invalid access point ARN: Not S3',
        'expect' => [
            'error' => 'Invalid ARN: The ARN was not for the S3 service, found: not-s3'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:not-s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:not-s3:us-west-2:123456789012:accesspoint:myendpoint'
        ]
    ];
    yield '002 Invalid access point ARN: invalid resource' => [
        'documentation' => 'Invalid access point ARN: invalid resource',
        'expect' => [
            'error' => 'Invalid ARN: The ARN may only contain a single resource component after `accesspoint`.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint:more-data',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint:more-data'
        ]
    ];
    yield '003 Invalid access point ARN: invalid no ap name' => [
        'documentation' => 'Invalid access point ARN: invalid no ap name',
        'expect' => [
            'error' => 'Invalid ARN: Expected a resource of the format `accesspoint:<accesspoint name>` but no name was provided'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:'
        ]
    ];
    yield '004 Invalid access point ARN: AccountId is invalid' => [
        'documentation' => 'Invalid access point ARN: AccountId is invalid',
        'expect' => [
            'error' => 'Invalid ARN: The account id may only contain a-z, A-Z, 0-9 and `-`. Found: `123456_789012`'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456_789012:accesspoint:apname',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456_789012:accesspoint:apname'
        ]
    ];
    yield '005 Invalid access point ARN: access point name is invalid' => [
        'documentation' => 'Invalid access point ARN: access point name is invalid',
        'expect' => [
            'error' => 'Invalid ARN: The access point name may only contain a-z, A-Z, 0-9 and `-`. Found: `ap_name`'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:ap_name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:ap_name'
        ]
    ];
    yield '006 Access points (disable access points explicitly false)' => [
        'documentation' => 'Access points (disable access points explicitly false)',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.s3-accesspoint.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'DisableAccessPoints' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint'
        ]
    ];
    yield '007 Access points: partition does not support FIPS' => [
        'documentation' => 'Access points: partition does not support FIPS',
        'expect' => [
            'error' => 'Partition does not support FIPS'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:cn-north-1:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'cn-north-1',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:cn-north-1:123456789012:accesspoint:myendpoint'
        ]
    ];
    yield '008 Bucket region is invalid' => [
        'documentation' => 'Bucket region is invalid',
        'expect' => [
            'error' => 'Invalid region in ARN: `us-west -2` (invalid DNS name)'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west -2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'DisableAccessPoints' => false,
            'Bucket' => 'arn:aws:s3:us-west -2:123456789012:accesspoint:myendpoint'
        ]
    ];
    yield '009 Access points when Access points explicitly disabled (used for CreateBucket)' => [
        'documentation' => 'Access points when Access points explicitly disabled (used for CreateBucket)',
        'expect' => [
            'error' => 'Access points are not supported for this operation'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'CreateBucket',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'DisableAccessPoints' => true,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint'
        ]
    ];
    yield '010 missing arn type' => [
        'documentation' => 'missing arn type',
        'expect' => [
            'error' => 'Invalid ARN: `arn:aws:s3:us-west-2:123456789012:` was not a valid ARN'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'DisableAccessPoints' => true,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:'
        ]
    ];
    yield '011 SDK::Host + access point + Dualstack is an error' => [
        'documentation' => 'SDK::Host + access point + Dualstack is an error',
        'expect' => [
            'error' => 'Cannot set dual-stack in combination with a custom endpoint.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::UseDualStack' => true,
                    'SDK::Endpoint' => 'https://beta.example.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://beta.example.com',
            'Region' => 'cn-north-1',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '012 Access point ARN with FIPS & Dualstack' => [
        'documentation' => 'Access point ARN with FIPS & Dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.s3-accesspoint-fips.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseFIPS' => true,
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableAccessPoints' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint'
        ]
    ];
    yield '013 Access point ARN with Dualstack' => [
        'documentation' => 'Access point ARN with Dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.s3-accesspoint.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableAccessPoints' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint'
        ]
    ];
    yield '014 vanilla MRAP' => [
        'documentation' => 'vanilla MRAP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://mfzwi23gnjvgw.mrap.accesspoint.s3-global.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'arn:aws:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
            'Region' => 'us-east-1',
            'DisableMultiRegionAccessPoints' => false,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '015 MRAP does not support FIPS' => [
        'documentation' => 'MRAP does not support FIPS',
        'expect' => [
            'error' => 'S3 MRAP does not support FIPS'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'arn:aws:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
            'Region' => 'us-east-1',
            'DisableMultiRegionAccessPoints' => false,
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '016 MRAP does not support DualStack' => [
        'documentation' => 'MRAP does not support DualStack',
        'expect' => [
            'error' => 'S3 MRAP does not support dual-stack'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'arn:aws:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
            'Region' => 'us-east-1',
            'DisableMultiRegionAccessPoints' => false,
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false
        ]
    ];
    yield '017 MRAP does not support S3 Accelerate' => [
        'documentation' => 'MRAP does not support S3 Accelerate',
        'expect' => [
            'error' => 'S3 MRAP does not support S3 Accelerate'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'arn:aws:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
            'Region' => 'us-east-1',
            'DisableMultiRegionAccessPoints' => false,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => true
        ]
    ];
    yield '018 MRAP explicitly disabled' => [
        'documentation' => 'MRAP explicitly disabled',
        'expect' => [
            'error' => 'Invalid configuration: Multi-Region Access Point ARNs are disabled.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::S3::DisableMultiRegionAccessPoints' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'arn:aws:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
            'Region' => 'us-east-1',
            'DisableMultiRegionAccessPoints' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '019 Dual-stack endpoint with path-style forced' => [
        'documentation' => 'Dual-stack endpoint with path-style forced',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.dualstack.us-west-2.amazonaws.com/bucketname'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseDualStack' => true,
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucketname',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'bucketname',
            'Region' => 'us-west-2',
            'ForcePathStyle' => true,
            'UseFIPS' => false,
            'Accelerate' => false,
            'UseDualStack' => true
        ]
    ];
    yield '020 Dual-stack endpoint + SDK::Host is error' => [
        'documentation' => 'Dual-stack endpoint + SDK::Host is error',
        'expect' => [
            'error' => 'Cannot set dual-stack in combination with a custom endpoint.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseDualStack' => true,
                    'SDK::Endpoint' => 'https://abc.com',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucketname',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'bucketname',
            'Region' => 'us-west-2',
            'ForcePathStyle' => true,
            'UseFIPS' => false,
            'Accelerate' => false,
            'UseDualStack' => true,
            'Endpoint' => 'https://abc.com'
        ]
    ];
    yield '021 path style + ARN bucket' => [
        'documentation' => 'path style + ARN bucket',
        'expect' => [
            'error' => 'Path-style addressing cannot be used with ARN buckets'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
            'ForcePathStyle' => true,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '022 implicit path style bucket + dualstack' => [
        'documentation' => 'implicit path style bucket + dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.dualstack.us-west-2.amazonaws.com/99_ab'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => '99_ab',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => '99_ab',
            'Region' => 'us-west-2',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '023 implicit path style bucket + dualstack' => [
        'documentation' => 'implicit path style bucket + dualstack',
        'expect' => [
            'error' => 'Cannot set dual-stack in combination with a custom endpoint.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseDualStack' => true,
                    'SDK::Endpoint' => 'http://abc.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => '99_ab',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => '99_ab',
            'Region' => 'us-west-2',
            'UseDualStack' => true,
            'UseFIPS' => false,
            'Endpoint' => 'http://abc.com'
        ]
    ];
    yield '024 don\'t allow URL injections in the bucket' => [
        'documentation' => 'don\'t allow URL injections in the bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.us-west-2.amazonaws.com/example.com%23'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'example.com#',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'example.com#',
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false,
            'Accelerate' => false
        ]
    ];
    yield '025 URI encode bucket names in the path' => [
        'documentation' => 'URI encode bucket names in the path',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.us-west-2.amazonaws.com/bucket%20name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'bucket name',
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false,
            'Accelerate' => false
        ]
    ];
    yield '026 scheme is respected' => [
        'documentation' => 'scheme is respected',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com/99_ab'
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => '99_ab',
            'Endpoint' => 'http://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '027 scheme is respected (virtual addressing)' => [
        'documentation' => 'scheme is respected (virtual addressing)',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://bucketname.control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com/foo'
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucketname',
            'Endpoint' => 'http://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com/foo',
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '028 path style + implicit private link' => [
        'documentation' => 'path style + implicit private link',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com/99_ab'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'SDK::Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => '99_ab',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => '99_ab',
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '029 invalid Endpoint override' => [
        'documentation' => 'invalid Endpoint override',
        'expect' => [
            'error' => 'Custom endpoint `abcde://nota#url` was not a valid URI'
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucketname',
            'Endpoint' => 'abcde://nota#url',
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '030 using an IPv4 address forces path style' => [
        'documentation' => 'using an IPv4 address forces path style',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://123.123.0.1/bucketname'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'SDK::Endpoint' => 'https://123.123.0.1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucketname',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucketname',
            'Endpoint' => 'https://123.123.0.1',
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '031 vanilla access point arn with region mismatch and UseArnRegion=false' => [
        'documentation' => 'vanilla access point arn with region mismatch and UseArnRegion=false',
        'expect' => [
            'error' => 'Invalid configuration: region from ARN `us-east-1` does not match client region `us-west-2` and UseArnRegion is `false`'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:us-east-1:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'UseArnRegion' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '032 vanilla access point arn with region mismatch and UseArnRegion unset' => [
        'documentation' => 'vanilla access point arn with region mismatch and UseArnRegion unset',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.s3-accesspoint.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'us-east-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '033 vanilla access point arn with region mismatch and UseArnRegion=true' => [
        'documentation' => 'vanilla access point arn with region mismatch and UseArnRegion=true',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.s3-accesspoint.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::S3::UseArnRegion' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'UseArnRegion' => true,
            'Region' => 'us-east-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '034 subdomains are not allowed in virtual buckets' => [
        'documentation' => 'subdomains are not allowed in virtual buckets',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://s3.us-east-1.amazonaws.com/bucket.name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket.name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'bucket.name',
            'Region' => 'us-east-1'
        ]
    ];
    yield '035 bucket names with 3 characters are allowed in virtual buckets' => [
        'documentation' => 'bucket names with 3 characters are allowed in virtual buckets',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://aaa.s3.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'aaa',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'aaa',
            'Region' => 'us-east-1'
        ]
    ];
    yield '036 bucket names with fewer than 3 characters are not allowed in virtual host' => [
        'documentation' => 'bucket names with fewer than 3 characters are not allowed in virtual host',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://s3.us-east-1.amazonaws.com/aa'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'aa',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'aa',
            'Region' => 'us-east-1'
        ]
    ];
    yield '037 bucket names with uppercase characters are not allowed in virtual host' => [
        'documentation' => 'bucket names with uppercase characters are not allowed in virtual host',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://s3.us-east-1.amazonaws.com/BucketName'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'BucketName',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'BucketName',
            'Region' => 'us-east-1'
        ]
    ];
    yield '038 subdomains are allowed in virtual buckets on http endpoints' => [
        'documentation' => 'subdomains are allowed in virtual buckets on http endpoints',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'http://bucket.name.example.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'SDK::Endpoint' => 'http://example.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket.name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'bucket.name',
            'Region' => 'us-east-1',
            'Endpoint' => 'http://example.com'
        ]
    ];
    yield '039 no region set' => [
        'documentation' => 'no region set',
        'expect' => [
            'error' => 'A region must be set when sending requests to S3.'
        ],
        'params' => [
            'Bucket' => 'bucket-name'
        ]
    ];
    yield '040 UseGlobalEndpoints=true, region=us-east-1 uses the global endpoint' => [
        'documentation' => 'UseGlobalEndpoints=true, region=us-east-1 uses the global endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseGlobalEndpoint' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '041 UseGlobalEndpoints=true, region=us-west-2 uses the regional endpoint' => [
        'documentation' => 'UseGlobalEndpoints=true, region=us-west-2 uses the regional endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseGlobalEndpoint' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '042 UseGlobalEndpoints=true, region=cn-north-1 uses the regional endpoint' => [
        'documentation' => 'UseGlobalEndpoints=true, region=cn-north-1 uses the regional endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.cn-north-1.amazonaws.com.cn'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'cn-north-1',
            'UseGlobalEndpoint' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '043 UseGlobalEndpoints=true, region=us-east-1, fips=true uses the regional endpoint with fips' => [
        'documentation' => 'UseGlobalEndpoints=true, region=us-east-1, fips=true uses the regional endpoint with fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseFIPS' => true,
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseGlobalEndpoint' => true,
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '044 UseGlobalEndpoints=true, region=us-east-1, dualstack=true uses the regional endpoint with dualstack' => [
        'documentation' => 'UseGlobalEndpoints=true, region=us-east-1, dualstack=true uses the regional endpoint with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.dualstack.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseDualStack' => true,
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseGlobalEndpoint' => true,
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false
        ]
    ];
    yield '045 UseGlobalEndpoints=true, region=us-east-1, dualstack and fips uses the regional endpoint with fips/dualstack' => [
        'documentation' => 'UseGlobalEndpoints=true, region=us-east-1, dualstack and fips uses the regional endpoint with fips/dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.dualstack.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseFIPS' => true,
                    'AWS::UseDualStack' => true,
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseGlobalEndpoint' => true,
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false
        ]
    ];
    yield '046 UseGlobalEndpoints=true, region=us-east-1 with custom endpoint, uses custom' => [
        'documentation' => 'UseGlobalEndpoints=true, region=us-east-1 with custom endpoint, uses custom',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://example.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'SDK::Endpoint' => 'https://example.com',
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Endpoint' => 'https://example.com',
            'UseGlobalEndpoint' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '047 UseGlobalEndpoints=true, region=us-west-2 with custom endpoint, uses custom' => [
        'documentation' => 'UseGlobalEndpoints=true, region=us-west-2 with custom endpoint, uses custom',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://example.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://example.com',
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Endpoint' => 'https://example.com',
            'UseGlobalEndpoint' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '048 UseGlobalEndpoints=true, region=us-east-1 with accelerate on non bucket case uses the global endpoint and ignores accelerate' => [
        'documentation' => 'UseGlobalEndpoints=true, region=us-east-1 with accelerate on non bucket case uses the global endpoint and ignores accelerate',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::S3::Accelerate' => true,
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseGlobalEndpoint' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => true
        ]
    ];
    yield '049 aws-global region uses the global endpoint' => [
        'documentation' => 'aws-global region uses the global endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global'
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '050 aws-global region with fips uses the regional endpoint' => [
        'documentation' => 'aws-global region with fips uses the regional endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '051 aws-global region with dualstack uses the regional endpoint' => [
        'documentation' => 'aws-global region with dualstack uses the regional endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.dualstack.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false
        ]
    ];
    yield '052 aws-global region with fips and dualstack uses the regional endpoint' => [
        'documentation' => 'aws-global region with fips and dualstack uses the regional endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.dualstack.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::UseFIPS' => true,
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false
        ]
    ];
    yield '053 aws-global region with accelerate on non-bucket case, uses global endpoint and ignores accelerate' => [
        'documentation' => 'aws-global region with accelerate on non-bucket case, uses global endpoint and ignores accelerate',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => true
        ]
    ];
    yield '054 aws-global region with custom endpoint, uses custom' => [
        'documentation' => 'aws-global region with custom endpoint, uses custom',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://example.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'SDK::Endpoint' => 'https://example.com'
                ],
                'operationName' => 'ListBuckets'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Endpoint' => 'https://example.com',
            'UseGlobalEndpoint' => false,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '055 virtual addressing, aws-global region uses the global endpoint' => [
        'documentation' => 'virtual addressing, aws-global region uses the global endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket-name',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '056 virtual addressing, aws-global region with Prefix, and Key uses the global endpoint. Prefix and Key parameters should not be used in endpoint evaluation.' => [
        'documentation' => 'virtual addressing, aws-global region with Prefix, and Key uses the global endpoint. Prefix and Key parameters should not be used in endpoint evaluation.',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global'
                ],
                'operationName' => 'ListObjects',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Prefix' => 'prefix'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket-name',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Prefix' => 'prefix',
            'Key' => 'key'
        ]
    ];
    yield '057 virtual addressing, aws-global region with Copy Source, and Key uses the global endpoint. Copy Source and Key parameters should not be used in endpoint evaluation.' => [
        'documentation' => 'virtual addressing, aws-global region with Copy Source, and Key uses the global endpoint. Copy Source and Key parameters should not be used in endpoint evaluation.',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket-name',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'CopySource' => '/copy/source',
            'Key' => 'key'
        ]
    ];
    yield '058 virtual addressing, aws-global region with fips uses the regional fips endpoint' => [
        'documentation' => 'virtual addressing, aws-global region with fips uses the regional fips endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-fips.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket-name',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '059 virtual addressing, aws-global region with dualstack uses the regional dualstack endpoint' => [
        'documentation' => 'virtual addressing, aws-global region with dualstack uses the regional dualstack endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.dualstack.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket-name',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false
        ]
    ];
    yield '060 virtual addressing, aws-global region with fips/dualstack uses the regional fips/dualstack endpoint' => [
        'documentation' => 'virtual addressing, aws-global region with fips/dualstack uses the regional fips/dualstack endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-fips.dualstack.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::UseFIPS' => true,
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket-name',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false
        ]
    ];
    yield '061 virtual addressing, aws-global region with accelerate uses the global accelerate endpoint' => [
        'documentation' => 'virtual addressing, aws-global region with accelerate uses the global accelerate endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-accelerate.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket-name',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => true
        ]
    ];
    yield '062 virtual addressing, aws-global region with custom endpoint' => [
        'documentation' => 'virtual addressing, aws-global region with custom endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.example.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'SDK::Endpoint' => 'https://example.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Endpoint' => 'https://example.com',
            'Bucket' => 'bucket-name',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '063 virtual addressing, UseGlobalEndpoint and us-east-1 region uses the global endpoint' => [
        'documentation' => 'virtual addressing, UseGlobalEndpoint and us-east-1 region uses the global endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseGlobalEndpoint' => true,
            'Bucket' => 'bucket-name',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '064 virtual addressing, UseGlobalEndpoint and us-west-2 region uses the regional endpoint' => [
        'documentation' => 'virtual addressing, UseGlobalEndpoint and us-west-2 region uses the regional endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseGlobalEndpoint' => true,
            'Bucket' => 'bucket-name',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '065 virtual addressing, UseGlobalEndpoint and us-east-1 region and fips uses the regional fips endpoint' => [
        'documentation' => 'virtual addressing, UseGlobalEndpoint and us-east-1 region and fips uses the regional fips endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-fips.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseFIPS' => true,
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseGlobalEndpoint' => true,
            'Bucket' => 'bucket-name',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '066 virtual addressing, UseGlobalEndpoint and us-east-1 region and dualstack uses the regional dualstack endpoint' => [
        'documentation' => 'virtual addressing, UseGlobalEndpoint and us-east-1 region and dualstack uses the regional dualstack endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.dualstack.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseDualStack' => true,
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseGlobalEndpoint' => true,
            'Bucket' => 'bucket-name',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false
        ]
    ];
    yield '067 virtual addressing, UseGlobalEndpoint and us-east-1 region and accelerate uses the global accelerate endpoint' => [
        'documentation' => 'virtual addressing, UseGlobalEndpoint and us-east-1 region and accelerate uses the global accelerate endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-accelerate.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::S3::Accelerate' => true,
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseGlobalEndpoint' => true,
            'Bucket' => 'bucket-name',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => true
        ]
    ];
    yield '068 virtual addressing, UseGlobalEndpoint and us-east-1 region with custom endpoint' => [
        'documentation' => 'virtual addressing, UseGlobalEndpoint and us-east-1 region with custom endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.example.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'SDK::Endpoint' => 'https://example.com',
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Endpoint' => 'https://example.com',
            'UseGlobalEndpoint' => true,
            'Bucket' => 'bucket-name',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '069 ForcePathStyle, aws-global region uses the global endpoint' => [
        'documentation' => 'ForcePathStyle, aws-global region uses the global endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '070 ForcePathStyle, aws-global region with fips is invalid' => [
        'documentation' => 'ForcePathStyle, aws-global region with fips is invalid',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true,
                            'name' => 'sigv4'
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.us-east-1.amazonaws.com/bucket-name'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '071 ForcePathStyle, aws-global region with dualstack uses regional dualstack endpoint' => [
        'documentation' => 'ForcePathStyle, aws-global region with dualstack uses regional dualstack endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.dualstack.us-east-1.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::UseDualStack' => true,
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false
        ]
    ];
    yield '072 ForcePathStyle, aws-global region custom endpoint uses the custom endpoint' => [
        'documentation' => 'ForcePathStyle, aws-global region custom endpoint uses the custom endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://example.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'SDK::Endpoint' => 'https://example.com',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Endpoint' => 'https://example.com',
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '073 ForcePathStyle, UseGlobalEndpoint us-east-1 region uses the global endpoint' => [
        'documentation' => 'ForcePathStyle, UseGlobalEndpoint us-east-1 region uses the global endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::S3::ForcePathStyle' => true,
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket-name',
            'UseGlobalEndpoint' => true,
            'ForcePathStyle' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '074 ForcePathStyle, UseGlobalEndpoint us-west-2 region uses the regional endpoint' => [
        'documentation' => 'ForcePathStyle, UseGlobalEndpoint us-west-2 region uses the regional endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.us-west-2.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::ForcePathStyle' => true,
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'bucket-name',
            'UseGlobalEndpoint' => true,
            'ForcePathStyle' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '075 ForcePathStyle, UseGlobalEndpoint us-east-1 region, dualstack uses the regional dualstack endpoint' => [
        'documentation' => 'ForcePathStyle, UseGlobalEndpoint us-east-1 region, dualstack uses the regional dualstack endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.dualstack.us-east-1.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseDualStack' => true,
                    'AWS::S3::ForcePathStyle' => true,
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket-name',
            'UseGlobalEndpoint' => true,
            'ForcePathStyle' => true,
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false
        ]
    ];
    yield '076 ForcePathStyle, UseGlobalEndpoint us-east-1 region custom endpoint uses the custom endpoint' => [
        'documentation' => 'ForcePathStyle, UseGlobalEndpoint us-east-1 region custom endpoint uses the custom endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://example.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'SDK::Endpoint' => 'https://example.com',
                    'AWS::S3::ForcePathStyle' => true,
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket-name',
            'Endpoint' => 'https://example.com',
            'UseGlobalEndpoint' => true,
            'ForcePathStyle' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '077 ARN with aws-global region and  UseArnRegion uses the regional endpoint' => [
        'documentation' => 'ARN with aws-global region and  UseArnRegion uses the regional endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingName' => 's3-outposts',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'disableDoubleEncoding' => true
                        ],
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-outposts',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://reports-123456789012.op-01234567890123456.s3-outposts.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::S3::UseArnRegion' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost/op-01234567890123456/accesspoint/reports',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'UseArnRegion' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost/op-01234567890123456/accesspoint/reports'
        ]
    ];
    yield '078 cross partition MRAP ARN is an error' => [
        'documentation' => 'cross partition MRAP ARN is an error',
        'expect' => [
            'error' => 'Client was configured for partition `aws` but bucket referred to partition `aws-cn`'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws-cn:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Bucket' => 'arn:aws-cn:s3::123456789012:accesspoint:mfzwi23gnjvgw.mrap',
            'Region' => 'us-west-1'
        ]
    ];
    yield '079 Endpoint override, accesspoint with HTTP, port' => [
        'documentation' => 'Endpoint override, accesspoint with HTTP, port',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://myendpoint-123456789012.beta.example.com:1234'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'http://beta.example.com:1234'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Endpoint' => 'http://beta.example.com:1234',
            'Region' => 'us-west-2',
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint'
        ]
    ];
    yield '080 Endpoint override, accesspoint with http, path, query, and port' => [
        'documentation' => 'Endpoint override, accesspoint with http, path, query, and port',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://myendpoint-123456789012.beta.example.com:1234/path'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
            'Endpoint' => 'http://beta.example.com:1234/path',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '081 non-bucket endpoint override with FIPS = error' => [
        'documentation' => 'non-bucket endpoint override with FIPS = error',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with FIPS'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Endpoint' => 'http://beta.example.com:1234/path',
            'UseFIPS' => true,
            'UseDualStack' => false
        ]
    ];
    yield '082 FIPS + dualstack + custom endpoint' => [
        'documentation' => 'FIPS + dualstack + custom endpoint',
        'expect' => [
            'error' => 'Cannot set dual-stack in combination with a custom endpoint.'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Endpoint' => 'http://beta.example.com:1234/path',
            'UseFIPS' => true,
            'UseDualStack' => true
        ]
    ];
    yield '083 dualstack + custom endpoint' => [
        'documentation' => 'dualstack + custom endpoint',
        'expect' => [
            'error' => 'Cannot set dual-stack in combination with a custom endpoint.'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Endpoint' => 'http://beta.example.com:1234/path',
            'UseFIPS' => false,
            'UseDualStack' => true
        ]
    ];
    yield '084 custom endpoint without FIPS/dualstack' => [
        'documentation' => 'custom endpoint without FIPS/dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://beta.example.com:1234/path'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Endpoint' => 'http://beta.example.com:1234/path',
            'UseFIPS' => false,
            'UseDualStack' => false
        ]
    ];
    yield '085 s3 object lambda with access points disabled' => [
        'documentation' => 's3 object lambda with access points disabled',
        'expect' => [
            'error' => 'Access points are not supported for this operation'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint:myendpoint',
            'DisableAccessPoints' => true
        ]
    ];
    yield '086 non bucket + FIPS' => [
        'documentation' => 'non bucket + FIPS',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => true,
            'UseDualStack' => false
        ]
    ];
    yield '087 standard non bucket endpoint' => [
        'documentation' => 'standard non bucket endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false
        ]
    ];
    yield '088 non bucket endpoint with FIPS + Dualstack' => [
        'documentation' => 'non bucket endpoint with FIPS + Dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => true,
            'UseDualStack' => true
        ]
    ];
    yield '089 non bucket endpoint with dualstack' => [
        'documentation' => 'non bucket endpoint with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => true
        ]
    ];
    yield '090 use global endpoint + IP address endpoint override' => [
        'documentation' => 'use global endpoint + IP address endpoint override',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'http://127.0.0.1/bucket'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Endpoint' => 'http://127.0.0.1',
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '091 non-dns endpoint + global endpoint' => [
        'documentation' => 'non-dns endpoint + global endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://s3.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '092 endpoint override + use global endpoint' => [
        'documentation' => 'endpoint override + use global endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'http://foo.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'UseGlobalEndpoint' => true,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '093 FIPS + dualstack + non-bucket endpoint' => [
        'documentation' => 'FIPS + dualstack + non-bucket endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.dualstack.us-east-1.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'UseFIPS' => true,
            'UseDualStack' => true
        ]
    ];
    yield '094 FIPS + dualstack + non-DNS endpoint' => [
        'documentation' => 'FIPS + dualstack + non-DNS endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.dualstack.us-east-1.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'ForcePathStyle' => true,
            'UseFIPS' => true,
            'UseDualStack' => true
        ]
    ];
    yield '095 endpoint override + FIPS + dualstack (BUG)' => [
        'documentation' => 'endpoint override + FIPS + dualstack (BUG)',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with FIPS'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'ForcePathStyle' => true,
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '096 endpoint override + non-dns bucket + FIPS (BUG)' => [
        'documentation' => 'endpoint override + non-dns bucket + FIPS (BUG)',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with FIPS'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '097 FIPS + bucket endpoint + force path style' => [
        'documentation' => 'FIPS + bucket endpoint + force path style',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.us-east-1.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'ForcePathStyle' => true,
            'UseFIPS' => true,
            'UseDualStack' => false,
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '098 bucket + FIPS + force path style' => [
        'documentation' => 'bucket + FIPS + force path style',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.dualstack.us-east-1.amazonaws.com/bucket'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket',
            'ForcePathStyle' => true,
            'UseFIPS' => true,
            'UseDualStack' => true,
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '099 FIPS + dualstack + use global endpoint' => [
        'documentation' => 'FIPS + dualstack + use global endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://bucket.s3-fips.dualstack.us-east-1.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '100 URI encoded bucket + use global endpoint' => [
        'documentation' => 'URI encoded bucket + use global endpoint',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with FIPS'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'UseGlobalEndpoint' => true,
            'Endpoint' => 'https://foo.com'
        ]
    ];
    yield '101 FIPS + path based endpoint' => [
        'documentation' => 'FIPS + path based endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.us-east-1.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '102 accelerate + dualstack + global endpoint' => [
        'documentation' => 'accelerate + dualstack + global endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://bucket.s3-accelerate.dualstack.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => true,
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '103 dualstack + global endpoint + non URI safe bucket' => [
        'documentation' => 'dualstack + global endpoint + non URI safe bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://s3.dualstack.us-east-1.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'Accelerate' => false,
            'UseDualStack' => true,
            'UseFIPS' => false,
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '104 FIPS + uri encoded bucket' => [
        'documentation' => 'FIPS + uri encoded bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.us-east-1.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'ForcePathStyle' => true,
            'Accelerate' => false,
            'UseDualStack' => false,
            'UseFIPS' => true,
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '105 endpoint override + non-uri safe endpoint + force path style' => [
        'documentation' => 'endpoint override + non-uri safe endpoint + force path style',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with FIPS'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'ForcePathStyle' => true,
            'Accelerate' => false,
            'UseDualStack' => false,
            'UseFIPS' => true,
            'Endpoint' => 'http://foo.com',
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '106 FIPS + Dualstack + global endpoint + non-dns bucket' => [
        'documentation' => 'FIPS + Dualstack + global endpoint + non-dns bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east-1'
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.dualstack.us-east-1.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'bucket!',
            'Accelerate' => false,
            'UseDualStack' => true,
            'UseFIPS' => true,
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '107 endpoint override + FIPS + dualstack' => [
        'documentation' => 'endpoint override + FIPS + dualstack',
        'expect' => [
            'error' => 'Cannot set dual-stack in combination with a custom endpoint.'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseDualStack' => true,
            'UseFIPS' => true,
            'UseGlobalEndpoint' => true,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '108 non-bucket endpoint override + dualstack + global endpoint' => [
        'documentation' => 'non-bucket endpoint override + dualstack + global endpoint',
        'expect' => [
            'error' => 'Cannot set dual-stack in combination with a custom endpoint.'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'UseGlobalEndpoint' => true,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '109 Endpoint override + UseGlobalEndpoint + us-east-1' => [
        'documentation' => 'Endpoint override + UseGlobalEndpoint + us-east-1',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with FIPS'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'UseGlobalEndpoint' => true,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '110 non-FIPS partition with FIPS set + custom endpoint' => [
        'documentation' => 'non-FIPS partition with FIPS set + custom endpoint',
        'expect' => [
            'error' => 'Partition does not support FIPS'
        ],
        'params' => [
            'Region' => 'cn-north-1',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '111 aws-global signs as us-east-1' => [
        'documentation' => 'aws-global signs as us-east-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-1',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.dualstack.us-east-1.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket!',
            'UseFIPS' => true,
            'Accelerate' => false,
            'UseDualStack' => true
        ]
    ];
    yield '112 aws-global signs as us-east-1' => [
        'documentation' => 'aws-global signs as us-east-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-1',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket.foo.com'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket',
            'UseDualStack' => false,
            'UseFIPS' => false,
            'Accelerate' => false,
            'Endpoint' => 'https://foo.com'
        ]
    ];
    yield '113 aws-global + dualstack + path-only bucket' => [
        'documentation' => 'aws-global + dualstack + path-only bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-1',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.dualstack.us-east-1.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket!',
            'UseDualStack' => true,
            'UseFIPS' => false,
            'Accelerate' => false
        ]
    ];
    yield '114 aws-global + path-only bucket' => [
        'documentation' => 'aws-global + path-only bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-1',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket!'
        ]
    ];
    yield '115 aws-global + fips + custom endpoint' => [
        'documentation' => 'aws-global + fips + custom endpoint',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with FIPS'
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket!',
            'UseDualStack' => false,
            'UseFIPS' => true,
            'Accelerate' => false,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '116 aws-global, endpoint override & path only-bucket' => [
        'documentation' => 'aws-global, endpoint override & path only-bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-1',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://foo.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket!',
            'UseDualStack' => false,
            'UseFIPS' => false,
            'Accelerate' => false,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '117 aws-global + dualstack + custom endpoint' => [
        'documentation' => 'aws-global + dualstack + custom endpoint',
        'expect' => [
            'error' => 'Cannot set dual-stack in combination with a custom endpoint.'
        ],
        'params' => [
            'Region' => 'aws-global',
            'UseDualStack' => true,
            'UseFIPS' => false,
            'Accelerate' => false,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '118 accelerate, dualstack + aws-global' => [
        'documentation' => 'accelerate, dualstack + aws-global',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-1',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket.s3-accelerate.dualstack.us-east-1.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket',
            'UseDualStack' => true,
            'UseFIPS' => false,
            'Accelerate' => true
        ]
    ];
    yield '119 FIPS + aws-global + path only bucket. This is not supported by S3 but we allow garbage in garbage out' => [
        'documentation' => 'FIPS + aws-global + path only bucket. This is not supported by S3 but we allow garbage in garbage out',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-1',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.dualstack.us-east-1.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket!',
            'ForcePathStyle' => true,
            'UseDualStack' => true,
            'UseFIPS' => true,
            'Accelerate' => false
        ]
    ];
    yield '120 aws-global + FIPS + endpoint override.' => [
        'documentation' => 'aws-global + FIPS + endpoint override.',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with FIPS'
        ],
        'params' => [
            'Region' => 'aws-global',
            'UseFIPS' => true,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '121 force path style, FIPS, aws-global & endpoint override' => [
        'documentation' => 'force path style, FIPS, aws-global & endpoint override',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with FIPS'
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket!',
            'ForcePathStyle' => true,
            'UseFIPS' => true,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '122 ip address causes path style to be forced' => [
        'documentation' => 'ip address causes path style to be forced',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-1',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://192.168.1.1/bucket'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket',
            'Endpoint' => 'http://192.168.1.1'
        ]
    ];
    yield '123 endpoint override with aws-global region' => [
        'documentation' => 'endpoint override with aws-global region',
        'expect' => [
            'error' => 'Cannot set dual-stack in combination with a custom endpoint.'
        ],
        'params' => [
            'Region' => 'aws-global',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '124 FIPS + path-only (TODO: consider making this an error)' => [
        'documentation' => 'FIPS + path-only (TODO: consider making this an error)',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-1',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.us-east-1.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'Bucket' => 'bucket!',
            'UseFIPS' => true
        ]
    ];
    yield '125 empty arn type' => [
        'documentation' => 'empty arn type',
        'expect' => [
            'error' => 'Invalid ARN: No ARN type specified'
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'arn:aws:not-s3:us-west-2:123456789012::myendpoint'
        ]
    ];
    yield '126 path style can\'t be used with accelerate' => [
        'documentation' => 'path style can\'t be used with accelerate',
        'expect' => [
            'error' => 'Path-style addressing cannot be used with S3 Accelerate'
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'bucket!',
            'Accelerate' => true
        ]
    ];
    yield '127 invalid region' => [
        'documentation' => 'invalid region',
        'expect' => [
            'error' => 'Invalid region: region was not a valid DNS name.'
        ],
        'params' => [
            'Region' => 'us-east-2!',
            'Bucket' => 'bucket.subdomain',
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '128 invalid region' => [
        'documentation' => 'invalid region',
        'expect' => [
            'error' => 'Invalid region: region was not a valid DNS name.'
        ],
        'params' => [
            'Region' => 'us-east-2!',
            'Bucket' => 'bucket',
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '129 empty arn type' => [
        'documentation' => 'empty arn type',
        'expect' => [
            'error' => 'Invalid Access Point Name'
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'arn:aws:s3::123456789012:accesspoint:my_endpoint'
        ]
    ];
    yield '130 empty arn type' => [
        'documentation' => 'empty arn type',
        'expect' => [
            'error' => 'Client was configured for partition `aws` but ARN (`arn:aws:s3:cn-north-1:123456789012:accesspoint:my-endpoint`) has `aws-cn`'
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'arn:aws:s3:cn-north-1:123456789012:accesspoint:my-endpoint',
            'UseArnRegion' => true
        ]
    ];
    yield '131 invalid arn region' => [
        'documentation' => 'invalid arn region',
        'expect' => [
            'error' => 'Invalid region in ARN: `us-east_2` (invalid DNS name)'
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'arn:aws:s3-object-lambda:us-east_2:123456789012:accesspoint:my-endpoint',
            'UseArnRegion' => true
        ]
    ];
    yield '132 invalid ARN outpost' => [
        'documentation' => 'invalid ARN outpost',
        'expect' => [
            'error' => 'Invalid ARN: The outpost Id may only contain a-z, A-Z, 0-9 and `-`. Found: `op_01234567890123456`'
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost/op_01234567890123456/accesspoint/reports',
            'UseArnRegion' => true
        ]
    ];
    yield '133 invalid ARN' => [
        'documentation' => 'invalid ARN',
        'expect' => [
            'error' => 'Invalid ARN: expected an access point name'
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost/op-01234567890123456/reports'
        ]
    ];
    yield '134 invalid ARN' => [
        'documentation' => 'invalid ARN',
        'expect' => [
            'error' => 'Invalid ARN: Expected a 4-component resource'
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost/op-01234567890123456'
        ]
    ];
    yield '135 invalid outpost type' => [
        'documentation' => 'invalid outpost type',
        'expect' => [
            'error' => 'Expected an outpost type `accesspoint`, found not-accesspoint'
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost/op-01234567890123456/not-accesspoint/reports'
        ]
    ];
    yield '136 invalid outpost type' => [
        'documentation' => 'invalid outpost type',
        'expect' => [
            'error' => 'Invalid region in ARN: `us-east_1` (invalid DNS name)'
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'arn:aws:s3-outposts:us-east_1:123456789012:outpost/op-01234567890123456/not-accesspoint/reports'
        ]
    ];
    yield '137 invalid outpost type' => [
        'documentation' => 'invalid outpost type',
        'expect' => [
            'error' => 'Invalid ARN: The account id may only contain a-z, A-Z, 0-9 and `-`. Found: `12345_789012`'
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'arn:aws:s3-outposts:us-east-1:12345_789012:outpost/op-01234567890123456/not-accesspoint/reports'
        ]
    ];
    yield '138 invalid outpost type' => [
        'documentation' => 'invalid outpost type',
        'expect' => [
            'error' => 'Invalid ARN: The Outpost Id was not set'
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'arn:aws:s3-outposts:us-east-1:12345789012:outpost'
        ]
    ];
    yield '139 use global endpoint virtual addressing' => [
        'documentation' => 'use global endpoint virtual addressing',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-2',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://bucket.example.com'
            ]
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'bucket',
            'Endpoint' => 'http://example.com',
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '140 global endpoint + ip address' => [
        'documentation' => 'global endpoint + ip address',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-2',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://192.168.0.1/bucket'
            ]
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'bucket',
            'Endpoint' => 'http://192.168.0.1',
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '141 invalid outpost type' => [
        'documentation' => 'invalid outpost type',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-2',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.us-east-2.amazonaws.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'bucket!',
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '142 invalid outpost type' => [
        'documentation' => 'invalid outpost type',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-2',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket.s3-accelerate.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'bucket',
            'Accelerate' => true,
            'UseGlobalEndpoint' => true
        ]
    ];
    yield '143 use global endpoint + custom endpoint' => [
        'documentation' => 'use global endpoint + custom endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-2',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://foo.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'bucket!',
            'UseGlobalEndpoint' => true,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '144 use global endpoint, not us-east-1, force path style' => [
        'documentation' => 'use global endpoint, not us-east-1, force path style',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingRegion' => 'us-east-2',
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://foo.com/bucket%21'
            ]
        ],
        'params' => [
            'Region' => 'us-east-2',
            'Bucket' => 'bucket!',
            'UseGlobalEndpoint' => true,
            'ForcePathStyle' => true,
            'Endpoint' => 'http://foo.com'
        ]
    ];
    yield '145 vanilla virtual addressing@us-west-2' => [
        'documentation' => 'vanilla virtual addressing@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '146 virtual addressing + dualstack@us-west-2' => [
        'documentation' => 'virtual addressing + dualstack@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '147 accelerate + dualstack@us-west-2' => [
        'documentation' => 'accelerate + dualstack@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-accelerate.dualstack.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseDualStack' => true,
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '148 accelerate (dualstack=false)@us-west-2' => [
        'documentation' => 'accelerate (dualstack=false)@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-accelerate.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '149 virtual addressing + fips@us-west-2' => [
        'documentation' => 'virtual addressing + fips@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-fips.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '150 virtual addressing + dualstack + fips@us-west-2' => [
        'documentation' => 'virtual addressing + dualstack + fips@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-fips.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true,
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => true,
            'UseFIPS' => true
        ]
    ];
    yield '151 accelerate + fips = error@us-west-2' => [
        'documentation' => 'accelerate + fips = error@us-west-2',
        'expect' => [
            'error' => 'Accelerate cannot be used with FIPS'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true,
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '152 vanilla virtual addressing@cn-north-1' => [
        'documentation' => 'vanilla virtual addressing@cn-north-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.cn-north-1.amazonaws.com.cn'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '153 virtual addressing + dualstack@cn-north-1' => [
        'documentation' => 'virtual addressing + dualstack@cn-north-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.dualstack.cn-north-1.amazonaws.com.cn'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'cn-north-1',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '154 accelerate (dualstack=false)@cn-north-1' => [
        'documentation' => 'accelerate (dualstack=false)@cn-north-1',
        'expect' => [
            'error' => 'S3 Accelerate cannot be used in this region'
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '155 virtual addressing + fips@cn-north-1' => [
        'documentation' => 'virtual addressing + fips@cn-north-1',
        'expect' => [
            'error' => 'Partition does not support FIPS'
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '156 vanilla virtual addressing@af-south-1' => [
        'documentation' => 'vanilla virtual addressing@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.af-south-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '157 virtual addressing + dualstack@af-south-1' => [
        'documentation' => 'virtual addressing + dualstack@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3.dualstack.af-south-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'af-south-1',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '158 accelerate + dualstack@af-south-1' => [
        'documentation' => 'accelerate + dualstack@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-accelerate.dualstack.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::UseDualStack' => true,
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'af-south-1',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '159 accelerate (dualstack=false)@af-south-1' => [
        'documentation' => 'accelerate (dualstack=false)@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-accelerate.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '160 virtual addressing + fips@af-south-1' => [
        'documentation' => 'virtual addressing + fips@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-fips.af-south-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '161 virtual addressing + dualstack + fips@af-south-1' => [
        'documentation' => 'virtual addressing + dualstack + fips@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.s3-fips.dualstack.af-south-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::UseFIPS' => true,
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'af-south-1',
            'UseDualStack' => true,
            'UseFIPS' => true
        ]
    ];
    yield '162 accelerate + fips = error@af-south-1' => [
        'documentation' => 'accelerate + fips = error@af-south-1',
        'expect' => [
            'error' => 'Accelerate cannot be used with FIPS'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::UseFIPS' => true,
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '163 vanilla path style@us-west-2' => [
        'documentation' => 'vanilla path style@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.us-west-2.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '164 fips@us-gov-west-2, bucket is not S3-dns-compatible (subdomains)' => [
        'documentation' => 'fips@us-gov-west-2, bucket is not S3-dns-compatible (subdomains)',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingName' => 's3',
                            'signingRegion' => 'us-gov-west-1',
                            'disableDoubleEncoding' => true,
                            'name' => 'sigv4'
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.us-gov-west-1.amazonaws.com/bucket.with.dots'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-gov-west-1',
                    'AWS::UseFIPS' => true,
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket.with.dots',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket.with.dots',
            'Region' => 'us-gov-west-1',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '165 path style + accelerate = error@us-west-2' => [
        'documentation' => 'path style + accelerate = error@us-west-2',
        'expect' => [
            'error' => 'Path-style addressing cannot be used with S3 Accelerate'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::ForcePathStyle' => true,
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '166 path style + dualstack@us-west-2' => [
        'documentation' => 'path style + dualstack@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.dualstack.us-west-2.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseDualStack' => true,
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Region' => 'us-west-2',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '167 path style + arn is error@us-west-2' => [
        'documentation' => 'path style + arn is error@us-west-2',
        'expect' => [
            'error' => 'Path-style addressing cannot be used with ARN buckets'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:PARTITION:s3-outposts:REGION:123456789012:outpost:op-01234567890123456:bucket:mybucket',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:PARTITION:s3-outposts:REGION:123456789012:outpost:op-01234567890123456:bucket:mybucket',
            'ForcePathStyle' => true,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '168 path style + invalid DNS name@us-west-2' => [
        'documentation' => 'path style + invalid DNS name@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.us-west-2.amazonaws.com/99a_b'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => '99a_b',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => '99a_b',
            'ForcePathStyle' => true,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '169 no path style + invalid DNS name@us-west-2' => [
        'documentation' => 'no path style + invalid DNS name@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.us-west-2.amazonaws.com/99a_b'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => '99a_b',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => '99a_b',
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '170 vanilla path style@cn-north-1' => [
        'documentation' => 'vanilla path style@cn-north-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.cn-north-1.amazonaws.com.cn/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '171 path style + fips@cn-north-1' => [
        'documentation' => 'path style + fips@cn-north-1',
        'expect' => [
            'error' => 'Partition does not support FIPS'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::UseFIPS' => true,
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '172 path style + accelerate = error@cn-north-1' => [
        'documentation' => 'path style + accelerate = error@cn-north-1',
        'expect' => [
            'error' => 'Path-style addressing cannot be used with S3 Accelerate'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::S3::ForcePathStyle' => true,
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '173 path style + dualstack@cn-north-1' => [
        'documentation' => 'path style + dualstack@cn-north-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.dualstack.cn-north-1.amazonaws.com.cn/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::UseDualStack' => true,
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Region' => 'cn-north-1',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '174 path style + arn is error@cn-north-1' => [
        'documentation' => 'path style + arn is error@cn-north-1',
        'expect' => [
            'error' => 'Path-style addressing cannot be used with ARN buckets'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:PARTITION:s3-outposts:REGION:123456789012:outpost:op-01234567890123456:bucket:mybucket',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:PARTITION:s3-outposts:REGION:123456789012:outpost:op-01234567890123456:bucket:mybucket',
            'ForcePathStyle' => true,
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '175 path style + invalid DNS name@cn-north-1' => [
        'documentation' => 'path style + invalid DNS name@cn-north-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.cn-north-1.amazonaws.com.cn/99a_b'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => '99a_b',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => '99a_b',
            'ForcePathStyle' => true,
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '176 no path style + invalid DNS name@cn-north-1' => [
        'documentation' => 'no path style + invalid DNS name@cn-north-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.cn-north-1.amazonaws.com.cn/99a_b'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => '99a_b',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => '99a_b',
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '177 vanilla path style@af-south-1' => [
        'documentation' => 'vanilla path style@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.af-south-1.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '178 path style + fips@af-south-1' => [
        'documentation' => 'path style + fips@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true,
                            'name' => 'sigv4'
                        ]
                    ]
                ],
                'url' => 'https://s3-fips.af-south-1.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::UseFIPS' => true,
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '179 path style + accelerate = error@af-south-1' => [
        'documentation' => 'path style + accelerate = error@af-south-1',
        'expect' => [
            'error' => 'Path-style addressing cannot be used with S3 Accelerate'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::S3::ForcePathStyle' => true,
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '180 path style + dualstack@af-south-1' => [
        'documentation' => 'path style + dualstack@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.dualstack.af-south-1.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::UseDualStack' => true,
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Region' => 'af-south-1',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '181 path style + arn is error@af-south-1' => [
        'documentation' => 'path style + arn is error@af-south-1',
        'expect' => [
            'error' => 'Path-style addressing cannot be used with ARN buckets'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:PARTITION:s3-outposts:REGION:123456789012:outpost:op-01234567890123456:bucket:mybucket',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:PARTITION:s3-outposts:REGION:123456789012:outpost:op-01234567890123456:bucket:mybucket',
            'ForcePathStyle' => true,
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '182 path style + invalid DNS name@af-south-1' => [
        'documentation' => 'path style + invalid DNS name@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.af-south-1.amazonaws.com/99a_b'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => '99a_b',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => '99a_b',
            'ForcePathStyle' => true,
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '183 no path style + invalid DNS name@af-south-1' => [
        'documentation' => 'no path style + invalid DNS name@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3.af-south-1.amazonaws.com/99a_b'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => '99a_b',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => '99a_b',
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '184 virtual addressing + private link@us-west-2' => [
        'documentation' => 'virtual addressing + private link@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://bucket-name.control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'http://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Endpoint' => 'http://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '185 path style + private link@us-west-2' => [
        'documentation' => 'path style + private link@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '186 SDK::Host + FIPS@us-west-2' => [
        'documentation' => 'SDK::Host + FIPS@us-west-2',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with FIPS'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true,
                    'SDK::Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '187 SDK::Host + DualStack@us-west-2' => [
        'documentation' => 'SDK::Host + DualStack@us-west-2',
        'expect' => [
            'error' => 'Cannot set dual-stack in combination with a custom endpoint.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseDualStack' => true,
                    'SDK::Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'us-west-2',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '188 SDK::HOST + accelerate@us-west-2' => [
        'documentation' => 'SDK::HOST + accelerate@us-west-2',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with S3 Accelerate'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'http://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Endpoint' => 'http://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '189 SDK::Host + access point ARN@us-west-2' => [
        'documentation' => 'SDK::Host + access point ARN@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.beta.example.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://beta.example.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://beta.example.com',
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '190 virtual addressing + private link@cn-north-1' => [
        'documentation' => 'virtual addressing + private link@cn-north-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'SDK::Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '191 path style + private link@cn-north-1' => [
        'documentation' => 'path style + private link@cn-north-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'SDK::Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '192 FIPS@cn-north-1' => [
        'documentation' => 'FIPS@cn-north-1',
        'expect' => [
            'error' => 'Partition does not support FIPS'
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '193 SDK::Host + DualStack@cn-north-1' => [
        'documentation' => 'SDK::Host + DualStack@cn-north-1',
        'expect' => [
            'error' => 'Cannot set dual-stack in combination with a custom endpoint.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::UseDualStack' => true,
                    'SDK::Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'cn-north-1',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '194 SDK::HOST + accelerate@cn-north-1' => [
        'documentation' => 'SDK::HOST + accelerate@cn-north-1',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with S3 Accelerate'
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '195 SDK::Host + access point ARN@cn-north-1' => [
        'documentation' => 'SDK::Host + access point ARN@cn-north-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.beta.example.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'SDK::Endpoint' => 'https://beta.example.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://beta.example.com',
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '196 virtual addressing + private link@af-south-1' => [
        'documentation' => 'virtual addressing + private link@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://bucket-name.control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'SDK::Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '197 path style + private link@af-south-1' => [
        'documentation' => 'path style + private link@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com/bucket-name'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'SDK::Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
                    'AWS::S3::ForcePathStyle' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => true,
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '198 SDK::Host + FIPS@af-south-1' => [
        'documentation' => 'SDK::Host + FIPS@af-south-1',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with FIPS'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::UseFIPS' => true,
                    'SDK::Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '199 SDK::Host + DualStack@af-south-1' => [
        'documentation' => 'SDK::Host + DualStack@af-south-1',
        'expect' => [
            'error' => 'Cannot set dual-stack in combination with a custom endpoint.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::UseDualStack' => true,
                    'SDK::Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'af-south-1',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '200 SDK::HOST + accelerate@af-south-1' => [
        'documentation' => 'SDK::HOST + accelerate@af-south-1',
        'expect' => [
            'error' => 'A custom endpoint cannot be combined with S3 Accelerate'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'SDK::Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'bucket-name',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'bucket-name',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://control.vpce-1a2b3c4d-5e6f.s3.us-west-2.vpce.amazonaws.com',
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '201 SDK::Host + access point ARN@af-south-1' => [
        'documentation' => 'SDK::Host + access point ARN@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.beta.example.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'SDK::Endpoint' => 'https://beta.example.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:af-south-1:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:af-south-1:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Endpoint' => 'https://beta.example.com',
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '202 vanilla access point arn@us-west-2' => [
        'documentation' => 'vanilla access point arn@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.s3-accesspoint.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '203 access point arn + FIPS@us-west-2' => [
        'documentation' => 'access point arn + FIPS@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.s3-accesspoint-fips.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '204 access point arn + accelerate = error@us-west-2' => [
        'documentation' => 'access point arn + accelerate = error@us-west-2',
        'expect' => [
            'error' => 'Access Points do not support S3 Accelerate'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '205 access point arn + FIPS + DualStack@us-west-2' => [
        'documentation' => 'access point arn + FIPS + DualStack@us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.s3-accesspoint-fips.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true,
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:us-west-2:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => true,
            'UseFIPS' => true
        ]
    ];
    yield '206 vanilla access point arn@cn-north-1' => [
        'documentation' => 'vanilla access point arn@cn-north-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.s3-accesspoint.cn-north-1.amazonaws.com.cn'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '207 access point arn + FIPS@cn-north-1' => [
        'documentation' => 'access point arn + FIPS@cn-north-1',
        'expect' => [
            'error' => 'Partition does not support FIPS'
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '208 access point arn + accelerate = error@cn-north-1' => [
        'documentation' => 'access point arn + accelerate = error@cn-north-1',
        'expect' => [
            'error' => 'Access Points do not support S3 Accelerate'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'cn-north-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '209 access point arn + FIPS + DualStack@cn-north-1' => [
        'documentation' => 'access point arn + FIPS + DualStack@cn-north-1',
        'expect' => [
            'error' => 'Partition does not support FIPS'
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws-cn:s3:cn-north-1:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'cn-north-1',
            'UseDualStack' => true,
            'UseFIPS' => true
        ]
    ];
    yield '210 vanilla access point arn@af-south-1' => [
        'documentation' => 'vanilla access point arn@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.s3-accesspoint.af-south-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:af-south-1:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:af-south-1:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '211 access point arn + FIPS@af-south-1' => [
        'documentation' => 'access point arn + FIPS@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.s3-accesspoint-fips.af-south-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:af-south-1:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:af-south-1:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '212 access point arn + accelerate = error@af-south-1' => [
        'documentation' => 'access point arn + accelerate = error@af-south-1',
        'expect' => [
            'error' => 'Access Points do not support S3 Accelerate'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:af-south-1:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => true,
            'Bucket' => 'arn:aws:s3:af-south-1:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'af-south-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '213 access point arn + FIPS + DualStack@af-south-1' => [
        'documentation' => 'access point arn + FIPS + DualStack@af-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'af-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myendpoint-123456789012.s3-accesspoint-fips.dualstack.af-south-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'af-south-1',
                    'AWS::UseFIPS' => true,
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3:af-south-1:123456789012:accesspoint:myendpoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3:af-south-1:123456789012:accesspoint:myendpoint',
            'ForcePathStyle' => false,
            'Region' => 'af-south-1',
            'UseDualStack' => true,
            'UseFIPS' => true
        ]
    ];
    yield '214 S3 outposts vanilla test' => [
        'documentation' => 'S3 outposts vanilla test',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingName' => 's3-outposts',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'disableDoubleEncoding' => true
                        ],
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-outposts',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://reports-123456789012.op-01234567890123456.s3-outposts.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456/accesspoint/reports',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456/accesspoint/reports'
        ]
    ];
    yield '215 S3 outposts custom endpoint' => [
        'documentation' => 'S3 outposts custom endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingName' => 's3-outposts',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'disableDoubleEncoding' => true
                        ],
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-outposts',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://reports-123456789012.op-01234567890123456.example.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://example.amazonaws.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456/accesspoint/reports',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456/accesspoint/reports',
            'Endpoint' => 'https://example.amazonaws.com'
        ]
    ];
    yield '216 outposts arn with region mismatch and UseArnRegion=false' => [
        'documentation' => 'outposts arn with region mismatch and UseArnRegion=false',
        'expect' => [
            'error' => 'Invalid configuration: region from ARN `us-east-1` does not match client region `us-west-2` and UseArnRegion is `false`'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
            'ForcePathStyle' => false,
            'UseArnRegion' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '217 outposts arn with region mismatch, custom region and UseArnRegion=false' => [
        'documentation' => 'outposts arn with region mismatch, custom region and UseArnRegion=false',
        'expect' => [
            'error' => 'Invalid configuration: region from ARN `us-east-1` does not match client region `us-west-2` and UseArnRegion is `false`'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://example.com',
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
            'Endpoint' => 'https://example.com',
            'ForcePathStyle' => false,
            'UseArnRegion' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '218 outposts arn with region mismatch and UseArnRegion=true' => [
        'documentation' => 'outposts arn with region mismatch and UseArnRegion=true',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingName' => 's3-outposts',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'disableDoubleEncoding' => true
                        ],
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-outposts',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myaccesspoint-123456789012.op-01234567890123456.s3-outposts.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::UseArnRegion' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
            'ForcePathStyle' => false,
            'UseArnRegion' => true,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '219 outposts arn with region mismatch and UseArnRegion unset' => [
        'documentation' => 'outposts arn with region mismatch and UseArnRegion unset',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingName' => 's3-outposts',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'disableDoubleEncoding' => true
                        ],
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-outposts',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://myaccesspoint-123456789012.op-01234567890123456.s3-outposts.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
            'ForcePathStyle' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '220 outposts arn with partition mismatch and UseArnRegion=true' => [
        'documentation' => 'outposts arn with partition mismatch and UseArnRegion=true',
        'expect' => [
            'error' => 'Client was configured for partition `aws` but ARN (`arn:aws:s3-outposts:cn-north-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint`) has `aws-cn`'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::UseArnRegion' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-outposts:cn-north-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:cn-north-1:123456789012:outpost:op-01234567890123456:accesspoint:myaccesspoint',
            'ForcePathStyle' => false,
            'UseArnRegion' => true,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '221 ARN with UseGlobalEndpoint and use-east-1 region uses the regional endpoint' => [
        'documentation' => 'ARN with UseGlobalEndpoint and use-east-1 region uses the regional endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingName' => 's3-outposts',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'disableDoubleEncoding' => true
                        ],
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-outposts',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://reports-123456789012.op-01234567890123456.s3-outposts.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::S3::UseGlobalEndpoint' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost/op-01234567890123456/accesspoint/reports',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseGlobalEndpoint' => true,
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:us-east-1:123456789012:outpost/op-01234567890123456/accesspoint/reports'
        ]
    ];
    yield '222 S3 outposts does not support dualstack' => [
        'documentation' => 'S3 outposts does not support dualstack',
        'expect' => [
            'error' => 'S3 Outposts does not support Dual-stack'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456/accesspoint/reports'
        ]
    ];
    yield '223 S3 outposts does not support fips' => [
        'documentation' => 'S3 outposts does not support fips',
        'expect' => [
            'error' => 'S3 Outposts does not support FIPS'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456/accesspoint/reports'
        ]
    ];
    yield '224 S3 outposts does not support accelerate' => [
        'documentation' => 'S3 outposts does not support accelerate',
        'expect' => [
            'error' => 'S3 Outposts does not support S3 Accelerate'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => true,
            'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost/op-01234567890123456/accesspoint/reports'
        ]
    ];
    yield '225 validates against subresource' => [
        'documentation' => 'validates against subresource',
        'expect' => [
            'error' => 'Invalid Arn: Outpost Access Point ARN contains sub resources'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:mybucket:object:foo'
        ]
    ];
    yield '226 validates against access point host label' => [
        'documentation' => 'validates against access point host label',
        'expect' => [
            'error' => 'Invalid ARN: The access point name may only contain a-z, A-Z, 0-9 and `-`. Found: `invalid.bucket#`'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-outposts:us-west-2:123456789012:outpost:op-01234567890123456:accesspoint:invalid.bucket#'
        ]
    ];
    yield '227 object lambda @us-east-1' => [
        'documentation' => 'object lambda @us-east-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://mybanner-123456789012.s3-object-lambda.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '228 object lambda @us-west-2' => [
        'documentation' => 'object lambda @us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://mybanner-123456789012.s3-object-lambda.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint/mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '229 object lambda, colon resource deliminator @us-west-2' => [
        'documentation' => 'object lambda, colon resource deliminator @us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://mybanner-123456789012.s3-object-lambda.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint:mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint:mybanner'
        ]
    ];
    yield '230 object lambda @us-east-1, client region us-west-2, useArnRegion=true' => [
        'documentation' => 'object lambda @us-east-1, client region us-west-2, useArnRegion=true',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://mybanner-123456789012.s3-object-lambda.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::UseArnRegion' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => true,
            'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '231 object lambda @us-east-1, client region s3-external-1, useArnRegion=true' => [
        'documentation' => 'object lambda @us-east-1, client region s3-external-1, useArnRegion=true',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://mybanner-123456789012.s3-object-lambda.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 's3-external-1',
                    'AWS::S3::UseArnRegion' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 's3-external-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => true,
            'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '232 object lambda @us-east-1, client region s3-external-1, useArnRegion=false' => [
        'documentation' => 'object lambda @us-east-1, client region s3-external-1, useArnRegion=false',
        'expect' => [
            'error' => 'Invalid configuration: region from ARN `us-east-1` does not match client region `s3-external-1` and UseArnRegion is `false`'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 's3-external-1',
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 's3-external-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '233 object lambda @us-east-1, client region aws-global, useArnRegion=true' => [
        'documentation' => 'object lambda @us-east-1, client region aws-global, useArnRegion=true',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://mybanner-123456789012.s3-object-lambda.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::S3::UseArnRegion' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => true,
            'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '234 object lambda @us-east-1, client region aws-global, useArnRegion=false' => [
        'documentation' => 'object lambda @us-east-1, client region aws-global, useArnRegion=false',
        'expect' => [
            'error' => 'Invalid configuration: region from ARN `us-east-1` does not match client region `aws-global` and UseArnRegion is `false`'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '235 object lambda @cn-north-1, client region us-west-2 (cross partition), useArnRegion=true' => [
        'documentation' => 'object lambda @cn-north-1, client region us-west-2 (cross partition), useArnRegion=true',
        'expect' => [
            'error' => 'Client was configured for partition `aws` but ARN (`arn:aws-cn:s3-object-lambda:cn-north-1:123456789012:accesspoint/mybanner`) has `aws-cn`'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'aws-global',
                    'AWS::S3::UseArnRegion' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws-cn:s3-object-lambda:cn-north-1:123456789012:accesspoint/mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'aws-global',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => true,
            'Bucket' => 'arn:aws-cn:s3-object-lambda:cn-north-1:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '236 object lambda with dualstack' => [
        'documentation' => 'object lambda with dualstack',
        'expect' => [
            'error' => 'S3 Object Lambda does not support Dual-stack'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseDualStack' => true,
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint/mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '237 object lambda @us-gov-east-1' => [
        'documentation' => 'object lambda @us-gov-east-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-gov-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://mybanner-123456789012.s3-object-lambda.us-gov-east-1.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-gov-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws-us-gov:s3-object-lambda:us-gov-east-1:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '238 object lambda @us-gov-east-1, with fips' => [
        'documentation' => 'object lambda @us-gov-east-1, with fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-gov-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://mybanner-123456789012.s3-object-lambda-fips.us-gov-east-1.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-gov-east-1',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws-us-gov:s3-object-lambda:us-gov-east-1:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '239 object lambda @cn-north-1, with fips' => [
        'documentation' => 'object lambda @cn-north-1, with fips',
        'expect' => [
            'error' => 'Partition does not support FIPS'
        ],
        'params' => [
            'Region' => 'cn-north-1',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws-cn:s3-object-lambda:cn-north-1:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '240 object lambda with accelerate' => [
        'documentation' => 'object lambda with accelerate',
        'expect' => [
            'error' => 'S3 Object Lambda does not support S3 Accelerate'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::Accelerate' => true,
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint/mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => true,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint/mybanner'
        ]
    ];
    yield '241 object lambda with invalid arn - bad service and someresource' => [
        'documentation' => 'object lambda with invalid arn - bad service and someresource',
        'expect' => [
            'error' => 'Invalid ARN: Unrecognized format: arn:aws:sqs:us-west-2:123456789012:someresource (type: someresource)'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:sqs:us-west-2:123456789012:someresource',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws:sqs:us-west-2:123456789012:someresource'
        ]
    ];
    yield '242 object lambda with invalid arn - invalid resource' => [
        'documentation' => 'object lambda with invalid arn - invalid resource',
        'expect' => [
            'error' => 'Invalid ARN: Object Lambda ARNs only support `accesspoint` arn types, but found: `bucket_name`'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:bucket_name:mybucket'
        ]
    ];
    yield '243 object lambda with invalid arn - missing region' => [
        'documentation' => 'object lambda with invalid arn - missing region',
        'expect' => [
            'error' => 'Invalid ARN: bucket ARN is missing a region'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws:s3-object-lambda::123456789012:accesspoint/mybanner'
        ]
    ];
    yield '244 object lambda with invalid arn - missing account-id' => [
        'documentation' => 'object lambda with invalid arn - missing account-id',
        'expect' => [
            'error' => 'Invalid ARN: Missing account id'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => true,
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2::accesspoint/mybanner'
        ]
    ];
    yield '245 object lambda with invalid arn - account id contains invalid characters' => [
        'documentation' => 'object lambda with invalid arn - account id contains invalid characters',
        'expect' => [
            'error' => 'Invalid ARN: The account id may only contain a-z, A-Z, 0-9 and `-`. Found: `123.45678.9012`'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::UseArnRegion' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123.45678.9012:accesspoint:mybucket',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => true,
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123.45678.9012:accesspoint:mybucket'
        ]
    ];
    yield '246 object lambda with invalid arn - missing access point name' => [
        'documentation' => 'object lambda with invalid arn - missing access point name',
        'expect' => [
            'error' => 'Invalid ARN: Expected a resource of the format `accesspoint:<accesspoint name>` but no name was provided'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => true,
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint'
        ]
    ];
    yield '247 object lambda with invalid arn - access point name contains invalid character: *' => [
        'documentation' => 'object lambda with invalid arn - access point name contains invalid character: *',
        'expect' => [
            'error' => 'Invalid ARN: The access point name may only contain a-z, A-Z, 0-9 and `-`. Found: `*`'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => true,
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint:*'
        ]
    ];
    yield '248 object lambda with invalid arn - access point name contains invalid character: .' => [
        'documentation' => 'object lambda with invalid arn - access point name contains invalid character: .',
        'expect' => [
            'error' => 'Invalid ARN: The access point name may only contain a-z, A-Z, 0-9 and `-`. Found: `my.bucket`'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => true,
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint:my.bucket'
        ]
    ];
    yield '249 object lambda with invalid arn - access point name contains sub resources' => [
        'documentation' => 'object lambda with invalid arn - access point name contains sub resources',
        'expect' => [
            'error' => 'Invalid ARN: The ARN may only contain a single resource component after `accesspoint`.'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => true,
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint:mybucket:object:foo'
        ]
    ];
    yield '250 object lambda with custom endpoint' => [
        'documentation' => 'object lambda with custom endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://mybanner-123456789012.my-endpoint.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://my-endpoint.com',
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint/mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseArnRegion' => false,
            'Bucket' => 'arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint/mybanner',
            'Endpoint' => 'https://my-endpoint.com'
        ]
    ];
    yield '251 object lambda arn with region mismatch and UseArnRegion=false' => [
        'documentation' => 'object lambda arn with region mismatch and UseArnRegion=false',
        'expect' => [
            'error' => 'Invalid configuration: region from ARN `us-east-1` does not match client region `us-west-2` and UseArnRegion is `false`'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::S3::UseArnRegion' => false
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'Bucket' => 'arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner',
            'ForcePathStyle' => false,
            'UseArnRegion' => false,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '252 WriteGetObjectResponse @ us-west-2' => [
        'documentation' => 'WriteGetObjectResponse @ us-west-2',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3-object-lambda.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'WriteGetObjectResponse',
                'operationParams' => [
                    'RequestRoute' => 'RequestRoute',
                    'RequestToken' => 'RequestToken'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'UseObjectLambdaEndpoint' => true,
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '253 WriteGetObjectResponse with custom endpoint' => [
        'documentation' => 'WriteGetObjectResponse with custom endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://my-endpoint.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://my-endpoint.com'
                ],
                'operationName' => 'WriteGetObjectResponse',
                'operationParams' => [
                    'RequestRoute' => 'RequestRoute',
                    'RequestToken' => 'RequestToken'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'UseObjectLambdaEndpoint' => true,
            'Endpoint' => 'https://my-endpoint.com',
            'Region' => 'us-west-2',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '254 WriteGetObjectResponse @ us-east-1' => [
        'documentation' => 'WriteGetObjectResponse @ us-east-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3-object-lambda.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'WriteGetObjectResponse',
                'operationParams' => [
                    'RequestRoute' => 'RequestRoute',
                    'RequestToken' => 'RequestToken'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'UseObjectLambdaEndpoint' => true,
            'Region' => 'us-east-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '255 WriteGetObjectResponse with fips' => [
        'documentation' => 'WriteGetObjectResponse with fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://s3-object-lambda-fips.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'WriteGetObjectResponse',
                'operationParams' => [
                    'RequestRoute' => 'RequestRoute',
                    'RequestToken' => 'RequestToken'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'UseObjectLambdaEndpoint' => true,
            'Region' => 'us-east-1',
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '256 WriteGetObjectResponse with dualstack' => [
        'documentation' => 'WriteGetObjectResponse with dualstack',
        'expect' => [
            'error' => 'S3 Object Lambda does not support Dual-stack'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'WriteGetObjectResponse',
                'operationParams' => [
                    'RequestRoute' => 'RequestRoute',
                    'RequestToken' => 'RequestToken'
                ]
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'UseObjectLambdaEndpoint' => true,
            'Region' => 'us-east-1',
            'UseDualStack' => true,
            'UseFIPS' => false
        ]
    ];
    yield '257 WriteGetObjectResponse with accelerate' => [
        'documentation' => 'WriteGetObjectResponse with accelerate',
        'expect' => [
            'error' => 'S3 Object Lambda does not support S3 Accelerate'
        ],
        'params' => [
            'Accelerate' => true,
            'UseObjectLambdaEndpoint' => true,
            'Region' => 'us-east-1',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '258 WriteGetObjectResponse with fips in CN' => [
        'documentation' => 'WriteGetObjectResponse with fips in CN',
        'expect' => [
            'error' => 'Partition does not support FIPS'
        ],
        'params' => [
            'Accelerate' => false,
            'Region' => 'cn-north-1',
            'UseObjectLambdaEndpoint' => true,
            'UseDualStack' => false,
            'UseFIPS' => true
        ]
    ];
    yield '259 WriteGetObjectResponse with invalid partition' => [
        'documentation' => 'WriteGetObjectResponse with invalid partition',
        'expect' => [
            'error' => 'Invalid region: region was not a valid DNS name.'
        ],
        'params' => [
            'Accelerate' => false,
            'UseObjectLambdaEndpoint' => true,
            'Region' => 'not a valid DNS name',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '260 WriteGetObjectResponse with an unknown partition' => [
        'documentation' => 'WriteGetObjectResponse with an unknown partition',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-object-lambda',
                            'disableDoubleEncoding' => true,
                            'signingRegion' => 'us-east.special'
                        ]
                    ]
                ],
                'url' => 'https://s3-object-lambda.us-east.special.amazonaws.com'
            ]
        ],
        'params' => [
            'Accelerate' => false,
            'UseObjectLambdaEndpoint' => true,
            'Region' => 'us-east.special',
            'UseDualStack' => false,
            'UseFIPS' => false
        ]
    ];
    yield '261 S3 Outposts bucketAlias Real Outpost Prod us-west-1' => [
        'documentation' => 'S3 Outposts bucketAlias Real Outpost Prod us-west-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingName' => 's3-outposts',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'disableDoubleEncoding' => true
                        ],
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-outposts',
                            'signingRegion' => 'us-west-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://test-accessp-o0b1d075431d83bebde8xz5w8ijx1qzlbp3i3kuse10--op-s3.op-0b1d075431d83bebd.s3-outposts.us-west-1.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-1',
            'Bucket' => 'test-accessp-o0b1d075431d83bebde8xz5w8ijx1qzlbp3i3kuse10--op-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '262 S3 Outposts bucketAlias Real Outpost Prod ap-east-1' => [
        'documentation' => 'S3 Outposts bucketAlias Real Outpost Prod ap-east-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingName' => 's3-outposts',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'disableDoubleEncoding' => true
                        ],
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-outposts',
                            'signingRegion' => 'ap-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://test-accessp-o0b1d075431d83bebde8xz5w8ijx1qzlbp3i3kuse10--op-s3.op-0b1d075431d83bebd.s3-outposts.ap-east-1.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'ap-east-1',
            'Bucket' => 'test-accessp-o0b1d075431d83bebde8xz5w8ijx1qzlbp3i3kuse10--op-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '263 S3 Outposts bucketAlias Ec2 Outpost Prod us-east-1' => [
        'documentation' => 'S3 Outposts bucketAlias Ec2 Outpost Prod us-east-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingName' => 's3-outposts',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'disableDoubleEncoding' => true
                        ],
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-outposts',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://test-accessp-e0000075431d83bebde8xz5w8ijx1qzlbp3i3kuse10--op-s3.ec2.s3-outposts.us-east-1.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'test-accessp-e0000075431d83bebde8xz5w8ijx1qzlbp3i3kuse10--op-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '264 S3 Outposts bucketAlias Ec2 Outpost Prod me-south-1' => [
        'documentation' => 'S3 Outposts bucketAlias Ec2 Outpost Prod me-south-1',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingName' => 's3-outposts',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'disableDoubleEncoding' => true
                        ],
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-outposts',
                            'signingRegion' => 'me-south-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://test-accessp-e0000075431d83bebde8xz5w8ijx1qzlbp3i3kuse10--op-s3.ec2.s3-outposts.me-south-1.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'me-south-1',
            'Bucket' => 'test-accessp-e0000075431d83bebde8xz5w8ijx1qzlbp3i3kuse10--op-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '265 S3 Outposts bucketAlias Real Outpost Beta' => [
        'documentation' => 'S3 Outposts bucketAlias Real Outpost Beta',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingName' => 's3-outposts',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'disableDoubleEncoding' => true
                        ],
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-outposts',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://test-accessp-o0b1d075431d83bebde8xz5w8ijx1qzlbp3i3kbeta0--op-s3.op-0b1d075431d83bebd.example.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'test-accessp-o0b1d075431d83bebde8xz5w8ijx1qzlbp3i3kbeta0--op-s3',
            'Endpoint' => 'https://example.amazonaws.com',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '266 S3 Outposts bucketAlias Ec2 Outpost Beta' => [
        'documentation' => 'S3 Outposts bucketAlias Ec2 Outpost Beta',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4a',
                            'signingName' => 's3-outposts',
                            'signingRegionSet' => [
                                '*'
                            ],
                            'disableDoubleEncoding' => true
                        ],
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3-outposts',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://161743052723-e00000136899934034jeahy1t8gpzpbwjj8kb7beta0--op-s3.ec2.example.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => '161743052723-e00000136899934034jeahy1t8gpzpbwjj8kb7beta0--op-s3',
            'Endpoint' => 'https://example.amazonaws.com',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '267 S3 Outposts bucketAlias - No endpoint set for beta' => [
        'documentation' => 'S3 Outposts bucketAlias - No endpoint set for beta',
        'expect' => [
            'error' => 'Expected a endpoint to be specified but no endpoint was found'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'test-accessp-o0b1d075431d83bebde8xz5w8ijx1qzlbp3i3kbeta0--op-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '268 S3 Outposts invalid bucket name' => [
        'documentation' => 'S3 Outposts invalid bucket name',
        'expect' => [
            'error' => 'Invalid Outposts Bucket alias - it must be a valid bucket name.'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'test-accessp-o0b1de75431d83bebd/8xz5w8ijx1qzlbp3i3kbeta0--op-s3',
            'Endpoint' => 'https://example.amazonaws.com',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '269 S3 Outposts bucketAlias Invalid hardware type' => [
        'documentation' => 'S3 Outposts bucketAlias Invalid hardware type',
        'expect' => [
            'error' => 'Unrecognized hardware type: "Expected hardware type o or e but got h"'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'test-accessp-h0000075431d83bebde8xz5w8ijx1qzlbp3i3kuse10--op-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '270 S3 Outposts bucketAlias Special character in Outpost Arn' => [
        'documentation' => 'S3 Outposts bucketAlias Special character in Outpost Arn',
        'expect' => [
            'error' => 'Invalid ARN: The outpost Id must only contain a-z, A-Z, 0-9 and `-`.'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'test-accessp-o00000754%1d83bebde8xz5w8ijx1qzlbp3i3kuse10--op-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '271 S3 Outposts bucketAlias - No endpoint set for beta' => [
        'documentation' => 'S3 Outposts bucketAlias - No endpoint set for beta',
        'expect' => [
            'error' => 'Expected a endpoint to be specified but no endpoint was found'
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'test-accessp-e0b1d075431d83bebde8xz5w8ijx1qzlbp3i3ebeta0--op-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '272 S3 Snow with bucket' => [
        'documentation' => 'S3 Snow with bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'snow',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://10.0.1.12:433/bucketName'
            ]
        ],
        'params' => [
            'Region' => 'snow',
            'Bucket' => 'bucketName',
            'Endpoint' => 'http://10.0.1.12:433',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '273 S3 Snow without bucket' => [
        'documentation' => 'S3 Snow without bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'snow',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://10.0.1.12:433'
            ]
        ],
        'params' => [
            'Region' => 'snow',
            'Endpoint' => 'https://10.0.1.12:433',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '274 S3 Snow no port' => [
        'documentation' => 'S3 Snow no port',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'snow',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'http://10.0.1.12/bucketName'
            ]
        ],
        'params' => [
            'Region' => 'snow',
            'Bucket' => 'bucketName',
            'Endpoint' => 'http://10.0.1.12',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '275 S3 Snow dns endpoint' => [
        'documentation' => 'S3 Snow dns endpoint',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3',
                            'signingRegion' => 'snow',
                            'disableDoubleEncoding' => true
                        ]
                    ]
                ],
                'url' => 'https://amazonaws.com/bucketName'
            ]
        ],
        'params' => [
            'Region' => 'snow',
            'Bucket' => 'bucketName',
            'Endpoint' => 'https://amazonaws.com',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false
        ]
    ];
    yield '276 Data Plane with short zone name' => [
        'documentation' => 'Data Plane with short zone name',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--abcd-ab1--x-s3.s3express-abcd-ab1.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--abcd-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'mybucket--abcd-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '277 Data Plane with short zone name china region' => [
        'documentation' => 'Data Plane with short zone name china region',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--abcd-ab1--x-s3.s3express-abcd-ab1.cn-north-1.amazonaws.com.cn'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--abcd-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'cn-north-1',
            'Bucket' => 'mybucket--abcd-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '278 Data Plane with short zone name with AP' => [
        'documentation' => 'Data Plane with short zone name with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--abcd-ab1--xa-s3.s3express-abcd-ab1.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--abcd-ab1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'myaccesspoint--abcd-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '279 Data Plane with short zone name with AP china region' => [
        'documentation' => 'Data Plane with short zone name with AP china region',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--abcd-ab1--xa-s3.s3express-abcd-ab1.cn-north-1.amazonaws.com.cn'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--abcd-ab1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'cn-north-1',
            'Bucket' => 'myaccesspoint--abcd-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '280 Data Plane with short zone names (13 chars)' => [
        'documentation' => 'Data Plane with short zone names (13 chars)',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test-zone-ab1--x-s3.s3express-test-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--test-zone-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test-zone-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '281 Data Plane with short zone names (13 chars) with AP' => [
        'documentation' => 'Data Plane with short zone names (13 chars) with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test-zone-ab1--xa-s3.s3express-test-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--test-zone-ab1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test-zone-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '282 Data Plane with medium zone names (14 chars)' => [
        'documentation' => 'Data Plane with medium zone names (14 chars)',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-zone-ab1--x-s3.s3express-test1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--test1-zone-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-zone-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '283 Data Plane with medium zone names (14 chars) with AP' => [
        'documentation' => 'Data Plane with medium zone names (14 chars) with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-zone-ab1--xa-s3.s3express-test1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--test1-zone-ab1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-zone-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '284 Data Plane with long zone names (20 chars)' => [
        'documentation' => 'Data Plane with long zone names (20 chars)',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-long1-zone-ab1--x-s3.s3express-test1-long1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--test1-long1-zone-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-long1-zone-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '285 Data Plane with long zone names (20 chars)' => [
        'documentation' => 'Data Plane with long zone names (20 chars)',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-long1-zone-ab1--xa-s3.s3express-test1-long1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--test1-long1-zone-ab1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-long1-zone-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '286 Data Plane with short zone fips' => [
        'documentation' => 'Data Plane with short zone fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test-ab1--x-s3.s3express-fips-test-ab1.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--test-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'mybucket--test-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '287 Data Plane with short zone fips china region' => [
        'documentation' => 'Data Plane with short zone fips china region',
        'expect' => [
            'error' => 'Partition does not support FIPS'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--test-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'cn-north-1',
            'Bucket' => 'mybucket--test-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '288 Data Plane with short zone fips with AP' => [
        'documentation' => 'Data Plane with short zone fips with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test-ab1--xa-s3.s3express-fips-test-ab1.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--test-ab1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'myaccesspoint--test-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '289 Data Plane with short zone fips with AP china region' => [
        'documentation' => 'Data Plane with short zone fips with AP china region',
        'expect' => [
            'error' => 'Partition does not support FIPS'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--test-ab1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'cn-north-1',
            'Bucket' => 'myaccesspoint--test-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '290 Data Plane with short zone (13 chars) fips' => [
        'documentation' => 'Data Plane with short zone (13 chars) fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test-zone-ab1--x-s3.s3express-fips-test-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--test-zone-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test-zone-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '291 Data Plane with short zone (13 chars) fips with AP' => [
        'documentation' => 'Data Plane with short zone (13 chars) fips with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test-zone-ab1--xa-s3.s3express-fips-test-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--test-zone-ab1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test-zone-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '292 Data Plane with medium zone (14 chars) fips' => [
        'documentation' => 'Data Plane with medium zone (14 chars) fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-zone-ab1--x-s3.s3express-fips-test1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--test1-zone-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-zone-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '293 Data Plane with medium zone (14 chars) fips with AP' => [
        'documentation' => 'Data Plane with medium zone (14 chars) fips with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-zone-ab1--xa-s3.s3express-fips-test1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--test1-zone-ab1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-zone-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '294 Data Plane with long zone (20 chars) fips' => [
        'documentation' => 'Data Plane with long zone (20 chars) fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-long1-zone-ab1--x-s3.s3express-fips-test1-long1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--test1-long1-zone-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-long1-zone-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '295 Data Plane with long zone (20 chars) fips with AP' => [
        'documentation' => 'Data Plane with long zone (20 chars) fips with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-long1-zone-ab1--xa-s3.s3express-fips-test1-long1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--test1-long1-zone-ab1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-long1-zone-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '296 Data Plane with long AZ' => [
        'documentation' => 'Data Plane with long AZ',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-az1--x-s3.s3express-test1-az1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--test1-az1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-az1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '297 Data Plane with long AZ with AP' => [
        'documentation' => 'Data Plane with long AZ with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-az1--xa-s3.s3express-test1-az1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--test1-az1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-az1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '298 Data Plane with long AZ fips' => [
        'documentation' => 'Data Plane with long AZ fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-az1--x-s3.s3express-fips-test1-az1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--test1-az1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-az1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '299 Data Plane with long AZ fips with AP' => [
        'documentation' => 'Data Plane with long AZ fips with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-az1--xa-s3.s3express-fips-test1-az1.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--test1-az1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-az1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '300 Control plane with short AZ bucket' => [
        'documentation' => 'Control plane with short AZ bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://s3express-control.us-east-1.amazonaws.com/mybucket--test-ab1--x-s3'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'CreateBucket',
                'operationParams' => [
                    'Bucket' => 'mybucket--test-ab1--x-s3'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'mybucket--test-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => false
        ]
    ];
    yield '301 Control plane with short AZ bucket china region' => [
        'documentation' => 'Control plane with short AZ bucket china region',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'cn-north-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://s3express-control.cn-north-1.amazonaws.com.cn/mybucket--test-ab1--x-s3'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1'
                ],
                'operationName' => 'CreateBucket',
                'operationParams' => [
                    'Bucket' => 'mybucket--test-ab1--x-s3'
                ]
            ]
        ],
        'params' => [
            'Region' => 'cn-north-1',
            'Bucket' => 'mybucket--test-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => false
        ]
    ];
    yield '302 Control plane with short AZ bucket and fips' => [
        'documentation' => 'Control plane with short AZ bucket and fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://s3express-control-fips.us-east-1.amazonaws.com/mybucket--test-ab1--x-s3'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'CreateBucket',
                'operationParams' => [
                    'Bucket' => 'mybucket--test-ab1--x-s3'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'mybucket--test-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => false
        ]
    ];
    yield '303 Control plane with short AZ bucket and fips china region' => [
        'documentation' => 'Control plane with short AZ bucket and fips china region',
        'expect' => [
            'error' => 'Partition does not support FIPS'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'cn-north-1',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'CreateBucket',
                'operationParams' => [
                    'Bucket' => 'mybucket--test-ab1--x-s3'
                ]
            ]
        ],
        'params' => [
            'Region' => 'cn-north-1',
            'Bucket' => 'mybucket--test-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => false
        ]
    ];
    yield '304 Control plane without bucket' => [
        'documentation' => 'Control plane without bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://s3express-control.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'ListDirectoryBuckets'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => false
        ]
    ];
    yield '305 Control plane without bucket and fips' => [
        'documentation' => 'Control plane without bucket and fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://s3express-control-fips.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseFIPS' => true
                ],
                'operationName' => 'ListDirectoryBuckets'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => false
        ]
    ];
    yield '306 Data Plane sigv4 auth with short AZ' => [
        'documentation' => 'Data Plane sigv4 auth with short AZ',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--usw2-az1--x-s3.s3express-usw2-az1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '307 Data Plane sigv4 auth with short AZ with AP' => [
        'documentation' => 'Data Plane sigv4 auth with short AZ with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--usw2-az1--xa-s3.s3express-usw2-az1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '308 Data Plane sigv4 auth with short zone (13 chars)' => [
        'documentation' => 'Data Plane sigv4 auth with short zone (13 chars)',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test-zone-ab1--x-s3.s3express-test-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test-zone-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '309 Data Plane sigv4 auth with short zone (13 chars) with AP' => [
        'documentation' => 'Data Plane sigv4 auth with short zone (13 chars) with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test-zone-ab1--xa-s3.s3express-test-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test-zone-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '310 Data Plane sigv4 auth with short AZ fips' => [
        'documentation' => 'Data Plane sigv4 auth with short AZ fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--usw2-az1--x-s3.s3express-fips-usw2-az1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '311 Data Plane sigv4 auth with short AZ fips with AP' => [
        'documentation' => 'Data Plane sigv4 auth with short AZ fips with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--usw2-az1--xa-s3.s3express-fips-usw2-az1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '312 Data Plane sigv4 auth with short zone (13 chars) fips' => [
        'documentation' => 'Data Plane sigv4 auth with short zone (13 chars) fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test-zone-ab1--x-s3.s3express-fips-test-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test-zone-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '313 Data Plane sigv4 auth with short zone (13 chars) fips with AP' => [
        'documentation' => 'Data Plane sigv4 auth with short zone (13 chars) fips with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test-zone-ab1--xa-s3.s3express-fips-test-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test-zone-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '314 Data Plane sigv4 auth with long AZ' => [
        'documentation' => 'Data Plane sigv4 auth with long AZ',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-az1--x-s3.s3express-test1-az1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-az1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '315 Data Plane sigv4 auth with long AZ with AP' => [
        'documentation' => 'Data Plane sigv4 auth with long AZ with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-az1--xa-s3.s3express-test1-az1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-az1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '316 Data Plane sigv4 auth with medium zone(14 chars)' => [
        'documentation' => 'Data Plane sigv4 auth with medium zone(14 chars)',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-zone-ab1--x-s3.s3express-test1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-zone-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '317 Data Plane sigv4 auth with medium zone(14 chars) with AP' => [
        'documentation' => 'Data Plane sigv4 auth with medium zone(14 chars) with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-zone-ab1--xa-s3.s3express-test1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-zone-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '318 Data Plane sigv4 auth with long zone(20 chars)' => [
        'documentation' => 'Data Plane sigv4 auth with long zone(20 chars)',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-long1-zone-ab1--x-s3.s3express-test1-long1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-long1-zone-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '319 Data Plane sigv4 auth with long zone(20 chars) with AP' => [
        'documentation' => 'Data Plane sigv4 auth with long zone(20 chars) with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-long1-zone-ab1--xa-s3.s3express-test1-long1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-long1-zone-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '320 Data Plane sigv4 auth with long AZ fips' => [
        'documentation' => 'Data Plane sigv4 auth with long AZ fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-az1--x-s3.s3express-fips-test1-az1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-az1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '321 Data Plane sigv4 auth with long AZ fips with AP' => [
        'documentation' => 'Data Plane sigv4 auth with long AZ fips with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-az1--xa-s3.s3express-fips-test1-az1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-az1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '322 Data Plane sigv4 auth with medium zone (14 chars) fips' => [
        'documentation' => 'Data Plane sigv4 auth with medium zone (14 chars) fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-zone-ab1--x-s3.s3express-fips-test1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-zone-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '323 Data Plane sigv4 auth with medium zone (14 chars) fips with AP' => [
        'documentation' => 'Data Plane sigv4 auth with medium zone (14 chars) fips with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-zone-ab1--xa-s3.s3express-fips-test1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-zone-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '324 Data Plane sigv4 auth with long zone (20 chars) fips' => [
        'documentation' => 'Data Plane sigv4 auth with long zone (20 chars) fips',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-long1-zone-ab1--x-s3.s3express-fips-test1-long1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-long1-zone-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '325 Data Plane sigv4 auth with long zone (20 chars) fips with AP' => [
        'documentation' => 'Data Plane sigv4 auth with long zone (20 chars) fips with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-long1-zone-ab1--xa-s3.s3express-fips-test1-long1-zone-ab1.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-long1-zone-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '326 Control Plane host override' => [
        'documentation' => 'Control Plane host override',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--usw2-az1--x-s3.custom.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => true,
            'Endpoint' => 'https://custom.com'
        ]
    ];
    yield '327 Control Plane host override with AP' => [
        'documentation' => 'Control Plane host override with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--usw2-az1--xa-s3.custom.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => true,
            'Endpoint' => 'https://custom.com'
        ]
    ];
    yield '328 Control Plane host override no bucket' => [
        'documentation' => 'Control Plane host override no bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://custom.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => true,
            'Endpoint' => 'https://custom.com'
        ]
    ];
    yield '329 Data plane host override non virtual session auth' => [
        'documentation' => 'Data plane host override non virtual session auth',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://10.0.0.1/mybucket--usw2-az1--x-s3'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://10.0.0.1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--usw2-az1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Endpoint' => 'https://10.0.0.1'
        ]
    ];
    yield '330 Data plane host override non virtual session auth with AP' => [
        'documentation' => 'Data plane host override non virtual session auth with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://10.0.0.1/myaccesspoint--usw2-az1--xa-s3'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://10.0.0.1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--usw2-az1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Endpoint' => 'https://10.0.0.1'
        ]
    ];
    yield '331 Control Plane host override ip' => [
        'documentation' => 'Control Plane host override ip',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://10.0.0.1/mybucket--usw2-az1--x-s3'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => true,
            'Endpoint' => 'https://10.0.0.1'
        ]
    ];
    yield '332 Control Plane host override ip with AP' => [
        'documentation' => 'Control Plane host override ip with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://10.0.0.1/myaccesspoint--usw2-az1--xa-s3'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => true,
            'Endpoint' => 'https://10.0.0.1'
        ]
    ];
    yield '333 Data plane host override' => [
        'documentation' => 'Data plane host override',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--usw2-az1--x-s3.custom.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://custom.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--usw2-az1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Endpoint' => 'https://custom.com'
        ]
    ];
    yield '334 Data plane host override with AP' => [
        'documentation' => 'Data plane host override with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--usw2-az1--xa-s3.custom.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://custom.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--usw2-az1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Endpoint' => 'https://custom.com'
        ]
    ];
    yield '335 bad format error' => [
        'documentation' => 'bad format error',
        'expect' => [
            'error' => 'Unrecognized S3Express bucket name format.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--usaz1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'mybucket--usaz1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '336 bad AP format error' => [
        'documentation' => 'bad AP format error',
        'expect' => [
            'error' => 'Unrecognized S3Express bucket name format.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--usaz1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'myaccesspoint--usaz1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '337 bad format error no session auth' => [
        'documentation' => 'bad format error no session auth',
        'expect' => [
            'error' => 'Unrecognized S3Express bucket name format.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--usaz1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'mybucket--usaz1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '338 bad AP format error no session auth' => [
        'documentation' => 'bad AP format error no session auth',
        'expect' => [
            'error' => 'Unrecognized S3Express bucket name format.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--usaz1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'myaccesspoint--usaz1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '339 accelerate error' => [
        'documentation' => 'accelerate error',
        'expect' => [
            'error' => 'S3Express does not support S3 Accelerate.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--test-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'mybucket--test-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => true,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '340 accelerate error with AP' => [
        'documentation' => 'accelerate error with AP',
        'expect' => [
            'error' => 'S3Express does not support S3 Accelerate.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::S3::Accelerate' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'myaccesspoint--test-ab1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'myaccesspoint--test-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => true,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '341 Data plane bucket format error' => [
        'documentation' => 'Data plane bucket format error',
        'expect' => [
            'error' => 'S3Express bucket name is not a valid virtual hostable name.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'my.bucket--test-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'my.bucket--test-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '342 Data plane AP format error' => [
        'documentation' => 'Data plane AP format error',
        'expect' => [
            'error' => 'S3Express bucket name is not a valid virtual hostable name.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'my.myaccesspoint--test-ab1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'my.myaccesspoint--test-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '343 host override data plane bucket error session auth' => [
        'documentation' => 'host override data plane bucket error session auth',
        'expect' => [
            'error' => 'S3Express bucket name is not a valid virtual hostable name.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://custom.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'my.bucket--usw2-az1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'my.bucket--usw2-az1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Endpoint' => 'https://custom.com'
        ]
    ];
    yield '344 host override data plane AP error session auth' => [
        'documentation' => 'host override data plane AP error session auth',
        'expect' => [
            'error' => 'S3Express bucket name is not a valid virtual hostable name.'
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'SDK::Endpoint' => 'https://custom.com'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'my.myaccesspoint--usw2-az1--xa-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'my.myaccesspoint--usw2-az1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Endpoint' => 'https://custom.com'
        ]
    ];
    yield '345 host override data plane bucket error' => [
        'documentation' => 'host override data plane bucket error',
        'expect' => [
            'error' => 'S3Express bucket name is not a valid virtual hostable name.'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'my.bucket--usw2-az1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Endpoint' => 'https://custom.com',
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '346 host override data plane AP error' => [
        'documentation' => 'host override data plane AP error',
        'expect' => [
            'error' => 'S3Express bucket name is not a valid virtual hostable name.'
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'my.myaccesspoint--usw2-az1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'Endpoint' => 'https://custom.com',
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '347 Control plane without bucket and dualstack' => [
        'documentation' => 'Control plane without bucket and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://s3express-control.dualstack.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'ListDirectoryBuckets'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => false
        ]
    ];
    yield '348 Control plane without bucket, fips and dualstack' => [
        'documentation' => 'Control plane without bucket, fips and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://s3express-control-fips.dualstack.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseFIPS' => true,
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'ListDirectoryBuckets'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => false
        ]
    ];
    yield '349 Data Plane with bucket containing delimiters' => [
        'documentation' => 'Data Plane with bucket containing delimiters',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://my--s3--bucket--abcd-ab1--x-s3.s3express-abcd-ab1.us-east-1.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1'
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'my--s3--bucket--abcd-ab1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'my--s3--bucket--abcd-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '350 Control plane with with bucket containing delimiters' => [
        'documentation' => 'Control plane with with bucket containing delimiters',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://s3express-control.us-east-1.amazonaws.com/my--s3--bucket--abcd-ab1--x-s3'
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'my--s3--bucket--abcd-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true,
            'DisableS3ExpressSessionAuth' => false
        ]
    ];
    yield '351 Data Plane with short AZ and dualstack' => [
        'documentation' => 'Data Plane with short AZ and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--usw2-az1--x-s3.s3express-usw2-az1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--usw2-az1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '352 Data Plane with short AZ and FIPS with dualstack' => [
        'documentation' => 'Data Plane with short AZ and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--usw2-az1--x-s3.s3express-fips-usw2-az1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-west-2',
                    'AWS::UseFIPS' => true,
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'GetObject',
                'operationParams' => [
                    'Bucket' => 'mybucket--usw2-az1--x-s3',
                    'Key' => 'key'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '353 Data Plane sigv4 auth with short AZ and dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with short AZ and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--usw2-az1--x-s3.s3express-usw2-az1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '354 Data Plane sigv4 auth with short AZ and FIPS with dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with short AZ and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--usw2-az1--x-s3.s3express-fips-usw2-az1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '355 Data Plane with zone and dualstack' => [
        'documentation' => 'Data Plane with zone and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--usw2-az12--x-s3.s3express-usw2-az12.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az12--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '356 Data Plane with zone and FIPS with dualstack' => [
        'documentation' => 'Data Plane with zone and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--usw2-az12--x-s3.s3express-fips-usw2-az12.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az12--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '357 Data Plane sigv4 auth with zone and dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with zone and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--usw2-az12--x-s3.s3express-usw2-az12.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az12--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '358 Data Plane sigv4 auth with 9-char zone and FIPS with dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with 9-char zone and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--usw2-az12--x-s3.s3express-fips-usw2-az12.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--usw2-az12--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '359 Data Plane with 13-char zone and dualstack' => [
        'documentation' => 'Data Plane with 13-char zone and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test-zone-ab1--x-s3.s3express-test-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test-zone-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '360 Data Plane with 13-char zone and FIPS with dualstack' => [
        'documentation' => 'Data Plane with 13-char zone and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test-zone-ab1--x-s3.s3express-fips-test-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test-zone-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '361 Data Plane sigv4 auth with 13-char zone and dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with 13-char zone and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test-zone-ab1--x-s3.s3express-test-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test-zone-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '362 Data Plane sigv4 auth with 13-char zone and FIPS with dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with 13-char zone and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test-zone-ab1--x-s3.s3express-fips-test-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test-zone-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '363 Data Plane with 14-char zone and dualstack' => [
        'documentation' => 'Data Plane with 14-char zone and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-zone-ab1--x-s3.s3express-test1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-zone-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '364 Data Plane with 14-char zone and FIPS with dualstack' => [
        'documentation' => 'Data Plane with 14-char zone and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-zone-ab1--x-s3.s3express-fips-test1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-zone-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '365 Data Plane sigv4 auth with 14-char zone and dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with 14-char zone and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-zone-ab1--x-s3.s3express-test1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-zone-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '366 Data Plane sigv4 auth with 14-char zone and FIPS with dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with 14-char zone and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-zone-ab1--x-s3.s3express-fips-test1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-zone-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '367 Data Plane with long zone (20 cha) and dualstack' => [
        'documentation' => 'Data Plane with long zone (20 cha) and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-long1-zone-ab1--x-s3.s3express-test1-long1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-long1-zone-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '368 Data Plane with long zone (20 char) and FIPS with dualstack' => [
        'documentation' => 'Data Plane with long zone (20 char) and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-long1-zone-ab1--x-s3.s3express-fips-test1-long1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-long1-zone-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '369 Data Plane sigv4 auth with long zone (20 char) and dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with long zone (20 char) and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-long1-zone-ab1--x-s3.s3express-test1-long1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-long1-zone-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '370 Data Plane sigv4 auth with long zone (20 char) and FIPS with dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with long zone (20 char) and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://mybucket--test1-long1-zone-ab1--x-s3.s3express-fips-test1-long1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'mybucket--test1-long1-zone-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '371 Control plane and FIPS with dualstack' => [
        'documentation' => 'Control plane and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://s3express-control-fips.dualstack.us-east-1.amazonaws.com/mybucket--test-ab1--x-s3'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseFIPS' => true,
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'CreateBucket',
                'operationParams' => [
                    'Bucket' => 'mybucket--test-ab1--x-s3'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'mybucket--test-ab1--x-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true
        ]
    ];
    yield '372 Data plane with zone and dualstack and AP' => [
        'documentation' => 'Data plane with zone and dualstack and AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--usw2-az1--xa-s3.s3express-usw2-az1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '373 Data plane with zone and FIPS with dualstack and AP' => [
        'documentation' => 'Data plane with zone and FIPS with dualstack and AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--usw2-az1--xa-s3.s3express-fips-usw2-az1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '374 Data Plane sigv4 auth with zone and dualstack and AP' => [
        'documentation' => 'Data Plane sigv4 auth with zone and dualstack and AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--usw2-az1--xa-s3.s3express-usw2-az1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '375 Data Plane AP sigv4 auth with zone and FIPS with dualstack' => [
        'documentation' => 'Data Plane AP sigv4 auth with zone and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--usw2-az1--xa-s3.s3express-fips-usw2-az1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '376 Data Plane with zone (9 char) and AP with dualstack' => [
        'documentation' => 'Data Plane with zone (9 char) and AP with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--usw2-az12--xa-s3.s3express-usw2-az12.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az12--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '377 Data Plane with zone (9 char) and FIPS with AP and dualstack' => [
        'documentation' => 'Data Plane with zone (9 char) and FIPS with AP and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--usw2-az12--xa-s3.s3express-fips-usw2-az12.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az12--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '378 Data Plane sigv4 auth with (9 char) zone and dualstack with AP' => [
        'documentation' => 'Data Plane sigv4 auth with (9 char) zone and dualstack with AP',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--usw2-az12--xa-s3.s3express-usw2-az12.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az12--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '379 Access Point sigv4 auth with (9 char) zone and FIPS with dualstack' => [
        'documentation' => 'Access Point sigv4 auth with (9 char) zone and FIPS with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--usw2-az12--xa-s3.s3express-fips-usw2-az12.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--usw2-az12--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '380 Data Plane with zone (13 char) and AP with dualstack' => [
        'documentation' => 'Data Plane with zone (13 char) and AP with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test-zone-ab1--xa-s3.s3express-test-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test-zone-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '381 Data Plane with zone (13 char) and AP with FIPS and dualstack' => [
        'documentation' => 'Data Plane with zone (13 char) and AP with FIPS and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test-zone-ab1--xa-s3.s3express-fips-test-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test-zone-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '382 Data Plane sigv4 auth with (13 char) zone with AP and dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with (13 char) zone with AP and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test-zone-ab1--xa-s3.s3express-test-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test-zone-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '383 Data Plane sigv4 auth with (13 char) zone with AP and FIPS and dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with (13 char) zone with AP and FIPS and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test-zone-ab1--xa-s3.s3express-fips-test-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test-zone-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '384 Data Plane with (14 char) zone and AP with dualstack' => [
        'documentation' => 'Data Plane with (14 char) zone and AP with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-zone-ab1--xa-s3.s3express-test1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-zone-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '385 Data Plane with (14 char) zone and AP with FIPS and dualstack' => [
        'documentation' => 'Data Plane with (14 char) zone and AP with FIPS and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-zone-ab1--xa-s3.s3express-fips-test1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-zone-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '386 Data Plane sigv4 auth with (14 char) zone and AP with dualstack' => [
        'documentation' => 'Data Plane sigv4 auth with (14 char) zone and AP with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-zone-ab1--xa-s3.s3express-test1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-zone-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '387 Data Plane with (14 char) zone and AP with FIPS and dualstack' => [
        'documentation' => 'Data Plane with (14 char) zone and AP with FIPS and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-zone-ab1--xa-s3.s3express-fips-test1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-zone-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '388 Data Plane with (20 char) zone and AP with dualstack' => [
        'documentation' => 'Data Plane with (20 char) zone and AP with dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-long1-zone-ab1--xa-s3.s3express-test1-long1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-long1-zone-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '389 Data Plane with (20 char) zone and AP with FIPS and dualstack' => [
        'documentation' => 'Data Plane with (20 char) zone and AP with FIPS and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4-s3express',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-long1-zone-ab1--xa-s3.s3express-fips-test1-long1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-long1-zone-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => false
        ]
    ];
    yield '390 Data plane AP with sigv4 and dualstack' => [
        'documentation' => 'Data plane AP with sigv4 and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-long1-zone-ab1--xa-s3.s3express-test1-long1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-long1-zone-ab1--xa-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '391 Data plane AP sigv4 with fips and dualstack' => [
        'documentation' => 'Data plane AP sigv4 with fips and dualstack',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-west-2',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://myaccesspoint--test1-long1-zone-ab1--xa-s3.s3express-fips-test1-long1-zone-ab1.dualstack.us-west-2.amazonaws.com'
            ]
        ],
        'params' => [
            'Region' => 'us-west-2',
            'Bucket' => 'myaccesspoint--test1-long1-zone-ab1--xa-s3',
            'UseFIPS' => true,
            'UseDualStack' => true,
            'Accelerate' => false,
            'DisableS3ExpressSessionAuth' => true
        ]
    ];
    yield '392 Control plane with dualstack and bucket' => [
        'documentation' => 'Control plane with dualstack and bucket',
        'expect' => [
            'endpoint' => [
                'properties' => [
                    'authSchemes' => [
                        [
                            'name' => 'sigv4',
                            'signingName' => 's3express',
                            'signingRegion' => 'us-east-1',
                            'disableDoubleEncoding' => true
                        ]
                    ],
                    'backend' => 'S3Express'
                ],
                'url' => 'https://s3express-control.dualstack.us-east-1.amazonaws.com/mybucket--test-ab1--x-s3'
            ]
        ],
        'operationInputs' => [
            [
                'builtInParams' => [
                    'AWS::Region' => 'us-east-1',
                    'AWS::UseDualStack' => true
                ],
                'operationName' => 'CreateBucket',
                'operationParams' => [
                    'Bucket' => 'mybucket--test-ab1--x-s3'
                ]
            ]
        ],
        'params' => [
            'Region' => 'us-east-1',
            'Bucket' => 'mybucket--test-ab1--x-s3',
            'UseFIPS' => false,
            'UseDualStack' => true,
            'Accelerate' => false,
            'UseS3ExpressControlEndpoint' => true
        ]
    ];
})();
