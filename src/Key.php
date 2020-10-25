<?php

namespace BackblazeB2;

class Key
{
    const PERMISSION_LIST_KEYS = 'listKeys';
    const PERMISSION_WRITE_KEYS = 'writeKeys';
    const PERMISSION_DELETE_KEYS = 'deleteKeys';
    const PERMISSION_LIST_BUCKETS = 'listBuckets';
    const PERMISSION_WRITE_BUCKETS = 'writeBuckets';
    const PERMISSION_DELETE_BUCKETS = 'deleteBuckets';
    const PERMISSION_LIST_FILES = 'listFiles';
    const PERMISSION_READ_FILES = 'readFiles';
    const PERMISSION_SHARE_FILES = 'shareFiles';
    const PERMISSION_WRITE_FILES = 'writeFiles';
    const PERMISSION_DELETE_FILES = 'deleteFiles';

    protected $id;
    protected $name;
    protected $secret;
    protected $capabilities;
    protected $bucketId;
    protected $namePrefix;
    protected $expirationTimestamp;

    /**
     * Key constructor.
     *
     * @param $id
     * @param $name
     * @param $secret
     */
    public function __construct($id, $name, $secret, $capabilities, $bucketId, $namePrefix, $expirationTimestamp)
    {
        $this->id = $id;
        $this->secret = $secret;
        $this->name = $name;
        $this->capabilities = $capabilities;
        $this->bucketId = $bucketId;
        $this->namePrefix = $namePrefix;
        $this->expirationTimestamp = $expirationTimestamp;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSecret()
    {
        return $this->secret;
    }

    public function getCapabilities()
    {
        return $this->capabilities;
    }

    public function getBucketId()
    {
        return $this->bucketId;
    }

    public function getNamePrefix()
    {
        return $this->namePrefix;
    }

    public function getExpirationTimestamp()
    {
        return $this->expirationTimestamp;
    }

}
