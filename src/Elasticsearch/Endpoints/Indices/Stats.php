<?php
/**
 * User: zach
 * Date: 05/31/2013
 * Time: 16:47:11 pm
 */

namespace Elasticsearch\Endpoints\Indices;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class Stats
 * @package Elasticsearch\Endpoints\Indices
 */
class Stats extends AbstractEndpoint
{

    /**
     *TODO Validate auto-generated file
     *     Implement per-class specific functions if required

{
  "indices.stats": {
    "documentation": "http://elasticsearch.org/guide/reference/api/admin-indices-stats/",
    "methods": ["GET"],
    "url": {
      "path": "/_stats",
      "paths": ["/_stats", "/{index}/_stats", "_stats/{metric_family}", "/{index}/_stats/{metric_family}", "/_stats/indexing", "/{index}/_stats/indexing", "/_stats/indexing/{indexing_types}", "/_stats/search/{search_groups}", "/{index}/_stats/search/{search_groups}", "/_stats/fielddata/{fields}", "/{index}/_stats/fielddata/{fields}"],
      "parts": {
        "fields": {
          "type" : "list",
          "description" : "A comma-separated list of fields to return detailed information for, when returning the `search` statistics"
        },
        "index": {
          "type" : "list",
          "description" : "A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices"
        },
        "indexing_types" : {
          "type" : "list",
          "description" : "A comma-separated list of document types to include in the `indexing` statistics"
        },
        "metric_family" : {
          "type" : "enum",
          "values" : ["docs", "fielddata", "fields", "filter_cache", "flush", "get", "groups", "id_cache", "ignore_indices", "indexing", "merge", "refresh", "search", "store", "warmer"],
          "description" : "Limit the information returned to a specific metric"
        },
        "search_groups" : {
          "type" : "list",
          "description" : "A comma-separated list of search groups to include in the `search` statistics"
        }
      },
      "params": {
        "all": {
          "type" : "boolean",
          "description" : "Return all available information"
        },
        "clear": {
          "type" : "boolean",
          "description" : "Reset the default level of detail"
        },
        "docs": {
          "type" : "boolean",
          "description" : "Return information about indexed and deleted documents"
        },
        "fielddata": {
          "type" : "boolean",
          "description" : "Return information about field data"
        },
        "fields": {
          "type" : "boolean",
          "description" : "A comma-separated list of fields for `fielddata` metric (supports wildcards)"
        },
        "filter_cache": {
          "type" : "boolean",
          "description" : "Return information about filter cache"
        },
        "flush": {
          "type" : "boolean",
          "description" : "Return information about flush operations"
        },
        "get": {
          "type" : "boolean",
          "description" : "Return information about get operations"
        },
        "groups": {
          "type" : "boolean",
          "description" : "A comma-separated list of search groups for `search` statistics"
        },
        "id_cache": {
          "type" : "boolean",
          "description" : "Return information about ID cache"
        },
        "ignore_indices": {
          "type" : "enum",
          "options" : ["none","missing"],
          "default" : "none",
          "description" : "When performed on multiple indices, allows to ignore `missing` ones"
        },
        "indexing": {
          "type" : "boolean",
          "description" : "Return information about indexing operations"
        },
        "merge": {
          "type" : "boolean",
          "description" : "Return information about merge operations"
        },
        "refresh": {
          "type" : "boolean",
          "description" : "Return information about refresh operations"
        },
        "search": {
          "type" : "boolean",
          "description" : "Return information about search operations; use the `groups` parameter to include information for specific search groups"
        },
        "store": {
          "type" : "boolean",
          "description" : "Return information about the size of the index"
        },
        "warmer": {
          "type" : "boolean",
          "description" : "Return information about warmers"
        }
      }
    },
    "body": null
  }
}


     */


    /**
     * @return string
     */
    protected function getURI()
    {

        $fields = $this->fields;
        $index = $this->index;
        $indexing_types = $this->indexing_types;
        $metric_family = $this->metric_family;
        $search_groups = $this->search_groups;
        $uri   = "/_stats";

        if (isset($fields) === true) {
            $uri = "/$index/_stats";
        } elseif (isset($index) === true && isset($fields) === true) {
            $uri = "_stats/$metric_family";
        }
 elseif (isset($indexing_types) === true && isset($index) === true && isset($fields) === true) {
            $uri = "/$index/_stats/$metric_family";
        }
 elseif (isset($metric_family) === true && isset($indexing_types) === true && isset($index) === true && isset($fields) === true) {
            $uri = "/_stats/indexing";
        }
 elseif (isset($search_groups) === true && isset($metric_family) === true && isset($indexing_types) === true && isset($index) === true && isset($fields) === true) {
            $uri = "/$index/_stats/indexing";
        }

        return $uri;
    }

    /**
     * @return string[]
     */
    protected function getParamWhitelist()
    {
        return array(
            'all',
            'clear',
            'docs',
            'fielddata',
            'fields',
            'filter_cache',
            'flush',
            'get',
            'groups',
            'id_cache',
            'ignore_indices',
            'indexing',
            'merge',
            'refresh',
            'search',
            'store',
            'warmer',
        );
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        return 'GET';
    }
}