<?php
namespace Aws\AppMesh;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS App Mesh** service.
 * @method \Aws\Result createMesh(array $args = [])
 * @phpstan-method \Aws\Result createMesh(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     spec?: array{
 *         egressFilter?: array{type?: 'ALLOW_ALL'|'DROP_ALL', ...},
 *         serviceDiscovery?: array{ipPreference?: 'IPv4_ONLY'|'IPv4_PREFERRED'|'IPv6_ONLY'|'IPv6_PREFERRED', ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMeshAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMeshAsync(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     spec?: array{
 *         egressFilter?: array{type?: 'ALLOW_ALL'|'DROP_ALL', ...},
 *         serviceDiscovery?: array{ipPreference?: 'IPv4_ONLY'|'IPv4_PREFERRED'|'IPv6_ONLY'|'IPv6_PREFERRED', ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRoute(array $args = [])
 * @phpstan-method \Aws\Result createRoute(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     routeName?: string,
 *     spec?: array{
 *         grpcRoute?: array{action?: array, match?: array, retryPolicy?: array, timeout?: array, ...},
 *         http2Route?: array{action?: array, match?: array, retryPolicy?: array, timeout?: array, ...},
 *         httpRoute?: array{action?: array, match?: array, retryPolicy?: array, timeout?: array, ...},
 *         priority?: int,
 *         tcpRoute?: array{action?: array, match?: array, timeout?: array, ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     virtualRouterName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRouteAsync(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     routeName?: string,
 *     spec?: array{
 *         grpcRoute?: array{action?: array, match?: array, retryPolicy?: array, timeout?: array, ...},
 *         http2Route?: array{action?: array, match?: array, retryPolicy?: array, timeout?: array, ...},
 *         httpRoute?: array{action?: array, match?: array, retryPolicy?: array, timeout?: array, ...},
 *         priority?: int,
 *         tcpRoute?: array{action?: array, match?: array, timeout?: array, ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     virtualRouterName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVirtualNode(array $args = [])
 * @phpstan-method \Aws\Result createVirtualNode(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{
 *         backendDefaults?: array{clientPolicy?: array, ...},
 *         backends?: list<array>,
 *         listeners?: list<array>,
 *         logging?: array{accessLog?: array, ...},
 *         serviceDiscovery?: array{awsCloudMap?: array, dns?: array, ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     virtualNodeName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVirtualNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVirtualNodeAsync(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{
 *         backendDefaults?: array{clientPolicy?: array, ...},
 *         backends?: list<array>,
 *         listeners?: list<array>,
 *         logging?: array{accessLog?: array, ...},
 *         serviceDiscovery?: array{awsCloudMap?: array, dns?: array, ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     virtualNodeName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVirtualRouter(array $args = [])
 * @phpstan-method \Aws\Result createVirtualRouter(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{listeners?: list<array>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     virtualRouterName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVirtualRouterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVirtualRouterAsync(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{listeners?: list<array>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     virtualRouterName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteMesh(array $args = [])
 * @phpstan-method \Aws\Result deleteMesh(array{meshName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMeshAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMeshAsync(array{meshName?: string, ...} $args = [])
 * @method \Aws\Result deleteRoute(array $args = [])
 * @phpstan-method \Aws\Result deleteRoute(array{meshName?: string, meshOwner?: string, routeName?: string, virtualRouterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRouteAsync(array{meshName?: string, meshOwner?: string, routeName?: string, virtualRouterName?: string, ...} $args = [])
 * @method \Aws\Result deleteVirtualNode(array $args = [])
 * @phpstan-method \Aws\Result deleteVirtualNode(array{meshName?: string, meshOwner?: string, virtualNodeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVirtualNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVirtualNodeAsync(array{meshName?: string, meshOwner?: string, virtualNodeName?: string, ...} $args = [])
 * @method \Aws\Result deleteVirtualRouter(array $args = [])
 * @phpstan-method \Aws\Result deleteVirtualRouter(array{meshName?: string, meshOwner?: string, virtualRouterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVirtualRouterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVirtualRouterAsync(array{meshName?: string, meshOwner?: string, virtualRouterName?: string, ...} $args = [])
 * @method \Aws\Result describeMesh(array $args = [])
 * @phpstan-method \Aws\Result describeMesh(array{meshName?: string, meshOwner?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMeshAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMeshAsync(array{meshName?: string, meshOwner?: string, ...} $args = [])
 * @method \Aws\Result describeRoute(array $args = [])
 * @phpstan-method \Aws\Result describeRoute(array{meshName?: string, meshOwner?: string, routeName?: string, virtualRouterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRouteAsync(array{meshName?: string, meshOwner?: string, routeName?: string, virtualRouterName?: string, ...} $args = [])
 * @method \Aws\Result describeVirtualNode(array $args = [])
 * @phpstan-method \Aws\Result describeVirtualNode(array{meshName?: string, meshOwner?: string, virtualNodeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVirtualNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVirtualNodeAsync(array{meshName?: string, meshOwner?: string, virtualNodeName?: string, ...} $args = [])
 * @method \Aws\Result describeVirtualRouter(array $args = [])
 * @phpstan-method \Aws\Result describeVirtualRouter(array{meshName?: string, meshOwner?: string, virtualRouterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVirtualRouterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVirtualRouterAsync(array{meshName?: string, meshOwner?: string, virtualRouterName?: string, ...} $args = [])
 * @method \Aws\Result listMeshes(array $args = [])
 * @phpstan-method \Aws\Result listMeshes(array{limit?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listMeshesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMeshesAsync(array{limit?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRoutes(array $args = [])
 * @phpstan-method \Aws\Result listRoutes(array{limit?: int, meshName?: string, meshOwner?: string, nextToken?: string, virtualRouterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoutesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoutesAsync(array{limit?: int, meshName?: string, meshOwner?: string, nextToken?: string, virtualRouterName?: string, ...} $args = [])
 * @method \Aws\Result listVirtualNodes(array $args = [])
 * @phpstan-method \Aws\Result listVirtualNodes(array{limit?: int, meshName?: string, meshOwner?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVirtualNodesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVirtualNodesAsync(array{limit?: int, meshName?: string, meshOwner?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listVirtualRouters(array $args = [])
 * @phpstan-method \Aws\Result listVirtualRouters(array{limit?: int, meshName?: string, meshOwner?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVirtualRoutersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVirtualRoutersAsync(array{limit?: int, meshName?: string, meshOwner?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result updateRoute(array $args = [])
 * @phpstan-method \Aws\Result updateRoute(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     routeName?: string,
 *     spec?: array{
 *         grpcRoute?: array{action?: array, match?: array, retryPolicy?: array, timeout?: array, ...},
 *         http2Route?: array{action?: array, match?: array, retryPolicy?: array, timeout?: array, ...},
 *         httpRoute?: array{action?: array, match?: array, retryPolicy?: array, timeout?: array, ...},
 *         priority?: int,
 *         tcpRoute?: array{action?: array, match?: array, timeout?: array, ...},
 *         ...,
 *     },
 *     virtualRouterName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRouteAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRouteAsync(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     routeName?: string,
 *     spec?: array{
 *         grpcRoute?: array{action?: array, match?: array, retryPolicy?: array, timeout?: array, ...},
 *         http2Route?: array{action?: array, match?: array, retryPolicy?: array, timeout?: array, ...},
 *         httpRoute?: array{action?: array, match?: array, retryPolicy?: array, timeout?: array, ...},
 *         priority?: int,
 *         tcpRoute?: array{action?: array, match?: array, timeout?: array, ...},
 *         ...,
 *     },
 *     virtualRouterName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVirtualNode(array $args = [])
 * @phpstan-method \Aws\Result updateVirtualNode(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{
 *         backendDefaults?: array{clientPolicy?: array, ...},
 *         backends?: list<array>,
 *         listeners?: list<array>,
 *         logging?: array{accessLog?: array, ...},
 *         serviceDiscovery?: array{awsCloudMap?: array, dns?: array, ...},
 *         ...,
 *     },
 *     virtualNodeName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVirtualNodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVirtualNodeAsync(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{
 *         backendDefaults?: array{clientPolicy?: array, ...},
 *         backends?: list<array>,
 *         listeners?: list<array>,
 *         logging?: array{accessLog?: array, ...},
 *         serviceDiscovery?: array{awsCloudMap?: array, dns?: array, ...},
 *         ...,
 *     },
 *     virtualNodeName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVirtualRouter(array $args = [])
 * @phpstan-method \Aws\Result updateVirtualRouter(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{listeners?: list<array>, ...},
 *     virtualRouterName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVirtualRouterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVirtualRouterAsync(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{listeners?: list<array>, ...},
 *     virtualRouterName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createGatewayRoute(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result createGatewayRoute(array{
 *     clientToken?: string,
 *     gatewayRouteName?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{
 *         grpcRoute?: array{action?: array, match?: array, ...},
 *         http2Route?: array{action?: array, match?: array, ...},
 *         httpRoute?: array{action?: array, match?: array, ...},
 *         priority?: int,
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     virtualGatewayName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createGatewayRouteAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise createGatewayRouteAsync(array{
 *     clientToken?: string,
 *     gatewayRouteName?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{
 *         grpcRoute?: array{action?: array, match?: array, ...},
 *         http2Route?: array{action?: array, match?: array, ...},
 *         httpRoute?: array{action?: array, match?: array, ...},
 *         priority?: int,
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     virtualGatewayName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVirtualGateway(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result createVirtualGateway(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{
 *         backendDefaults?: array{clientPolicy?: array, ...},
 *         listeners?: list<array>,
 *         logging?: array{accessLog?: array, ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     virtualGatewayName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVirtualGatewayAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise createVirtualGatewayAsync(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{
 *         backendDefaults?: array{clientPolicy?: array, ...},
 *         listeners?: list<array>,
 *         logging?: array{accessLog?: array, ...},
 *         ...,
 *     },
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     virtualGatewayName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVirtualService(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result createVirtualService(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{provider?: array{virtualNode?: array, virtualRouter?: array, ...}, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     virtualServiceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVirtualServiceAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise createVirtualServiceAsync(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{provider?: array{virtualNode?: array, virtualRouter?: array, ...}, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     virtualServiceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteGatewayRoute(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result deleteGatewayRoute(array{gatewayRouteName?: string, meshName?: string, meshOwner?: string, virtualGatewayName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGatewayRouteAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteGatewayRouteAsync(array{gatewayRouteName?: string, meshName?: string, meshOwner?: string, virtualGatewayName?: string, ...} $args = [])
 * @method \Aws\Result deleteVirtualGateway(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result deleteVirtualGateway(array{meshName?: string, meshOwner?: string, virtualGatewayName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVirtualGatewayAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVirtualGatewayAsync(array{meshName?: string, meshOwner?: string, virtualGatewayName?: string, ...} $args = [])
 * @method \Aws\Result deleteVirtualService(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result deleteVirtualService(array{meshName?: string, meshOwner?: string, virtualServiceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVirtualServiceAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVirtualServiceAsync(array{meshName?: string, meshOwner?: string, virtualServiceName?: string, ...} $args = [])
 * @method \Aws\Result describeGatewayRoute(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result describeGatewayRoute(array{gatewayRouteName?: string, meshName?: string, meshOwner?: string, virtualGatewayName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGatewayRouteAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeGatewayRouteAsync(array{gatewayRouteName?: string, meshName?: string, meshOwner?: string, virtualGatewayName?: string, ...} $args = [])
 * @method \Aws\Result describeVirtualGateway(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result describeVirtualGateway(array{meshName?: string, meshOwner?: string, virtualGatewayName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVirtualGatewayAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVirtualGatewayAsync(array{meshName?: string, meshOwner?: string, virtualGatewayName?: string, ...} $args = [])
 * @method \Aws\Result describeVirtualService(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result describeVirtualService(array{meshName?: string, meshOwner?: string, virtualServiceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeVirtualServiceAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise describeVirtualServiceAsync(array{meshName?: string, meshOwner?: string, virtualServiceName?: string, ...} $args = [])
 * @method \Aws\Result listGatewayRoutes(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result listGatewayRoutes(array{
 *     limit?: int,
 *     meshName?: string,
 *     meshOwner?: string,
 *     nextToken?: string,
 *     virtualGatewayName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listGatewayRoutesAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise listGatewayRoutesAsync(array{
 *     limit?: int,
 *     meshName?: string,
 *     meshOwner?: string,
 *     nextToken?: string,
 *     virtualGatewayName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result listTagsForResource(array{limit?: int, nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{limit?: int, nextToken?: string, resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listVirtualGateways(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result listVirtualGateways(array{limit?: int, meshName?: string, meshOwner?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVirtualGatewaysAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise listVirtualGatewaysAsync(array{limit?: int, meshName?: string, meshOwner?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listVirtualServices(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result listVirtualServices(array{limit?: int, meshName?: string, meshOwner?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVirtualServicesAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise listVirtualServicesAsync(array{limit?: int, meshName?: string, meshOwner?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateGatewayRoute(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result updateGatewayRoute(array{
 *     clientToken?: string,
 *     gatewayRouteName?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{
 *         grpcRoute?: array{action?: array, match?: array, ...},
 *         http2Route?: array{action?: array, match?: array, ...},
 *         httpRoute?: array{action?: array, match?: array, ...},
 *         priority?: int,
 *         ...,
 *     },
 *     virtualGatewayName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewayRouteAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGatewayRouteAsync(array{
 *     clientToken?: string,
 *     gatewayRouteName?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{
 *         grpcRoute?: array{action?: array, match?: array, ...},
 *         http2Route?: array{action?: array, match?: array, ...},
 *         httpRoute?: array{action?: array, match?: array, ...},
 *         priority?: int,
 *         ...,
 *     },
 *     virtualGatewayName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMesh(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result updateMesh(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     spec?: array{
 *         egressFilter?: array{type?: 'ALLOW_ALL'|'DROP_ALL', ...},
 *         serviceDiscovery?: array{ipPreference?: 'IPv4_ONLY'|'IPv4_PREFERRED'|'IPv6_ONLY'|'IPv6_PREFERRED', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMeshAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMeshAsync(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     spec?: array{
 *         egressFilter?: array{type?: 'ALLOW_ALL'|'DROP_ALL', ...},
 *         serviceDiscovery?: array{ipPreference?: 'IPv4_ONLY'|'IPv4_PREFERRED'|'IPv6_ONLY'|'IPv6_PREFERRED', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVirtualGateway(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result updateVirtualGateway(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{
 *         backendDefaults?: array{clientPolicy?: array, ...},
 *         listeners?: list<array>,
 *         logging?: array{accessLog?: array, ...},
 *         ...,
 *     },
 *     virtualGatewayName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVirtualGatewayAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVirtualGatewayAsync(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{
 *         backendDefaults?: array{clientPolicy?: array, ...},
 *         listeners?: list<array>,
 *         logging?: array{accessLog?: array, ...},
 *         ...,
 *     },
 *     virtualGatewayName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVirtualService(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \Aws\Result updateVirtualService(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{provider?: array{virtualNode?: array, virtualRouter?: array, ...}, ...},
 *     virtualServiceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVirtualServiceAsync(array $args = []) (supported in versions 2019-01-25)
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVirtualServiceAsync(array{
 *     clientToken?: string,
 *     meshName?: string,
 *     meshOwner?: string,
 *     spec?: array{provider?: array{virtualNode?: array, virtualRouter?: array, ...}, ...},
 *     virtualServiceName?: string,
 *     ...,
 * } $args = [])
 */
class AppMeshClient extends AwsClient {}
