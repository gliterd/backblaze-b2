## Backblaze B2 for PHP

`backblaze-b2` is a client library for working with Backblaze's B2 storage service.
[![Latest Version on Packagist](https://img.shields.io/packagist/v/gliterd/backblaze-b2.svg?style=flat-square)](https://packagist.org/packages/gliterd/backblaze-b2)
[![Software License][ico-license]](LICENSE.md)
[![Build Status](https://img.shields.io/travis/gliterd/backblaze-b2/master.svg?style=flat-square)](https://travis-ci.org/gliterd/backblaze-b2)
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads](https://img.shields.io/packagist/dt/gliterd/backblaze-b2.svg?style=flat-square)](https://packagist.org/packages/gliterd/backblaze-b2)


## Example

This is just a short example, full examples to come on the wiki.

```php
use BackblazeB2\Client;
use BackblazeB2\Bucket;

$client = new Client('accountId', 'applicationKey');

// Returns a Bucket object.
$bucket = $client->createBucket([
    'BucketName' => 'my-special-bucket',
    'BucketType' => Bucket::TYPE_PRIVATE // or TYPE_PUBLIC
]);

// Change the bucket to private. Also returns a Bucket object.
$updatedBucket = $client->updateBucket([
    'BucketId' => $bucket->getId(),
    'BucketType' => Bucket::TYPE_PUBLIC
]);

// Retrieve an array of Bucket objects on your account.
$buckets = $client->listBuckets();

// Delete a bucket.
$client->deleteBucket([
    'BucketId' => '4c2b957661da9c825f465e1b'
]);

// Upload a file to a bucket. Returns a File object.
$file = $client->upload([
    'BucketName' => 'my-special-bucket',
    'FileName' => 'path/to/upload/to',
    'Body' => 'I am the file content'

    // The file content can also be provided via a resource.
    // 'Body' => fopen('/path/to/input', 'r')
]);

// Download a file from a bucket. Returns the file content.
$fileContent = $client->download([
    'FileId' => $file->getId()

    // Can also identify the file via bucket and path:
    // 'BucketName' => 'my-special-bucket',
    // 'FileName' => 'path/to/file'

    // Can also save directly to a location on disk. This will cause download() to not return file content.
    // 'SaveAs' => '/path/to/save/location'
]);

// Delete a file from a bucket. Returns true or false.
$fileDelete = $client->deleteFile([
    'FileId' => $file->getId()
    
    // Can also identify the file via bucket and path:
    // 'BucketName' => 'my-special-bucket',
    // 'FileName' => 'path/to/file'
]);

// Retrieve an array of file objects from a bucket.
$fileList = $client->listFiles([
    'BucketId' => '4d2dbbe08e1e983c5e6f0d12'
]);
```

## Installation

Installation is via Composer:

```bash
$ composer require gliterd/backblaze-b2
```

## Tests

Tests are run with PHPUnit. After installing PHPUnit via Composer:

```bash
$ vendor/bin/phpunit
```

## Contributors

Feel free to contribute in any way you can whether that be reporting issues, making suggestions or sending PRs. :)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/gliterd/backblaze-b2.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/gliterd/backblaze-b2/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/gliterd/backblaze-b2.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/gliterd/backblaze-b2.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/gliterd/backblaze-b2.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/gliterd/backblaze-b2
[link-travis]: https://travis-ci.org/gliterd/backblaze-b2
[link-scrutinizer]: https://scrutinizer-ci.com/g/gliterd/backblaze-b2/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/gliterd/backblaze-b2
[link-downloads]: https://packagist.org/packages/gliterd/backblaze-b2
[link-author]: https://github.com/gliterd
[link-contributors]: ../../contributors

