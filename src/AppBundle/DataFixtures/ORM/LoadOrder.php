<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Order;
use AppBundle\Entity\OrderItem;
use AppBundle\StaticModel\OrderStatus;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadOrder extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i=1; $i<=10; $i++) {
            $order = (new Order())
                ->setUser($this->getReference(sprintf('user-%s', $faker->numberBetween(1, 5))))
                ->setStatus(OrderStatus::CREATED)
            ;

            $nbItemMax = $faker->numberBetween(1, 10);
            $num = $faker->numberBetween(1, 40);
            for ($nbItem=1; $nbItem<=$nbItemMax; $nbItem++) {
                $item = (new OrderItem())
                    ->setArticle($this->getReference(sprintf('article-%s', $num+$nbItem)))
                    ->setQuantity($faker->randomDigitNotNull)
                ;

                $order->addOrderItem($item);
            }

            $manager->persist($order);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
