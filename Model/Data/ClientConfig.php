<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Model\Data;
/**
 * Class \Zemljanoj\GoogleClient\Model\Data\ClientConfig
 */
class ClientConfig implements \Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface
{
    /**
     * @var string
     */
    private $credential = '';

    /**
     * @var array
     */
    private $scopes = [];

    /**
     * {@inheritdoc}
     */
    public function getCredentials()
    {
        return $this->credential;
    }

    /**
     * {@inheritdoc}
     */
    public function setCredentials($credential)
    {
        $this->credential = $credential;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getScopes ()
    {
        return $this->scopes;
    }

    /**
     * {@inheritdoc}
     */
    public function setScopes(array $scopes)
    {
        $this->scopes = $scopes;

        return $this;
    }
}