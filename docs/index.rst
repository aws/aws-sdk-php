===============
AWS SDK for PHP
===============

.. toctree::
    :hidden:

    requirements
    installation
    basic-usage

    concepts
    configuration
    credentials
    commands
    waiters
    paginators
    faq

    service-cloudfront
    service-dynamodb
    feature-dynamodb-session-handler
    service-redshift
    service-s3
    feature-s3-stream-wrapper
    service-sqs
    service-sts

    migration-guide

The **AWS SDK for PHP** enables PHP developers to use
`Amazon Web Services <http://aws.amazon.com/>`_ from their PHP code, and build
robust applications and software using services like Amazon S3, Amazon
DynamoDB, Amazon Glacier, etc. You can get started in minutes by installing the
SDK through Composer — by requiring the ``aws/aws-sdk-php`` package — or by
downloading the standalone `aws.zip <http://pear.amazonwebservices.com/get/aws.zip>`_
or `aws.phar <http://pear.amazonwebservices.com/get/aws.phar>`_ files.

External links: `API Docs <http://docs.aws.amazon.com/aws-sdk-php/v3/api/>`_
| `GitHub <https://github.com/aws/aws-sdk-php>`_
| `Twitter <https://twitter.com/awsforphp>`_
| `Gitter <https://gitter.im/aws/aws-sdk-php>`_
| `Blog <http://blogs.aws.amazon.com/php>`_
| `Forum <https://forums.aws.amazon.com/forum.jspa?forumID=80>`_
| `Packagist <https://packagist.org/packages/aws/aws-sdk-php>`_


Getting Started
---------------

1. :doc:`requirements`
2. :doc:`installation`
3. :doc:`basic-usage`

.. 4. `Sample Project <http://aws.amazon.com/developers/getting-started/php/>`_


SDK Details
-----------

* :doc:`concepts`
* :doc:`configuration`
* :doc:`credentials`
* :doc:`paginators`
* :doc:`waiters`
* :doc:`commands`
* :doc:`faq`
* `Contributing to the SDK <https://github.com/aws/aws-sdk-php/blob/master/CONTRIBUTING.md>`_
* `Guzzle Documentation <http://guzzlephp.org>`_


.. _supported-services:

Supported Services
------------------

- :apiref:`Amazon CloudFront | CloudFront`
  - :doc:`service-cloudfront`
- :apiref:`Amazon CloudWatch | CloudWatch`
- :apiref:`Amazon DynamoDB | DynamoDb`

  - :doc:`service-dynamodb`
  - :doc:`DynamoDB Session Handler <feature-dynamodb-session-handler>`

- :apiref:`Amazon Elastic Compute Cloud (Amazon EC2) | Ec2`
- :apiref:`Amazon Elastic MapReduce (Amazon EMR) | Emr`
- :apiref:`Amazon Elastic Transcoder | ElasticTranscoder`
- :apiref:`Amazon ElastiCache | ElastiCacheClient`
- :apiref:`Amazon Glacier | Glacier`
- :apiref:`Amazon Kinesis | Kinesis`
- :apiref:`Amazon Redshift | Redshift`

  - :doc:`service-redshift`
- :apiref:`Amazon Relational Database Service (Amazon RDS) | Rds`

- :apiref:`Amazon Route 53 | Route53`
- :apiref:`Amazon Simple Email Service (Amazon SES) | Ses`
- :apiref:`Amazon Simple Notification Service (Amazon SNS) | Sns`
- :apiref:`Amazon Simple Queue Service (Amazon SQS) | Sqs`

  - :doc:`service-sqs`

- :apiref:`Amazon Simple Storage Service (Amazon S3) | S3`

  - :doc:`service-s3`
  - :doc:`Amazon S3 Stream Wrapper <feature-s3-stream-wrapper>`

- :apiref:`Amazon Simple Workflow Service (Amazon SWF) | Swf`
- :apiref:`Amazon SimpleDB | SimpleDb`
- :apiref:`Auto Scaling | AutoScaling`
- :apiref:`AWS CloudFormation | CloudFormation`
- :apiref:`AWS CloudTrail | CloudTrail`
- :apiref:`AWS Data Pipeline | DataPipeline`
- :apiref:`AWS Direct Connect | DirectConnect`
- :apiref:`AWS Elastic Beanstalk | ElasticBeanstalk`
- :apiref:`AWS Identity and Access Management (AWS IAM) | Iam`
- :apiref:`AWS Import/Export | ImportExport`
- :apiref:`AWS OpsWorks | OpsWorks`
- :apiref:`AWS Security Token Service (AWS STS) | Sts`

  - :doc:`service-sts`

- :apiref:`AWS Storage Gateway | StorageGateway`
- :apiref:`AWS Support | Support`
- :apiref:`Elastic Load Balancing | ElasticLoadBalancing`
