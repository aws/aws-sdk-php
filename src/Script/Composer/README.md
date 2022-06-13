## Removing Unused Services
**NOTE:** This feature is currently in beta. If you have general questions about usage or would like to report a 
bug, please open an issue with us [here](https://github.com/aws/aws-sdk-php/issues/new/choose). If 
you have feedback on the implementation, please visit the [open discussion](https://github.com/aws/aws-sdk-php/discussions/2420) 
we have on the topic.

To avoid shipping unused services, specify which services you would like to keep in your `composer.json` file and
use the `Aws\\Script\\Composer::removeUnusedServices` script.   

```
{
    "require": {
        "aws/aws-sdk-php": "<version here>"
    },
    "scripts": {
        "pre-autoload-dump": "Aws\\Script\\Composer\\Composer::removeUnusedServices"
    },
    "extra": {
        "aws/aws-sdk-php": [
            "S3",
            "CloudWatch"
        ]
    }
}
```

In this example, all services will be removed except for S3 and CloudWatch.  When listing a
service, keep in mind that an exact match is needed on the client namespace, otherwise, an error will be
thrown. For a list of client namespaces, please see the `Namespaces` list in the 
[documentation](https://docs.aws.amazon.com/aws-sdk-php/v3/api/index.html). Run `composer install` or `composer update` 
to start service removal.  

**NOTE:** If you accidentally remove a service you'd like to keep, you will need to reinstall the SDK.
We suggest using `composer reinstall aws/aws-sdk-php`.





