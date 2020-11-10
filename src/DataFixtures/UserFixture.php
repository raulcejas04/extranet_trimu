<?php

namespace App\DataFixtures;

use App\Entity\User;
//use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends BaseFixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_users', function($i) {
            $user = new User();
            $user->setUsername(sprintf('spacebar%d', $i));
            //$user->setPassword(sprintf('spacebar%d', $i));
            $user->setEmail(sprintf('spacebar%d@example.com', $i));
            
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'engage'
            ));

            return $user;
        });
        
        $this->createMany(3, 'admin_users', function($i) {
            $user = new User();
            $user->setEmail(sprintf('admin%d@thespacebar.com', $i+10));
            $user->setUsername(sprintf('spacebar%d', $i+10));
            //$user->setFirstName($this->faker->firstName);
            $user->setRoles(['ROLE_ADMIN']);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'engage'
            ));
            return $user;
        });

        $manager->flush();
    }
}
