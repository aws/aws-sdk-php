<?php
namespace Aws\Api\Serializer;

use Aws\Api\Serde\Query\Ec2QueryEncodePlanProvider;
use Aws\Api\Serde\Query\QueryEncodePlan;

/**
 * @internal
 */
class Ec2ParamBuilder extends QueryParamBuilder
{
    public function __construct()
    {
        parent::__construct(new Ec2QueryEncodePlanProvider());
    }

    protected function formatList(
        QueryEncodePlan $plan,
        array $value,
        $prefix,
        array &$query
    ) {
        // EC2 omits empty lists and appends indexes without a member segment.
        if ($value) {
            $this->formatItems($plan, $value, $prefix . '.', $query);
        }
    }
}
