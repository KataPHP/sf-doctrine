<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 *
 * @author Florent DESPIERRES <florent.despierres.ext@francetv.fr>
 *
 * @ORM\Entity()
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="firstname", type="string", length=50, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Email()
     *
     * @ORM\Column(name="mail", type="string", length=250, nullable=true)
     */
    private $mail;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_enabled", type="boolean")
     */
    private $enabled = true;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Order", mappedBy="user")
     */
    private $orders;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return sprintf('%s %s', $this->firstname, $this->lastname);
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return User
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     *
     * @return User
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param ArrayCollection $orders
     * @return User
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
        return $this;
    }

    /**
     * Add a new order to our user.
     *
     * @param Order $order
     */
    public function addOrder(Order $order)
    {
        $this->orders->add($order);
        $order->setUser($this);
    }
}
