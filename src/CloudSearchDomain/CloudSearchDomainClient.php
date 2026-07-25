<?php
namespace Aws\CloudSearchDomain;

use Aws\AwsClient;
use Aws\CommandInterface;
use Aws\HandlerList;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7;

/**
 * This client is used to search and upload documents to an **Amazon CloudSearch** Domain.
 *
 * @method \Aws\Result search(array $args = [])
 * @phpstan-method \Aws\Result search(array{
 *     cursor?: string,
 *     expr?: string,
 *     facet?: string,
 *     filterQuery?: string,
 *     highlight?: string,
 *     partial?: bool,
 *     query?: string,
 *     queryOptions?: string,
 *     queryParser?: 'dismax'|'lucene'|'simple'|'structured',
 *     return?: string,
 *     size?: int,
 *     sort?: string,
 *     start?: int,
 *     stats?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAsync(array{
 *     cursor?: string,
 *     expr?: string,
 *     facet?: string,
 *     filterQuery?: string,
 *     highlight?: string,
 *     partial?: bool,
 *     query?: string,
 *     queryOptions?: string,
 *     queryParser?: 'dismax'|'lucene'|'simple'|'structured',
 *     return?: string,
 *     size?: int,
 *     sort?: string,
 *     start?: int,
 *     stats?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result suggest(array $args = [])
 * @phpstan-method \Aws\Result suggest(array{query?: string, suggester?: string, size?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise suggestAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise suggestAsync(array{query?: string, suggester?: string, size?: int, ...} $args = [])
 * @method \Aws\Result uploadDocuments(array $args = [])
 * @phpstan-method \Aws\Result uploadDocuments(array{
 *     documents?: string|resource|\Psr\Http\Message\StreamInterface,
 *     contentType?: 'application/json'|'application/xml',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise uploadDocumentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise uploadDocumentsAsync(array{
 *     documents?: string|resource|\Psr\Http\Message\StreamInterface,
 *     contentType?: 'application/json'|'application/xml',
 *     ...,
 * } $args = [])
 */
class CloudSearchDomainClient extends AwsClient
{
    public function __construct(array $args)
    {
        parent::__construct($args);
        $list = $this->getHandlerList();
        $list->appendBuild($this->searchByPost(), 'cloudsearchdomain.search_by_POST');
    }

    public static function getArguments()
    {
        $args = parent::getArguments();
        $args['endpoint']['required'] = true;
        $args['region']['default'] = function (array $args) {
            // Determine the region from the provided endpoint.
            // (e.g. http://search-blah.{region}.cloudsearch.amazonaws.com)
            return explode('.', new Uri($args['endpoint']))[1];
        };
        unset($args['endpoint']['default']);

        return $args;
    }

    /**
     * Use POST for search command
     *
     * Useful when query string is too long
     */
    private function searchByPost()
    {
        return static function (callable $handler) {
            return function (
                CommandInterface $c,
                ?RequestInterface $r = null
            ) use ($handler) {
                if ($c->getName() !== 'Search') {
                    return $handler($c, $r);
                }
                return $handler($c, self::convertGetToPost($r));
            };
        };
    }

    /**
     * Converts default GET request to a POST request
     *
     * Avoiding length restriction in query
     *
     * @param RequestInterface $r GET request to be converted
     * @return RequestInterface $req converted POST request
     */
    public static function convertGetToPost(RequestInterface $r)
    {
        if ($r->getMethod() === 'POST') {
            return $r;
        }

        $query = $r->getUri()->getQuery();
        $req = $r->withMethod('POST')
            ->withBody(Psr7\Utils::streamFor($query))
            ->withHeader('Content-Length', (string) strlen($query))
            ->withHeader('Content-Type', 'application/x-www-form-urlencoded')
            ->withUri($r->getUri()->withQuery(''));
        return $req;
    }
}
