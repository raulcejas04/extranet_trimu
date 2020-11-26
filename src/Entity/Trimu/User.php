<?php

namespace App\Entity\Trimu;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\EncoderAwareInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="Usuarios", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D649F85E0677", columns={"id"})})
 */
class User implements UserInterface, EncoderAwareInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string",name="C_USUARIO",unique=true)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, name="D_MAIL")
     */
    private $email;

    /**
     * @ORM\Column(type="integer", name="ID_CONTRIBUYENTE")
     */
    private $idContribuyente;

    /**
     * @ORM\Column(type="json",name="ROLES")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string",name="c_clave")
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getidContribuyente(): ?int
    {
        return $this->idContribuyente;
    }
    public function setidContribuyente(int $idContribuyente): self
    {
        $this->idContribuyente = $idContribuyente;
        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->id;
    }

    public function setUsername(string $username): self
    {
        $this->id = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    function needsRehash(UserInterface $user): bool
    {
        return false;
    }

    public function getEncoderName()
    {
        /*if ($this->isAdmin()) {
            return 'harsh';
        }*/

        return null; // use the default encoder
    }
}
