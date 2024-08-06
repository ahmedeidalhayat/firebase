<?php
namespace Ahmedeid46\Firebase;
use Google_Client;
use GuzzleHttp\Client;

class Notification
{
    protected $tokens = [];
    protected $message;
    protected $title;
    protected $credentialsPath;
    protected $firebaseProject;

    public function __construct()
    {
        $this->credentialsPath = config('ae_notification.credentials_path');
        $this->firebaseProject = config('ae_notification.FIREBASE_PROJECT');
    }

    public function setTokens(array $tokens)
    {
        $this->tokens = $tokens;
        return $this; // Enables method chaining
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this; // Enables method chaining
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this; // Enables method chaining
    }

    public function send()
    {
        $client = new Client();

        foreach ($this->tokens as $token) {
            $response = $client->post('https://fcm.googleapis.com/v1/projects/' . $this->firebaseProject . '/messages:send', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->getAccessToken(),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'message' => [
                        'token' => $token,
                        'notification' => [
                            'title' => $this->title,
                            'body' => $this->message,
                        ],
                    ],
                ],
            ]);
        }

        return $response;
    }

    private function getAccessToken()
    {
        $client = new Google_Client();
        $client->setAuthConfig($this->credentialsPath);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        $token = $client->fetchAccessTokenWithAssertion();
        return $token['access_token'];
    }
}