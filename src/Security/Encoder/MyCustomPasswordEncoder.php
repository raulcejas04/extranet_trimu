<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

//namespace Symfony\Component\Security\Core\Encoder;

namespace App\Security\Encoder;


use Symfony\Component\Security\Core\Encoder\BasePasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
//use Symfony\Component\Security\Core\User\UserInterface;
//use App\Security\Encoder\EncoderFactoryInterface;


class MyCustomPasswordEncoder implements PasswordEncoderInterface
{
    /*private $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        //$this->encoderFactory = $encoderFactory;
    }*/

    
    //public function encodePassword(UserInterface $user, string $plainPassword)
    public function encodePassword( $raw, $plainPassword)
    {
        //die('Esta usando mi encoder');
        //$encoder = $this->encoderFactory->getEncoder($user);

        //return $encoder->encodePassword($plainPassword, $user->getSalt());
        return $plainPassword;
    }

    //public function isPasswordValid(UserInterface $user, string $raw)
    public function isPasswordValid(string $encoded, $raw, $salt)
    {
        /*if (null === $user->getPassword()) {
            return false;
        }*/

        //die('Esta usando la mia');

        //$encoder = $this->encoderFactory->getEncoder($user);

        //return $encoder->isPasswordValid($user->getPassword(), $raw, $user->getSalt());
        
        //return $mival->validarPasswordTrimu( $encoded, $raw);
        //return true;
    }


    public function needsRehash(string $encoded) : bool
    //public function needsRehash(UserInterface $user): bool
    {
        return false;
    }

}

