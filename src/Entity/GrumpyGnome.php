<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrumpyGnome
 *
 * @ORM\Table(name="grumpy_gnome")
 * @ORM\Entity
 */
class GrumpyGnome
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}
