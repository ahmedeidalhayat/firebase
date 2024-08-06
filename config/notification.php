<?php

return [
    'token' => env('NOTIFICATION_TOKEN', ''),
    'firebase_project' => env('FIREBASE_PROJECT', ''),
    'credentials_path' => storage_path(env('FIREBASE_CREDENTIALS_PATH', 'app/firebase_file.json')),
];