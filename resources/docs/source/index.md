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
    "http://localhost/api/v1/admin/startups"
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
    'http://localhost/api/v1/admin/startups',
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
    -G "http://localhost/api/v1/admin/startups" \
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
            "registration_is_complete": null,
            "company_name": null,
            "product_image": "http:\/\/localhost\/startups\/products\/",
            "caption": null,
            "funds_to_raise": null,
            "duration_for_raise": null,
            "approved": null,
            "created_at": null,
            "user": null
        },
        {
            "id": null,
            "uuid": null,
            "registration_is_complete": null,
            "company_name": null,
            "product_image": "http:\/\/localhost\/startups\/products\/",
            "caption": null,
            "funds_to_raise": null,
            "duration_for_raise": null,
            "approved": null,
            "created_at": null,
            "user": null
        }
    ]
}
```

### HTTP Request
`GET api/v1/admin/startups`


<!-- END_2104b5a5f9dc8b39efcfb843fc13dd49 -->

<!-- START_b93a187f3d054ac247dac12e93e30e6e -->
## Startup Detail.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Startup detail for selected startup.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/startups/2/startup_detail"
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
    'http://localhost/api/v1/admin/startups/2/startup_detail',
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
    -G "http://localhost/api/v1/admin/startups/2/startup_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "error": {
        "code": 401,
        "message": "Unauthenticated."
    }
}
```

### HTTP Request
`GET api/v1/admin/startups/{id}/startup_detail`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The id of the startup.

<!-- END_b93a187f3d054ac247dac12e93e30e6e -->

<!-- START_244f669c252d5285beb4c66d9d1b65c6 -->
## Contact Detail.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Contact detail for selected startup.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/startups/2/contact_detail"
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
    'http://localhost/api/v1/admin/startups/2/contact_detail',
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
    -G "http://localhost/api/v1/admin/startups/2/contact_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "error": {
        "code": 401,
        "message": "Unauthenticated."
    }
}
```

### HTTP Request
`GET api/v1/admin/startups/{id}/contact_detail`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The id of the startup.

<!-- END_244f669c252d5285beb4c66d9d1b65c6 -->

<!-- START_2fbf94f49db122fa97f56942633cd291 -->
## Business Model.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Business Model for selected startup.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/startups/2/business_model"
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
    'http://localhost/api/v1/admin/startups/2/business_model',
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
    -G "http://localhost/api/v1/admin/startups/2/business_model" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "error": {
        "code": 401,
        "message": "Unauthenticated."
    }
}
```

### HTTP Request
`GET api/v1/admin/startups/{id}/business_model`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The id of the startup.

<!-- END_2fbf94f49db122fa97f56942633cd291 -->

<!-- START_b89abc4d591f60f1626340b807f7b483 -->
## Product Detail.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Product Detail for selected startup.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/startups/2/product_detail"
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
    'http://localhost/api/v1/admin/startups/2/product_detail',
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
    -G "http://localhost/api/v1/admin/startups/2/product_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "error": {
        "code": 401,
        "message": "Unauthenticated."
    }
}
```

### HTTP Request
`GET api/v1/admin/startups/{id}/product_detail`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The id of the startup.

<!-- END_b89abc4d591f60f1626340b807f7b483 -->

<!-- START_595e007f6f1c18f12f2582334c1c2152 -->
## Cofounder Detail.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Cofounder Detail for selected startup.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/startups/2/cofounder_detail"
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
    'http://localhost/api/v1/admin/startups/2/cofounder_detail',
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
    -G "http://localhost/api/v1/admin/startups/2/cofounder_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "error": {
        "code": 401,
        "message": "Unauthenticated."
    }
}
```

### HTTP Request
`GET api/v1/admin/startups/{id}/cofounder_detail`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The id of the startup.

<!-- END_595e007f6f1c18f12f2582334c1c2152 -->

<!-- START_edf4a4317a7db4830cee5cae47a36960 -->
## Startup Team.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Startup Team for selected startup.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/startups/2/startup_team"
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
    'http://localhost/api/v1/admin/startups/2/startup_team',
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
    -G "http://localhost/api/v1/admin/startups/2/startup_team" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "error": {
        "code": 401,
        "message": "Unauthenticated."
    }
}
```

### HTTP Request
`GET api/v1/admin/startups/{id}/startup_team`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The id of the startup

<!-- END_edf4a4317a7db4830cee5cae47a36960 -->

<!-- START_f051f1ba74cc38687456acf020aa3c6f -->
## Startups for Entrepreneur.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Startups registered by an entrepreneur, both approved and unapproved

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/entrepreneur/1/startups"
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
    'http://localhost/api/v1/admin/entrepreneur/1/startups',
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
    -G "http://localhost/api/v1/admin/entrepreneur/1/startups?userId=1" \
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
            "registration_is_complete": null,
            "company_name": null,
            "product_image": "http:\/\/localhost\/startups\/products\/",
            "caption": null,
            "funds_to_raise": null,
            "duration_for_raise": null,
            "approved": null,
            "created_at": null,
            "user": null
        },
        {
            "id": null,
            "uuid": null,
            "registration_is_complete": null,
            "company_name": null,
            "product_image": "http:\/\/localhost\/startups\/products\/",
            "caption": null,
            "funds_to_raise": null,
            "duration_for_raise": null,
            "approved": null,
            "created_at": null,
            "user": null
        }
    ]
}
```

### HTTP Request
`GET api/v1/admin/entrepreneur/{userId}/startups`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `userId` |  required  | The id of the user (entrepreneur).

<!-- END_f051f1ba74cc38687456acf020aa3c6f -->

<!-- START_8337d9a1278b49cbb775aad1aa0e0c15 -->
## Approve a Startup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Approve a startup.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/startup/approve"
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
    'http://localhost/api/v1/admin/startup/approve',
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
    "http://localhost/api/v1/admin/startup/approve" \
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

<!-- START_d828d841ef0226434ec4de6631c5f088 -->
## Investors.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
All investors registered on the system.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/investors"
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
    'http://localhost/api/v1/admin/investors',
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
    -G "http://localhost/api/v1/admin/investors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "error": {
        "code": 401,
        "message": "Unauthenticated."
    }
}
```

### HTTP Request
`GET api/v1/admin/investors`


<!-- END_d828d841ef0226434ec4de6631c5f088 -->

<!-- START_ab342b51312d1fcf45a4cccbb63becb2 -->
## Entrepreneurs.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
All entrepreneurs registered on the system.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/entrepreneurs"
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
    'http://localhost/api/v1/admin/entrepreneurs',
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
    -G "http://localhost/api/v1/admin/entrepreneurs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "error": {
        "code": 401,
        "message": "Unauthenticated."
    }
}
```

### HTTP Request
`GET api/v1/admin/entrepreneurs`


<!-- END_ab342b51312d1fcf45a4cccbb63becb2 -->

#Investor


Investor and startups management endpoints.
<!-- START_3d8cfc9a16089a3b331531d6d50aac27 -->
## Startups.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Startups registered by all entrepreneurs and approved by the admins.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/investor/startups"
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
    'http://localhost/api/v1/investor/startups',
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
    -G "http://localhost/api/v1/investor/startups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "error": {
        "code": 401,
        "message": "Unauthenticated."
    }
}
```

### HTTP Request
`GET api/v1/investor/startups`


<!-- END_3d8cfc9a16089a3b331531d6d50aac27 -->

<!-- START_79ac1e30074e817614c00f3b12fef075 -->
## Complete Investor Profile
Provide required additional data about investor such as a short bio, occupations etc

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/investor/profile/complete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "bio": "et",
    "interest": "nihil",
    "startups_invested_in": "ullam",
    "amount_invested": "iure",
    "occupation": "cupiditate"
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
    'http://localhost/api/v1/investor/profile/complete',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'bio' => 'et',
            'interest' => 'nihil',
            'startups_invested_in' => 'ullam',
            'amount_invested' => 'iure',
            'occupation' => 'cupiditate',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/investor/profile/complete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"bio":"et","interest":"nihil","startups_invested_in":"ullam","amount_invested":"iure","occupation":"cupiditate"}'

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
`POST api/v1/investor/profile/complete`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `bio` | string |  required  | A short bio of investor.
        `interest` | string |  optional  | A short note of investor's interests.
        `startups_invested_in` | string |  optional  | Startups investor invested in if any.
        `amount_invested` | string |  optional  | Amount investor invested in startups if any.
        `occupation` | string |  required  | Occupation(s) of investor.
    
<!-- END_79ac1e30074e817614c00f3b12fef075 -->

#Startup Registration

API routes for registering startups on the platform
<!-- START_1020b66a975808d7fa78a8b915ac172d -->
## User(Entrepreneur) Startups.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Startups registered by the logged in entrepreneur, both approved and unapproved.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/user/startups"
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
    'http://localhost/api/v1/user/startups',
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
    -G "http://localhost/api/v1/user/startups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "error": {
        "code": 401,
        "message": "Unauthenticated."
    }
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
    "http://localhost/api/v1/startup/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "company_name": "Jane Ventures",
    "caption": "ut",
    "product_image_file": "dolorum",
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
    'http://localhost/api/v1/startup/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'company_name' => 'Jane Ventures',
            'caption' => 'ut',
            'product_image_file' => 'dolorum',
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
    "http://localhost/api/v1/startup/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"company_name":"Jane Ventures","caption":"ut","product_image_file":"dolorum","funds_to_raise":"Ghc 234.00","duration_for_raise":"3 months.","startup_id":1}'

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
        `product_image_file` | file |  optional  | The image of the startup product. Do not submit a null image field.
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
    "http://localhost/api/v1/startup/registration/data/startup_detail"
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
    'http://localhost/api/v1/startup/registration/data/startup_detail',
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
    -G "http://localhost/api/v1/startup/registration/data/startup_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (200):

```json
{
    "startup_types": {
        "data": [
            {
                "id": 1,
                "uuid": "EIFAJEAF-EAFHEOA-4343D",
                "name": "LLP - Limited liability Partnership"
            },
            {
                "id": 2,
                "uuid": "EIFAJEAF-EAFHEOA-4343D",
                "name": "LP - Limited Partnership"
            }
        ]
    },
    "startup_industries": {
        "data": [
            {
                "id": 1,
                "uuid": "EIFAJEAF-EAFHEOA-4343D",
                "name": "Agriculture"
            },
            {
                "id": 2,
                "uuid": "EIFAJEAF-EAFHEOA-4343D",
                "name": "Finance"
            }
        ]
    }
}
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
    "http://localhost/api/v1/startup/startup_detail"
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
    "location": "ut",
    "business_registration_number": "officiis"
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
    'http://localhost/api/v1/startup/startup_detail',
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
            'location' => 'ut',
            'business_registration_number' => 'officiis',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/startup/startup_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"startup_id":1,"startup_type_id":1,"startup_industry_id":1,"has_patent":true,"location":"ut","business_registration_number":"officiis"}'

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
        `business_registration_number` | string |  required  | Startup business registration number.
    
<!-- END_ec7a7a59b235b51d4172b9f5abc84c0a -->

<!-- START_f5671621580735616ec788223c32deb9 -->
## Contact Details for a Startup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Updates a startup with Contact details.
The same route is used to update.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/startup/contact_detail"
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
    "phone": "natus",
    "facebook_handle": "est",
    "twitter_handle": "illo",
    "instagram_handle": "et",
    "linkdin_handle": "enim",
    "skype_handle": "in"
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
    'http://localhost/api/v1/startup/contact_detail',
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
            'phone' => 'natus',
            'facebook_handle' => 'est',
            'twitter_handle' => 'illo',
            'instagram_handle' => 'et',
            'linkdin_handle' => 'enim',
            'skype_handle' => 'in',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/startup/contact_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"startup_id":1,"id":1,"email":"jane@ventures.com","phone":"natus","facebook_handle":"est","twitter_handle":"illo","instagram_handle":"et","linkdin_handle":"enim","skype_handle":"in"}'

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
        `phone` | string |  required  | The phone number of the startup. Example 02438373838, 383738373
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
    "http://localhost/api/v1/startup/business_model"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "startup_id": 1,
    "key_resources": "quis",
    "customer_target": "magni",
    "value_proposition": "minima",
    "sales_channels": "dolor",
    "revenue_streams": "ea",
    "key_metrics": "ad",
    "cost_structure": "aut",
    "financial_file_upload": "alias",
    "optional_file_upload": "ipsam"
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
    'http://localhost/api/v1/startup/business_model',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'startup_id' => 1,
            'key_resources' => 'quis',
            'customer_target' => 'magni',
            'value_proposition' => 'minima',
            'sales_channels' => 'dolor',
            'revenue_streams' => 'ea',
            'key_metrics' => 'ad',
            'cost_structure' => 'aut',
            'financial_file_upload' => 'alias',
            'optional_file_upload' => 'ipsam',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/startup/business_model" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"startup_id":1,"key_resources":"quis","customer_target":"magni","value_proposition":"minima","sales_channels":"dolor","revenue_streams":"ea","key_metrics":"ad","cost_structure":"aut","financial_file_upload":"alias","optional_file_upload":"ipsam"}'

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
        `financial_file_upload` | file |  optional  | Startup financial file (format - pdf, word, etc).
        `optional_file_upload` | file |  optional  | Startup optional documents (format - pdf, word, etc).
    
<!-- END_5859401432fa237c862c239a45330785 -->

<!-- START_f89683583ee45ec05873a3e2e400c57a -->
## Data for Product Detail Registration

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
The endpoint provides product progress which will be needed
to populate a select input for startup product details registration by entrepreneur

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/startup/registration/data/product_detail"
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
    'http://localhost/api/v1/startup/registration/data/product_detail',
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
    -G "http://localhost/api/v1/startup/registration/data/product_detail" \
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
            "uuid": "EIFAJEAF-EAFHEOA-4343D",
            "name": "Concept only"
        },
        {
            "id": 2,
            "uuid": "EIFAJEAF-EAFHEOA-4343D",
            "name": "Product development"
        }
    ]
}
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
    "http://localhost/api/v1/startup/product_detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "startup_id": 1,
    "product_progress_id": 1,
    "product_url": "voluptatem"
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
    'http://localhost/api/v1/startup/product_detail',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'startup_id' => 1,
            'product_progress_id' => 1,
            'product_url' => 'voluptatem',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/startup/product_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"startup_id":1,"product_progress_id":1,"product_url":"voluptatem"}'

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
    "http://localhost/api/v1/startup/registration/data/cofounder_detail"
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
    'http://localhost/api/v1/startup/registration/data/cofounder_detail',
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
    -G "http://localhost/api/v1/startup/registration/data/cofounder_detail" \
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
            "uuid": "EIFAJEAF-EAFHEOA-4343D",
            "name": "Chairman"
        },
        {
            "id": 2,
            "uuid": "EIFAJEAF-EAFHEOA-4343D",
            "name": "Chief Executive Officer"
        }
    ]
}
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
    "http://localhost/api/v1/startup/cofounder_detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "startup_id": 1,
    "funding_amount": "3000.0",
    "rate_of_devotion": "neque",
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
    'http://localhost/api/v1/startup/cofounder_detail',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'startup_id' => 1,
            'funding_amount' => '3000.0',
            'rate_of_devotion' => 'neque',
            'cofounders' => [],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/startup/cofounder_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"startup_id":1,"funding_amount":"3000.0","rate_of_devotion":"neque","cofounders":[]}'

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
    "http://localhost/api/v1/startup/registration/data/startup_team"
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
    'http://localhost/api/v1/startup/registration/data/startup_team',
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
    -G "http://localhost/api/v1/startup/registration/data/startup_team" \
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
            "uuid": "'EIFAJEAF-EAFHEOA-4343D",
            "name": "Sales and marketing team",
            "description": "Responsible for bringing the product to market. They use several approaches to get the word out regarding their new invention."
        },
        {
            "id": 2,
            "uuid": "EIFAJEAF-EAFHEOA-4343D",
            "name": "Operations and Production team",
            "description": "Responsible for bringing the product to life. They receive the product's vision and bring it into its finished stage."
        }
    ]
}
```

### HTTP Request
`GET api/v1/startup/registration/data/startup_team`


<!-- END_d81fe156bc4fba413ad45237758a9714 -->

<!-- START_ec031c2d4106f9b74dd9df80e918d490 -->
## Startup Teams for a Startup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
Updates a startup with startup team. This marks the startup registration complete.
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
    "http://localhost/api/v1/startup/startup_team"
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
    'http://localhost/api/v1/startup/startup_team',
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
    "http://localhost/api/v1/startup/startup_team" \
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
    "http://localhost/oauth/authorize"
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
    'http://localhost/oauth/authorize',
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
    -G "http://localhost/oauth/authorize" \
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
    "http://localhost/oauth/authorize"
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
    'http://localhost/oauth/authorize',
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
    "http://localhost/oauth/authorize" \
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
    "http://localhost/oauth/authorize"
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
    'http://localhost/oauth/authorize',
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
    "http://localhost/oauth/authorize" \
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
    "http://localhost/oauth/token"
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
    'http://localhost/oauth/token',
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
    "http://localhost/oauth/token" \
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
    "http://localhost/oauth/tokens"
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
    'http://localhost/oauth/tokens',
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
    -G "http://localhost/oauth/tokens" \
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
    "http://localhost/oauth/tokens/1"
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
    'http://localhost/oauth/tokens/1',
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
    "http://localhost/oauth/tokens/1" \
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
    "http://localhost/oauth/token/refresh"
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
    'http://localhost/oauth/token/refresh',
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
    "http://localhost/oauth/token/refresh" \
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
    "http://localhost/oauth/clients"
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
    'http://localhost/oauth/clients',
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
    -G "http://localhost/oauth/clients" \
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
    "http://localhost/oauth/clients"
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
    'http://localhost/oauth/clients',
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
    "http://localhost/oauth/clients" \
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
    "http://localhost/oauth/clients/1"
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
    'http://localhost/oauth/clients/1',
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
    "http://localhost/oauth/clients/1" \
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
    "http://localhost/oauth/clients/1"
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
    'http://localhost/oauth/clients/1',
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
    "http://localhost/oauth/clients/1" \
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
    "http://localhost/oauth/scopes"
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
    'http://localhost/oauth/scopes',
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
    -G "http://localhost/oauth/scopes" \
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
    "http://localhost/oauth/personal-access-tokens"
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
    'http://localhost/oauth/personal-access-tokens',
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
    -G "http://localhost/oauth/personal-access-tokens" \
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
    "http://localhost/oauth/personal-access-tokens"
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
    'http://localhost/oauth/personal-access-tokens',
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
    "http://localhost/oauth/personal-access-tokens" \
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
    "http://localhost/oauth/personal-access-tokens/1"
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
    'http://localhost/oauth/personal-access-tokens/1',
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
    "http://localhost/oauth/personal-access-tokens/1" \
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
    "http://localhost/api/v1/user/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "email": "mail@mail.com",
    "password": "magnam"
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
    'http://localhost/api/v1/user/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'email' => 'mail@mail.com',
            'password' => 'magnam',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/user/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"email":"mail@mail.com","password":"magnam"}'

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
    "http://localhost/api/v1/user/types"
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
    'http://localhost/api/v1/user/types',
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
    -G "http://localhost/api/v1/user/types" \
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
            "name": null
        },
        {
            "id": null,
            "uuid": null,
            "name": null
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
    "http://localhost/api/v1/user/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "first_name": "Jane",
    "last_name": "Doe",
    "picture_upload": "ut",
    "user_type_id": 1,
    "email": "mail@mail.com",
    "password": "veniam",
    "password_confirmation": "repudiandae"
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
    'http://localhost/api/v1/user/register',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'picture_upload' => 'ut',
            'user_type_id' => 1,
            'email' => 'mail@mail.com',
            'password' => 'veniam',
            'password_confirmation' => 'repudiandae',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/user/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"first_name":"Jane","last_name":"Doe","picture_upload":"ut","user_type_id":1,"email":"mail@mail.com","password":"veniam","password_confirmation":"repudiandae"}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "Request completed successfully."
    },
    "data": {
        "id": 1,
        "uuid": "EIFAJEAF-EAFHEOA-4343D",
        "first_name": "Jane",
        "last_name": "Doe",
        "email": "jane@doe.com",
        "picture": "http:\/\/www.fondo.com\/user\/kkjdfj.jpg",
        "user_type": "Entrepreneur",
        "profile_is_completed": "true",
        "token": "7geRI9P4LUFj3ensaxOV070Uk1yXeQ23ptqerJYc"
    }
}
```

### HTTP Request
`POST api/v1/user/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `first_name` | string |  required  | The first name of the user.
        `last_name` | string |  required  | The last name of the user.
        `picture_upload` | file |  optional  | The image of the person. Do not submit a null picture field.
        `user_type_id` | integer |  required  | The id of the type of user.
        `email` | string |  required  | The email of the user.
        `password` | string |  required  | The password of the user.
        `password_confirmation` | string |  required  | The password confirmation for the password.
    
<!-- END_7fef01e7235c89049ebe3685de4bff17 -->

<!-- START_aecda676844d6de7093d4ca4113cf1a6 -->
## Send Reset Password for User
Generates password reset code for users and sends to mail with instruction.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/user/password/reset/code"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "email": "mail@mail.com"
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
    'http://localhost/api/v1/user/password/reset/code',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'email' => 'mail@mail.com',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/user/password/reset/code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"email":"mail@mail.com"}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "The reset code is sent via email. Kindly follow the mail to complete the password reset process."
    },
    "data": []
}
```

### HTTP Request
`POST api/v1/user/password/reset/code`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The email of the user.
    
<!-- END_aecda676844d6de7093d4ca4113cf1a6 -->

<!-- START_efd6fa1a70bef66efd5992b9552d100a -->
## Reset Password for User
Reset the password for user using the detail provided.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/user/password/reset/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "reset_code": "LKJFAIE",
    "email": "mail@mail.com",
    "password": "voluptatem",
    "password_confirmation": "debitis"
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
    'http://localhost/api/v1/user/password/reset/update',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'reset_code' => 'LKJFAIE',
            'email' => 'mail@mail.com',
            'password' => 'voluptatem',
            'password_confirmation' => 'debitis',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/user/password/reset/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"reset_code":"LKJFAIE","email":"mail@mail.com","password":"voluptatem","password_confirmation":"debitis"}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "Request completed successfully."
    },
    "data": {
        "id": 1,
        "uuid": "EIFAJEAF-EAFHEOA-4343D",
        "first_name": "Jane",
        "last_name": "Doe",
        "email": "jane@doe.com",
        "picture": "http:\/\/www.fondo.com\/user\/kkjdfj.jpg",
        "user_type": "Entrepreneur",
        "profile_is_completed": "true",
        "token": "7geRI9P4LUFj3ensaxOV070Uk1yXeQ23ptqerJYc"
    }
}
```

### HTTP Request
`POST api/v1/user/password/reset/update`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `reset_code` | string |  required  | The reset code sent via mail.
        `email` | string |  required  | The email of the user.
        `password` | string |  required  | The password of the user.
        `password_confirmation` | string |  required  | The password confirmation of the user.
    
<!-- END_efd6fa1a70bef66efd5992b9552d100a -->

<!-- START_356aa57a5886f377e4e6eea0dad27149 -->
## Login an Admin

Authenticates an administrator.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "email": "mail@mail.com",
    "password": "quis"
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
    'http://localhost/api/v1/admin/login',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'email' => 'mail@mail.com',
            'password' => 'quis',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/admin/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"email":"mail@mail.com","password":"quis"}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "Request completed successfully."
    },
    "data": {
        "id": 1,
        "uuid": "EIFAJEAF-EAFHEOA-4343D",
        "name": "Jane Doe",
        "email": "jane@doe.com",
        "token": "7geRI9P4LUFj3ensaxOV070Uk1yXeQ23ptqerJYc"
    }
}
```
> Example response (422):

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

<!-- START_26e2f157fc5bdd5eb2e41366c6ef6cf9 -->
## Send Reset Password for Admin
Generates password reset code for admins and sends to mail with instruction.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/password/reset/code"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "email": "mail@mail.com"
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
    'http://localhost/api/v1/admin/password/reset/code',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'email' => 'mail@mail.com',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/admin/password/reset/code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"email":"mail@mail.com"}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "The reset code is sent via email. Kindly follow the mail to complete the password reset process."
    },
    "data": []
}
```

### HTTP Request
`POST api/v1/admin/password/reset/code`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | The email of the admin.
    
<!-- END_26e2f157fc5bdd5eb2e41366c6ef6cf9 -->

<!-- START_4c9df3d83494138e85c893356b090f5d -->
## Reset Password for Admin
Reset the password for admin using the detail provided.

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/admin/password/reset/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "reset_code": "LKJFAIE",
    "email": "mail@mail.com",
    "password": "enim",
    "password_confirmation": "minima"
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
    'http://localhost/api/v1/admin/password/reset/update',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'json' => [
            'reset_code' => 'LKJFAIE',
            'email' => 'mail@mail.com',
            'password' => 'enim',
            'password_confirmation' => 'minima',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://localhost/api/v1/admin/password/reset/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"reset_code":"LKJFAIE","email":"mail@mail.com","password":"enim","password_confirmation":"minima"}'

```


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "Request completed successfully."
    },
    "data": {
        "id": 1,
        "uuid": "EIFAJEAF-EAFHEOA-4343D",
        "name": "Jane Doe",
        "email": "jane@doe.com",
        "token": "7geRI9P4LUFj3ensaxOV070Uk1yXeQ23ptqerJYc"
    }
}
```

### HTTP Request
`POST api/v1/admin/password/reset/update`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `reset_code` | string |  required  | The reset code sent via mail.
        `email` | string |  required  | The email of the admin.
        `password` | string |  required  | The password of the admin.
        `password_confirmation` | string |  required  | The password confirmation of the admin.
    
<!-- END_4c9df3d83494138e85c893356b090f5d -->

<!-- START_8a4d15dcbadf16adf64dd6109f40540a -->
## User Profile
Gets the profile for investor or entrepreneur

> Example request:

```javascript
const url = new URL(
    "http://localhost/api/v1/user/profile"
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
    'http://localhost/api/v1/user/profile',
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
    -G "http://localhost/api/v1/user/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```


> Example response (401):

```json
{
    "error": {
        "code": 401,
        "message": "Unauthenticated."
    }
}
```

### HTTP Request
`GET api/v1/user/profile`


<!-- END_8a4d15dcbadf16adf64dd6109f40540a -->


