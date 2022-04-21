<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\Admin;
use App\Entity\City;
use App\Entity\Country;
use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Main AppFixture's class
 */
class EventFixtures extends Fixture
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
        $faker = Factory::create('fr_FR');
        $nbEntities = 10;
        $nbCountry = 5;
        $nbCity = 3;
        $nbAddress = 2;

        //Create Author of Events
        $admin = (new Admin())
            ->setLastname($faker->lastName())
            ->setFirstname($faker->firstName())
            ->setPhoneNumber($faker->phoneNumber())
            ->setEmail($faker->email())
            ->setDescription($faker->sentence(6))
            ->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'admin'));
        $manager->persist($admin);

        //Create Countries
        for ($c = 0; $c < $nbCountry; $c++) {
            $country = (new  Country())
                ->setName($faker->country())
                ->setIndicative($faker->countryCode())
                ->setAuthor($admin)
                ->setFlagFilename($faker->image());
            $manager->persist($country);

            //Create city for this Country
            for ($cy = 0; $cy < $nbCity; $cy++) {
                $city = (new City())
                    ->setAuthor($admin)
                    ->setZipcode($faker->numberBetween(11111, 99999))
                    ->setName($faker->city())
                    ->setCountry($country);
                $manager->persist($city);

                // Create Address for each City
                for ($a = 0; $a < $nbAddress; $a++) {
                    //Create address for this City
                    $address = (new Address())
                        ->setCity($city)
                        ->setNumber($faker->numberBetween(1, 120))
                        ->setStreet($faker->address())
                        ->setUser($admin)
                    ;
                    $manager->persist($address);
                }
            }
        }
        $manager->flush();

        // Prepare Stuffs for the next steps
        $addresses = $manager->getRepository(Address::class)->findAll();

        // Create Users0
        for ($i = 0; $i < $nbEntities; $i++) {
            $event = (new Event())
                ->setDescription($faker->sentence(6))
                ->setNbPlace($faker->numberBetween(2, 10))
                ->setNbOfDeslike(0)
                ->setNbOfLike(0)
                ->setTitle($faker->text($faker->numberBetween(20, 100)))
                ->setAuthor($admin)
                ->setAddress($addresses[$faker->numberBetween(0, $nbAddress - 1)]);
            $manager->persist($event);
        }
        $manager->flush();
    }
}
