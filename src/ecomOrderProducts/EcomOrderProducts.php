<?php

namespace Mediatoolkit\ActiveCampaign\EcomOrderProducts;

use Mediatoolkit\ActiveCampaign\Resource;

/**
 * Class EcomOrderProducts
 * @package Mediatoolkit\ActiveCampaign\EcomOrderProducts
 * @see https://developers.activecampaign.com/reference#orders
 */
class EcomOrderProducts extends Resource
{

    /**
     * List EcomOrderProducts
     * @see https://developers.activecampaign.com/reference#list-ecomorderproducts
     *
     * @return string
     */
    public function getEcomOrderProducts()
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/ecomOrderProducts');

        return $req->getBody()->getContents();
    }


    /**
     * List EcomOrderProducts for a Specific EcomOrder
     * @see https://developers.activecampaign.com/reference#list-products-for-order
     *
     * @param int $ecomOrderId
     * @return string
     */
    public function getEcomOrderProductsForSpecificOrder(int $ecomOrderId)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/ecomOrders/' . $ecomOrderId . '/orderProducts');

        return $req->getBody()->getContents();
    }


    /**
     * Retrieve an EcomOrderProduct
     * @see https://developers.activecampaign.com/reference#retrieve-an-ecomorderproduct
     *
     * @param int $ecomOrderProductId
     * @return string
     */
    public function getEcomOrderProduct(int $ecomOrderProductId)
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/ecomOrderProducts/' . $ecomOrderProductId);

        return $req->getBody()->getContents();
    }
}
