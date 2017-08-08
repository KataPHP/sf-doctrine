<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i=1; $i<=5; $i++) {
            $user = (new User())
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setMail($faker->email)
            ;

            $manager->persist($user);
            $manager->flush();

            $this->addReference(sprintf('user-%s', $i), $user);
        }
    }

    public function getOrder()
    {
        return 2;
    }
}
