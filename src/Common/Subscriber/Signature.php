<?php
namespace Aws\Common\Subscriber;

use Aws\Common\Signature\SignatureInterface;
use Aws\Common\Credentials\CredentialsInterface;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Event\BeforeEvent;

/**
 * Listener used to sign requests before they are sent over the wire
 */
class Signature implements SubscriberInterface
{
    /** @var CredentialsInterface */
    private $credentials;

    /** @var SignatureInterface */
    private $signature;

    /**
     * Construct a new request signing plugin
     *
     * @param CredentialsInterface $credentials Credentials used for signing
     * @param SignatureInterface   $signature   Signature implementation
     */
    public function __construct(
        CredentialsInterface $credentials,
        SignatureInterface $signature
    ) {
        $this->credentials = $credentials;
        $this->signature = $signature;
    }

    public function getEvents()
    {
        return ['before' => ['onBefore', RequestEvents::SIGN_REQUEST]];
    }

    public function onBefore(BeforeEvent $event)
    {
        $this->signature->signRequest($event->getRequest(), $this->credentials);
    }
}
