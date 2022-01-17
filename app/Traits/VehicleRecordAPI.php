<?php

namespace App\Traits;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use function GuzzleHttp\Promise\settle;

trait VehicleRecordAPI{
    private $key;
    protected $detail;
    protected $image;

    public function __construct()
    {
        $this->key = '95c7c88c-b8ea-4576-a820-1637ae4001e2';
        $this->detail = 'https://uk1.ukvehicledata.co.uk/api/datapackage/VehicleData?v=2&api_nullitems=1&auth_apikey='.$this->key.'&key_VRM=';
        $this->image = 'https://uk1.ukvehicledata.co.uk/api/datapackage/VehicleImageData?v=2&api_nullitems=1&auth_apikey='.$this->key.'&key_VRM=';
    }

    public function call($uri)
	{
        $client = new Client();
        $response = $client->get($uri);

        $response = json_decode($response->getBody(), true);
        return $response;
    }

    public function searchVehicle($vrm = null)
    {
        $uri = $this->detail . $vrm;
        $response = $this->call($uri);
        return $response['Response'];
    }

    public function searchVehicleImage($vrm = null)
    {
        $uri = $this->image . $vrm;
        $response = $this->call($uri);
        return $response['Response'];
    }
}
