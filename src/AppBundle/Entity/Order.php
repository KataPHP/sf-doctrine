<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Order
 *
 * @author Florent DESPIERRES <florent.despierres.ext@francetv.fr>
 *
 * @ORM\Entity()
 * @ORM\Table(name="user_order")
 */
class Order
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orders")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     *
     * @Assert\NotNull()
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=25)
     *
     * @Assert\NotBlank()
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date")
     */
    private $createdAt;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="OrderItem", mappedBy="order", cascade={"persist"})
     *
     * @Assert\NotNull()
     */
    private $orderItems;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->orderItems = new ArrayCollection();
        $this->createdAt = new \DateTime();
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
     * @return Order
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Order
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Order
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Order
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @param ArrayCollection $orderItems
     * @return Order
     */
    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;
        return $this;
    }

    /**
     * Add a new item to our order.
     *
     * @param OrderItem $item
     *
     * @return Order
     */
    public function addOrderItem(OrderItem $item)
    {
        $this->orderItems->add($item);
        $item->setOrder($this);

        return $this;
    }
}
