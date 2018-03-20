<?php
namespace Aws\MediaLive;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaLive** service.
 * @method \Aws\Result createChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @method \Aws\Result createInput(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createInputAsync(array $args = [])
 * @method \Aws\Result createInputSecurityGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createInputSecurityGroupAsync(array $args = [])
 * @method \Aws\Result deleteChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelAsync(array $args = [])
 * @method \Aws\Result deleteInput(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInputAsync(array $args = [])
 * @method \Aws\Result deleteInputSecurityGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInputSecurityGroupAsync(array $args = [])
 * @method \Aws\Result describeChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelAsync(array $args = [])
 * @method \Aws\Result describeInput(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInputAsync(array $args = [])
 * @method \Aws\Result describeInputSecurityGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInputSecurityGroupAsync(array $args = [])
 * @method \Aws\Result listChannels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @method \Aws\Result listInputSecurityGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listInputSecurityGroupsAsync(array $args = [])
 * @method \Aws\Result listInputs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listInputsAsync(array $args = [])
 * @method \Aws\Result startChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise startChannelAsync(array $args = [])
 * @method \Aws\Result stopChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise stopChannelAsync(array $args = [])
 * @method \Aws\Result updateChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @method \Aws\Result updateInput(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInputAsync(array $args = [])
 * @method \Aws\Result updateInputSecurityGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInputSecurityGroupAsync(array $args = [])
 */
class MediaLiveClient extends AwsClient {}
