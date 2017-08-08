<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Article;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadArticle extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i=1; $i<=50; $i++) {
            $article = (new Article())
                ->setName($faker->name)
                ->setShortDescription($faker->text(250))
                ->setPrice($faker->randomFloat(2, 1, 5000))
            ;

            $manager->persist($article);
            $manager->flush();

            $this->addReference(sprintf('article-%s', $i), $article);
        }
    }

    public function getOrder()
    {
        return 1;
    }
}
