<?php

namespace App\Helper;

use App\Helper\ConnectionException;

class Requester
{

    public function doCurlRequest($curl)
    {
      
          $response = curl_exec($curl);
        // Check for errors
        if($response === false) {
            $error = curl_errno($curl);
            $message = curl_error($curl);
            curl_close($curl);
            throw new ConnectionException("Network error " . $message . " (" . $error . ")");
        }

        // Check status code
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if($statusCode != 200) {
            throw new ConnectionException("Status code " . $statusCode, $statusCode, $response);
        }

        return array( "statusCode" => $statusCode, "body" => $response );
    }

}