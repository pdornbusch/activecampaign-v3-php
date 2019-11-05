<?php

namespace Mediatoolkit\ActiveCampaign\Connections;

use Mediatoolkit\ActiveCampaign\Resource;


// TODO: update phpdoc comments
/**
 * Class EcomCustomers
 * @package Mediatoolkit\ActiveCampaign\EcomCustomers
 * @see https://developers.activecampaign.com/reference#customers
 */
class Connections extends Resource
{

    /**
     * Create a Customer
     * @see https://developers.activecampaign.com/reference#create-customer
     *
     * @param array $contact
     * @return string
     */
    public function create(array $connection)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/connections', [
                'json' => [
                    'connection' => $connection
                ]
            ]);

        return $req->getBody()->getContents();
    }


    /**
     * Get EcomCustomer
     * @see https://developers.activecampaign.com/reference#get-customer
     *
     * @param int $id
     * @return string
     */
    public function get(int $id)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/connections/' . $id);

        return $req->getBody()->getContents();
    }


    /**
     * Update a contact
     * @see https://developers.activecampaign.com/reference#update-customer
     *
     * @param int $id
     * @param array $contact
     * @return string
     */
    public function update(int $id, array $connection)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/connections/' . $id, [
                'json' => [
                    'connection' => $connection
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Delete a contact
     * @see https://developers.activecampaign.com/reference#delete-customer
     *
     * @param int $id
     * @return string
     */
    public function delete(int $id)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/connections/' . $id);

        return 200 === $req->getStatusCode();
    }


    /**
     * List all contacts
     * @see https://developers.activecampaign.com/reference#list-all-contacts
     *
     * @param array $query_params
     * @param int $limit
     * @param int $offset
     * @return string
     */
    public function listAll(array $query_params = [], int $limit = 20, int $offset = 0)
    {
        $query_params = array_merge($query_params, [
            'limit' => $limit,
            'offset' => $offset
        ]);

        $req = $this->client
            ->getClient()
            ->get('/api/3/connections', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }
}
