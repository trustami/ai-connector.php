<?php
namespace Trustami\TrustamiAi;

class Connector
{
    const BaseURL = "https://api.trustami.ai";

    private string $token;

    protected function init(string $token)
    {
        $this->token = $token;
    }

    protected function makeRequest(string $url, array $data)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, self::BaseURL . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($data)),
            'Authorization: Bearer ' . $this->token,
        ));

        $result = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($result, true);

        if (!$data) {
            throw new \Exception("Invalid API response");
        } else if (isset($data["status"]) && !$data["status"]) {
            throw new \Exception($data["error"]);
        }

        return $data;
    }
}
