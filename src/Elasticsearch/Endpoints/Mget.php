<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Mget
 * @package Elasticsearch\Endpoints
 */
class Mget extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "mget": {
    "documentation": "http://elasticsearch.org/guide/reference/api/multi-get/",
    "methods": ["GET", "POST"],
    "url": {
      "path": "/_mget",
      "paths": ["/_mget", "/{index}/_mget", "/{index}/{type}/_mget"],
      "parts": {
        "index": {
          "type" : "string",
          "description" : "The name of the index"
        },
        "type": {
          "type" : "string",
          "description" : "The type of the document"
        }
      },
      "params": {
        "fields": {
          "type": "list",
          "description" : "A comma-separated list of fields to return in the response"
        },
        "parent": {
          "type" : "string",
          "description" : "The ID of the parent document"
        },
        "preference": {
          "type" : "string",
          "description" : "Specify the shards the operation should be performed on (default: random shard)"
        },
        "realtime": {
          "type" : "boolean",
          "description" : "Specify whether to perform the operation in realtime or search mode"
        },
        "refresh": {
          "type" : "boolean",
          "description" : "Refresh the shard containing the document before performing the operation"
        },
        "routing": {
          "type" : "string",
          "description" : "Specific routing value"
        }
      }
    },
    "body": {
      "description" : "Document identifiers; can be either `docs` (containing full document information) or `ids` (when index and type is provided in the URL."
    }
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $index = $this->index;
        $type = $this->type;
        $uri   = "/_mget";

        if (isset($index) === true) {
            $uri = "/$index/_mget";
        } elseif (isset($type) === true && isset($index) === true) {
            $uri = "/$index/$type/_mget";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'fields',
            'parent',
            'preference',
            'realtime',
            'refresh',
            'routing',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        //TODO Fix Me!
        return 'GET,POST';
    }
}