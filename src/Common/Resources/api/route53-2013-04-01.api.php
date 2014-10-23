<?php return [
  'metadata' => [
    'apiVersion' => '2013-04-01',
    'endpointPrefix' => 'route53',
    'globalEndpoint' => 'route53.amazonaws.com',
    'serviceAbbreviation' => 'Route 53',
    'serviceFullName' => 'Amazon Route 53',
    'signatureVersion' => 'v3https',
    'protocol' => 'rest-xml',
  ],
  'operations' => [
    'ChangeResourceRecordSets' => [
      'name' => 'ChangeResourceRecordSets',
      'http' => [
        'method' => 'POST',
        'requestUri' => '/2013-04-01/hostedzone/{Id}/rrset/',
      ],
      'input' => [
        'shape' => 'ChangeResourceRecordSetsRequest',
        'xmlOrder' => [
          'HostedZoneId',
          'ChangeBatch',
        ],
        'xmlNamespace' => [
          'uri' => 'https://route53.amazonaws.com/doc/2013-04-01/',
        ],
        'locationName' => 'ChangeResourceRecordSetsRequest',
      ],
      'output' => [
        'shape' => 'ChangeResourceRecordSetsResponse',
        'xmlOrder' => [
          'ChangeInfo',
        ],
      ],
      'errors' => [
        [
          'shape' => 'NoSuchHostedZone',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'NoSuchHealthCheck',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'InvalidChangeBatch',
          'exception' => true,
        ],
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'PriorRequestNotComplete',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ChangeTagsForResource' => [
      'name' => 'ChangeTagsForResource',
      'http' => [
        'method' => 'POST',
        'requestUri' => '/2013-04-01/tags/{ResourceType}/{ResourceId}',
      ],
      'input' => [
        'shape' => 'ChangeTagsForResourceRequest',
        'xmlOrder' => [
          'ResourceType',
          'ResourceId',
          'AddTags',
          'RemoveTagKeys',
        ],
        'xmlNamespace' => [
          'uri' => 'https://route53.amazonaws.com/doc/2013-04-01/',
        ],
        'locationName' => 'ChangeTagsForResourceRequest',
      ],
      'output' => [
        'shape' => 'ChangeTagsForResourceResponse',
      ],
      'errors' => [
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'NoSuchHealthCheck',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'PriorRequestNotComplete',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'ThrottlingException',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateHealthCheck' => [
      'name' => 'CreateHealthCheck',
      'http' => [
        'method' => 'POST',
        'requestUri' => '/2013-04-01/healthcheck',
        'responseCode' => 201,
      ],
      'input' => [
        'shape' => 'CreateHealthCheckRequest',
        'xmlOrder' => [
          'CallerReference',
          'HealthCheckConfig',
        ],
        'xmlNamespace' => [
          'uri' => 'https://route53.amazonaws.com/doc/2013-04-01/',
        ],
        'locationName' => 'CreateHealthCheckRequest',
      ],
      'output' => [
        'shape' => 'CreateHealthCheckResponse',
        'xmlOrder' => [
          'HealthCheck',
          'Location',
        ],
      ],
      'errors' => [
        [
          'shape' => 'TooManyHealthChecks',
          'exception' => true,
        ],
        [
          'shape' => 'HealthCheckAlreadyExists',
          'error' => [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'CreateHostedZone' => [
      'name' => 'CreateHostedZone',
      'http' => [
        'method' => 'POST',
        'requestUri' => '/2013-04-01/hostedzone',
        'responseCode' => 201,
      ],
      'input' => [
        'shape' => 'CreateHostedZoneRequest',
        'xmlOrder' => [
          'Name',
          'CallerReference',
          'HostedZoneConfig',
        ],
        'xmlNamespace' => [
          'uri' => 'https://route53.amazonaws.com/doc/2013-04-01/',
        ],
        'locationName' => 'CreateHostedZoneRequest',
      ],
      'output' => [
        'shape' => 'CreateHostedZoneResponse',
        'xmlOrder' => [
          'HostedZone',
          'ChangeInfo',
          'DelegationSet',
          'Location',
        ],
      ],
      'errors' => [
        [
          'shape' => 'InvalidDomainName',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'HostedZoneAlreadyExists',
          'error' => [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'TooManyHostedZones',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'DelegationSetNotAvailable',
          'exception' => true,
        ],
      ],
    ],
    'DeleteHealthCheck' => [
      'name' => 'DeleteHealthCheck',
      'http' => [
        'method' => 'DELETE',
        'requestUri' => '/2013-04-01/healthcheck/{HealthCheckId}',
      ],
      'input' => [
        'shape' => 'DeleteHealthCheckRequest',
        'xmlOrder' => [
          'HealthCheckId',
        ],
      ],
      'output' => [
        'shape' => 'DeleteHealthCheckResponse',
      ],
      'errors' => [
        [
          'shape' => 'NoSuchHealthCheck',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'HealthCheckInUse',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'DeleteHostedZone' => [
      'name' => 'DeleteHostedZone',
      'http' => [
        'method' => 'DELETE',
        'requestUri' => '/2013-04-01/hostedzone/{Id}',
      ],
      'input' => [
        'shape' => 'DeleteHostedZoneRequest',
        'xmlOrder' => [
          'Id',
        ],
      ],
      'output' => [
        'shape' => 'DeleteHostedZoneResponse',
        'xmlOrder' => [
          'ChangeInfo',
        ],
      ],
      'errors' => [
        [
          'shape' => 'NoSuchHostedZone',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'HostedZoneNotEmpty',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'PriorRequestNotComplete',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetChange' => [
      'name' => 'GetChange',
      'http' => [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/change/{Id}',
      ],
      'input' => [
        'shape' => 'GetChangeRequest',
        'xmlOrder' => [
          'Id',
        ],
      ],
      'output' => [
        'shape' => 'GetChangeResponse',
        'xmlOrder' => [
          'ChangeInfo',
        ],
      ],
      'errors' => [
        [
          'shape' => 'NoSuchChange',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetCheckerIpRanges' => [
      'name' => 'GetCheckerIpRanges',
      'http' => [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/checkeripranges',
      ],
      'input' => [
        'shape' => 'GetCheckerIpRangesRequest',
      ],
      'output' => [
        'shape' => 'GetCheckerIpRangesResponse',
      ],
    ],
    'GetGeoLocation' => [
      'name' => 'GetGeoLocation',
      'http' => [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/geolocation',
      ],
      'input' => [
        'shape' => 'GetGeoLocationRequest',
        'xmlOrder' => [
          'ContinentCode',
          'CountryCode',
          'SubdivisionCode',
        ],
      ],
      'output' => [
        'shape' => 'GetGeoLocationResponse',
        'xmlOrder' => [
          'GeoLocationDetails',
        ],
      ],
      'errors' => [
        [
          'shape' => 'NoSuchGeoLocation',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetHealthCheck' => [
      'name' => 'GetHealthCheck',
      'http' => [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/healthcheck/{HealthCheckId}',
      ],
      'input' => [
        'shape' => 'GetHealthCheckRequest',
        'xmlOrder' => [
          'HealthCheckId',
        ],
      ],
      'output' => [
        'shape' => 'GetHealthCheckResponse',
        'xmlOrder' => [
          'HealthCheck',
        ],
      ],
      'errors' => [
        [
          'shape' => 'NoSuchHealthCheck',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'IncompatibleVersion',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'GetHealthCheckCount' => [
      'name' => 'GetHealthCheckCount',
      'http' => [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/healthcheckcount',
      ],
      'input' => [
        'shape' => 'GetHealthCheckCountRequest',
      ],
      'output' => [
        'shape' => 'GetHealthCheckCountResponse',
      ],
    ],
    'GetHostedZone' => [
      'name' => 'GetHostedZone',
      'http' => [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/hostedzone/{Id}',
      ],
      'input' => [
        'shape' => 'GetHostedZoneRequest',
        'xmlOrder' => [
          'Id',
        ],
      ],
      'output' => [
        'shape' => 'GetHostedZoneResponse',
        'xmlOrder' => [
          'HostedZone',
          'DelegationSet',
        ],
      ],
      'errors' => [
        [
          'shape' => 'NoSuchHostedZone',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListGeoLocations' => [
      'name' => 'ListGeoLocations',
      'http' => [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/geolocations',
      ],
      'input' => [
        'shape' => 'ListGeoLocationsRequest',
        'xmlOrder' => [
          'StartContinentCode',
          'StartCountryCode',
          'StartSubdivisionCode',
          'MaxItems',
        ],
      ],
      'output' => [
        'shape' => 'ListGeoLocationsResponse',
        'xmlOrder' => [
          'GeoLocationDetailsList',
          'IsTruncated',
          'NextContinentCode',
          'NextCountryCode',
          'NextSubdivisionCode',
          'MaxItems',
        ],
      ],
      'errors' => [
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListHealthChecks' => [
      'name' => 'ListHealthChecks',
      'http' => [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/healthcheck',
      ],
      'input' => [
        'shape' => 'ListHealthChecksRequest',
        'xmlOrder' => [
          'Marker',
          'MaxItems',
        ],
      ],
      'output' => [
        'shape' => 'ListHealthChecksResponse',
        'xmlOrder' => [
          'HealthChecks',
          'Marker',
          'IsTruncated',
          'NextMarker',
          'MaxItems',
        ],
      ],
      'errors' => [
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'IncompatibleVersion',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListHostedZones' => [
      'name' => 'ListHostedZones',
      'http' => [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/hostedzone',
      ],
      'input' => [
        'shape' => 'ListHostedZonesRequest',
        'xmlOrder' => [
          'Marker',
          'MaxItems',
        ],
      ],
      'output' => [
        'shape' => 'ListHostedZonesResponse',
        'xmlOrder' => [
          'HostedZones',
          'Marker',
          'IsTruncated',
          'NextMarker',
          'MaxItems',
        ],
      ],
      'errors' => [
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListResourceRecordSets' => [
      'name' => 'ListResourceRecordSets',
      'http' => [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/hostedzone/{Id}/rrset',
      ],
      'input' => [
        'shape' => 'ListResourceRecordSetsRequest',
        'xmlOrder' => [
          'HostedZoneId',
          'StartRecordName',
          'StartRecordType',
          'StartRecordIdentifier',
          'MaxItems',
        ],
      ],
      'output' => [
        'shape' => 'ListResourceRecordSetsResponse',
        'xmlOrder' => [
          'ResourceRecordSets',
          'IsTruncated',
          'NextRecordName',
          'NextRecordType',
          'NextRecordIdentifier',
          'MaxItems',
        ],
      ],
      'errors' => [
        [
          'shape' => 'NoSuchHostedZone',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListTagsForResource' => [
      'name' => 'ListTagsForResource',
      'http' => [
        'method' => 'GET',
        'requestUri' => '/2013-04-01/tags/{ResourceType}/{ResourceId}',
      ],
      'input' => [
        'shape' => 'ListTagsForResourceRequest',
        'xmlOrder' => [
          'ResourceType',
          'ResourceId',
        ],
      ],
      'output' => [
        'shape' => 'ListTagsForResourceResponse',
        'xmlOrder' => [
          'ResourceTagSet',
        ],
      ],
      'errors' => [
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'NoSuchHealthCheck',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'PriorRequestNotComplete',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'ThrottlingException',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'ListTagsForResources' => [
      'name' => 'ListTagsForResources',
      'http' => [
        'method' => 'POST',
        'requestUri' => '/2013-04-01/tags/{ResourceType}',
      ],
      'input' => [
        'shape' => 'ListTagsForResourcesRequest',
        'xmlOrder' => [
          'ResourceType',
          'ResourceIds',
        ],
        'xmlNamespace' => [
          'uri' => 'https://route53.amazonaws.com/doc/2013-04-01/',
        ],
        'locationName' => 'ListTagsForResourcesRequest',
      ],
      'output' => [
        'shape' => 'ListTagsForResourcesResponse',
        'xmlOrder' => [
          'ResourceTagSets',
        ],
      ],
      'errors' => [
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'NoSuchHealthCheck',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'PriorRequestNotComplete',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'ThrottlingException',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
      ],
    ],
    'UpdateHealthCheck' => [
      'name' => 'UpdateHealthCheck',
      'http' => [
        'method' => 'POST',
        'requestUri' => '/2013-04-01/healthcheck/{HealthCheckId}',
      ],
      'input' => [
        'shape' => 'UpdateHealthCheckRequest',
        'xmlOrder' => [
          'HealthCheckId',
          'HealthCheckVersion',
          'IPAddress',
          'Port',
          'ResourcePath',
          'FullyQualifiedDomainName',
          'SearchString',
          'FailureThreshold',
        ],
        'xmlNamespace' => [
          'uri' => 'https://route53.amazonaws.com/doc/2013-04-01/',
        ],
        'locationName' => 'UpdateHealthCheckRequest',
      ],
      'output' => [
        'shape' => 'UpdateHealthCheckResponse',
        'xmlOrder' => [
          'HealthCheck',
        ],
      ],
      'errors' => [
        [
          'shape' => 'NoSuchHealthCheck',
          'error' => [
            'httpStatusCode' => 404,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'InvalidInput',
          'error' => [
            'httpStatusCode' => 400,
          ],
          'exception' => true,
        ],
        [
          'shape' => 'HealthCheckVersionMismatch',
          'error' => [
            'httpStatusCode' => 409,
          ],
          'exception' => true,
        ],
      ],
    ],
  ],
  'shapes' => [
    'AliasHealthEnabled' => [
      'type' => 'boolean',
    ],
    'AliasTarget' => [
      'type' => 'structure',
      'required' => [
        'HostedZoneId',
        'DNSName',
        'EvaluateTargetHealth',
      ],
      'members' => [
        'HostedZoneId' => [
          'shape' => 'ResourceId',
        ],
        'DNSName' => [
          'shape' => 'DNSName',
        ],
        'EvaluateTargetHealth' => [
          'shape' => 'AliasHealthEnabled',
        ],
      ],
      'xmlOrder' => [
        'HostedZoneId',
        'DNSName',
        'EvaluateTargetHealth',
      ],
    ],
    'Change' => [
      'type' => 'structure',
      'required' => [
        'Action',
        'ResourceRecordSet',
      ],
      'members' => [
        'Action' => [
          'shape' => 'ChangeAction',
        ],
        'ResourceRecordSet' => [
          'shape' => 'ResourceRecordSet',
        ],
      ],
      'xmlOrder' => [
        'Action',
        'ResourceRecordSet',
      ],
    ],
    'ChangeAction' => [
      'type' => 'string',
      'enum' => [
        'CREATE',
        'DELETE',
        'UPSERT',
      ],
    ],
    'ChangeBatch' => [
      'type' => 'structure',
      'required' => [
        'Changes',
      ],
      'members' => [
        'Comment' => [
          'shape' => 'ResourceDescription',
        ],
        'Changes' => [
          'shape' => 'Changes',
        ],
      ],
      'xmlOrder' => [
        'Comment',
        'Changes',
      ],
    ],
    'ChangeInfo' => [
      'type' => 'structure',
      'required' => [
        'Id',
        'Status',
        'SubmittedAt',
      ],
      'members' => [
        'Id' => [
          'shape' => 'ResourceId',
        ],
        'Status' => [
          'shape' => 'ChangeStatus',
        ],
        'SubmittedAt' => [
          'shape' => 'TimeStamp',
        ],
        'Comment' => [
          'shape' => 'ResourceDescription',
        ],
      ],
      'xmlOrder' => [
        'Id',
        'Status',
        'SubmittedAt',
        'Comment',
      ],
    ],
    'ChangeResourceRecordSetsRequest' => [
      'type' => 'structure',
      'required' => [
        'HostedZoneId',
        'ChangeBatch',
      ],
      'members' => [
        'HostedZoneId' => [
          'shape' => 'ResourceId',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
        'ChangeBatch' => [
          'shape' => 'ChangeBatch',
        ],
      ],
      'xmlOrder' => [
        'HostedZoneId',
        'ChangeBatch',
      ],
    ],
    'ChangeResourceRecordSetsResponse' => [
      'type' => 'structure',
      'required' => [
        'ChangeInfo',
      ],
      'members' => [
        'ChangeInfo' => [
          'shape' => 'ChangeInfo',
        ],
      ],
      'xmlOrder' => [
        'ChangeInfo',
      ],
    ],
    'ChangeStatus' => [
      'type' => 'string',
      'enum' => [
        'PENDING',
        'INSYNC',
      ],
    ],
    'ChangeTagsForResourceRequest' => [
      'type' => 'structure',
      'required' => [
        'ResourceType',
        'ResourceId',
      ],
      'members' => [
        'ResourceType' => [
          'shape' => 'TagResourceType',
          'location' => 'uri',
          'locationName' => 'ResourceType',
        ],
        'ResourceId' => [
          'shape' => 'TagResourceId',
          'location' => 'uri',
          'locationName' => 'ResourceId',
        ],
        'AddTags' => [
          'shape' => 'TagList',
        ],
        'RemoveTagKeys' => [
          'shape' => 'TagKeyList',
        ],
      ],
      'xmlOrder' => [
        'ResourceType',
        'ResourceId',
        'AddTags',
        'RemoveTagKeys',
      ],
    ],
    'ChangeTagsForResourceResponse' => [
      'type' => 'structure',
      'members' => [
      ],
    ],
    'Changes' => [
      'type' => 'list',
      'member' => [
        'shape' => 'Change',
        'locationName' => 'Change',
      ],
      'min' => 1,
    ],
    'CheckerIpRanges' => [
      'type' => 'list',
      'member' => [
        'shape' => 'IPAddressCidr',
      ],
    ],
    'CreateHealthCheckRequest' => [
      'type' => 'structure',
      'required' => [
        'CallerReference',
        'HealthCheckConfig',
      ],
      'members' => [
        'CallerReference' => [
          'shape' => 'HealthCheckNonce',
        ],
        'HealthCheckConfig' => [
          'shape' => 'HealthCheckConfig',
        ],
      ],
      'xmlOrder' => [
        'CallerReference',
        'HealthCheckConfig',
      ],
    ],
    'CreateHealthCheckResponse' => [
      'type' => 'structure',
      'required' => [
        'HealthCheck',
        'Location',
      ],
      'members' => [
        'HealthCheck' => [
          'shape' => 'HealthCheck',
        ],
        'Location' => [
          'shape' => 'ResourceURI',
          'location' => 'header',
          'locationName' => 'Location',
        ],
      ],
      'xmlOrder' => [
        'HealthCheck',
        'Location',
      ],
    ],
    'CreateHostedZoneRequest' => [
      'type' => 'structure',
      'required' => [
        'Name',
        'CallerReference',
      ],
      'members' => [
        'Name' => [
          'shape' => 'DNSName',
        ],
        'CallerReference' => [
          'shape' => 'Nonce',
        ],
        'HostedZoneConfig' => [
          'shape' => 'HostedZoneConfig',
        ],
      ],
      'xmlOrder' => [
        'Name',
        'CallerReference',
        'HostedZoneConfig',
      ],
    ],
    'CreateHostedZoneResponse' => [
      'type' => 'structure',
      'required' => [
        'HostedZone',
        'ChangeInfo',
        'DelegationSet',
        'Location',
      ],
      'members' => [
        'HostedZone' => [
          'shape' => 'HostedZone',
        ],
        'ChangeInfo' => [
          'shape' => 'ChangeInfo',
        ],
        'DelegationSet' => [
          'shape' => 'DelegationSet',
        ],
        'Location' => [
          'shape' => 'ResourceURI',
          'location' => 'header',
          'locationName' => 'Location',
        ],
      ],
      'xmlOrder' => [
        'HostedZone',
        'ChangeInfo',
        'DelegationSet',
        'Location',
      ],
    ],
    'DNSName' => [
      'type' => 'string',
      'max' => 1024,
    ],
    'DelegationSet' => [
      'type' => 'structure',
      'required' => [
        'NameServers',
      ],
      'members' => [
        'NameServers' => [
          'shape' => 'DelegationSetNameServers',
        ],
      ],
      'xmlOrder' => [
        'NameServers',
      ],
    ],
    'DelegationSetNameServers' => [
      'type' => 'list',
      'member' => [
        'shape' => 'DNSName',
        'locationName' => 'NameServer',
      ],
      'min' => 1,
    ],
    'DelegationSetNotAvailable' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'DeleteHealthCheckRequest' => [
      'type' => 'structure',
      'required' => [
        'HealthCheckId',
      ],
      'members' => [
        'HealthCheckId' => [
          'shape' => 'HealthCheckId',
          'location' => 'uri',
          'locationName' => 'HealthCheckId',
        ],
      ],
      'xmlOrder' => [
        'HealthCheckId',
      ],
    ],
    'DeleteHealthCheckResponse' => [
      'type' => 'structure',
      'members' => [
      ],
    ],
    'DeleteHostedZoneRequest' => [
      'type' => 'structure',
      'required' => [
        'Id',
      ],
      'members' => [
        'Id' => [
          'shape' => 'ResourceId',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
      'xmlOrder' => [
        'Id',
      ],
    ],
    'DeleteHostedZoneResponse' => [
      'type' => 'structure',
      'required' => [
        'ChangeInfo',
      ],
      'members' => [
        'ChangeInfo' => [
          'shape' => 'ChangeInfo',
        ],
      ],
      'xmlOrder' => [
        'ChangeInfo',
      ],
    ],
    'ErrorMessage' => [
      'type' => 'string',
    ],
    'ErrorMessages' => [
      'type' => 'list',
      'member' => [
        'shape' => 'ErrorMessage',
        'locationName' => 'Message',
      ],
    ],
    'FailureThreshold' => [
      'type' => 'integer',
      'min' => 1,
      'max' => 10,
    ],
    'FullyQualifiedDomainName' => [
      'type' => 'string',
      'max' => 255,
    ],
    'GeoLocation' => [
      'type' => 'structure',
      'members' => [
        'ContinentCode' => [
          'shape' => 'GeoLocationContinentCode',
        ],
        'CountryCode' => [
          'shape' => 'GeoLocationCountryCode',
        ],
        'SubdivisionCode' => [
          'shape' => 'GeoLocationSubdivisionCode',
        ],
      ],
      'xmlOrder' => [
        'ContinentCode',
        'CountryCode',
        'SubdivisionCode',
      ],
    ],
    'GeoLocationContinentCode' => [
      'type' => 'string',
      'min' => 2,
      'max' => 2,
    ],
    'GeoLocationContinentName' => [
      'type' => 'string',
      'min' => 1,
      'max' => 32,
    ],
    'GeoLocationCountryCode' => [
      'type' => 'string',
      'min' => 1,
      'max' => 2,
    ],
    'GeoLocationCountryName' => [
      'type' => 'string',
      'min' => 1,
      'max' => 64,
    ],
    'GeoLocationDetails' => [
      'type' => 'structure',
      'members' => [
        'ContinentCode' => [
          'shape' => 'GeoLocationContinentCode',
        ],
        'ContinentName' => [
          'shape' => 'GeoLocationContinentName',
        ],
        'CountryCode' => [
          'shape' => 'GeoLocationCountryCode',
        ],
        'CountryName' => [
          'shape' => 'GeoLocationCountryName',
        ],
        'SubdivisionCode' => [
          'shape' => 'GeoLocationSubdivisionCode',
        ],
        'SubdivisionName' => [
          'shape' => 'GeoLocationSubdivisionName',
        ],
      ],
      'xmlOrder' => [
        'ContinentCode',
        'ContinentName',
        'CountryCode',
        'CountryName',
        'SubdivisionCode',
        'SubdivisionName',
      ],
    ],
    'GeoLocationDetailsList' => [
      'type' => 'list',
      'member' => [
        'shape' => 'GeoLocationDetails',
        'locationName' => 'GeoLocationDetails',
      ],
    ],
    'GeoLocationSubdivisionCode' => [
      'type' => 'string',
      'min' => 1,
      'max' => 3,
    ],
    'GeoLocationSubdivisionName' => [
      'type' => 'string',
      'min' => 1,
      'max' => 64,
    ],
    'GetChangeRequest' => [
      'type' => 'structure',
      'required' => [
        'Id',
      ],
      'members' => [
        'Id' => [
          'shape' => 'ResourceId',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
      'xmlOrder' => [
        'Id',
      ],
    ],
    'GetChangeResponse' => [
      'type' => 'structure',
      'required' => [
        'ChangeInfo',
      ],
      'members' => [
        'ChangeInfo' => [
          'shape' => 'ChangeInfo',
        ],
      ],
      'xmlOrder' => [
        'ChangeInfo',
      ],
    ],
    'GetCheckerIpRangesRequest' => [
      'type' => 'structure',
      'members' => [
      ],
    ],
    'GetCheckerIpRangesResponse' => [
      'type' => 'structure',
      'required' => [
        'CheckerIpRanges',
      ],
      'members' => [
        'CheckerIpRanges' => [
          'shape' => 'CheckerIpRanges',
        ],
      ],
    ],
    'GetGeoLocationRequest' => [
      'type' => 'structure',
      'members' => [
        'ContinentCode' => [
          'shape' => 'GeoLocationContinentCode',
          'location' => 'querystring',
          'locationName' => 'continentcode',
        ],
        'CountryCode' => [
          'shape' => 'GeoLocationCountryCode',
          'location' => 'querystring',
          'locationName' => 'countrycode',
        ],
        'SubdivisionCode' => [
          'shape' => 'GeoLocationSubdivisionCode',
          'location' => 'querystring',
          'locationName' => 'subdivisioncode',
        ],
      ],
      'xmlOrder' => [
        'ContinentCode',
        'CountryCode',
        'SubdivisionCode',
      ],
    ],
    'GetGeoLocationResponse' => [
      'type' => 'structure',
      'required' => [
        'GeoLocationDetails',
      ],
      'members' => [
        'GeoLocationDetails' => [
          'shape' => 'GeoLocationDetails',
        ],
      ],
      'xmlOrder' => [
        'GeoLocationDetails',
      ],
    ],
    'GetHealthCheckCountRequest' => [
      'type' => 'structure',
      'members' => [
      ],
    ],
    'GetHealthCheckCountResponse' => [
      'type' => 'structure',
      'required' => [
        'HealthCheckCount',
      ],
      'members' => [
        'HealthCheckCount' => [
          'shape' => 'HealthCheckCount',
        ],
      ],
    ],
    'GetHealthCheckRequest' => [
      'type' => 'structure',
      'required' => [
        'HealthCheckId',
      ],
      'members' => [
        'HealthCheckId' => [
          'shape' => 'HealthCheckId',
          'location' => 'uri',
          'locationName' => 'HealthCheckId',
        ],
      ],
      'xmlOrder' => [
        'HealthCheckId',
      ],
    ],
    'GetHealthCheckResponse' => [
      'type' => 'structure',
      'required' => [
        'HealthCheck',
      ],
      'members' => [
        'HealthCheck' => [
          'shape' => 'HealthCheck',
        ],
      ],
      'xmlOrder' => [
        'HealthCheck',
      ],
    ],
    'GetHostedZoneRequest' => [
      'type' => 'structure',
      'required' => [
        'Id',
      ],
      'members' => [
        'Id' => [
          'shape' => 'ResourceId',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
      ],
      'xmlOrder' => [
        'Id',
      ],
    ],
    'GetHostedZoneResponse' => [
      'type' => 'structure',
      'required' => [
        'HostedZone',
        'DelegationSet',
      ],
      'members' => [
        'HostedZone' => [
          'shape' => 'HostedZone',
        ],
        'DelegationSet' => [
          'shape' => 'DelegationSet',
        ],
      ],
      'xmlOrder' => [
        'HostedZone',
        'DelegationSet',
      ],
    ],
    'HealthCheck' => [
      'type' => 'structure',
      'required' => [
        'Id',
        'CallerReference',
        'HealthCheckConfig',
        'HealthCheckVersion',
      ],
      'members' => [
        'Id' => [
          'shape' => 'HealthCheckId',
        ],
        'CallerReference' => [
          'shape' => 'HealthCheckNonce',
        ],
        'HealthCheckConfig' => [
          'shape' => 'HealthCheckConfig',
        ],
        'HealthCheckVersion' => [
          'shape' => 'HealthCheckVersion',
        ],
      ],
      'xmlOrder' => [
        'Id',
        'CallerReference',
        'HealthCheckConfig',
        'HealthCheckVersion',
      ],
    ],
    'HealthCheckAlreadyExists' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'HealthCheckConfig' => [
      'type' => 'structure',
      'required' => [
        'Type',
      ],
      'members' => [
        'IPAddress' => [
          'shape' => 'IPAddress',
        ],
        'Port' => [
          'shape' => 'Port',
        ],
        'Type' => [
          'shape' => 'HealthCheckType',
        ],
        'ResourcePath' => [
          'shape' => 'ResourcePath',
        ],
        'FullyQualifiedDomainName' => [
          'shape' => 'FullyQualifiedDomainName',
        ],
        'SearchString' => [
          'shape' => 'SearchString',
        ],
        'RequestInterval' => [
          'shape' => 'RequestInterval',
        ],
        'FailureThreshold' => [
          'shape' => 'FailureThreshold',
        ],
      ],
      'xmlOrder' => [
        'IPAddress',
        'Port',
        'Type',
        'ResourcePath',
        'FullyQualifiedDomainName',
        'SearchString',
        'RequestInterval',
        'FailureThreshold',
      ],
    ],
    'HealthCheckCount' => [
      'type' => 'long',
    ],
    'HealthCheckId' => [
      'type' => 'string',
      'max' => 64,
    ],
    'HealthCheckInUse' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'HealthCheckNonce' => [
      'type' => 'string',
      'min' => 1,
      'max' => 64,
    ],
    'HealthCheckType' => [
      'type' => 'string',
      'enum' => [
        'HTTP',
        'HTTPS',
        'HTTP_STR_MATCH',
        'HTTPS_STR_MATCH',
        'TCP',
      ],
    ],
    'HealthCheckVersion' => [
      'type' => 'long',
      'min' => 1,
    ],
    'HealthCheckVersionMismatch' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'HealthChecks' => [
      'type' => 'list',
      'member' => [
        'shape' => 'HealthCheck',
        'locationName' => 'HealthCheck',
      ],
    ],
    'HostedZone' => [
      'type' => 'structure',
      'required' => [
        'Id',
        'Name',
        'CallerReference',
      ],
      'members' => [
        'Id' => [
          'shape' => 'ResourceId',
        ],
        'Name' => [
          'shape' => 'DNSName',
        ],
        'CallerReference' => [
          'shape' => 'Nonce',
        ],
        'Config' => [
          'shape' => 'HostedZoneConfig',
        ],
        'ResourceRecordSetCount' => [
          'shape' => 'HostedZoneRRSetCount',
        ],
      ],
      'xmlOrder' => [
        'Id',
        'Name',
        'CallerReference',
        'Config',
        'ResourceRecordSetCount',
      ],
    ],
    'HostedZoneAlreadyExists' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 409,
      ],
      'exception' => true,
    ],
    'HostedZoneConfig' => [
      'type' => 'structure',
      'members' => [
        'Comment' => [
          'shape' => 'ResourceDescription',
        ],
      ],
      'xmlOrder' => [
        'Comment',
      ],
    ],
    'HostedZoneNotEmpty' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'HostedZoneRRSetCount' => [
      'type' => 'long',
    ],
    'HostedZones' => [
      'type' => 'list',
      'member' => [
        'shape' => 'HostedZone',
        'locationName' => 'HostedZone',
      ],
    ],
    'IPAddress' => [
      'type' => 'string',
      'max' => 15,
      'pattern' => '^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]]\\.]{3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]]$',
    ],
    'IPAddressCidr' => [
      'type' => 'string',
    ],
    'IncompatibleVersion' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidChangeBatch' => [
      'type' => 'structure',
      'members' => [
        'messages' => [
          'shape' => 'ErrorMessages',
        ],
      ],
      'exception' => true,
    ],
    'InvalidDomainName' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'InvalidInput' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'ListGeoLocationsRequest' => [
      'type' => 'structure',
      'members' => [
        'StartContinentCode' => [
          'shape' => 'GeoLocationContinentCode',
          'location' => 'querystring',
          'locationName' => 'startcontinentcode',
        ],
        'StartCountryCode' => [
          'shape' => 'GeoLocationCountryCode',
          'location' => 'querystring',
          'locationName' => 'startcountrycode',
        ],
        'StartSubdivisionCode' => [
          'shape' => 'GeoLocationSubdivisionCode',
          'location' => 'querystring',
          'locationName' => 'startsubdivisioncode',
        ],
        'MaxItems' => [
          'shape' => 'PageMaxItems',
          'location' => 'querystring',
          'locationName' => 'maxitems',
        ],
      ],
      'xmlOrder' => [
        'StartContinentCode',
        'StartCountryCode',
        'StartSubdivisionCode',
        'MaxItems',
      ],
    ],
    'ListGeoLocationsResponse' => [
      'type' => 'structure',
      'required' => [
        'GeoLocationDetailsList',
        'IsTruncated',
        'MaxItems',
      ],
      'members' => [
        'GeoLocationDetailsList' => [
          'shape' => 'GeoLocationDetailsList',
        ],
        'IsTruncated' => [
          'shape' => 'PageTruncated',
        ],
        'NextContinentCode' => [
          'shape' => 'GeoLocationContinentCode',
        ],
        'NextCountryCode' => [
          'shape' => 'GeoLocationCountryCode',
        ],
        'NextSubdivisionCode' => [
          'shape' => 'GeoLocationSubdivisionCode',
        ],
        'MaxItems' => [
          'shape' => 'PageMaxItems',
        ],
      ],
      'xmlOrder' => [
        'GeoLocationDetailsList',
        'IsTruncated',
        'NextContinentCode',
        'NextCountryCode',
        'NextSubdivisionCode',
        'MaxItems',
      ],
    ],
    'ListHealthChecksRequest' => [
      'type' => 'structure',
      'members' => [
        'Marker' => [
          'shape' => 'PageMarker',
          'location' => 'querystring',
          'locationName' => 'marker',
        ],
        'MaxItems' => [
          'shape' => 'PageMaxItems',
          'location' => 'querystring',
          'locationName' => 'maxitems',
        ],
      ],
      'xmlOrder' => [
        'Marker',
        'MaxItems',
      ],
    ],
    'ListHealthChecksResponse' => [
      'type' => 'structure',
      'required' => [
        'HealthChecks',
        'Marker',
        'IsTruncated',
        'MaxItems',
      ],
      'members' => [
        'HealthChecks' => [
          'shape' => 'HealthChecks',
        ],
        'Marker' => [
          'shape' => 'PageMarker',
        ],
        'IsTruncated' => [
          'shape' => 'PageTruncated',
        ],
        'NextMarker' => [
          'shape' => 'PageMarker',
        ],
        'MaxItems' => [
          'shape' => 'PageMaxItems',
        ],
      ],
      'xmlOrder' => [
        'HealthChecks',
        'Marker',
        'IsTruncated',
        'NextMarker',
        'MaxItems',
      ],
    ],
    'ListHostedZonesRequest' => [
      'type' => 'structure',
      'members' => [
        'Marker' => [
          'shape' => 'PageMarker',
          'location' => 'querystring',
          'locationName' => 'marker',
        ],
        'MaxItems' => [
          'shape' => 'PageMaxItems',
          'location' => 'querystring',
          'locationName' => 'maxitems',
        ],
      ],
      'xmlOrder' => [
        'Marker',
        'MaxItems',
      ],
    ],
    'ListHostedZonesResponse' => [
      'type' => 'structure',
      'required' => [
        'HostedZones',
        'Marker',
        'IsTruncated',
        'MaxItems',
      ],
      'members' => [
        'HostedZones' => [
          'shape' => 'HostedZones',
        ],
        'Marker' => [
          'shape' => 'PageMarker',
        ],
        'IsTruncated' => [
          'shape' => 'PageTruncated',
        ],
        'NextMarker' => [
          'shape' => 'PageMarker',
        ],
        'MaxItems' => [
          'shape' => 'PageMaxItems',
        ],
      ],
      'xmlOrder' => [
        'HostedZones',
        'Marker',
        'IsTruncated',
        'NextMarker',
        'MaxItems',
      ],
    ],
    'ListResourceRecordSetsRequest' => [
      'type' => 'structure',
      'required' => [
        'HostedZoneId',
      ],
      'members' => [
        'HostedZoneId' => [
          'shape' => 'ResourceId',
          'location' => 'uri',
          'locationName' => 'Id',
        ],
        'StartRecordName' => [
          'shape' => 'DNSName',
          'location' => 'querystring',
          'locationName' => 'name',
        ],
        'StartRecordType' => [
          'shape' => 'RRType',
          'location' => 'querystring',
          'locationName' => 'type',
        ],
        'StartRecordIdentifier' => [
          'shape' => 'ResourceRecordSetIdentifier',
          'location' => 'querystring',
          'locationName' => 'identifier',
        ],
        'MaxItems' => [
          'shape' => 'PageMaxItems',
          'location' => 'querystring',
          'locationName' => 'maxitems',
        ],
      ],
      'xmlOrder' => [
        'HostedZoneId',
        'StartRecordName',
        'StartRecordType',
        'StartRecordIdentifier',
        'MaxItems',
      ],
    ],
    'ListResourceRecordSetsResponse' => [
      'type' => 'structure',
      'required' => [
        'ResourceRecordSets',
        'IsTruncated',
        'MaxItems',
      ],
      'members' => [
        'ResourceRecordSets' => [
          'shape' => 'ResourceRecordSets',
        ],
        'IsTruncated' => [
          'shape' => 'PageTruncated',
        ],
        'NextRecordName' => [
          'shape' => 'DNSName',
        ],
        'NextRecordType' => [
          'shape' => 'RRType',
        ],
        'NextRecordIdentifier' => [
          'shape' => 'ResourceRecordSetIdentifier',
        ],
        'MaxItems' => [
          'shape' => 'PageMaxItems',
        ],
      ],
      'xmlOrder' => [
        'ResourceRecordSets',
        'IsTruncated',
        'NextRecordName',
        'NextRecordType',
        'NextRecordIdentifier',
        'MaxItems',
      ],
    ],
    'ListTagsForResourceRequest' => [
      'type' => 'structure',
      'required' => [
        'ResourceType',
        'ResourceId',
      ],
      'members' => [
        'ResourceType' => [
          'shape' => 'TagResourceType',
          'location' => 'uri',
          'locationName' => 'ResourceType',
        ],
        'ResourceId' => [
          'shape' => 'TagResourceId',
          'location' => 'uri',
          'locationName' => 'ResourceId',
        ],
      ],
      'xmlOrder' => [
        'ResourceType',
        'ResourceId',
      ],
    ],
    'ListTagsForResourceResponse' => [
      'type' => 'structure',
      'required' => [
        'ResourceTagSet',
      ],
      'members' => [
        'ResourceTagSet' => [
          'shape' => 'ResourceTagSet',
        ],
      ],
      'xmlOrder' => [
        'ResourceTagSet',
      ],
    ],
    'ListTagsForResourcesRequest' => [
      'type' => 'structure',
      'required' => [
        'ResourceType',
        'ResourceIds',
      ],
      'members' => [
        'ResourceType' => [
          'shape' => 'TagResourceType',
          'location' => 'uri',
          'locationName' => 'ResourceType',
        ],
        'ResourceIds' => [
          'shape' => 'TagResourceIdList',
        ],
      ],
      'xmlOrder' => [
        'ResourceType',
        'ResourceIds',
      ],
    ],
    'ListTagsForResourcesResponse' => [
      'type' => 'structure',
      'required' => [
        'ResourceTagSets',
      ],
      'members' => [
        'ResourceTagSets' => [
          'shape' => 'ResourceTagSetList',
        ],
      ],
      'xmlOrder' => [
        'ResourceTagSets',
      ],
    ],
    'NoSuchChange' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'NoSuchGeoLocation' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'NoSuchHealthCheck' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'NoSuchHostedZone' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 404,
      ],
      'exception' => true,
    ],
    'Nonce' => [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
    ],
    'PageMarker' => [
      'type' => 'string',
      'max' => 64,
    ],
    'PageMaxItems' => [
      'type' => 'string',
    ],
    'PageTruncated' => [
      'type' => 'boolean',
    ],
    'Port' => [
      'type' => 'integer',
      'min' => 1,
      'max' => 65535,
    ],
    'PriorRequestNotComplete' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'RData' => [
      'type' => 'string',
      'max' => 4000,
    ],
    'RRType' => [
      'type' => 'string',
      'enum' => [
        'SOA',
        'A',
        'TXT',
        'NS',
        'CNAME',
        'MX',
        'PTR',
        'SRV',
        'SPF',
        'AAAA',
      ],
    ],
    'RequestInterval' => [
      'type' => 'integer',
      'min' => 10,
      'max' => 30,
    ],
    'ResourceDescription' => [
      'type' => 'string',
      'max' => 256,
    ],
    'ResourceId' => [
      'type' => 'string',
      'max' => 32,
    ],
    'ResourcePath' => [
      'type' => 'string',
      'max' => 255,
    ],
    'ResourceRecord' => [
      'type' => 'structure',
      'required' => [
        'Value',
      ],
      'members' => [
        'Value' => [
          'shape' => 'RData',
        ],
      ],
      'xmlOrder' => [
        'Value',
      ],
    ],
    'ResourceRecordSet' => [
      'type' => 'structure',
      'required' => [
        'Name',
        'Type',
      ],
      'members' => [
        'Name' => [
          'shape' => 'DNSName',
        ],
        'Type' => [
          'shape' => 'RRType',
        ],
        'SetIdentifier' => [
          'shape' => 'ResourceRecordSetIdentifier',
        ],
        'Weight' => [
          'shape' => 'ResourceRecordSetWeight',
        ],
        'Region' => [
          'shape' => 'ResourceRecordSetRegion',
        ],
        'GeoLocation' => [
          'shape' => 'GeoLocation',
        ],
        'Failover' => [
          'shape' => 'ResourceRecordSetFailover',
        ],
        'TTL' => [
          'shape' => 'TTL',
        ],
        'ResourceRecords' => [
          'shape' => 'ResourceRecords',
        ],
        'AliasTarget' => [
          'shape' => 'AliasTarget',
        ],
        'HealthCheckId' => [
          'shape' => 'HealthCheckId',
        ],
      ],
      'xmlOrder' => [
        'Name',
        'Type',
        'SetIdentifier',
        'Weight',
        'Region',
        'GeoLocation',
        'Failover',
        'TTL',
        'ResourceRecords',
        'AliasTarget',
        'HealthCheckId',
      ],
    ],
    'ResourceRecordSetFailover' => [
      'type' => 'string',
      'enum' => [
        'PRIMARY',
        'SECONDARY',
      ],
    ],
    'ResourceRecordSetIdentifier' => [
      'type' => 'string',
      'min' => 1,
      'max' => 128,
    ],
    'ResourceRecordSetRegion' => [
      'type' => 'string',
      'enum' => [
        'us-east-1',
        'us-west-1',
        'us-west-2',
        'eu-west-1',
        'ap-southeast-1',
        'ap-southeast-2',
        'ap-northeast-1',
        'sa-east-1',
        'cn-north-1',
      ],
      'min' => 1,
      'max' => 64,
    ],
    'ResourceRecordSetWeight' => [
      'type' => 'long',
      'min' => 0,
      'max' => 255,
    ],
    'ResourceRecordSets' => [
      'type' => 'list',
      'member' => [
        'shape' => 'ResourceRecordSet',
        'locationName' => 'ResourceRecordSet',
      ],
    ],
    'ResourceRecords' => [
      'type' => 'list',
      'member' => [
        'shape' => 'ResourceRecord',
        'locationName' => 'ResourceRecord',
      ],
      'min' => 1,
    ],
    'ResourceTagSet' => [
      'type' => 'structure',
      'members' => [
        'ResourceType' => [
          'shape' => 'TagResourceType',
        ],
        'ResourceId' => [
          'shape' => 'TagResourceId',
        ],
        'Tags' => [
          'shape' => 'TagList',
        ],
      ],
    ],
    'ResourceTagSetList' => [
      'type' => 'list',
      'member' => [
        'shape' => 'ResourceTagSet',
        'locationName' => 'ResourceTagSet',
      ],
    ],
    'ResourceURI' => [
      'type' => 'string',
      'max' => 1024,
    ],
    'SearchString' => [
      'type' => 'string',
      'max' => 255,
    ],
    'TTL' => [
      'type' => 'long',
      'min' => 0,
      'max' => 2147483647,
    ],
    'Tag' => [
      'type' => 'structure',
      'members' => [
        'Key' => [
          'shape' => 'TagKey',
        ],
        'Value' => [
          'shape' => 'TagValue',
        ],
      ],
    ],
    'TagKey' => [
      'type' => 'string',
      'max' => 128,
    ],
    'TagKeyList' => [
      'type' => 'list',
      'member' => [
        'shape' => 'TagKey',
        'locationName' => 'Key',
      ],
      'min' => 1,
      'max' => 10,
    ],
    'TagList' => [
      'type' => 'list',
      'member' => [
        'shape' => 'Tag',
        'locationName' => 'Tag',
      ],
      'min' => 1,
      'max' => 10,
    ],
    'TagResourceId' => [
      'type' => 'string',
      'max' => 64,
    ],
    'TagResourceIdList' => [
      'type' => 'list',
      'member' => [
        'shape' => 'TagResourceId',
        'locationName' => 'ResourceId',
      ],
      'min' => 1,
      'max' => 10,
    ],
    'TagResourceType' => [
      'type' => 'string',
      'enum' => [
        'healthcheck',
      ],
    ],
    'TagValue' => [
      'type' => 'string',
      'max' => 256,
    ],
    'ThrottlingException' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'TimeStamp' => [
      'type' => 'timestamp',
    ],
    'TooManyHealthChecks' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'exception' => true,
    ],
    'TooManyHostedZones' => [
      'type' => 'structure',
      'members' => [
        'message' => [
          'shape' => 'ErrorMessage',
        ],
      ],
      'error' => [
        'httpStatusCode' => 400,
      ],
      'exception' => true,
    ],
    'UpdateHealthCheckRequest' => [
      'type' => 'structure',
      'required' => [
        'HealthCheckId',
      ],
      'members' => [
        'HealthCheckId' => [
          'shape' => 'HealthCheckId',
          'location' => 'uri',
          'locationName' => 'HealthCheckId',
        ],
        'HealthCheckVersion' => [
          'shape' => 'HealthCheckVersion',
        ],
        'IPAddress' => [
          'shape' => 'IPAddress',
        ],
        'Port' => [
          'shape' => 'Port',
        ],
        'ResourcePath' => [
          'shape' => 'ResourcePath',
        ],
        'FullyQualifiedDomainName' => [
          'shape' => 'FullyQualifiedDomainName',
        ],
        'SearchString' => [
          'shape' => 'SearchString',
        ],
        'FailureThreshold' => [
          'shape' => 'FailureThreshold',
        ],
      ],
      'xmlOrder' => [
        'HealthCheckId',
        'HealthCheckVersion',
        'IPAddress',
        'Port',
        'ResourcePath',
        'FullyQualifiedDomainName',
        'SearchString',
        'FailureThreshold',
      ],
    ],
    'UpdateHealthCheckResponse' => [
      'type' => 'structure',
      'required' => [
        'HealthCheck',
      ],
      'members' => [
        'HealthCheck' => [
          'shape' => 'HealthCheck',
        ],
      ],
      'xmlOrder' => [
        'HealthCheck',
      ],
    ],
  ],
];
