<?php

namespace Mvdgeijn\Pax8\Responses;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class Subscription extends AbstractResponse
{
    protected string $id;

    protected string $companyId;

    protected string $productId;

    protected int $quantity;

    protected Carbon $startDate;

    protected Carbon $createdDate;

    protected Carbon $billingStart;

    protected string $status;

    protected string $price;

    protected string $billingTerm;

    public static function createFromBody( string $body ): Collection
    {
        $json = json_decode( $body );

        $collection = new Collection();

        foreach( $json->content as $subscription )
        {
            $collection->add( Subscription::parseSubscription( $subscription ) );
        }

        return $collection;
    }

    public static function parseSubscription( object $data ): Subscription
    {
        $subscription = new Subscription();

        $subscription
            ->setId( $data->id )
            ->setCompanyId( $data->companyId )
            ->setProductId( $data->productId )
            ->setQuantity( $data->quantity )
            ->setStartDate( $data->startDate )
            ->setCreatedDate( $data->createdDate )
            ->setBillingStart( $data->billingStart )
            ->setStatus( $data->status )
            ->setPrice($data->price )
            ->setBillingTerm( $data->billingTerm );

        return $subscription;
    }

    /**
     * @param string $id
     * @return Subscription
     */
    public function setId(string $id): Subscription
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $companyId
     * @return Subscription
     */
    public function setCompanyId(string $companyId): Subscription
    {
        $this->companyId = $companyId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->companyId;
    }

    /**
     * @param string $productId
     * @return Subscription
     */
    public function setProductId(string $productId): Subscription
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductId(): string
    {
        return $this->productId;
    }

    /**
     * @param int $quantity
     * @return Subscription
     */
    public function setQuantity(int $quantity): Subscription
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param mixed $startDate
     * @return Subscription
     */
    public function setStartDate($startDate): Subscription
    {
        $this->startDate = Subscription::getDate($startDate);
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getStartDate(): Carbon
    {
        return $this->startDate;
    }

    /**
     * @param mixed $createdDate
     * @return Subscription
     */
    public function setCreatedDate($createdDate): Subscription
    {
        $this->createdDate = Subscription::getDate( $createdDate );
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getCreatedDate(): Carbon
    {
        return $this->createdDate;
    }

    /**
     * @param mixed $billingStart
     * @return Subscription
     */
    public function setBillingStart($billingStart): Subscription
    {
        $this->billingStart = Subscription::getDate( $billingStart );
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getBillingStart(): Carbon
    {
        return $this->billingStart;
    }

    /**
     * @param string $status
     * @return Subscription
     */
    public function setStatus(string $status): Subscription
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $price
     * @return Subscription
     */
    public function setPrice(string $price): Subscription
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $billingTerm
     * @return Subscription
     */
    public function setBillingTerm(string $billingTerm): Subscription
    {
        $this->billingTerm = $billingTerm;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingTerm(): string
    {
        return $this->billingTerm;
    }


}
