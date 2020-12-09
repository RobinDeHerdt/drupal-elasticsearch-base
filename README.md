# Composer template for Drupal projects

Available urls:
* http://drupal-elastic.localhost
* http://kibana.drupal-elastic.localhost

## Query examples

The following examples are created with "elasticsearch attachment" & "elasticsearch attachment highlight" processors on

##### Default query, when not using keywords:

```
GET elasticsearch_index_drupal_default/_search
{
  "from": 0,
  "size": 10,
  "query": {
    "bool": {
      "must": []
    }
  },
  "highlight": {
    "fields": {
      "es_attachment.attachment.content": {}
    },
    "pre_tags": [
      "<strong>"
    ],
    "post_tags": [
      "</strong>"
    ]
  }
}
```

##### Query when using keywords:

```
GET elasticsearch_index_drupal_default/_search
{
  "from": 0,
  "size": 10,
  "query": {
    "bool": {
      "filter": {
        "bool": {
          "must": []
        }
      },
      "should": [
        {
          "query_string": {
            "query": "php~",
            "fields": []
          }
        },
        {
          "nested": {
            "path": "es_attachment",
            "query": {
              "bool": {
                "must": {
                  "query_string": {
                    "query": "php~",
                    "fields": [
                      "es_attachment.attachment.content^1.0"
                    ]
                  }
                }
              }
            }
          }
        }
      ],
      "minimum_should_match": 1
    }
  },
  "highlight": {
    "fields": {
      "es_attachment.attachment.content": {}
    },
    "pre_tags": [
      ""
    ],
    "post_tags": [
      "</strong>"
    ]
  }
}
```
