<?php return array (
    0 =>
        array (
            'priority' => 500,
            'regionPrefix' => 'cn-',
            'rules' =>
                array (
                    0 =>
                        array (
                            'config' =>
                                array (
                                    'signatureVersion' => 'v4',
                                    'endpoint' => '{scheme}://{service}.{region}.amazonaws.com.cn',
                                ),
                        ),
                ),
        ),
    1 =>
        array (
            'priority' => 600,
            'regionPrefix' => 'us-gov-',
            'rules' =>
                array (
                    0 =>
                        array (
                            'services' =>
                                array (
                                    0 => 'iam',
                                ),
                            'config' =>
                                array (
                                    'endpoint' => '{scheme}://{service}.us-gov.amazonaws.com',
                                ),
                        ),
                ),
        ),
    2 =>
        array (
            'priority' => 900,
            'regionPrefix' => 'us-east-1',
            'rules' =>
                array (
                    0 =>
                        array (
                            'services' =>
                                array (
                                    0 => 's3',
                                    1 => 'sdb',
                                ),
                            'config' =>
                                array (
                                    'endpoint' => '{scheme}://{service}.amazonaws.com',
                                ),
                        ),
                ),
        ),
    3 =>
        array (
            'priority' => 999,
            'regionPrefix' => '',
            'rules' =>
                array (
                    0 =>
                        array (
                            'services' =>
                                array (
                                    0 => 's3',
                                ),
                            'config' =>
                                array (
                                    'endpoint' => '{scheme}://{service}-{region}.amazonaws.com',
                                ),
                        ),
                    1 =>
                        array (
                            'services' =>
                                array (
                                    0 => 'cloudfront',
                                    1 => 'iam',
                                    2 => 'importexport',
                                    3 => 'route53',
                                    4 => 'sts',
                                ),
                            'config' =>
                                array (
                                    'endpoint' => '{scheme}://{service}.amazonaws.com',
                                ),
                        ),
                    2 =>
                        array (
                            'config' =>
                                array (
                                    'endpoint' => '{scheme}://{service}.{region}.amazonaws.com',
                                ),
                        ),
                ),
        ),
);
