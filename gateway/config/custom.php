<?php

return [
    "auth_service" => env("AUTHENTICATOR_SERVICE_URL"),
    "inquire_url" => sprintf("%s/%s", env("AUTHENTICATOR_SERVICE_URL"), env("AUTH_INQUIRE_URI")),
    "msg_service" => env("MESSENGER_SERVICE_URL"),
];
