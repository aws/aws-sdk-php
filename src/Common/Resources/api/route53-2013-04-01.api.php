<?php
return [
  'metadata' =>
  [
    'apiVersion' => '2013-04-01',
    'endpointPrefix' => 'route53',
    'globalEndpoint' => 'route53.amazonaws.com',
    'serviceAbbreviation' => 'Route 53',
    'serviceFullName' => 'Amazon Route 53',
    'signatureVersion' => 'v3https',
    'protocol' => 'rest-xml',
  ],
  'operations' =>
  [
    'ChangeResourceRecordSets' =>
    [
      'name' => 'ChangeResourceRecordSets',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/2013-04-01/hostedzone/{Id}/rrset/',
      ],
      'input' =>
      [
        'shape' => 'ChangeResourceRecordSetsRequest',
        'xmlOrder' =>
        [
          0 => 'HostedZoneId',
          1 => 'ChangeBatch',
        ],
        'xmlNamespace' =>
        [
          'uri' => 'https://route53.amazonaws.com/doc/2013-04-01/',
        ],
        'locationName' => 'ChangeResourceRecordSetsRequest',
      ],
      'output' =>
      [
        'shape' => 'ChangeResourceRecordSetsResponse',
        'xmlOrder' =>
        [
          0 => 'ChangeInfo',
        ],
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchHostedZone',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'NoSuchHealthCheck',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'InvalidChangeBatch',
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'PriorRequestNotComplete',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ChangeTagsForResource' =>
    [
      'name' => 'ChangeTagsForResource',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/2013-04-01/tags/{ResourceType}/{ResourceId}',
      ],
      'input' =>
      [
        'shape' => 'ChangeTagsForResourceRequest',
        'xmlOrder' =>
        [
          0 => 'ResourceType',
          1 => 'ResourceId',
          2 => 'AddTags',
          3 => 'RemoveTagKeys',
        ],
        'xmlNamespace' =>
        [
          'uri' => 'https://route53.amazonaws.com/doc/2013-04-01/',
        ],
        'locationName' => 'ChangeTagsForResourceRequest',
      ],
      'output' =>
      [
        'shape' => 'ChangeTagsForResourceResponse',
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
          'shape' => 'NoSuchHealthCheck',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'PriorRequestNotComplete',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ThrottlingException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateHealthCheck' =>
    [
      'name' => 'CreateHealthCheck',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/2013-04-01/healthcheck',
        'responseCode' => 201,
      ],
      'input' =>
      [
        'shape' => 'CreateHealthCheckRequest',
        'xmlOrder' =>
        [
          0 => 'CallerReference',
          1 => 'HealthCheckConfig',
        ],
        'xmlNamespace' =>
        [
          'uri' => 'https://route53.amazonaws.com/doc/2013-04-01/',
        ],
        'locationName' => 'CreateHealthCheckRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateHealthCheckResponse',
        'xmlOrder' =>
        [
          0 => 'HealthCheck',
          1 => 'Location',
        ],
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'TooManyHealthChecks',
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'HealthCheckAlreadyExists',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        2 =>
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
    'CreateHostedZone' =>
    [
      'name' => 'CreateHostedZone',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/2013-04-01/hostedzone',
        'responseCode' => 201,
      ],
      'input' =>
      [
        'shape' => 'CreateHostedZoneRequest',
        'xmlOrder' =>
        [
          0 => 'Name',
          1 => 'CallerReference',
          2 => 'HostedZoneConfig',
        ],
        'xmlNamespace' =>
        [
          'uri' => 'https://route53.amazonaws.com/doc/2013-04-01/',
        ],
        'locationName' => 'CreateHostedZoneRequest',
      ],
      'output' =>
      [
        'shape' => 'CreateHostedZoneResponse',
        'xmlOrder' =>
        [
          0 => 'HostedZone',
          1 => 'ChangeInfo',
          2 => 'DelegationSet',
          3 => 'Location',
        ],
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'InvalidDomainName',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'HostedZoneAlreadyExists',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'TooManyHostedZones',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        4 =>
        [
          'shape' => 'DelegationSetNotAvailable',
          'exception' => true,
        ],
      ],
    ],
    'DeleteHealthCheck' =>
    [
      'name' => 'DeleteHealthCheck',
      'http' =>
      [
        'method' => 'DELETE',
        'requestUri' => '/2013-04-01/healthcheck/{HealthCheckId}',
      ],
      'input' =>
      [
        'shape' => 'DeleteHealthCheckRequest',
        'xmlOrder' =>
        [
          0 => 'HealthCheckId',
        ],
      ],
      'output' =>
      [
        'shape' => 'DeleteHealthCheckResponse',
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchHealthCheck',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'HealthCheckInUse',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
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
    'DeleteHostedZone' =>
    [
      'name' => 'DeleteHostedZone',
      'http' =>
      [
        'method' => 'DELETE',
        'requestUri' => '/2013-04-01/hostedzone/{Id}',
      ],
      'input' =>
      [
        'shape' => 'DeleteHostedZoneRequest',
        'xmlOrder' =>
        [
          0 => 'Id',
        ],
      ],
      'output' =>
      [
        'shape' => 'DeleteHostedZoneResponse',
        'xmlOrder' =>
        [
          0 => 'ChangeInfo',
        ],
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchHostedZone',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'HostedZoneNotEmpty',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'PriorRequestNotComplete',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
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
    'GetChange' =>
    [
      'name' => 'GetChange',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/change/{Id}',
      ],
      'input' =>
      [
        'shape' => 'GetChangeRequest',
        'xmlOrder' =>
        [
          0 => 'Id',
        ],
      ],
      'output' =>
      [
        'shape' => 'GetChangeResponse',
        'xmlOrder' =>
        [
          0 => 'ChangeInfo',
        ],
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchChange',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
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
    'GetCheckerIpRanges' =>
    [
      'name' => 'GetCheckerIpRanges',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/checkeripranges',
      ],
      'input' =>
      [
        'shape' => 'GetCheckerIpRangesRequest',
      ],
      'output' =>
      [
        'shape' => 'GetCheckerIpRangesResponse',
      ],
    ],
    'GetGeoLocation' =>
    [
      'name' => 'GetGeoLocation',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/geolocation',
      ],
      'input' =>
      [
        'shape' => 'GetGeoLocationRequest',
        'xmlOrder' =>
        [
          0 => 'ContinentCode',
          1 => 'CountryCode',
          2 => 'SubdivisionCode',
        ],
      ],
      'output' =>
      [
        'shape' => 'GetGeoLocationResponse',
        'xmlOrder' =>
        [
          0 => 'GeoLocationDetails',
        ],
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchGeoLocation',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
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
    'GetHealthCheck' =>
    [
      'name' => 'GetHealthCheck',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/healthcheck/{HealthCheckId}',
      ],
      'input' =>
      [
        'shape' => 'GetHealthCheckRequest',
        'xmlOrder' =>
        [
          0 => 'HealthCheckId',
        ],
      ],
      'output' =>
      [
        'shape' => 'GetHealthCheckResponse',
        'xmlOrder' =>
        [
          0 => 'HealthCheck',
        ],
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchHealthCheck',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'IncompatibleVersion',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetHealthCheckCount' =>
    [
      'name' => 'GetHealthCheckCount',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/healthcheckcount',
      ],
      'input' =>
      [
        'shape' => 'GetHealthCheckCountRequest',
      ],
      'output' =>
      [
        'shape' => 'GetHealthCheckCountResponse',
      ],
    ],
    'GetHostedZone' =>
    [
      'name' => 'GetHostedZone',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/hostedzone/{Id}',
      ],
      'input' =>
      [
        'shape' => 'GetHostedZoneRequest',
        'xmlOrder' =>
        [
          0 => 'Id',
        ],
      ],
      'output' =>
      [
        'shape' => 'GetHostedZoneResponse',
        'xmlOrder' =>
        [
          0 => 'HostedZone',
          1 => 'DelegationSet',
        ],
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchHostedZone',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
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
    'ListGeoLocations' =>
    [
      'name' => 'ListGeoLocations',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/geolocations',
      ],
      'input' =>
      [
        'shape' => 'ListGeoLocationsRequest',
        'xmlOrder' =>
        [
          0 => 'StartContinentCode',
          1 => 'StartCountryCode',
          2 => 'StartSubdivisionCode',
          3 => 'MaxItems',
        ],
      ],
      'output' =>
      [
        'shape' => 'ListGeoLocationsResponse',
        'xmlOrder' =>
        [
          0 => 'GeoLocationDetailsList',
          1 => 'IsTruncated',
          2 => 'NextContinentCode',
          3 => 'NextCountryCode',
          4 => 'NextSubdivisionCode',
          5 => 'MaxItems',
        ],
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
    'ListHealthChecks' =>
    [
      'name' => 'ListHealthChecks',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/healthcheck',
      ],
      'input' =>
      [
        'shape' => 'ListHealthChecksRequest',
        'xmlOrder' =>
        [
          0 => 'Marker',
          1 => 'MaxItems',
        ],
      ],
      'output' =>
      [
        'shape' => 'ListHealthChecksResponse',
        'xmlOrder' =>
        [
          0 => 'HealthChecks',
          1 => 'Marker',
          2 => 'IsTruncated',
          3 => 'NextMarker',
          4 => 'MaxItems',
        ],
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
          'shape' => 'IncompatibleVersion',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListHostedZones' =>
    [
      'name' => 'ListHostedZones',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/hostedzone',
      ],
      'input' =>
      [
        'shape' => 'ListHostedZonesRequest',
        'xmlOrder' =>
        [
          0 => 'Marker',
          1 => 'MaxItems',
        ],
      ],
      'output' =>
      [
        'shape' => 'ListHostedZonesResponse',
        'xmlOrder' =>
        [
          0 => 'HostedZones',
          1 => 'Marker',
          2 => 'IsTruncated',
          3 => 'NextMarker',
          4 => 'MaxItems',
        ],
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
    'ListResourceRecordSets' =>
    [
      'name' => 'ListResourceRecordSets',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/hostedzone/{Id}/rrset',
      ],
      'input' =>
      [
        'shape' => 'ListResourceRecordSetsRequest',
        'xmlOrder' =>
        [
          0 => 'HostedZoneId',
          1 => 'StartRecordName',
          2 => 'StartRecordType',
          3 => 'StartRecordIdentifier',
          4 => 'MaxItems',
        ],
      ],
      'output' =>
      [
        'shape' => 'ListResourceRecordSetsResponse',
        'xmlOrder' =>
        [
          0 => 'ResourceRecordSets',
          1 => 'IsTruncated',
          2 => 'NextRecordName',
          3 => 'NextRecordType',
          4 => 'NextRecordIdentifier',
          5 => 'MaxItems',
        ],
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchHostedZone',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
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
    'ListTagsForResource' =>
    [
      'name' => 'ListTagsForResource',
      'http' =>
      [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/tags/{ResourceType}/{ResourceId}',
      ],
      'input' =>
      [
        'shape' => 'ListTagsForResourceRequest',
        'xmlOrder' =>
        [
          0 => 'ResourceType',
          1 => 'ResourceId',
        ],
      ],
      'output' =>
      [
        'shape' => 'ListTagsForResourceResponse',
        'xmlOrder' =>
        [
          0 => 'ResourceTagSet',
        ],
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
          'shape' => 'NoSuchHealthCheck',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'PriorRequestNotComplete',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ThrottlingException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListTagsForResources' =>
    [
      'name' => 'ListTagsForResources',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/2013-04-01/tags/{ResourceType}',
      ],
      'input' =>
      [
        'shape' => 'ListTagsForResourcesRequest',
        'xmlOrder' =>
        [
          0 => 'ResourceType',
          1 => 'ResourceIds',
        ],
        'xmlNamespace' =>
        [
          'uri' => 'https://route53.amazonaws.com/doc/2013-04-01/',
        ],
        'locationName' => 'ListTagsForResourcesRequest',
      ],
      'output' =>
      [
        'shape' => 'ListTagsForResourcesResponse',
        'xmlOrder' =>
        [
          0 => 'ResourceTagSets',
        ],
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
          'shape' => 'NoSuchHealthCheck',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'PriorRequestNotComplete',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        3 =>
        [
          'shape' => 'ThrottlingException',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateHealthCheck' =>
    [
      'name' => 'UpdateHealthCheck',
      'http' =>
      [
        'method' => 'POST',
        'requestUri' => '/2013-04-01/healthcheck/{HealthCheckId}',
      ],
      'input' =>
      [
        'shape' => 'UpdateHealthCheckRequest',
        'xmlOrder' =>
        [
          0 => 'HealthCheckId',
          1 => 'HealthCheckVersion',
          2 => 'IPAddress',
          3 => 'Port',
          4 => 'ResourcePath',
          5 => 'FullyQualifiedDomainName',
          6 => 'SearchString',
          7 => 'FailureThreshold',
        ],
        'xmlNamespace' =>
        [
          'uri' => 'https://route53.amazonaws.com/doc/2013-04-01/',
        ],
        'locationName' => 'UpdateHealthCheckRequest',
      ],
      'output' =>
      [
        'shape' => 'UpdateHealthCheckResponse',
        'xmlOrder' =>
        [
          0 => 'HealthCheck',
        ],
      ],
      'errors' =>
      [
        0 =>
        [
          'shape' => 'NoSuchHealthCheck',
          'error' =>
          [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        1 =>
        [
          'shape' => 'InvalidInput',
          'error' =>
          [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        2 =>
        [
          'shape' => 'HealthCheckVersionMismatch',
          'error' =>
          [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' =>
  [
    'AliasHealthEnabled' =>
    [
      'type' => 'boolean',
    ],
    'AliasTarget' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HostedZoneId',
        1 => 'DNSName',
        2 => 'EvaluateTargetHealth',
      ],
      'members' =>
      [
        'HostedZoneId' =>
        [
          'shape' => 'ResourceId',
        ],
        'DNSName' =>
        [
          'shape' => 'DNSName',
        ],
        'EvaluateTargetHealth' =>
        [
          'shape' => 'AliasHealthEnabled',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HostedZoneId',
        1 => 'DNSName',
        2 => 'EvaluateTargetHealth',
      ],
    ],
    'Change' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Action',
        1 => 'ResourceRecordSet',
      ],
      'members' =>
      [
        'Action' =>
        [
          'shape' => 'ChangeAction',
        ],
        'ResourceRecordSet' =>
        [
          'shape' => 'ResourceRecordSet',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Action',
        1 => 'ResourceRecordSet',
      ],
    ],
    'ChangeAction' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'CREATE',
        1 => 'DELETE',
        2 => 'UPSERT',
      ],
    ],
    'ChangeBatch' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Changes',
      ],
      'members' =>
      [
        'Comment' =>
        [
          'shape' => 'ResourceDescription',
        ],
        'Changes' =>
        [
          'shape' => 'Changes',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Comment',
        1 => 'Changes',
      ],
    ],
    'ChangeInfo' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
        1 => 'Status',
        2 => 'SubmittedAt',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'ResourceId',
        ],
        'Status' =>
        [
          'shape' => 'ChangeStatus',
        ],
        'SubmittedAt' =>
        [
          'shape' => 'TimeStamp',
        ],
        'Comment' =>
        [
          'shape' => 'ResourceDescription',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Id',
        1 => 'Status',
        2 => 'SubmittedAt',
        3 => 'Comment',
      ],
    ],
    'ChangeResourceRecordSetsRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HostedZoneId',
        1 => 'ChangeBatch',
      ],
      'members' =>
      [
        'HostedZoneId' =>
        [
          'shape' => 'ResourceId',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
        'ChangeBatch' =>
        [
          'shape' => 'ChangeBatch',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HostedZoneId',
        1 => 'ChangeBatch',
      ],
    ],
    'ChangeResourceRecordSetsResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ChangeInfo',
      ],
      'members' =>
      [
        'ChangeInfo' =>
        [
          'shape' => 'ChangeInfo',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'ChangeInfo',
      ],
    ],
    'ChangeStatus' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'PENDING',
        1 => 'INSYNC',
      ],
    ],
    'ChangeTagsForResourceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ResourceType',
        1 => 'ResourceId',
      ],
      'members' =>
      [
        'ResourceType' =>
        [
          'shape' => 'TagResourceType',
          'location' => 'uri',
          'locationName' => 'ResourceType',
        ],
        'ResourceId' =>
        [
          'shape' => 'TagResourceId',
          'location' => 'uri',
          'locationName' => 'ResourceId',
        ],
        'AddTags' =>
        [
          'shape' => 'TagList',
        ],
        'RemoveTagKeys' =>
        [
          'shape' => 'TagKeyList',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'ResourceType',
        1 => 'ResourceId',
        2 => 'AddTags',
        3 => 'RemoveTagKeys',
      ],
    ],
    'ChangeTagsForResourceResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'Changes' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Change',
        'locationName' => 'Change',
      ],
      'min' => 1,
    ],
    'CheckerIpRanges' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'IPAddressCidr',
      ],
    ],
    'CreateHealthCheckRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'CallerReference',
        1 => 'HealthCheckConfig',
      ],
      'members' =>
      [
        'CallerReference' =>
        [
          'shape' => 'HealthCheckNonce',
        ],
        'HealthCheckConfig' =>
        [
          'shape' => 'HealthCheckConfig',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'CallerReference',
        1 => 'HealthCheckConfig',
      ],
    ],
    'CreateHealthCheckResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HealthCheck',
        1 => 'Location',
      ],
      'members' =>
      [
        'HealthCheck' =>
        [
          'shape' => 'HealthCheck',
        ],
        'Location' =>
        [
          'shape' => 'ResourceURI',
          'location' => 'header',
          'locationName' => 'Location',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HealthCheck',
        1 => 'Location',
      ],
    ],
    'CreateHostedZoneRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
        1 => 'CallerReference',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'DNSName',
        ],
        'CallerReference' =>
        [
          'shape' => 'Nonce',
        ],
        'HostedZoneConfig' =>
        [
          'shape' => 'HostedZoneConfig',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Name',
        1 => 'CallerReference',
        2 => 'HostedZoneConfig',
      ],
    ],
    'CreateHostedZoneResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HostedZone',
        1 => 'ChangeInfo',
        2 => 'DelegationSet',
        3 => 'Location',
      ],
      'members' =>
      [
        'HostedZone' =>
        [
          'shape' => 'HostedZone',
        ],
        'ChangeInfo' =>
        [
          'shape' => 'ChangeInfo',
        ],
        'DelegationSet' =>
        [
          'shape' => 'DelegationSet',
        ],
        'Location' =>
        [
          'shape' => 'ResourceURI',
          'location' => 'header',
          'locationName' => 'Location',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HostedZone',
        1 => 'ChangeInfo',
        2 => 'DelegationSet',
        3 => 'Location',
      ],
    ],
    'DNSName' =>
    [
      'type' => 'string',
      'max' => 1024,
    ],
    'DelegationSet' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'NameServers',
      ],
      'members' =>
      [
        'NameServers' =>
        [
          'shape' => 'DelegationSetNameServers',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'NameServers',
      ],
    ],
    'DelegationSetNameServers' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'DNSName',
        'locationName' => 'NameServer',
      ],
      'min' => 1,
    ],
    'DelegationSetNotAvailable' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'DeleteHealthCheckRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HealthCheckId',
      ],
      'members' =>
      [
        'HealthCheckId' =>
        [
          'shape' => 'HealthCheckId',
          'location' => 'uri',
          'locationName' => 'HealthCheckId',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HealthCheckId',
      ],
    ],
    'DeleteHealthCheckResponse' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'DeleteHostedZoneRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'ResourceId',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Id',
      ],
    ],
    'DeleteHostedZoneResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ChangeInfo',
      ],
      'members' =>
      [
        'ChangeInfo' =>
        [
          'shape' => 'ChangeInfo',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'ChangeInfo',
      ],
    ],
    'ErrorMessage' =>
    [
      'type' => 'string',
    ],
    'ErrorMessages' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ErrorMessage',
        'locationName' => 'Message',
      ],
    ],
    'FailureThreshold' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 10,
    ],
    'FullyQualifiedDomainName' =>
    [
      'type' => 'string',
      'max' => 255,
    ],
    'GeoLocation' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ContinentCode' =>
        [
          'shape' => 'GeoLocationContinentCode',
        ],
        'CountryCode' =>
        [
          'shape' => 'GeoLocationCountryCode',
        ],
        'SubdivisionCode' =>
        [
          'shape' => 'GeoLocationSubdivisionCode',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'ContinentCode',
        1 => 'CountryCode',
        2 => 'SubdivisionCode',
      ],
    ],
    'GeoLocationContinentCode' =>
    [
      'type' => 'string',
      'min' => 2,
      'max' => 2,
    ],
    'GeoLocationContinentName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 32,
    ],
    'GeoLocationCountryCode' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 2,
    ],
    'GeoLocationCountryName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 64,
    ],
    'GeoLocationDetails' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ContinentCode' =>
        [
          'shape' => 'GeoLocationContinentCode',
        ],
        'ContinentName' =>
        [
          'shape' => 'GeoLocationContinentName',
        ],
        'CountryCode' =>
        [
          'shape' => 'GeoLocationCountryCode',
        ],
        'CountryName' =>
        [
          'shape' => 'GeoLocationCountryName',
        ],
        'SubdivisionCode' =>
        [
          'shape' => 'GeoLocationSubdivisionCode',
        ],
        'SubdivisionName' =>
        [
          'shape' => 'GeoLocationSubdivisionName',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'ContinentCode',
        1 => 'ContinentName',
        2 => 'CountryCode',
        3 => 'CountryName',
        4 => 'SubdivisionCode',
        5 => 'SubdivisionName',
      ],
    ],
    'GeoLocationDetailsList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'GeoLocationDetails',
        'locationName' => 'GeoLocationDetails',
      ],
    ],
    'GeoLocationSubdivisionCode' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 3,
    ],
    'GeoLocationSubdivisionName' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 64,
    ],
    'GetChangeRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'ResourceId',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Id',
      ],
    ],
    'GetChangeResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ChangeInfo',
      ],
      'members' =>
      [
        'ChangeInfo' =>
        [
          'shape' => 'ChangeInfo',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'ChangeInfo',
      ],
    ],
    'GetCheckerIpRangesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'GetCheckerIpRangesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'CheckerIpRanges',
      ],
      'members' =>
      [
        'CheckerIpRanges' =>
        [
          'shape' => 'CheckerIpRanges',
        ],
      ],
    ],
    'GetGeoLocationRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ContinentCode' =>
        [
          'shape' => 'GeoLocationContinentCode',
          'location' => 'querystring',
          'locationName' => 'continentcode',
        ],
        'CountryCode' =>
        [
          'shape' => 'GeoLocationCountryCode',
          'location' => 'querystring',
          'locationName' => 'countrycode',
        ],
        'SubdivisionCode' =>
        [
          'shape' => 'GeoLocationSubdivisionCode',
          'location' => 'querystring',
          'locationName' => 'subdivisioncode',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'ContinentCode',
        1 => 'CountryCode',
        2 => 'SubdivisionCode',
      ],
    ],
    'GetGeoLocationResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GeoLocationDetails',
      ],
      'members' =>
      [
        'GeoLocationDetails' =>
        [
          'shape' => 'GeoLocationDetails',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'GeoLocationDetails',
      ],
    ],
    'GetHealthCheckCountRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
      ],
    ],
    'GetHealthCheckCountResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HealthCheckCount',
      ],
      'members' =>
      [
        'HealthCheckCount' =>
        [
          'shape' => 'HealthCheckCount',
        ],
      ],
    ],
    'GetHealthCheckRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HealthCheckId',
      ],
      'members' =>
      [
        'HealthCheckId' =>
        [
          'shape' => 'HealthCheckId',
          'location' => 'uri',
          'locationName' => 'HealthCheckId',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HealthCheckId',
      ],
    ],
    'GetHealthCheckResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HealthCheck',
      ],
      'members' =>
      [
        'HealthCheck' =>
        [
          'shape' => 'HealthCheck',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HealthCheck',
      ],
    ],
    'GetHostedZoneRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'ResourceId',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Id',
      ],
    ],
    'GetHostedZoneResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HostedZone',
        1 => 'DelegationSet',
      ],
      'members' =>
      [
        'HostedZone' =>
        [
          'shape' => 'HostedZone',
        ],
        'DelegationSet' =>
        [
          'shape' => 'DelegationSet',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HostedZone',
        1 => 'DelegationSet',
      ],
    ],
    'HealthCheck' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
        1 => 'CallerReference',
        2 => 'HealthCheckConfig',
        3 => 'HealthCheckVersion',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'HealthCheckId',
        ],
        'CallerReference' =>
        [
          'shape' => 'HealthCheckNonce',
        ],
        'HealthCheckConfig' =>
        [
          'shape' => 'HealthCheckConfig',
        ],
        'HealthCheckVersion' =>
        [
          'shape' => 'HealthCheckVersion',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Id',
        1 => 'CallerReference',
        2 => 'HealthCheckConfig',
        3 => 'HealthCheckVersion',
      ],
    ],
    'HealthCheckAlreadyExists' =>
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
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'HealthCheckConfig' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Type',
      ],
      'members' =>
      [
        'IPAddress' =>
        [
          'shape' => 'IPAddress',
        ],
        'Port' =>
        [
          'shape' => 'Port',
        ],
        'Type' =>
        [
          'shape' => 'HealthCheckType',
        ],
        'ResourcePath' =>
        [
          'shape' => 'ResourcePath',
        ],
        'FullyQualifiedDomainName' =>
        [
          'shape' => 'FullyQualifiedDomainName',
        ],
        'SearchString' =>
        [
          'shape' => 'SearchString',
        ],
        'RequestInterval' =>
        [
          'shape' => 'RequestInterval',
        ],
        'FailureThreshold' =>
        [
          'shape' => 'FailureThreshold',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'IPAddress',
        1 => 'Port',
        2 => 'Type',
        3 => 'ResourcePath',
        4 => 'FullyQualifiedDomainName',
        5 => 'SearchString',
        6 => 'RequestInterval',
        7 => 'FailureThreshold',
      ],
    ],
    'HealthCheckCount' =>
    [
      'type' => 'long',
    ],
    'HealthCheckId' =>
    [
      'type' => 'string',
      'max' => 64,
    ],
    'HealthCheckInUse' =>
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
    'HealthCheckNonce' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 64,
    ],
    'HealthCheckType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'HTTP',
        1 => 'HTTPS',
        2 => 'HTTP_STR_MATCH',
        3 => 'HTTPS_STR_MATCH',
        4 => 'TCP',
      ],
    ],
    'HealthCheckVersion' =>
    [
      'type' => 'long',
      'min' => 1,
    ],
    'HealthCheckVersionMismatch' =>
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
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'HealthChecks' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'HealthCheck',
        'locationName' => 'HealthCheck',
      ],
    ],
    'HostedZone' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Id',
        1 => 'Name',
        2 => 'CallerReference',
      ],
      'members' =>
      [
        'Id' =>
        [
          'shape' => 'ResourceId',
        ],
        'Name' =>
        [
          'shape' => 'DNSName',
        ],
        'CallerReference' =>
        [
          'shape' => 'Nonce',
        ],
        'Config' =>
        [
          'shape' => 'HostedZoneConfig',
        ],
        'ResourceRecordSetCount' =>
        [
          'shape' => 'HostedZoneRRSetCount',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Id',
        1 => 'Name',
        2 => 'CallerReference',
        3 => 'Config',
        4 => 'ResourceRecordSetCount',
      ],
    ],
    'HostedZoneAlreadyExists' =>
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
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'HostedZoneConfig' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Comment' =>
        [
          'shape' => 'ResourceDescription',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Comment',
      ],
    ],
    'HostedZoneNotEmpty' =>
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
    'HostedZoneRRSetCount' =>
    [
      'type' => 'long',
    ],
    'HostedZones' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'HostedZone',
        'locationName' => 'HostedZone',
      ],
    ],
    'IPAddress' =>
    [
      'type' => 'string',
      'max' => 15,
      'pattern' => '^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]]\\.]{3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]]$',
    ],
    'IPAddressCidr' =>
    [
      'type' => 'string',
    ],
    'IncompatibleVersion' =>
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
    'InvalidChangeBatch' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'messages' =>
        [
          'shape' => 'ErrorMessages',
        ],
      ],
      'exception' => true,
    ],
    'InvalidDomainName' =>
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
    'ListGeoLocationsRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'StartContinentCode' =>
        [
          'shape' => 'GeoLocationContinentCode',
          'location' => 'querystring',
          'locationName' => 'startcontinentcode',
        ],
        'StartCountryCode' =>
        [
          'shape' => 'GeoLocationCountryCode',
          'location' => 'querystring',
          'locationName' => 'startcountrycode',
        ],
        'StartSubdivisionCode' =>
        [
          'shape' => 'GeoLocationSubdivisionCode',
          'location' => 'querystring',
          'locationName' => 'startsubdivisioncode',
        ],
        'MaxItems' =>
        [
          'shape' => 'PageMaxItems',
          'location' => 'querystring',
          'locationName' => 'maxitems',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'StartContinentCode',
        1 => 'StartCountryCode',
        2 => 'StartSubdivisionCode',
        3 => 'MaxItems',
      ],
    ],
    'ListGeoLocationsResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'GeoLocationDetailsList',
        1 => 'IsTruncated',
        2 => 'MaxItems',
      ],
      'members' =>
      [
        'GeoLocationDetailsList' =>
        [
          'shape' => 'GeoLocationDetailsList',
        ],
        'IsTruncated' =>
        [
          'shape' => 'PageTruncated',
        ],
        'NextContinentCode' =>
        [
          'shape' => 'GeoLocationContinentCode',
        ],
        'NextCountryCode' =>
        [
          'shape' => 'GeoLocationCountryCode',
        ],
        'NextSubdivisionCode' =>
        [
          'shape' => 'GeoLocationSubdivisionCode',
        ],
        'MaxItems' =>
        [
          'shape' => 'PageMaxItems',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'GeoLocationDetailsList',
        1 => 'IsTruncated',
        2 => 'NextContinentCode',
        3 => 'NextCountryCode',
        4 => 'NextSubdivisionCode',
        5 => 'MaxItems',
      ],
    ],
    'ListHealthChecksRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'PageMarker',
          'location' => 'querystring',
          'locationName' => 'marker',
        ],
        'MaxItems' =>
        [
          'shape' => 'PageMaxItems',
          'location' => 'querystring',
          'locationName' => 'maxitems',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Marker',
        1 => 'MaxItems',
      ],
    ],
    'ListHealthChecksResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HealthChecks',
        1 => 'Marker',
        2 => 'IsTruncated',
        3 => 'MaxItems',
      ],
      'members' =>
      [
        'HealthChecks' =>
        [
          'shape' => 'HealthChecks',
        ],
        'Marker' =>
        [
          'shape' => 'PageMarker',
        ],
        'IsTruncated' =>
        [
          'shape' => 'PageTruncated',
        ],
        'NextMarker' =>
        [
          'shape' => 'PageMarker',
        ],
        'MaxItems' =>
        [
          'shape' => 'PageMaxItems',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HealthChecks',
        1 => 'Marker',
        2 => 'IsTruncated',
        3 => 'NextMarker',
        4 => 'MaxItems',
      ],
    ],
    'ListHostedZonesRequest' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Marker' =>
        [
          'shape' => 'PageMarker',
          'location' => 'querystring',
          'locationName' => 'marker',
        ],
        'MaxItems' =>
        [
          'shape' => 'PageMaxItems',
          'location' => 'querystring',
          'locationName' => 'maxitems',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Marker',
        1 => 'MaxItems',
      ],
    ],
    'ListHostedZonesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HostedZones',
        1 => 'Marker',
        2 => 'IsTruncated',
        3 => 'MaxItems',
      ],
      'members' =>
      [
        'HostedZones' =>
        [
          'shape' => 'HostedZones',
        ],
        'Marker' =>
        [
          'shape' => 'PageMarker',
        ],
        'IsTruncated' =>
        [
          'shape' => 'PageTruncated',
        ],
        'NextMarker' =>
        [
          'shape' => 'PageMarker',
        ],
        'MaxItems' =>
        [
          'shape' => 'PageMaxItems',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HostedZones',
        1 => 'Marker',
        2 => 'IsTruncated',
        3 => 'NextMarker',
        4 => 'MaxItems',
      ],
    ],
    'ListResourceRecordSetsRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HostedZoneId',
      ],
      'members' =>
      [
        'HostedZoneId' =>
        [
          'shape' => 'ResourceId',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
        'StartRecordName' =>
        [
          'shape' => 'DNSName',
          'location' => 'querystring',
          'locationName' => 'name',
        ],
        'StartRecordType' =>
        [
          'shape' => 'RRType',
          'location' => 'querystring',
          'locationName' => 'type',
        ],
        'StartRecordIdentifier' =>
        [
          'shape' => 'ResourceRecordSetIdentifier',
          'location' => 'querystring',
          'locationName' => 'identifier',
        ],
        'MaxItems' =>
        [
          'shape' => 'PageMaxItems',
          'location' => 'querystring',
          'locationName' => 'maxitems',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HostedZoneId',
        1 => 'StartRecordName',
        2 => 'StartRecordType',
        3 => 'StartRecordIdentifier',
        4 => 'MaxItems',
      ],
    ],
    'ListResourceRecordSetsResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ResourceRecordSets',
        1 => 'IsTruncated',
        2 => 'MaxItems',
      ],
      'members' =>
      [
        'ResourceRecordSets' =>
        [
          'shape' => 'ResourceRecordSets',
        ],
        'IsTruncated' =>
        [
          'shape' => 'PageTruncated',
        ],
        'NextRecordName' =>
        [
          'shape' => 'DNSName',
        ],
        'NextRecordType' =>
        [
          'shape' => 'RRType',
        ],
        'NextRecordIdentifier' =>
        [
          'shape' => 'ResourceRecordSetIdentifier',
        ],
        'MaxItems' =>
        [
          'shape' => 'PageMaxItems',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'ResourceRecordSets',
        1 => 'IsTruncated',
        2 => 'NextRecordName',
        3 => 'NextRecordType',
        4 => 'NextRecordIdentifier',
        5 => 'MaxItems',
      ],
    ],
    'ListTagsForResourceRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ResourceType',
        1 => 'ResourceId',
      ],
      'members' =>
      [
        'ResourceType' =>
        [
          'shape' => 'TagResourceType',
          'location' => 'uri',
          'locationName' => 'ResourceType',
        ],
        'ResourceId' =>
        [
          'shape' => 'TagResourceId',
          'location' => 'uri',
          'locationName' => 'ResourceId',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'ResourceType',
        1 => 'ResourceId',
      ],
    ],
    'ListTagsForResourceResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ResourceTagSet',
      ],
      'members' =>
      [
        'ResourceTagSet' =>
        [
          'shape' => 'ResourceTagSet',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'ResourceTagSet',
      ],
    ],
    'ListTagsForResourcesRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ResourceType',
        1 => 'ResourceIds',
      ],
      'members' =>
      [
        'ResourceType' =>
        [
          'shape' => 'TagResourceType',
          'location' => 'uri',
          'locationName' => 'ResourceType',
        ],
        'ResourceIds' =>
        [
          'shape' => 'TagResourceIdList',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'ResourceType',
        1 => 'ResourceIds',
      ],
    ],
    'ListTagsForResourcesResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'ResourceTagSets',
      ],
      'members' =>
      [
        'ResourceTagSets' =>
        [
          'shape' => 'ResourceTagSetList',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'ResourceTagSets',
      ],
    ],
    'NoSuchChange' =>
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
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'NoSuchGeoLocation' =>
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
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'NoSuchHealthCheck' =>
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
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'NoSuchHostedZone' =>
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
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'Nonce' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
    ],
    'PageMarker' =>
    [
      'type' => 'string',
      'max' => 64,
    ],
    'PageMaxItems' =>
    [
      'type' => 'string',
    ],
    'PageTruncated' =>
    [
      'type' => 'boolean',
    ],
    'Port' =>
    [
      'type' => 'integer',
      'min' => 1,
      'max' => 65535,
    ],
    'PriorRequestNotComplete' =>
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
    'RData' =>
    [
      'type' => 'string',
      'max' => 4000,
    ],
    'RRType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'SOA',
        1 => 'A',
        2 => 'TXT',
        3 => 'NS',
        4 => 'CNAME',
        5 => 'MX',
        6 => 'PTR',
        7 => 'SRV',
        8 => 'SPF',
        9 => 'AAAA',
      ],
    ],
    'RequestInterval' =>
    [
      'type' => 'integer',
      'min' => 10,
      'max' => 30,
    ],
    'ResourceDescription' =>
    [
      'type' => 'string',
      'max' => 256,
    ],
    'ResourceId' =>
    [
      'type' => 'string',
      'max' => 32,
    ],
    'ResourcePath' =>
    [
      'type' => 'string',
      'max' => 255,
    ],
    'ResourceRecord' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Value',
      ],
      'members' =>
      [
        'Value' =>
        [
          'shape' => 'RData',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Value',
      ],
    ],
    'ResourceRecordSet' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'Name',
        1 => 'Type',
      ],
      'members' =>
      [
        'Name' =>
        [
          'shape' => 'DNSName',
        ],
        'Type' =>
        [
          'shape' => 'RRType',
        ],
        'SetIdentifier' =>
        [
          'shape' => 'ResourceRecordSetIdentifier',
        ],
        'Weight' =>
        [
          'shape' => 'ResourceRecordSetWeight',
        ],
        'Region' =>
        [
          'shape' => 'ResourceRecordSetRegion',
        ],
        'GeoLocation' =>
        [
          'shape' => 'GeoLocation',
        ],
        'Failover' =>
        [
          'shape' => 'ResourceRecordSetFailover',
        ],
        'TTL' =>
        [
          'shape' => 'TTL',
        ],
        'ResourceRecords' =>
        [
          'shape' => 'ResourceRecords',
        ],
        'AliasTarget' =>
        [
          'shape' => 'AliasTarget',
        ],
        'HealthCheckId' =>
        [
          'shape' => 'HealthCheckId',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'Name',
        1 => 'Type',
        2 => 'SetIdentifier',
        3 => 'Weight',
        4 => 'Region',
        5 => 'GeoLocation',
        6 => 'Failover',
        7 => 'TTL',
        8 => 'ResourceRecords',
        9 => 'AliasTarget',
        10 => 'HealthCheckId',
      ],
    ],
    'ResourceRecordSetFailover' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'PRIMARY',
        1 => 'SECONDARY',
      ],
    ],
    'ResourceRecordSetIdentifier' =>
    [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
    ],
    'ResourceRecordSetRegion' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'us-east-1',
        1 => 'us-west-1',
        2 => 'us-west-2',
        3 => 'eu-west-1',
        4 => 'ap-southeast-1',
        5 => 'ap-southeast-2',
        6 => 'ap-northeast-1',
        7 => 'sa-east-1',
        8 => 'cn-north-1',
      ],
      'min' => 1,
      'max' => 64,
    ],
    'ResourceRecordSetWeight' =>
    [
      'type' => 'long',
      'min' => 0,
      'max' => 255,
    ],
    'ResourceRecordSets' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ResourceRecordSet',
        'locationName' => 'ResourceRecordSet',
      ],
    ],
    'ResourceRecords' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ResourceRecord',
        'locationName' => 'ResourceRecord',
      ],
      'min' => 1,
    ],
    'ResourceTagSet' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'ResourceType' =>
        [
          'shape' => 'TagResourceType',
        ],
        'ResourceId' =>
        [
          'shape' => 'TagResourceId',
        ],
        'Tags' =>
        [
          'shape' => 'TagList',
        ],
      ],
    ],
    'ResourceTagSetList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'ResourceTagSet',
        'locationName' => 'ResourceTagSet',
      ],
    ],
    'ResourceURI' =>
    [
      'type' => 'string',
      'max' => 1024,
    ],
    'SearchString' =>
    [
      'type' => 'string',
      'max' => 255,
    ],
    'TTL' =>
    [
      'type' => 'long',
      'min' => 0,
      'max' => 2147483647,
    ],
    'Tag' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'Key' =>
        [
          'shape' => 'TagKey',
        ],
        'Value' =>
        [
          'shape' => 'TagValue',
        ],
      ],
    ],
    'TagKey' =>
    [
      'type' => 'string',
      'max' => 128,
    ],
    'TagKeyList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'TagKey',
        'locationName' => 'Key',
      ],
      'min' => 1,
      'max' => 10,
    ],
    'TagList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'Tag',
        'locationName' => 'Tag',
      ],
      'min' => 1,
      'max' => 10,
    ],
    'TagResourceId' =>
    [
      'type' => 'string',
      'max' => 64,
    ],
    'TagResourceIdList' =>
    [
      'type' => 'list',
      'member' =>
      [
        'shape' => 'TagResourceId',
        'locationName' => 'ResourceId',
      ],
      'min' => 1,
      'max' => 10,
    ],
    'TagResourceType' =>
    [
      'type' => 'string',
      'enum' =>
      [
        0 => 'healthcheck',
      ],
    ],
    'TagValue' =>
    [
      'type' => 'string',
      'max' => 256,
    ],
    'ThrottlingException' =>
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
    'TimeStamp' =>
    [
      'type' => 'timestamp',
    ],
    'TooManyHealthChecks' =>
    [
      'type' => 'structure',
      'members' =>
      [
        'message' =>
        [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'TooManyHostedZones' =>
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
    'UpdateHealthCheckRequest' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HealthCheckId',
      ],
      'members' =>
      [
        'HealthCheckId' =>
        [
          'shape' => 'HealthCheckId',
          'location' => 'uri',
          'locationName' => 'HealthCheckId',
        ],
        'HealthCheckVersion' =>
        [
          'shape' => 'HealthCheckVersion',
        ],
        'IPAddress' =>
        [
          'shape' => 'IPAddress',
        ],
        'Port' =>
        [
          'shape' => 'Port',
        ],
        'ResourcePath' =>
        [
          'shape' => 'ResourcePath',
        ],
        'FullyQualifiedDomainName' =>
        [
          'shape' => 'FullyQualifiedDomainName',
        ],
        'SearchString' =>
        [
          'shape' => 'SearchString',
        ],
        'FailureThreshold' =>
        [
          'shape' => 'FailureThreshold',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HealthCheckId',
        1 => 'HealthCheckVersion',
        2 => 'IPAddress',
        3 => 'Port',
        4 => 'ResourcePath',
        5 => 'FullyQualifiedDomainName',
        6 => 'SearchString',
        7 => 'FailureThreshold',
      ],
    ],
    'UpdateHealthCheckResponse' =>
    [
      'type' => 'structure',
      'required' =>
      [
        0 => 'HealthCheck',
      ],
      'members' =>
      [
        'HealthCheck' =>
        [
          'shape' => 'HealthCheck',
        ],
      ],
      'xmlOrder' =>
      [
        0 => 'HealthCheck',
      ],
    ],
  ],
];