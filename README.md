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
```
#### Returns a bucket details
``` php
$bucket = $client->createBucket([
    'BucketName' => 'my-special-bucket',
    'BucketType' => Bucket::TYPE_PRIVATE // or TYPE_PUBLIC
]);
```

#### Change the bucket Type
``` php
$updatedBucket = $client->updateBucket([
    'BucketId' => $bucket->getId(),
    'BucketType' => Bucket::TYPE_PUBLIC
]);
```

#### List all buckets
``` php
$buckets = $client->listBuckets();
```
#### Delete a bucket
``` php
$client->deleteBucket([
    'BucketId' => 'YOUR_BUCKET_ID'
]);
```

#### File Upload
``` php
$file = $client->upload([
    'BucketName' => 'my-special-bucket',
    'FileName' => 'path/to/upload/to',
    'Body' => 'I am the file content'

    // The file content can also be provided via a resource.
    // 'Body' => fopen('/path/to/input', 'r')
]);
```

#### File Download
``` php
$fileContent = $client->download([
    'FileId' => $file->getId()

    // Can also identify the file via bucket and path:
    // 'BucketName' => 'my-special-bucket',
    // 'FileName' => 'path/to/file'

    // Can also save directly to a location on disk. This will cause download() to not return file content.
    // 'SaveAs' => '/path/to/save/location'
]);
```

#### File Delete
``` php
$fileDelete = $client->deleteFile([
    'FileId' => $file->getId()

    // Can also identify the file via bucket and path:
    // 'BucketName' => 'my-special-bucket',
    // 'FileName' => 'path/to/file'
]);
```

#### List all files
``` php
$fileList = $client->listFiles([
    'BucketId' => 'YOUR_BUCKET_ID'
]);
```


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

```bash
$ vendor/bin/phpunit
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email mhetreramesh@gmail.com instead of using the issue tracker.

## Credits

- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
