<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Common\Enum;

use Aws\Common\Enum;

/**
 * Contains enumerable region code values. These should be useful in most cases,
 * with Amazon S3 being the most notable exception
 *
 * @link http://docs.amazonwebservices.com/general/latest/gr/rande.html AWS Regions and Endpoints
 */
class Region extends Enum
{
    const US_EAST_1           = 'us-east-1';
    const VIRGINIA            = self::US_EAST_1;
    const NORTHERN_VIRGINIA   = self::US_EAST_1;

    const US_WEST_1           = 'us-west-1';
    const CALIFORNIA          = self::US_WEST_1;
    const NORTHERN_CALIFORNIA = self::US_WEST_1;

    const US_WEST_2           = 'us-west-2';
    const OREGON              = self::US_WEST_2;

    const EU_WEST_1           = 'eu-west-1';
    const IRELAND             = self::EU_WEST_1;

    const AP_SOUTHEAST_1      = 'ap-southeast-1';
    const SINGAPORE           = self::AP_SOUTHEAST_1;

    const AP_SOUTHEAST_2      = 'ap-southeast-2';
    const SYDNEY              = self::AP_SOUTHEAST_2;

    const AP_NORTHEAST_1      = 'ap-northeast-1';
    const TOKYO               = self::AP_NORTHEAST_1;

    const SA_EAST_1           = 'sa-east-1';
    const SAO_PAULO           = self::SA_EAST_1;

    const US_GOV_WEST_1       = 'us-gov-west-1';
    const GOV_CLOUD_US        = self::US_GOV_WEST_1;
}
