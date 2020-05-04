<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="deliveryaddress", type="string", length=255)
     */
    private $deliveryaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="invoiceaddress", type="string", length=255)
     */
    private $invoiceaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=45)
     */
    private $phone;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Client
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set deliveryaddress
     *
     * @param string $deliveryaddress
     *
     * @return Client
     */
    public function setDeliveryaddress($deliveryaddress)
    {
        $this->deliveryaddress = $deliveryaddress;

        return $this;
    }

    /**
     * Get deliveryaddress
     *
     * @return string
     */
    public function getDeliveryaddress()
    {
        return $this->deliveryaddress;
    }

    /**
     * Set invoiceaddress
     *
     * @param string $invoiceaddress
     *
     * @return Client
     */
    public function setInvoiceaddress($invoiceaddress)
    {
        $this->invoiceaddress = $invoiceaddress;

        return $this;
    }

    /**
     * Get invoiceaddress
     *
     * @return string
     */
    public function getInvoiceaddress()
    {
        return $this->invoiceaddress;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Client
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
}

