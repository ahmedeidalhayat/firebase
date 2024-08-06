# Firebase FCM Notification Package

This package provides an easy-to-use interface for integrating Firebase Cloud Messaging (FCM) notifications into your Laravel application. Developed by Ahmed Eid, CEO of Plan A, it simplifies sending push notifications to iOS and Android devices.

## Installation

You can install the package via Composer:

```bash
composer require ahmedeid46/firebase
```

# Configuration
Publish the configuration file:

```bash
php artisan vendor:publish --provider="Ahmedeid46\Firebase\NotificationServiceProvider"
```
Add your Firebase project credentials to your .env file:
```env
FIREBASE_PROJECT=your_firebase_project_id
FIREBASE_CREDENTIALS_PATH=/path/to/your/firebase/credentials.json
```
# Usage
Here is an example of how to use the package in your Laravel application:

Step 1: Use the Notification Class
Use the Notification class to set tokens, message, and title, then send the notification:

```php
use Ahmedeid46\Firebase\Notification;

// Resolve the Notification instance from the container
$notification = app(Notification::class);

// Use fluent interface to set properties and send the notification
$response = $notification
->setTokens(['device-token-1', 'device-token-2'])
->setTitle('Test Notification')
->setMessage('This is a test message')
->send();

// Output the response
dd($response);
```

# Fluent Interface
The `Notification` class supports a fluent interface, allowing you to chain method calls:

setTokens(array $tokens): Set the device tokens to which the notification will be sent.

setMessage(string $message): Set the message body of the notification.

setTitle(string $title): Set the title of the notification.

send(): Send the notification and return the response from the FCM API.

# Configuration File
The published configuration file can be found at config/notification.php. You can adjust the configuration settings according to your needs.

# License
This package is licensed under the MIT License. See the LICENSE file for more information.

# Support
For any issues or feature requests, please open an issue on the GitHub repository.

# Author
This package is developed by Ahmed Eid, CEO of Plan A.
