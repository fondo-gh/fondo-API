---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Startup Registration

API routes for registering startups on the platform

Class StartupRegistrationApiController
<!-- START_af3acc7ec335a1b55c53dc63fe31aac0 -->
## * Register a Startup

Registers a startup. First step out of 7 steps.
The same route is used to update the startup, if startup id is provided.
When registration is done, a startup id is returned. This then can be used for the next stages.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/startup/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"company_name":"Jane Ventures","caption":"quisquam","product_image":"quis","funds_to_raise":"Ghc 234.00","duration_for_raise":"3 months.","startup_id":1}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/startup/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "company_name": "Jane Ventures",
    "caption": "quisquam",
    "product_image": "quis",
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


> Example response (200):

```json
{
    "success": {
        "code": 200,
        "message": "Request completed successfully."
    },
    "data": {
        "startup_id": 1
    }
}
```

### HTTP Request
`POST api/v1/startup/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `company_name` | string |  required  | The name of the startup.
        `caption` | string |  required  | The caption of the startup.
        `product_image` | file |  optional  | The image of the startup product. Do not submit a null image field.
        `funds_to_raise` | string |  required  | The funds to raise for startup.
        `duration_for_raise` | string |  required  | The duration needed to raise funds.
        `startup_id` | integer |  optional  | The id of the startup if updating.
    
<!-- END_af3acc7ec335a1b55c53dc63fe31aac0 -->

<!-- START_ec7a7a59b235b51d4172b9f5abc84c0a -->
## Startup Detail for a Startup

Updates a startup with further startup details.
The same route is used to update.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/startup/startup_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"startup_id":1,"startup_type_id":1,"startup_industry_id":1,"has_patent":true,"location":"harum"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/startup/startup_detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "startup_id": 1,
    "startup_type_id": 1,
    "startup_industry_id": 1,
    "has_patent": true,
    "location": "harum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
    `startup_id` | integer |  required  | The id of the startup that startup details belong to.
        `startup_type_id` | integer |  required  | The id of the startup type - ie LIMITED.
        `startup_industry_id` | integer |  required  | The id of the startup industry - ie Agriculture.
        `has_patent` | boolean |  required  | Startup has patent or not.
        `location` | string |  optional  | Startup location.
    
<!-- END_ec7a7a59b235b51d4172b9f5abc84c0a -->

<!-- START_f5671621580735616ec788223c32deb9 -->
## Contact Details for a Startup

Updates a startup with Contact details.
The same route is used to update.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/startup/contact_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"startup_id":1,"email":"jane@ventures.com","phone":"molestiae","facebook_handle":"in","twitter_handle":"ipsum","instagram_handle":"unde","linkdin_handle":"fuga","skype_handle":"hic"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/startup/contact_detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "startup_id": 1,
    "email": "jane@ventures.com",
    "phone": "molestiae",
    "facebook_handle": "in",
    "twitter_handle": "ipsum",
    "instagram_handle": "unde",
    "linkdin_handle": "fuga",
    "skype_handle": "hic"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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

Updates a startup with Business model detail.
The same route is used to update.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/startup/business_model" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"startup_id":1,"key_resources":"aperiam","customer_target":"consequuntur","value_proposition":"et","sales_channels":"et","revenue_streams":"vel","key_metrics":"suscipit","cost_structure":"quod","financial_file":"sapiente","optional_file":"quis"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/startup/business_model"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "startup_id": 1,
    "key_resources": "aperiam",
    "customer_target": "consequuntur",
    "value_proposition": "et",
    "sales_channels": "et",
    "revenue_streams": "vel",
    "key_metrics": "suscipit",
    "cost_structure": "quod",
    "financial_file": "sapiente",
    "optional_file": "quis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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

<!-- START_9f81627daca3accf82a01c1fe5f1e36d -->
## Product Detail for a Startup

Updates a startup with product detail.
The same route is used to update.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/startup/product_detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"startup_id":1,"product_progress_id":1,"product_url":"consectetur"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/startup/product_detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "startup_id": 1,
    "product_progress_id": 1,
    "product_url": "consectetur"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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

#User Management


APIs for managing users - entrepreneurs and investors
<!-- START_7a184547882598fc164c10be7745584b -->
## Login a User

Authenticates an entrepreneur or investor.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/user/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"mail@mail.com","password":"fugiat"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "mail@mail.com",
    "password": "fugiat"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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

```bash
curl -X GET \
    -G "http://localhost/api/v1/user/types" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/types"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Entrepreneur"
        },
        {
            "id": 1,
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

```bash
curl -X POST \
    "http://localhost/api/v1/user/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"first_name":"Jane","last_name":"Doe","picture":"iste","user_type_id":1,"email":"mail@mail.com","password":"eligendi","password_confirmation":"consequatur"}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/user/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "Jane",
    "last_name": "Doe",
    "picture": "iste",
    "user_type_id": 1,
    "email": "mail@mail.com",
    "password": "eligendi",
    "password_confirmation": "consequatur"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
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
        `password_confirmation` | string |  required  | The password confirmation for the password..
    
<!-- END_7fef01e7235c89049ebe3685de4bff17 -->

#general


<!-- START_0c068b4037fb2e47e71bd44bd36e3e2a -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET oauth/authorize`


<!-- END_0c068b4037fb2e47e71bd44bd36e3e2a -->

<!-- START_e48cc6a0b45dd21b7076ab2c03908687 -->
## Approve the authorization request.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/authorize`


<!-- END_e48cc6a0b45dd21b7076ab2c03908687 -->

<!-- START_de5d7581ef1275fce2a229b6b6eaad9c -->
## Deny the authorization request.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/authorize`


<!-- END_de5d7581ef1275fce2a229b6b6eaad9c -->

<!-- START_a09d20357336aa979ecd8e3972ac9168 -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/token`


<!-- END_a09d20357336aa979ecd8e3972ac9168 -->

<!-- START_d6a56149547e03307199e39e03e12d1c -->
## Get all of the authorized tokens for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET oauth/tokens`


<!-- END_d6a56149547e03307199e39e03e12d1c -->

<!-- START_a9a802c25737cca5324125e5f60b72a5 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/oauth/tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/tokens/{token_id}`


<!-- END_a9a802c25737cca5324125e5f60b72a5 -->

<!-- START_abe905e69f5d002aa7d26f433676d623 -->
## Get a fresh transient token cookie for the authenticated user.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/token/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/token/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/token/refresh`


<!-- END_abe905e69f5d002aa7d26f433676d623 -->

<!-- START_babcfe12d87b8708f5985e9d39ba8f2c -->
## Get all of the clients for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET oauth/clients`


<!-- END_babcfe12d87b8708f5985e9d39ba8f2c -->

<!-- START_9eabf8d6e4ab449c24c503fcb42fba82 -->
## Store a new client.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/clients`


<!-- END_9eabf8d6e4ab449c24c503fcb42fba82 -->

<!-- START_784aec390a455073fc7464335c1defa1 -->
## Update the given client.

> Example request:

```bash
curl -X PUT \
    "http://localhost/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT oauth/clients/{client_id}`


<!-- END_784aec390a455073fc7464335c1defa1 -->

<!-- START_1f65a511dd86ba0541d7ba13ca57e364 -->
## Delete the given client.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/clients/{client_id}`


<!-- END_1f65a511dd86ba0541d7ba13ca57e364 -->

<!-- START_9e281bd3a1eb1d9eb63190c8effb607c -->
## Get all of the available scopes for the application.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/scopes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/scopes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET oauth/scopes`


<!-- END_9e281bd3a1eb1d9eb63190c8effb607c -->

<!-- START_9b2a7699ce6214a79e0fd8107f8b1c9e -->
## Get all of the personal access tokens for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET oauth/personal-access-tokens`


<!-- END_9b2a7699ce6214a79e0fd8107f8b1c9e -->

<!-- START_a8dd9c0a5583742e671711f9bb3ee406 -->
## Create a new personal access token for the user.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/personal-access-tokens`


<!-- END_a8dd9c0a5583742e671711f9bb3ee406 -->

<!-- START_bae65df80fd9d72a01439241a9ea20d0 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/oauth/personal-access-tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/personal-access-tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/personal-access-tokens/{token_id}`


<!-- END_bae65df80fd9d72a01439241a9ea20d0 -->


