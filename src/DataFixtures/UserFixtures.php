<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Comment;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Main AppFixture's class
 */
class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    /**
     * @param UserPasswordHasherInterface $passwordHasher
     */
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $faker      = Factory::create('fr_FR');
        $nb_entities= 10;
        $nb_comment = 3;
        $nb_event   = 4;

//        // Create Users
//        for ($i = 0; $i < $nb_entities; $i++) {
//            $user = (new User())
//                ->setLastname($faker->lastName())
//                ->setFirstname($faker->firstName())
//                ->setPhoneNumber($faker->phoneNumber())
//                ->setEmail($faker->email())
//                ->setDescription($faker->sentence(6))
//                ->setRoles(['ROLE_USER']);
//            $user->setPassword($this->passwordHasher->hashPassword($user, 'user'));
//            $manager->persist($user);
//        }
//        $manager->flush();
    }
}
