<?php

namespace Mediatoolkit\ActiveCampaign\EcomCustomers;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class EcomCustomers
 * @package Mediatoolkit\ActiveCampaign\EcomCustomers
 * @see https://developers.activecampaign.com/reference#customers
 */
class EcomCustomers extends Resource
{

    /**
     * Create a Customer
     * @see https://developers.activecampaign.com/reference#create-customer
     *
     * @param array $contact
     * @return string
     */
    public function create(array $ecomCustomer)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/ecomCustomers', [
                'json' => [
                    'ecomCustomer' => $ecomCustomer
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
            ->get('/api/3/ecomCustomers/' . $id);

        return $req->getBody()->getContents();
    }


    /**
     * Update a customer
     * @see https://developers.activecampaign.com/reference#update-customer
     *
     * @param int $id
     * @param array $contact
     * @return string
     */
    public function update(int $id, array $ecomCustomer)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/ecomCustomers/' . $id, [
                'json' => [
                    'contact' => $ecomCustomer
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Delete a customer
     * @see https://developers.activecampaign.com/reference#delete-customer
     *
     * @param int $id
     * @return string
     */
    public function delete(int $id)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/ecomCustomers/' . $id);

        return 200 === $req->getStatusCode();
    }


    /**
     * List all customers
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
            ->get('/api/3/ecomCustomers', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }
}
