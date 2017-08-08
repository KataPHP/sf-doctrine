<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class OrderItem
 *
 * @author Florent DESPIERRES <florent.despierres.ext@francetv.fr>
 *
 * @ORM\Entity()
 * @ORM\Table(name="order_item")
 */
class OrderItem
{
    /**
     * @var Order
     *
     * @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="orderItems")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id", onDelete="CASCADE")
     *
     * @Assert\NotNull()
     */
    private $order;

    /**
     * @var Article
     *
     * @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id", onDelete="CASCADE")
     *
     * @Assert\NotNull()
     */
    private $article;

    /**
     * @var int
     *
     * @Assert\GreaterThan(0)
     *
     * @ORM\Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param Order $order
     * @return OrderItem
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param Article $article
     * @return OrderItem
     */
    public function setArticle($article)
    {
        $this->article = $article;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return OrderItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
}
