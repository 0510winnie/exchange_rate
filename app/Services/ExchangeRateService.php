<?php

namespace App\Services;

class ExchangeRateService
{
    public function query($currency)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20csv%20where%20url%3D%27http%3A%2F%2Frate.bot.com.tw%2Fxrt%2Fflcsv%2F0%2Fday%27&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');

        $body = $res->getBody();

        $data = json_decode($body);

        $rows = $data->query->results->row;

        foreach ($rows as $row)
        {
            // echo $row->col0 . ' ' . $row->col13 . PHP_EOL;
            if ($row->col0 === $currency) {
                return $row->col13;
            }
        }

        return null;
    }
}
