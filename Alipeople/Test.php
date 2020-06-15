<?php

namespace Alipeople;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Test
{
    public function getUserList($password) {
        if ($password != 'alipeople') {
            throw new Exception("Password is incorrect.", 422);
        }

        $client = new Client();
        try {
            $response = $client->get('https://reqres.in/api/users');
            $userList = $response->getBody();

            return json_decode($userList);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $exception = (string) $e->getResponse()->getBody();
                $exception = json_decode($exception);
                throw new Exception($exception, $e->getCode());
            } else {
                throw new Exception($e->getMessage(), 503);
            }
        }
    }
}