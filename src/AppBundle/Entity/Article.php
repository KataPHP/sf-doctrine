<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Article
 *
 * @author Florent DESPIERRES <florent.despierres.ext@francetv.fr>
 *
 * @ORM\Entity()
 * @ORM\Table(name="article")
 */
class Article
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
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="short_description", type="text", nullable=true)
     */
    private $shortDescription;

    /**
     * @var double
     *
     * @Assert\GreaterThan(0)
     *
     * @ORM\Column(name="price", type="float", nullable=true)
     */
    private $price;

    /**
     * @var bool
     *
     * @ORM\Column(name="in_stock", type="boolean", nullable=true)
     */
    private $inStock = true;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Article
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Article
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     * @return Article
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Article
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInStock()
    {
        return $this->inStock;
    }

    /**
     * @param bool $inStock
     * @return Article
     */
    public function setInStock($inStock)
    {
        $this->inStock = $inStock;
        return $this;
    }
}
