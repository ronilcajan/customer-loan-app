<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GoogleAPI extends CI_Controller {

    /**
     * Returns an authorized API client.
     * @return Google_Client the authorized client object
     */
    function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Drive Activity API Quickstart');
        $client->setScopes(Google_Service_Appsactivity::ACTIVITY);
        $client->setAuthConfig('credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = 'token.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(fopen('php://stdin', 'r')));

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        return $client;
    }

    public function googledrive(){

        // Get the API client and construct the service object.
        $client = $this->getClient();
        $service = new Google_Service_Appsactivity($client);

        // Print the recent activity in your Google Drive.
        $optParams = array(
            'source' => 'drive.google.com',
            'drive.ancestorId' => 'root',
            'pageSize' => 10,
        );
        $results = $service->activities->listActivities($optParams);

        if (count($results->getActivities()) == 0) {
            print "No activity.\n";
        } else {
            print "Recent activity:\n";
            foreach ($results->getActivities() as $activity) {
                $event = $activity->getCombinedEvent();
                $user = $event->getUser();
                $target = $event->getTarget();
                if (empty($user) || empty($target)) {
                    continue;
                }
                $time = date(DateTime::RFC3339, $event->getEventTimeMillis() / 1000);
                printf("%s: %s, %s, %s (%s)\n", $time, $user->getName(),
                        $event->getPrimaryEventType(), $target->getName(),
                        $target->getMimeType());
            }
        }
    }
}