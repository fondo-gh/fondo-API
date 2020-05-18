---
title: API Reference

language_tabs:
- javascript
- php
- bash

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.

<!-- END_INFO -->

#Admin Startup Management

Management of startups by Administrators.
<!-- START_2104b5a5f9dc8b39efcfb843fc13dd49 -->
## Startups.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Startups registered by all entrepreneurs, both approved and unapproved

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/admin/startups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/api/v1/admin/startups',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/api/v1/admin/startups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "uuid": null,
            "company_name": null,
            "product_image": "http:\/\/fondo-app-gh.herokuapp.com\/startups\/products\/",
            "caption": null,
            "funds_to_raise": null,
            "duration_for_raise": null,
            "approved": null,
            "created_at": null,
            "user": null,
            "startup_detail": null,
            "contact_detail": null,
            "business_model": null,
            "product_detail": null,
            "startup_teams": {
                "data": []
            },
            "cofounder_detail": null
        },
        {
            "id": null,
            "uuid": null,
            "company_name": null,
            "product_image": "http:\/\/fondo-app-gh.herokuapp.com\/startups\/products\/",
            "caption": null,
            "funds_to_raise": null,
            "duration_for_raise": null,
            "approved": null,
            "created_at": null,
            "user": null,
            "startup_detail": null,
            "contact_detail": null,
            "business_model": null,
            "product_detail": null,
            "startup_teams": {
                "data": []
            },
            "cofounder_detail": null
        }
    ]
}
```

### HTTP Request
`GET api/v1/admin/startups`


<!-- END_2104b5a5f9dc8b39efcfb843fc13dd49 -->

<!-- START_f051f1ba74cc38687456acf020aa3c6f -->
## Startups for Entrepreneur.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Startups registered by an entrepreneur, both approved and unapproved

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/admin/entrepreneur/1/startups"
);

let params = {
    "userId": "1",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/api/v1/admin/entrepreneur/1/startups',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'query' => [
            'userId'=> '1',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/api/v1/admin/entrepreneur/1/startups?userId=1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "uuid": null,
            "company_name": null,
            "product_image": "http:\/\/fondo-app-gh.herokuapp.com\/startups\/products\/",
            "caption": null,
            "funds_to_raise": null,
            "duration_for_raise": null,
            "approved": null,
            "created_at": null,
            "user": null,
            "startup_detail": null,
            "contact_detail": null,
            "business_model": null,
            "product_detail": null,
            "startup_teams": {
                "data": []
            },
            "cofounder_detail": null
        },
        {
            "id": null,
            "uuid": null,
            "company_name": null,
            "product_image": "http:\/\/fondo-app-gh.herokuapp.com\/startups\/products\/",
            "caption": null,
            "funds_to_raise": null,
            "duration_for_raise": null,
            "approved": null,
            "created_at": null,
            "user": null,
            "startup_detail": null,
            "contact_detail": null,
            "business_model": null,
            "product_detail": null,
            "startup_teams": {
                "data": []
            },
            "cofounder_detail": null
        }
    ]
}
```

### HTTP Request
`GET api/v1/admin/entrepreneur/{userId}/startups`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `userId` |  required  | The id of the user (entrepreneur)

<!-- END_f051f1ba74cc38687456acf020aa3c6f -->

<!-- START_8337d9a1278b49cbb775aad1aa0e0c15 -->
## Approve a Startup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Approve a startup.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/admin/startup/approve"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "startup_id": 1
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/api/v1/admin/startup/approve',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'startup_id' => 1,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/api/v1/admin/startup/approve" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"startup_id":1}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "Request completed successfully."
    }
}
```

### HTTP Request
`POST api/v1/admin/startup/approve`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `startup_id` | integer |  required  | The id of the startup to approve.
    
<!-- END_8337d9a1278b49cbb775aad1aa0e0c15 -->

#Startup Registration

API routes for registering startups on the platform
<!-- START_1020b66a975808d7fa78a8b915ac172d -->
## User(Entrepreneur) Startups.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Startups registered by the logged in entrepreneur, both approved and unapproved

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/user/startups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/api/v1/user/startups',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/api/v1/user/startups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "uuid": null,
            "company_name": null,
            "product_image": "http:\/\/fondo-app-gh.herokuapp.com\/startups\/products\/",
            "caption": null,
            "funds_to_raise": null,
            "duration_for_raise": null,
            "approved": null,
            "created_at": null,
            "user": null,
            "startup_detail": null,
            "contact_detail": null,
            "business_model": null,
            "product_detail": null,
            "startup_teams": {
                "data": []
            },
            "cofounder_detail": null
        },
        {
            "id": null,
            "uuid": null,
            "company_name": null,
            "product_image": "http:\/\/fondo-app-gh.herokuapp.com\/startups\/products\/",
            "caption": null,
            "funds_to_raise": null,
            "duration_for_raise": null,
            "approved": null,
            "created_at": null,
            "user": null,
            "startup_detail": null,
            "contact_detail": null,
            "business_model": null,
            "product_detail": null,
            "startup_teams": {
                "data": []
            },
            "cofounder_detail": null
        }
    ]
}
```

### HTTP Request
`GET api/v1/user/startups`


<!-- END_1020b66a975808d7fa78a8b915ac172d -->

<!-- START_af3acc7ec335a1b55c53dc63fe31aac0 -->
## Register a Startup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Registers a startup. First step out of 7 steps.
The same route is used to update the startup, if startup id is provided.
When registration is done, a startup id is returned. This then can be used for the next stages.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "company_name": "Jane Ventures",
    "caption": "eum",
    "product_image": "sint",
    "funds_to_raise": "Ghc 234.00",
    "duration_for_raise": "3 months.",
    "startup_id": 1
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/api/v1/startup/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'company_name' => 'Jane Ventures',
            'caption' => 'eum',
            'product_image' => 'sint',
            'funds_to_raise' => 'Ghc 234.00',
            'duration_for_raise' => '3 months.',
            'startup_id' => 1,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"company_name":"Jane Ventures","caption":"eum","product_image":"sint","funds_to_raise":"Ghc 234.00","duration_for_raise":"3 months.","startup_id":1}'

```


> Example response (200):

```json
null
```

### HTTP Request
`POST api/v1/startup/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `company_name` | string |  required  | The name of the startup
        `caption` | string |  required  | The caption of the startup.
        `product_image` | file |  optional  | The image of the startup product. Do not submit a null image field.
        `funds_to_raise` | string |  required  | The funds to raise for startup
        `duration_for_raise` | string |  required  | The duration needed to raise funds
        `startup_id` | integer |  optional  | The id of the startup if updating
    
<!-- END_af3acc7ec335a1b55c53dc63fe31aac0 -->

<!-- START_d707ccb080e8da38aba340d4c42d8f00 -->
## Data For Startup Details Registration.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
The endpoint provides startup types and startup industries which will be needed
to populate a select input for startup details registration by entrepreneur

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/registration/data/startup_detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/api/v1/startup/registration/data/startup_detail',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/api/v1/startup/registration/data/startup_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/v1/startup/registration/data/startup_detail`


<!-- END_d707ccb080e8da38aba340d4c42d8f00 -->

<!-- START_ec7a7a59b235b51d4172b9f5abc84c0a -->
## Startup Detail for a Startup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Updates a startup with further startup details.
The same route is used to update.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/startup_detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "startup_id": 1,
    "startup_type_id": 1,
    "startup_industry_id": 1,
    "has_patent": true,
    "location": "nulla"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/api/v1/startup/startup_detail',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'startup_id' => 1,
            'startup_type_id' => 1,
            'startup_industry_id' => 1,
            'has_patent' => true,
            'location' => 'nulla',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/startup_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"startup_id":1,"startup_type_id":1,"startup_industry_id":1,"has_patent":true,"location":"nulla"}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "Request completed successfully."
    }
}
```

### HTTP Request
`POST api/v1/startup/startup_detail`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `startup_id` | integer |  required  | The id of the startup that startup details belong to
        `startup_type_id` | integer |  required  | The id of the startup type - ie LIMITED
        `startup_industry_id` | integer |  required  | The id of the startup industry - ie Agriculture
        `has_patent` | boolean |  required  | Startup has patent or not.
        `location` | string |  optional  | Startup location.
    
<!-- END_ec7a7a59b235b51d4172b9f5abc84c0a -->

<!-- START_f5671621580735616ec788223c32deb9 -->
## Contact Details for a Startup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Updates a startup with Contact details.
The same route is used to update.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/contact_detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "startup_id": 1,
    "id": 1,
    "email": "jane@ventures.com",
    "phone": "ullam",
    "facebook_handle": "rem",
    "twitter_handle": "facere",
    "instagram_handle": "sit",
    "linkdin_handle": "modi",
    "skype_handle": "qui"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/api/v1/startup/contact_detail',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'startup_id' => 1,
            'id' => 1,
            'email' => 'jane@ventures.com',
            'phone' => 'ullam',
            'facebook_handle' => 'rem',
            'twitter_handle' => 'facere',
            'instagram_handle' => 'sit',
            'linkdin_handle' => 'modi',
            'skype_handle' => 'qui',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/contact_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"startup_id":1,"id":1,"email":"jane@ventures.com","phone":"ullam","facebook_handle":"rem","twitter_handle":"facere","instagram_handle":"sit","linkdin_handle":"modi","skype_handle":"qui"}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "Request completed successfully."
    }
}
```

### HTTP Request
`POST api/v1/startup/contact_detail`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `startup_id` | integer |  required  | The id of the startup that contact details belongs to.
        `id` | integer |  optional  | The id of the contact detail data when updating. This is used to enhance uniqueness validation for email.
        `email` | string |  required  | The email of the startup.
        `phone` | string |  required  | The phone number of the startup.
        `facebook_handle` | string |  optional  | The facebook handle of the startup.
        `twitter_handle` | string |  optional  | The twitter handle of the startup.
        `instagram_handle` | string |  optional  | The instagram handle of the startup.
        `linkdin_handle` | string |  optional  | The linkdin handle of the startup.
        `skype_handle` | string |  optional  | The skype handle of the startup.
    
<!-- END_f5671621580735616ec788223c32deb9 -->

<!-- START_5859401432fa237c862c239a45330785 -->
## Business Model for a Startup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Updates a startup with Business model detail.
The same route is used to update.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/business_model"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "startup_id": 1,
    "key_resources": "facere",
    "customer_target": "at",
    "value_proposition": "deleniti",
    "sales_channels": "possimus",
    "revenue_streams": "cumque",
    "key_metrics": "cum",
    "cost_structure": "odit",
    "financial_file": "est",
    "optional_file": "minima"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/api/v1/startup/business_model',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'startup_id' => 1,
            'key_resources' => 'facere',
            'customer_target' => 'at',
            'value_proposition' => 'deleniti',
            'sales_channels' => 'possimus',
            'revenue_streams' => 'cumque',
            'key_metrics' => 'cum',
            'cost_structure' => 'odit',
            'financial_file' => 'est',
            'optional_file' => 'minima',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/business_model" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"startup_id":1,"key_resources":"facere","customer_target":"at","value_proposition":"deleniti","sales_channels":"possimus","revenue_streams":"cumque","key_metrics":"cum","cost_structure":"odit","financial_file":"est","optional_file":"minima"}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "Request completed successfully."
    }
}
```

### HTTP Request
`POST api/v1/startup/business_model`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `startup_id` | integer |  required  | The id of the startup that business model belongs to.
        `key_resources` | string |  optional  | Startup key resources.
        `customer_target` | string |  optional  | Startup customer target.
        `value_proposition` | string |  optional  | Startup value proposition.
        `sales_channels` | string |  optional  | Startup sales channel.
        `revenue_streams` | string |  optional  | Startup revenue streams.
        `key_metrics` | string |  optional  | Startup key metrics.
        `cost_structure` | string |  optional  | Startup cost structure.
        `financial_file` | file |  optional  | Startup financial file (format - pdf, word, etc).
        `optional_file` | file |  optional  | Startup optional documents (format - pdf, word, etc).
    
<!-- END_5859401432fa237c862c239a45330785 -->

<!-- START_f89683583ee45ec05873a3e2e400c57a -->
## Data for Product Detail Registration

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
The endpoint provides product progress which will be needed
to populate a select input for startup product details registration by entrepreneur

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/registration/data/product_detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/api/v1/startup/registration/data/product_detail',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/api/v1/startup/registration/data/product_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/v1/startup/registration/data/product_detail`


<!-- END_f89683583ee45ec05873a3e2e400c57a -->

<!-- START_9f81627daca3accf82a01c1fe5f1e36d -->
## Product Detail for a Startup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Updates a startup with product detail.
The same route is used to update.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/product_detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "startup_id": 1,
    "product_progress_id": 1,
    "product_url": "veniam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/api/v1/startup/product_detail',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'startup_id' => 1,
            'product_progress_id' => 1,
            'product_url' => 'veniam',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/product_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"startup_id":1,"product_progress_id":1,"product_url":"veniam"}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "Request completed successfully."
    }
}
```

### HTTP Request
`POST api/v1/startup/product_detail`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `startup_id` | integer |  required  | The id of the startup that product detail belongs to.
        `product_progress_id` | integer |  required  | The id of the startup progress.
        `product_url` | string |  optional  | Startup product url.
    
<!-- END_9f81627daca3accf82a01c1fe5f1e36d -->

<!-- START_b76580eb2a2f944af1cc8ec6ec266979 -->
## Data for Cofounder Details registration

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
The endpoint provides cofounder roles which will be needed
to populate a select input for startup cofounder details registration by entrepreneur

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/registration/data/cofounder_detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/api/v1/startup/registration/data/cofounder_detail',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/api/v1/startup/registration/data/cofounder_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/v1/startup/registration/data/cofounder_detail`


<!-- END_b76580eb2a2f944af1cc8ec6ec266979 -->

<!-- START_894872d23e02c659d94f329d1c2d5704 -->
## Cofounder Detail for a Startup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Updates a startup with product detail.
The same route is used to update.
As part of the parameters provided, the cofounders parameter accepts an array of cofounder personal
information object. The nature is as this: <br><code>
[<br>
{<br>
name: 'Jane Doe',<br>
email: 'jane@doe.com',<br>
cofounder_role_id: 4<br>
},<br>
{<br>
name: 'John Doe',<br>
email: 'john@doe.com',<br>
cofounder_role_id: 5<br>
}<br>
]<br>
</code><br>
<b>The data submitted for cofounders will replace any existing record.</b>

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/cofounder_detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "startup_id": 1,
    "funding_amount": "3000.0",
    "rate_of_devotion": "vel",
    "cofounders": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/api/v1/startup/cofounder_detail',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'startup_id' => 1,
            'funding_amount' => '3000.0',
            'rate_of_devotion' => 'vel',
            'cofounders' => [],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/cofounder_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"startup_id":1,"funding_amount":"3000.0","rate_of_devotion":"vel","cofounders":[]}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "Request completed successfully."
    }
}
```

### HTTP Request
`POST api/v1/startup/cofounder_detail`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `startup_id` | integer |  required  | The id of the startup that cofounder detail belongs to
        `funding_amount` | numeric |  required  | The amount for funding
        `rate_of_devotion` | string |  required  | Devotion entrepreneurs put into startup. Could be any of the following: Part time dedication(<35 hours per week), Full time dedication(>35 hours per week), I don’t know
        `cofounders` | array |  required  | name, email, cofounder_role_id object of as many cofounders stored in an array.
    
<!-- END_894872d23e02c659d94f329d1c2d5704 -->

<!-- START_d81fe156bc4fba413ad45237758a9714 -->
## Data for Startup Team registration

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
The endpoint provides business teams  which will be needed
to populate a select input for startup teams registration by entrepreneur

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/registration/data/startup_team"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/api/v1/startup/registration/data/startup_team',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/api/v1/startup/registration/data/startup_team" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/v1/startup/registration/data/startup_team`


<!-- END_d81fe156bc4fba413ad45237758a9714 -->

<!-- START_ec031c2d4106f9b74dd9df80e918d490 -->
## Startup Teams for a Startup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Updates a startup with startup team.
The same route is used to update. <br>
Startup team consist of name of person, and the id of the business team member belongs to.
ie. John Belongs to Marketing team.

As part of the parameters provided, the startup_teams parameter accepts an array of members
and their respective business teams. The nature is as this: <br><code>
[<br>
{<br>
name: 'Jane Doe',<br>
business_team_id: 1, //ie Marketing business team<br>
},<br>
{<br>
name: 'John Doe',<br>
business_team_id: 3,  //ie CEO business team<br>
}<br>
]<br>
</code><br>
<b>The data submitted for startup_teams will replace any existing record.</b>

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/startup_team"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "startup_id": 1,
    "startup_teams": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/api/v1/startup/startup_team',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'startup_id' => 1,
            'startup_teams' => [],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/api/v1/startup/startup_team" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"startup_id":1,"startup_teams":[]}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "Request completed successfully."
    }
}
```

### HTTP Request
`POST api/v1/startup/startup_team`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `startup_id` | integer |  required  | The id of the startup that startup teams belongs to
        `startup_teams` | array |  required  | name, business_team_id object of as many startup teams stored in an array.
    
<!-- END_ec031c2d4106f9b74dd9df80e918d490 -->

#System Generated Routes (Ignore)


<!-- START_0c068b4037fb2e47e71bd44bd36e3e2a -->
## Authorize a client to access the user&#039;s account.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/oauth/authorize',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/authorize`


<!-- END_0c068b4037fb2e47e71bd44bd36e3e2a -->

<!-- START_e48cc6a0b45dd21b7076ab2c03908687 -->
## Approve the authorization request.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/oauth/authorize',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST oauth/authorize`


<!-- END_e48cc6a0b45dd21b7076ab2c03908687 -->

<!-- START_de5d7581ef1275fce2a229b6b6eaad9c -->
## Deny the authorization request.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://fondo-app-gh.herokuapp.com/oauth/authorize',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X DELETE \
    "http://fondo-app-gh.herokuapp.com/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`DELETE oauth/authorize`


<!-- END_de5d7581ef1275fce2a229b6b6eaad9c -->

<!-- START_a09d20357336aa979ecd8e3972ac9168 -->
## Authorize a client to access the user&#039;s account.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/oauth/token',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/oauth/token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (400):

```json
{
    "error": "unsupported_grant_type",
    "error_description": "The authorization grant type is not supported by the authorization server.",
    "hint": "Check that all required parameters have been provided",
    "message": "The authorization grant type is not supported by the authorization server."
}
```

### HTTP Request
`POST oauth/token`


<!-- END_a09d20357336aa979ecd8e3972ac9168 -->

<!-- START_d6a56149547e03307199e39e03e12d1c -->
## Get all of the authorized tokens for the authenticated user.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/oauth/tokens',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/oauth/tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/tokens`


<!-- END_d6a56149547e03307199e39e03e12d1c -->

<!-- START_a9a802c25737cca5324125e5f60b72a5 -->
## Delete the given token.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://fondo-app-gh.herokuapp.com/oauth/tokens/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X DELETE \
    "http://fondo-app-gh.herokuapp.com/oauth/tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`DELETE oauth/tokens/{token_id}`


<!-- END_a9a802c25737cca5324125e5f60b72a5 -->

<!-- START_abe905e69f5d002aa7d26f433676d623 -->
## Get a fresh transient token cookie for the authenticated user.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/token/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/oauth/token/refresh',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/oauth/token/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST oauth/token/refresh`


<!-- END_abe905e69f5d002aa7d26f433676d623 -->

<!-- START_babcfe12d87b8708f5985e9d39ba8f2c -->
## Get all of the clients for the authenticated user.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/oauth/clients',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/clients`


<!-- END_babcfe12d87b8708f5985e9d39ba8f2c -->

<!-- START_9eabf8d6e4ab449c24c503fcb42fba82 -->
## Store a new client.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/oauth/clients',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST oauth/clients`


<!-- END_9eabf8d6e4ab449c24c503fcb42fba82 -->

<!-- START_784aec390a455073fc7464335c1defa1 -->
## Update the given client.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://fondo-app-gh.herokuapp.com/oauth/clients/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X PUT \
    "http://fondo-app-gh.herokuapp.com/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`PUT oauth/clients/{client_id}`


<!-- END_784aec390a455073fc7464335c1defa1 -->

<!-- START_1f65a511dd86ba0541d7ba13ca57e364 -->
## Delete the given client.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://fondo-app-gh.herokuapp.com/oauth/clients/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X DELETE \
    "http://fondo-app-gh.herokuapp.com/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`DELETE oauth/clients/{client_id}`


<!-- END_1f65a511dd86ba0541d7ba13ca57e364 -->

<!-- START_9e281bd3a1eb1d9eb63190c8effb607c -->
## Get all of the available scopes for the application.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/scopes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/oauth/scopes',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/oauth/scopes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/scopes`


<!-- END_9e281bd3a1eb1d9eb63190c8effb607c -->

<!-- START_9b2a7699ce6214a79e0fd8107f8b1c9e -->
## Get all of the personal access tokens for the authenticated user.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/oauth/personal-access-tokens',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/personal-access-tokens`


<!-- END_9b2a7699ce6214a79e0fd8107f8b1c9e -->

<!-- START_a8dd9c0a5583742e671711f9bb3ee406 -->
## Create a new personal access token for the user.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/oauth/personal-access-tokens',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST oauth/personal-access-tokens`


<!-- END_a8dd9c0a5583742e671711f9bb3ee406 -->

<!-- START_bae65df80fd9d72a01439241a9ea20d0 -->
## Delete the given token.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/oauth/personal-access-tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete(
    'http://fondo-app-gh.herokuapp.com/oauth/personal-access-tokens/1',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X DELETE \
    "http://fondo-app-gh.herokuapp.com/oauth/personal-access-tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`DELETE oauth/personal-access-tokens/{token_id}`


<!-- END_bae65df80fd9d72a01439241a9ea20d0 -->

#User and Admin Management


APIs for managing users - entrepreneurs and investors
<!-- START_7a184547882598fc164c10be7745584b -->
## Login a User

Authenticates an entrepreneur or investor.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/user/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "email": "mail@mail.com",
    "password": "facilis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/api/v1/user/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'email' => 'mail@mail.com',
            'password' => 'facilis',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/api/v1/user/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"email":"mail@mail.com","password":"facilis"}'

```


> Example response (200):

```json
null
```
> Example response (404):

```json
{
    "error": {
        "code": 422,
        "message": "Invalid credentials."
    }
}
```

### HTTP Request
`POST api/v1/user/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The email of the user.
        `password` | string |  required  | The password of the user.
    
<!-- END_7a184547882598fc164c10be7745584b -->

<!-- START_cfe0b82599291e64e630b41f76f6b108 -->
## Get User types

Displays listing of user types needed to register for an account on the system

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/user/types"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://fondo-app-gh.herokuapp.com/api/v1/user/types',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://fondo-app-gh.herokuapp.com/api/v1/user/types" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "uuid": "303599cc-331c-44fc-b61d-fb729d753eff",
            "name": "Entrepreneur"
        },
        {
            "id": 1,
            "uuid": "303599cc-331c-44fc-b61d-fb729d753eff",
            "name": "Entrepreneur"
        }
    ]
}
```

### HTTP Request
`GET api/v1/user/types`


<!-- END_cfe0b82599291e64e630b41f76f6b108 -->

<!-- START_7fef01e7235c89049ebe3685de4bff17 -->
## Register a User

Registers a user as an entrepreneur or investor.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/user/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "first_name": "Jane",
    "last_name": "Doe",
    "picture": "enim",
    "user_type_id": 1,
    "email": "mail@mail.com",
    "password": "perferendis",
    "password_confirmation": "laboriosam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/api/v1/user/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'picture' => 'enim',
            'user_type_id' => 1,
            'email' => 'mail@mail.com',
            'password' => 'perferendis',
            'password_confirmation' => 'laboriosam',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/api/v1/user/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"first_name":"Jane","last_name":"Doe","picture":"enim","user_type_id":1,"email":"mail@mail.com","password":"perferendis","password_confirmation":"laboriosam"}'

```


> Example response (200):

```json
null
```

### HTTP Request
`POST api/v1/user/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `first_name` | string |  required  | The first name of the user.
        `last_name` | string |  required  | The last name of the user.
        `picture` | file |  optional  | The image of the person. Do not submit a null picture field.
        `user_type_id` | integer |  required  | The id of the type of user.
        `email` | string |  required  | The email of the user.
        `password` | string |  required  | The password of the user.
        `password_confirmation` | string |  required  | The password confirmation for the password.
    
<!-- END_7fef01e7235c89049ebe3685de4bff17 -->

<!-- START_356aa57a5886f377e4e6eea0dad27149 -->
## Login an Admin

Authenticates an administrator.

> Example request:

```javascript
const url = new URL(
    "http://fondo-app-gh.herokuapp.com/api/v1/admin/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "email": "mail@mail.com",
    "password": "officiis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://fondo-app-gh.herokuapp.com/api/v1/admin/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'email' => 'mail@mail.com',
            'password' => 'officiis',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://fondo-app-gh.herokuapp.com/api/v1/admin/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"email":"mail@mail.com","password":"officiis"}'

```


> Example response (200):

```json
null
```
> Example response (404):

```json
{
    "error": {
        "code": 422,
        "message": "Invalid credentials."
    }
}
```

### HTTP Request
`POST api/v1/admin/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The email of the admin.
        `password` | string |  required  | The password of the admin.
    
<!-- END_356aa57a5886f377e4e6eea0dad27149 -->


