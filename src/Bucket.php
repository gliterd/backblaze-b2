<?php

namespace BackblazeB2;

class Bucket
{
    const TYPE_PUBLIC = 'allPublic';
    const TYPE_PRIVATE = 'allPrivate';

    protected $id;
    protected $name;
    protected $type;
    protected $options;
    protected $corsRules;

    /**
     * Bucket constructor.
     *
     * @param $id
     * @param $name
     * @param $type
     * @param $options
     * @param $corsRules
     */
    public function __construct($id, $name, $type, $options, $corsRules)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->options = $options;
        $this->corsRules = $corsRules;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function getCorsRules()
    {
        return $this->corsRules;
    }

    public function isS3Compatible()
    {
        return in_array('s3', $this->getOptions());
    }
}
