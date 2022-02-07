<?php

namespace Mvdgeijn\Pax8\Responses;

use Carbon\Carbon;
use Exception;
use Mvdgeijn\Pax8\Collections\PaginatedCollection;

class Contact extends AbstractResponse
{
    protected string $id;

    protected string $firstName;

    protected string $lastName;

    protected string $email;

    protected string $phone;

    protected string $phoneCountryCode;

    protected string $phoneNumber;

    protected Carbon $createdDate;

    protected ContactType $types;

    public static function parse( object $item ): Contact
    {
        return (new Contact())
            ->setId( $item->id )
            ->setFirstName($item->firstName )
            ->setLastName($item->lastName )
            ->setEmail($item->email)
            ->setPhone($item->phone)
            ->setPhoneCountryCode($item->phoneCountryCode)
            ->setPhoneNumber($item->phoneNumber)
            ->setcreatedDate($item->createdDate)
            ->setTypes( $item->types );
    }

    /**
     * Create contact array for contact:create request
     *
     * @return array
     */
    public function createContact()
    {
        return [
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'types' => $this->getTypes()
        ];
    }

    /**
     * @param mixed $id
     * @return Contact
     */
    public function setId($id): Contact
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $firstName
     * @return Contact
     */
    public function setFirstName($firstName): Contact
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $lastName
     * @return Contact
     */
    public function setLastName($lastName): Contact
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $email
     * @return Contact
     */
    public function setEmail($email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param mixed $phone
     * @return Contact
     */
    public function setPhone($phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phoneCountryCode
     * @return Contact
     */
    public function setPhoneCountryCode($phoneCountryCode): Contact
    {
        $this->phoneCountryCode = $phoneCountryCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneCountryCode()
    {
        return $this->phoneCountryCode;
    }

    /**
     * @param mixed $createdDate
     * @return Contact
     */
    public function setCreatedDate($createdDate): Contact
    {
        $this->createdDate = Contact::getDate( $createdDate );

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param mixed $types
     * @return Contact
     *
     * @throws \Exception
     */
    public function setTypes( $types ): Contact
    {
        if( is_array( $types ) )
            $this->types = ContactType::create( $types );
        elseif( is_object( $types ) && get_class($types) == ContactType::class )
            $this->types = $types;
        else
            throw new Exception("Invalid types passed to contact");

        return $this;
    }

    /**
     * @return ContactType
     */
    public function getTypes(): ContactType
    {
        return $this->types;
    }

    /**
     * @param mixed $phoneNumber
     * @return Contact
     */
    public function setPhoneNumber($phoneNumber): Contact
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}
