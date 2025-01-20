<?php

namespace App\Services;

use GuzzleHttp\Client;

class PetService {
    protected $client;

    public function __construct() {
        $this->client = new Client(['base_uri' => 'https://petstore.swagger.io/v2/']);
    }

    public function getAllPets() {
        $response = $this->client->get('pet/findByStatus', ['query' => ['status' => 'available']]);
        return json_decode($response->getBody(), true);
    }

    public function getPet($id) {
        $response = $this->client->get("pet/{$id}");
        return json_decode($response->getBody(), true);
    }

    public function addPet($data) {
        $response = $this->client->post('pet', ['json' => $data]);
        return json_decode($response->getBody(), true);
    }

    public function updatePet($data) {
        $response = $this->client->put('pet', ['json' => $data]);
        return json_decode($response->getBody(), true);
    }

    public function deletePet($id) {
        $response = $this->client->delete("pet/{$id}");
        return json_decode($response->getBody(), true);
    }
}
