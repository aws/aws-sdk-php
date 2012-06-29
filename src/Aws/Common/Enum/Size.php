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
 * Contains enumerable byte-size values
 */
class Size extends Enum
{
    const B         = 1;
    const BYTE      = self::B;
    const BYTES     = self::B;

    const KB        = 1024;
    const KILOBYTE  = self::KB;
    const KILOBYTES = self::KB;

    const MB        = 1048576;
    const MEGABYTE  = self::MB;
    const MEGABYTES = self::MB;

    const GB        = 1073741824;
    const GIGABYTE  = self::GB;
    const GIGABYTES = self::GB;

    const TB        = 1099511627776;
    const TERABYTE  = self::TB;
    const TERABYTES = self::TB;

    const PB        = 1125899906842624;
    const PETABYTE  = self::PB;
    const PETABYTES = self::PB;

    const EB        = 1152921504606846976;
    const EXABYTE   = self::EB;
    const EXABYTES  = self::EB;
}
