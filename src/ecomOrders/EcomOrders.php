<?php

namespace Mediatoolkit\ActiveCampaign\EcomOrders;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class EcomOrders
 * @package Mediatoolkit\ActiveCampaign\EcomOrders
 * @see https://developers.activecampaign.com/reference#orders
 */
class EcomOrders extends Resource
{

    /**
     * Create an Order
     * @see https://developers.activecampaign.com/reference#create-order
     *
     * @param array $order
     * @return string
     */
    public function create(array $order)
    {
        $req = $this->client
            ->getClient()
            ->post('/api/3/ecomOrders', [
                'json' => [
                    'ecomOrder' => $order
                ]
            ]);

        return $req->getBody()->getContents();
    }


    /**
     * Retrieve an Order
     * @see https://developers.activecampaign.com/reference#get-order
     *
     * @param int $id
     * @return string
     */
    public function get(int $id)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/ecomOrders/' . $id);

        return $req->getBody()->getContents();
    }


    /**
     * Update an Order
     * @see https://developers.activecampaign.com/reference#update-order
     *
     * @param int $id
     * @param array $order
     * @return string
     */
    public function update(int $id, array $order)
    {
        $req = $this->client
            ->getClient()
            ->put('/api/3/ecomOrders/' . $id, [
                'json' => [
                    'ecomOrder' => $order
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * Delete an Order
     * @see https://developers.activecampaign.com/reference#delete-order
     *
     * @param int $id
     * @return string
     */
    public function delete(int $id)
    {
        $req = $this->client
            ->getClient()
            ->delete('/api/3/ecomOrders/' . $id);

        return 200 === $req->getStatusCode();
    }


    /**
     * List all Orders
     * @see https://developers.activecampaign.com/reference#list-all-orders
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
            ->get('/api/3/ecomOrders', [
                'query' => $query_params
            ]);

        return $req->getBody()->getContents();
    }
}
