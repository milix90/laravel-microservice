## LARAVEL MICROSERVICE BEST PRACTICE - DOCKERIZED

### Quick Start

#### Running and Configuring the Services

```makefile
make run
```

- This command executes `docker-compose up -d`, performs database `migration`, and `seeds` the database.
- Import the Postman Collection by the `gp.postman_collection.json` file.

#### Stopping the Services

```makefile
make down
```
**The structure includes a `gateway` that directs requests to specified routes and evaluates different scenarios before triggering requests to their related services.**

### Scenario

This repository contains two microservices that support different approaches.

1. The `authenticator` service provides endpoints for login, user inquiry by `auth token`, and logout.
2. After 3 consecutive incorrect login attempts, the user is blocked for 3 minutes. After that, they can attempt to log in again.
3. The `messenger` service has a single endpoint that verifies the user by its token before accepting messages.
4. The `messenger` service calls the `authenticator` service within a middleware and receives acknowledgment and user details.

### Manual execution

**The Postman endpoints are available based on the CURL commands below.**

- Login

```curl
curl --location 'http://127.0.0.1:8080/api/v1/login' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--data-raw '{
    "email": "m.jackson@rip.io",
    "password": "password123"
}'
```

- Inquire

```curl
curl --location 'http://127.0.0.1:8080/api/v1/inquire' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer 42|Z2WNoVkqm7WjjKkusY0T60oT3GoXIfA8LostMxf050df53ba'
```

- Logout

```curl
curl --location --request POST 'http://127.0.0.1:8080/api/v1/logout' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer 43|sPJ5XAsDU9vEuOauF1bFqQw2cmfRuQQCvt943SZQ3519b63d'
```

- Submit Message

```curl
curl --location 'http://127.0.0.1:8080/api/v1/message/submit' \
--header 'Accept: application/json' \
--header 'Content-Type: application/json' \
--header 'Authorization: Bearer 43|sPJ5XAsDU9vEuOauF1bFqQw2cmfRuQQCvt943SZQ3519b63d' \
--data '{
    "message" : "Hey Duuuude. How Are you? :)"
}'
```
