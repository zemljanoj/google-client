<?php
/**
 * Copyright (c) 2018.
 * @author Andrey Inyagin <zemljanoj.i@gmail.com>
 */
namespace Zemljanoj\GoogleClient\Api\Data;
/**
 * Interface \Zemljanoj\GoogleClient\Api\Data\ClientConfigInterface
 */
interface ClientConfigInterface
{
    /**
     * Get json file path.
     * @return string
     */
    public function getCredentials();

    /**
     * Set json file path.
     * @see https://console.developers.google.com/apis/credentials
     * use service credential
     * @param string $credentials
     * @return $this
     */
    public function setCredentials($credentials);

    /**
     * Get scopes.
     * @see \Google_Service_Sheets constants
     * @return array
     */
    public function getScopes();

    /**
     * Set scopes.
     * @see https://console.developers.google.com/apis/credentials
     * use service credential
     * @param array $scopes
     * @return $this
     */
    public function setScopes(array $scopes);
}