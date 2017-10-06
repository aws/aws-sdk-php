========
Glossary
========

API Version
    Services have one or more API versions, and which version you are using
    dictates which operations and parameters are valid. API versions are
    formatted like a date. For example, the latest API version for Amazon S3 is
    ``2006-03-01``. You must :ref:`specify a version <cfg_version>` when you
    configure a client object.

Client
    Client objects are used to execute operations for a service. Each service
    that is supported in the SDK has a corresponding client object. Client
    objects have methods that correspond one-to-one with the service operations.
    See the :doc:`basic usage guide </getting-started/basic-usage>` for details
    on how to create and use client objects.

Command
    Command objects encapsulate the execution of an operation. When following
    the :doc:`basic usage patterns </getting-started/basic-usage>` of the SDK,
    you will not deal directly with command objects. Command objects can be
    accessed using the ``getCommand()`` method of a client, in order to use
    advanced features of the SDK like concurrent requests and batching. See
    the :doc:`/guide/commands` guide for more details.

Credentials
    To interact with AWS services, you must authenticate with the service using
    your credentials, or `AWS access keys
    <http://aws.amazon.com/developers/access-keys/>`_. Your access keys consist
    of two parts: your access key ID, which identifies your account, and your
    secret access, which is used to create **signatures** when executing
    operations. You must :doc:`provide credentials </guide/credentials>` when
    you configure a client object.

Handler
    .. include:: _snippets/handler-description.txt

JMESPath
    `JMESPath <http://jmespath.org/>`_ is a query language for JSON-like data.
    The AWS SDK for PHP uses JMESPath expressions to query PHP data structures.
    JMESPath expressions can be used directly on ``Aws\Result`` and
    ``Aws\ResultPaginator`` objects via the ``search($expression)`` method.

Middleware
    .. include:: _snippets/middleware-description.txt

Operation
    Refers to a single operation within a service's API (e.g., ``CreateTable``
    for DynamoDB, ``RunInstances`` for EC2). In the SDK, operations are
    executed by calling a method of the same name on the corresponding service's
    client object. Executing an operation involves preparing and sending an HTTP
    request to the service and parsing the response. This process of executing
    an operation is abstracted by the SDK via **command** objects.

Paginator
    Some AWS service operations are paginated and respond with truncated
    results. For example, Amazon S3's ``ListObjects`` operation only returns up
    to 1000 objects at a time. Operations like these require making subsequent
    requests with token (or marker) parameters to retrieve the entire set of
    results. Paginators are a feature of the SDK that act as an abstraction over
    this process to make it easier for developers to use paginated APIs. They
    are accessed via the ``getPaginator()`` method of the client. See the
    :doc:`/guide/paginators` guide for more details.

Promise
    A promise represents the eventual result of an asynchronous operation. The
    primary way of interacting with a promise is through its then method, which
    registers callbacks to receive either a promise's eventual value or the
    reason why the promise cannot be fulfilled.

Region
    Services are supported in `one or more geographical regions
    <http://docs.aws.amazon.com/general/latest/gr/rande.html>`_. Services may
    have different endpoints/URLs in each region, which exist to reduce data
    latency in your applications. You must :ref:`provide a region <cfg_region>`
    when you configure a client object, so that the SDK can determine which
    endpoint to use with the service.

SDK
    The term "SDK" can refer to the AWS SDK for PHP library as a whole, but also
    refers to the ``Aws\Sdk`` class `(docs)
    <http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Aws.Sdk.html>`_, which
    acts as a factory for the client objects for each **service**. The ``Sdk``
    class also let's you provide a set of :doc:`global configuration values
    </guide/configuration>` that are applied to all client objects that it
    creates.

Service
    A general way to refer to any of the AWS services (e.g., Amazon S3, Amazon
    DynamoDB, AWS OpsWorks, etc.). Each service has a corresponding **client**
    object in the SDK that supports one or more **API versions**. Each service
    also has one or more **operations** that make up its API. Services are
    supported in one or more **regions**.

Signature
    When executing operations, the SDK uses your credentials to create a digital
    signature of your request. The service then verifies the signature before
    processing your request. The signing process is encapsulated by the SDK, and
    happens automatically using the credentials you configure for the client.

Waiter
    Waiters are a feature of the SDK that make it easier to work with operations
    that change the state of a resource and that are *eventually consistent* or
    *asynchronous* in nature. For example, the Amazon DynamoDB ``CreateTable``
    operation sends a response back immediately, but the table may not be ready
    to access for several seconds. Executing a waiter allows you to wait until a
    resource enters into a particular state by sleeping and polling the
    resource's status. Waiters are accessed using the ``waitUntil()`` method of
    the client. See the :doc:`/guide/waiters` guide for more details.
