<?php
namespace Aws\Api\Serializer;

use Aws\Api\StructureShape;
use Aws\Api\Shape;
use Aws\Api\MapShape;
use Aws\Api\TimestampShape;
use Aws\Api\ListShape;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Stream;

/**
 * @internal
 */
class RestXmlSerializer extends RestSerializer
{
    protected function payload(
        RequestInterface $request,
        StructureShape $member,
        array $value
    ) {
        $request->setHeader('Content-Type', 'application/xml');
        $xml = new \XMLWriter();
        $request->setBody(Stream\create($this->format($member, $value, $xml)));
    }

    private function format(Shape $shape, $value, \XMLWriter $xml)
    {
        static $methods = [
            'format_structure' => true,
            'format_list'      => true,
            'format_map'       => true,
            'format_blob'      => true,
            'format_timestamp' => true
        ];

        $type = 'format_' . $shape['type'];
        if (isset($methods[$type])) {
            return $this->{$type}($shape, $value, $xml);
        }

        return $value;
    }

    private function format_structure(
        StructureShape $shape,
        array $value,
        \XMLWriter $xml
    ) {
        $data = [];
        foreach ($value as $k => $v) {
            if ($v !== null && $shape->hasMember($k)) {
                $data[$shape['locationName'] ?: $k] = $this->format(
                    $shape->getMember($k),
                    $v,
                    $xml
                );
            }
        }

        return $data;
    }

    private function format_list(
        ListShape $shape,
        array $value,
        \XMLWriter $xml
    ) {
        $items = $shape->getMember();
        foreach ($value as &$v) {
            $data[] = $this->format($items, $v, $xml);
        }

        return $value;
    }

    private function format_map(MapShape $shape, array $value, \XMLWriter $xml)
    {
        $values = $shape->getValue();
        foreach ($value as &$v) {
            $v = $this->format($values, $v, $xml);
        }

        return $value;
    }

    private function format_blob(Shape $shape, $value, \XMLWriter $xml)
    {
        return base64_encode($value);
    }

    private function format_timestamp(
        TimestampShape $shape,
        $value,
        \XMLWriter $xml
    ) {

    }
}
