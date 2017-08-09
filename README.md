## Backblaze B2 for PHP

`backblaze-b2` is a client library for working with Backblaze's B2 storage service. It aims to make using the service as
easy as possible by exposing a clear API and taking influence from other SDKs that you may be familiar with.

## Install

Via Composer

``` bash
$ composer require gliterd/backblaze-b2
```

## Usage

``` php
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

MIT.
