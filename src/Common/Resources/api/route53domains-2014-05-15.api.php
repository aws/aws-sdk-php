<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2014-05-15',
    'endpointPrefix' => 'route53domains',
    'jsonVersion' => '1.1',
    'serviceFullName' => 'Amazon Route 53 Domains',
    'signatureVersion' => 'v4',
    'targetPrefix' => 'Route53Domains_v20140515',
    'protocol' => 'json',
  ],
  'operations' =>
  [
    'CheckDomainAvailability' =>
    [
      'name' => 'CheckDomainAvailability',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'CheckDomainAvailabilityRequest',
      ],
      'output' =>
      [
        'shape' => 'CheckDomainAvailabilityResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'UnsupportedTLD',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DisableDomainTransferLock' =>
    [
      'name' => 'DisableDomainTransferLock',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'DisableDomainTransferLockRequest',
      ],
      'output' =>
      [
        'shape' => 'DisableDomainTransferLockResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DuplicateRequest',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'TLDRulesViolation',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'OperationLimitExceeded',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'EnableDomainTransferLock' =>
    [
      'name' => 'EnableDomainTransferLock',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'EnableDomainTransferLockRequest',
      ],
      'output' =>
      [
        'shape' => 'EnableDomainTransferLockResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DuplicateRequest',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'TLDRulesViolation',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'OperationLimitExceeded',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetDomainDetail' =>
    [
      'name' => 'GetDomainDetail',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetDomainDetailRequest',
      ],
      'output' =>
      [
        'shape' => 'GetDomainDetailResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetOperationDetail' =>
    [
      'name' => 'GetOperationDetail',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'GetOperationDetailRequest',
      ],
      'output' =>
      [
        'shape' => 'GetOperationDetailResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListDomains' =>
    [
      'name' => 'ListDomains',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListDomainsRequest',
      ],
      'output' =>
      [
        'shape' => 'ListDomainsResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListOperations' =>
    [
      'name' => 'ListOperations',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'ListOperationsRequest',
      ],
      'output' =>
      [
        'shape' => 'ListOperationsResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RegisterDomain' =>
    [
      'name' => 'RegisterDomain',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RegisterDomainRequest',
      ],
      'output' =>
      [
        'shape' => 'RegisterDomainResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'UnsupportedTLD',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DuplicateRequest',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'TLDRulesViolation',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'DomainLimitExceeded',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'OperationLimitExceeded',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'RetrieveDomainAuthCode' =>
    [
      'name' => 'RetrieveDomainAuthCode',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'RetrieveDomainAuthCodeRequest',
      ],
      'output' =>
      [
        'shape' => 'RetrieveDomainAuthCodeResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'TransferDomain' =>
    [
      'name' => 'TransferDomain',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'TransferDomainRequest',
      ],
      'output' =>
      [
        'shape' => 'TransferDomainResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'UnsupportedTLD',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'DuplicateRequest',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'TLDRulesViolation',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'DomainLimitExceeded',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        5 =>
        [
          'shape' => 'OperationLimitExceeded',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateDomainContact' =>
    [
      'name' => 'UpdateDomainContact',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateDomainContactRequest',
      ],
      'output' =>
      [
        'shape' => 'UpdateDomainContactResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DuplicateRequest',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'TLDRulesViolation',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'OperationLimitExceeded',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateDomainContactPrivacy' =>
    [
      'name' => 'UpdateDomainContactPrivacy',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateDomainContactPrivacyRequest',
      ],
      'output' =>
      [
        'shape' => 'UpdateDomainContactPrivacyResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DuplicateRequest',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'TLDRulesViolation',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'OperationLimitExceeded',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateDomainNameservers' =>
    [
      'name' => 'UpdateDomainNameservers',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/',
      ],
      'input' =>
      [
        'shape' => 'UpdateDomainNameserversRequest',
      ],
      'output' =>
      [
        'shape' => 'UpdateDomainNameserversResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'DuplicateRequest',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'TLDRulesViolation',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'OperationLimitExceeded',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'AddressLine' =>
    [
      'type' => 'string',
      'max' => 255,
    ],
    'Boolean' =>
    [
      'type' => 'boolean',
    ],
    'CheckDomainAvailabilityRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
        'IdnLangCode' =>
        [
          'shape' => 'LangCode',
        ],
      ],
    ],
    'CheckDomainAvailabilityResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Availability',
      ],
      'members' =>
      [
        'Availability' =>
        [
          'shape' => 'DomainAvailability',
        ],
      ],
    ],
    'City' =>
    [
      'type' => 'string',
      'max' => 255,
    ],
    'ContactDetail' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'FirstName' =>
        [
          'shape' => 'ContactName',
        ],
        'LastName' =>
        [
          'shape' => 'ContactName',
        ],
        'ContactType' =>
        [
          'shape' => 'ContactType',
        ],
        'OrganizationName' =>
        [
          'shape' => 'ContactName',
        ],
        'AddressLine1' =>
        [
          'shape' => 'AddressLine',
        ],
        'AddressLine2' =>
        [
          'shape' => 'AddressLine',
        ],
        'City' =>
        [
          'shape' => 'City',
        ],
        'State' =>
        [
          'shape' => 'State',
        ],
        'CountryCode' =>
        [
          'shape' => 'CountryCode',
        ],
        'ZipCode' =>
        [
          'shape' => 'ZipCode',
        ],
        'PhoneNumber' =>
        [
          'shape' => 'ContactNumber',
        ],
        'Email' =>
        [
          'shape' => 'Email',
        ],
        'Fax' =>
        [
          'shape' => 'ContactNumber',
        ],
        'ExtraParams' =>
        [
          'shape' => 'ExtraParamList',
        ],
      ],
      'sensitive' => true,
    ],
    'ContactName' =>
    [
      'type' => 'string',
      'max' => 255,
    ],
    'ContactNumber' =>
    [
      'type' => 'string',
      'max' => 30,
    ],
    'ContactType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'PERSON',
        1 => 'COMPANY',
        2 => 'ASSOCIATION',
        3 => 'PUBLIC_BODY',
        4 => 'RESELLER',
      ],
    ],
    'CountryCode' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'AD',
        1 => 'AE',
        2 => 'AF',
        3 => 'AG',
        4 => 'AI',
        5 => 'AL',
        6 => 'AM',
        7 => 'AN',
        8 => 'AO',
        9 => 'AQ',
        10 => 'AR',
        11 => 'AS',
        12 => 'AT',
        13 => 'AU',
        14 => 'AW',
        15 => 'AZ',
        16 => 'BA',
        17 => 'BB',
        18 => 'BD',
        19 => 'BE',
        20 => 'BF',
        21 => 'BG',
        22 => 'BH',
        23 => 'BI',
        24 => 'BJ',
        25 => 'BL',
        26 => 'BM',
        27 => 'BN',
        28 => 'BO',
        29 => 'BR',
        30 => 'BS',
        31 => 'BT',
        32 => 'BW',
        33 => 'BY',
        34 => 'BZ',
        35 => 'CA',
        36 => 'CC',
        37 => 'CD',
        38 => 'CF',
        39 => 'CG',
        40 => 'CH',
        41 => 'CI',
        42 => 'CK',
        43 => 'CL',
        44 => 'CM',
        45 => 'CN',
        46 => 'CO',
        47 => 'CR',
        48 => 'CU',
        49 => 'CV',
        50 => 'CX',
        51 => 'CY',
        52 => 'CZ',
        53 => 'DE',
        54 => 'DJ',
        55 => 'DK',
        56 => 'DM',
        57 => 'DO',
        58 => 'DZ',
        59 => 'EC',
        60 => 'EE',
        61 => 'EG',
        62 => 'ER',
        63 => 'ES',
        64 => 'ET',
        65 => 'FI',
        66 => 'FJ',
        67 => 'FK',
        68 => 'FM',
        69 => 'FO',
        70 => 'FR',
        71 => 'GA',
        72 => 'GB',
        73 => 'GD',
        74 => 'GE',
        75 => 'GH',
        76 => 'GI',
        77 => 'GL',
        78 => 'GM',
        79 => 'GN',
        80 => 'GQ',
        81 => 'GR',
        82 => 'GT',
        83 => 'GU',
        84 => 'GW',
        85 => 'GY',
        86 => 'HK',
        87 => 'HN',
        88 => 'HR',
        89 => 'HT',
        90 => 'HU',
        91 => 'ID',
        92 => 'IE',
        93 => 'IL',
        94 => 'IM',
        95 => 'IN',
        96 => 'IQ',
        97 => 'IR',
        98 => 'IS',
        99 => 'IT',
        100 => 'JM',
        101 => 'JO',
        102 => 'JP',
        103 => 'KE',
        104 => 'KG',
        105 => 'KH',
        106 => 'KI',
        107 => 'KM',
        108 => 'KN',
        109 => 'KP',
        110 => 'KR',
        111 => 'KW',
        112 => 'KY',
        113 => 'KZ',
        114 => 'LA',
        115 => 'LB',
        116 => 'LC',
        117 => 'LI',
        118 => 'LK',
        119 => 'LR',
        120 => 'LS',
        121 => 'LT',
        122 => 'LU',
        123 => 'LV',
        124 => 'LY',
        125 => 'MA',
        126 => 'MC',
        127 => 'MD',
        128 => 'ME',
        129 => 'MF',
        130 => 'MG',
        131 => 'MH',
        132 => 'MK',
        133 => 'ML',
        134 => 'MM',
        135 => 'MN',
        136 => 'MO',
        137 => 'MP',
        138 => 'MR',
        139 => 'MS',
        140 => 'MT',
        141 => 'MU',
        142 => 'MV',
        143 => 'MW',
        144 => 'MX',
        145 => 'MY',
        146 => 'MZ',
        147 => 'NA',
        148 => 'NC',
        149 => 'NE',
        150 => 'NG',
        151 => 'NI',
        152 => 'NL',
        153 => 'NO',
        154 => 'NP',
        155 => 'NR',
        156 => 'NU',
        157 => 'NZ',
        158 => 'OM',
        159 => 'PA',
        160 => 'PE',
        161 => 'PF',
        162 => 'PG',
        163 => 'PH',
        164 => 'PK',
        165 => 'PL',
        166 => 'PM',
        167 => 'PN',
        168 => 'PR',
        169 => 'PT',
        170 => 'PW',
        171 => 'PY',
        172 => 'QA',
        173 => 'RO',
        174 => 'RS',
        175 => 'RU',
        176 => 'RW',
        177 => 'SA',
        178 => 'SB',
        179 => 'SC',
        180 => 'SD',
        181 => 'SE',
        182 => 'SG',
        183 => 'SH',
        184 => 'SI',
        185 => 'SK',
        186 => 'SL',
        187 => 'SM',
        188 => 'SN',
        189 => 'SO',
        190 => 'SR',
        191 => 'ST',
        192 => 'SV',
        193 => 'SY',
        194 => 'SZ',
        195 => 'TC',
        196 => 'TD',
        197 => 'TG',
        198 => 'TH',
        199 => 'TJ',
        200 => 'TK',
        201 => 'TL',
        202 => 'TM',
        203 => 'TN',
        204 => 'TO',
        205 => 'TR',
        206 => 'TT',
        207 => 'TV',
        208 => 'TW',
        209 => 'TZ',
        210 => 'UA',
        211 => 'UG',
        212 => 'US',
        213 => 'UY',
        214 => 'UZ',
        215 => 'VA',
        216 => 'VC',
        217 => 'VE',
        218 => 'VG',
        219 => 'VI',
        220 => 'VN',
        221 => 'VU',
        222 => 'WF',
        223 => 'WS',
        224 => 'YE',
        225 => 'YT',
        226 => 'ZA',
        227 => 'ZM',
        228 => 'ZW',
      ],
    ],
    'DNSSec' =>
    [
      'type' => 'string',
    ],
    'DisableDomainTransferLockRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
      ],
    ],
    'DisableDomainTransferLockResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OperationId',
      ],
      'members' =>
      [
        'OperationId' =>
        [
          'shape' => 'OperationId',
        ],
      ],
    ],
    'DomainAuthCode' =>
    [
      'type' => 'string',
      'max' => 1024,
      'sensitive' => true,
    ],
    'DomainAvailability' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'AVAILABLE',
        1 => 'AVAILABLE_RESERVED',
        2 => 'AVAILABLE_PREORDER',
        3 => 'UNAVAILABLE',
        4 => 'UNAVAILABLE_PREMIUM',
        5 => 'UNAVAILABLE_RESTRICTED',
        6 => 'RESERVED',
      ],
    ],
    'DomainLimitExceeded' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'DomainName' =>
    [
      'type' => 'string',
      'max' => 255,
      'pattern' => '[a-zA-Z0-9_\\-.]*',
    ],
    'DomainStatus' =>
    [
      'type' => 'string',
    ],
    'DomainStatusList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DomainStatus',
      ],
    ],
    'DomainSummary' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
        'AutoRenew' =>
        [
          'shape' => 'Boolean',
        ],
        'TransferLock' =>
        [
          'shape' => 'Boolean',
        ],
        'Expiry' =>
        [
          'shape' => 'Timestamp',
        ],
      ],
    ],
    'DomainSummaryList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DomainSummary',
      ],
    ],
    'DuplicateRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'DurationInYears' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 10,
    ],
    'Email' =>
    [
      'type' => 'string',
      'max' => 254,
    ],
    'EnableDomainTransferLockRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
      ],
    ],
    'EnableDomainTransferLockResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OperationId',
      ],
      'members' =>
      [
        'OperationId' =>
        [
          'shape' => 'OperationId',
        ],
      ],
    ],
    'ErrorMessage' =>
    [
      'type' => 'string',
    ],
    'ExtraParam' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
        1 => 'Value',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'ExtraParamName',
        ],
        'Value' =>
        [
          'shape' => 'ExtraParamValue',
        ],
      ],
    ],
    'ExtraParamList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ExtraParam',
      ],
    ],
    'ExtraParamName' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'DUNS_NUMBER',
        1 => 'BRAND_NUMBER',
        2 => 'BIRTH_DEPARTMENT',
        3 => 'BIRTH_DATE_IN_YYYY_MM_DD',
        4 => 'BIRTH_COUNTRY',
        5 => 'BIRTH_CITY',
        6 => 'DOCUMENT_NUMBER',
        7 => 'AU_ID_NUMBER',
        8 => 'AU_ID_TYPE',
        9 => 'CA_LEGAL_TYPE',
        10 => 'FI_BUSINESS_NUMBER',
        11 => 'FI_ID_NUMBER',
        12 => 'IT_PIN',
        13 => 'RU_PASSPORT_DATA',
        14 => 'SE_ID_NUMBER',
        15 => 'SG_ID_NUMBER',
        16 => 'VAT_NUMBER',
      ],
    ],
    'ExtraParamValue' =>
    [
      'type' => 'string',
      'max' => 2048,
    ],
    'GetDomainDetailRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
      ],
    ],
    'GetDomainDetailResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
        1 => 'Nameservers',
        2 => 'AdminContact',
        3 => 'RegistrantContact',
        4 => 'TechContact',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
        'Nameservers' =>
        [
          'shape' => 'NameserverList',
        ],
        'AutoRenew' =>
        [
          'shape' => 'Boolean',
        ],
        'AdminContact' =>
        [
          'shape' => 'ContactDetail',
        ],
        'RegistrantContact' =>
        [
          'shape' => 'ContactDetail',
        ],
        'TechContact' =>
        [
          'shape' => 'ContactDetail',
        ],
        'AdminPrivacy' =>
        [
          'shape' => 'Boolean',
        ],
        'RegistrantPrivacy' =>
        [
          'shape' => 'Boolean',
        ],
        'TechPrivacy' =>
        [
          'shape' => 'Boolean',
        ],
        'RegistrarName' =>
        [
          'shape' => 'RegistrarName',
        ],
        'WhoIsServer' =>
        [
          'shape' => 'RegistrarWhoIsServer',
        ],
        'RegistrarUrl' =>
        [
          'shape' => 'RegistrarUrl',
        ],
        'AbuseContactEmail' =>
        [
          'shape' => 'Email',
        ],
        'AbuseContactPhone' =>
        [
          'shape' => 'ContactNumber',
        ],
        'RegistryDomainId' =>
        [
          'shape' => 'RegistryDomainId',
        ],
        'CreationDate' =>
        [
          'shape' => 'Timestamp',
        ],
        'UpdatedDate' =>
        [
          'shape' => 'Timestamp',
        ],
        'ExpirationDate' =>
        [
          'shape' => 'Timestamp',
        ],
        'Reseller' =>
        [
          'shape' => 'Reseller',
        ],
        'DnsSec' =>
        [
          'shape' => 'DNSSec',
        ],
        'StatusList' =>
        [
          'shape' => 'DomainStatusList',
        ],
      ],
    ],
    'GetOperationDetailRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OperationId',
      ],
      'members' =>
      [
        'OperationId' =>
        [
          'shape' => 'OperationId',
        ],
      ],
    ],
    'GetOperationDetailResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'OperationId' =>
        [
          'shape' => 'OperationId',
        ],
        'Status' =>
        [
          'shape' => 'OperationStatus',
        ],
        'Message' =>
        [
          'shape' => 'ErrorMessage',
        ],
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
        'Type' =>
        [
          'shape' => 'OperationType',
        ],
        'SubmittedDate' =>
        [
          'shape' => 'Timestamp',
        ],
      ],
    ],
    'GlueIp' =>
    [
      'type' => 'string',
      'max' => 45,
    ],
    'GlueIpList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'GlueIp',
      ],
    ],
    'HostName' =>
    [
      'type' => 'string',
      'max' => 255,
      'pattern' => '[a-zA-Z0-9_\\-.]*',
    ],
    'InvalidInput' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'LangCode' =>
    [
      'type' => 'string',
      'max' => 3,
    ],
    'ListDomainsRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'PageMarker',
        ],
        'MaxItems' =>
        [
          'shape' => 'PageMaxItems',
        ],
      ],
    ],
    'ListDomainsResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Domains',
      ],
      'members' =>
      [
        'Domains' =>
        [
          'shape' => 'DomainSummaryList',
        ],
        'NextPageMarker' =>
        [
          'shape' => 'PageMarker',
        ],
      ],
    ],
    'ListOperationsRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'PageMarker',
        ],
        'MaxItems' =>
        [
          'shape' => 'PageMaxItems',
        ],
      ],
    ],
    'ListOperationsResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Operations',
      ],
      'members' =>
      [
        'Operations' =>
        [
          'shape' => 'OperationSummaryList',
        ],
        'NextPageMarker' =>
        [
          'shape' => 'PageMarker',
        ],
      ],
    ],
    'Nameserver' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'HostName',
        ],
        'GlueIps' =>
        [
          'shape' => 'GlueIpList',
        ],
      ],
    ],
    'NameserverList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Nameserver',
      ],
    ],
    'OperationId' =>
    [
      'type' => 'string',
      'max' => 255,
    ],
    'OperationLimitExceeded' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'OperationStatus' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'SUBMITTED',
        1 => 'IN_PROGRESS',
        2 => 'ERROR',
        3 => 'SUCCESSFUL',
        4 => 'FAILED',
      ],
    ],
    'OperationSummary' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OperationId',
        1 => 'Status',
        2 => 'Type',
        3 => 'SubmittedDate',
      ],
      'members' =>
      [
        'OperationId' =>
        [
          'shape' => 'OperationId',
        ],
        'Status' =>
        [
          'shape' => 'OperationStatus',
        ],
        'Type' =>
        [
          'shape' => 'OperationType',
        ],
        'SubmittedDate' =>
        [
          'shape' => 'Timestamp',
        ],
      ],
    ],
    'OperationSummaryList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'OperationSummary',
      ],
    ],
    'OperationType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'REGISTER_DOMAIN',
        1 => 'DELETE_DOMAIN',
        2 => 'TRANSFER_IN_DOMAIN',
        3 => 'UPDATE_DOMAIN_CONTACT',
        4 => 'UPDATE_NAMESERVER',
        5 => 'CHANGE_PRIVACY_PROTECTION',
        6 => 'DOMAIN_LOCK',
      ],
    ],
    'PageMarker' =>
    [
      'type' => 'string',
      'max' => 4096,
    ],
    'PageMaxItems' =>
    [
      'type' => 'integer',
      'max' => 100,
    ],
    'RegisterDomainRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
        1 => 'DurationInYears',
        2 => 'AdminContact',
        3 => 'RegistrantContact',
        4 => 'TechContact',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
        'IdnLangCode' =>
        [
          'shape' => 'LangCode',
        ],
        'DurationInYears' =>
        [
          'shape' => 'DurationInYears',
        ],
        'AutoRenew' =>
        [
          'shape' => 'Boolean',
        ],
        'AdminContact' =>
        [
          'shape' => 'ContactDetail',
        ],
        'RegistrantContact' =>
        [
          'shape' => 'ContactDetail',
        ],
        'TechContact' =>
        [
          'shape' => 'ContactDetail',
        ],
        'PrivacyProtectAdminContact' =>
        [
          'shape' => 'Boolean',
        ],
        'PrivacyProtectRegistrantContact' =>
        [
          'shape' => 'Boolean',
        ],
        'PrivacyProtectTechContact' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'RegisterDomainResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OperationId',
      ],
      'members' =>
      [
        'OperationId' =>
        [
          'shape' => 'OperationId',
        ],
      ],
    ],
    'RegistrarName' =>
    [
      'type' => 'string',
    ],
    'RegistrarUrl' =>
    [
      'type' => 'string',
    ],
    'RegistrarWhoIsServer' =>
    [
      'type' => 'string',
    ],
    'RegistryDomainId' =>
    [
      'type' => 'string',
    ],
    'Reseller' =>
    [
      'type' => 'string',
    ],
    'RetrieveDomainAuthCodeRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
      ],
    ],
    'RetrieveDomainAuthCodeResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'AuthCode',
      ],
      'members' =>
      [
        'AuthCode' =>
        [
          'shape' => 'DomainAuthCode',
        ],
      ],
    ],
    'State' =>
    [
      'type' => 'string',
      'max' => 255,
    ],
    'TLDRulesViolation' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'Timestamp' =>
    [
      'type' => 'timestamp',
    ],
    'TransferDomainRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
        1 => 'DurationInYears',
        2 => 'Nameservers',
        3 => 'AdminContact',
        4 => 'RegistrantContact',
        5 => 'TechContact',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
        'IdnLangCode' =>
        [
          'shape' => 'LangCode',
        ],
        'DurationInYears' =>
        [
          'shape' => 'DurationInYears',
        ],
        'Nameservers' =>
        [
          'shape' => 'NameserverList',
        ],
        'AuthCode' =>
        [
          'shape' => 'DomainAuthCode',
        ],
        'AutoRenew' =>
        [
          'shape' => 'Boolean',
        ],
        'AdminContact' =>
        [
          'shape' => 'ContactDetail',
        ],
        'RegistrantContact' =>
        [
          'shape' => 'ContactDetail',
        ],
        'TechContact' =>
        [
          'shape' => 'ContactDetail',
        ],
        'PrivacyProtectAdminContact' =>
        [
          'shape' => 'Boolean',
        ],
        'PrivacyProtectRegistrantContact' =>
        [
          'shape' => 'Boolean',
        ],
        'PrivacyProtectTechContact' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'TransferDomainResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OperationId',
      ],
      'members' =>
      [
        'OperationId' =>
        [
          'shape' => 'OperationId',
        ],
      ],
    ],
    'UnsupportedTLD' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' =>
      [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'UpdateDomainContactPrivacyRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
        'AdminPrivacy' =>
        [
          'shape' => 'Boolean',
        ],
        'RegistrantPrivacy' =>
        [
          'shape' => 'Boolean',
        ],
        'TechPrivacy' =>
        [
          'shape' => 'Boolean',
        ],
      ],
    ],
    'UpdateDomainContactPrivacyResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OperationId',
      ],
      'members' =>
      [
        'OperationId' =>
        [
          'shape' => 'OperationId',
        ],
      ],
    ],
    'UpdateDomainContactRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
        'AdminContact' =>
        [
          'shape' => 'ContactDetail',
        ],
        'RegistrantContact' =>
        [
          'shape' => 'ContactDetail',
        ],
        'TechContact' =>
        [
          'shape' => 'ContactDetail',
        ],
      ],
    ],
    'UpdateDomainContactResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OperationId',
      ],
      'members' =>
      [
        'OperationId' =>
        [
          'shape' => 'OperationId',
        ],
      ],
    ],
    'UpdateDomainNameserversRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'DomainName',
        1 => 'Nameservers',
      ],
      'members' =>
      [
        'DomainName' =>
        [
          'shape' => 'DomainName',
        ],
        'Nameservers' =>
        [
          'shape' => 'NameserverList',
        ],
      ],
    ],
    'UpdateDomainNameserversResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'OperationId',
      ],
      'members' =>
      [
        'OperationId' =>
        [
          'shape' => 'OperationId',
        ],
      ],
    ],
    'ZipCode' =>
    [
      'type' => 'string',
      'max' => 255,
    ],
  ],
];