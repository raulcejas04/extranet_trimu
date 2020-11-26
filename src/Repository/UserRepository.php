<?php

namespace App\Repository;

use App\Entity\Trimu\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    function validarPasswordTrimu( $password, $raw, $cuit )
    {
        
    $entityManager = $this->getEntityManager();
    $sql = "SELECT pac_encripta.encripta_new('".$raw."') as RAW_ENCRYPTED FROM dual";
    // $sql = "SELECT 1 FROM App\Entity\Trimu\User u WHERE Id :id";
    //$query = $entityManager->createQuery( $sql )->setParameter('id',$cuit);
    $query = $entityManager->getConnection()->prepare($sql);
    $query->execute();
    $res = $query->fetchAssociative();
    return $res['RAW_ENCRYPTED']==$password;
    }

    public function findMio($value): ?User
    {

        //dd($this);
        //$this->connection = $this->getManager('trimu');
        /*return $this->getEntityManager('trimu')->createQueryBuilder('u')
            ->andWhere('u.C_USUARIO = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();*/
        $em=$this->getEntityManager('trimu')->getConnection();
        dd($this->_em);

        //$em= $this->_em->getDoctrine()->getEntityMananger('trimu');


        $qb=$this->createQueryBuilder("SELECT u FROM App\Entity\Tribu\Users u WHERE u.C_USUARIO= :C_USUARIO")
            ->setParameter('C_USUARIO', $value);
        dd($qb->getQuery());
        return $qb->getQuery()->getResult();

        //getOneOrNullResult()
    }
    
}
