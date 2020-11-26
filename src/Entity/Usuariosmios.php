<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuariosmios
 *
 * @ORM\Table(name="USUARIOSMIOS")
 * @ORM\Entity
 */
class Usuariosmios
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="USUARIOSMIOS_ID_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="C_USUARIOS", type="string", length=30, nullable=false)
     */
    private $cUsuarios;

    /**
     * @var string
     *
     * @ORM\Column(name="C_CLAVE", type="string", length=100, nullable=false)
     */
    private $cClave;

    /**
     * @var string
     *
     * @ORM\Column(name="D_DENOMINACION", type="string", length=100, nullable=false)
     */
    private $dDenominacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ID_CONTRIBUYENTE", type="integer", nullable=true)
     */
    private $idContribuyente;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="F_BAJA", type="date", nullable=true)
     */
    private $fBaja;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="F_ALTA", type="date", nullable=false)
     */
    private $fAlta;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_USUARIOALT", type="string", length=30, nullable=true)
     */
    private $cUsuarioalt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="F_ACTUALIZAC", type="date", nullable=true)
     */
    private $fActualizac;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_USUARIOACT", type="string", length=30, nullable=true)
     */
    private $cUsuarioact;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="F_CADUCIDAD_CLAVE", type="date", nullable=true)
     */
    private $fCaducidadClave;

    /**
     * @var string|null
     *
     * @ORM\Column(name="D_MAIL", type="string", length=100, nullable=true)
     */
    private $dMail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="D_SELLO", type="string", length=500, nullable=true)
     */
    private $dSello;

    /**
     * @var string|null
     *
     * @ORM\Column(name="T_TOKEN", type="string", length=100, nullable=true)
     */
    private $tToken;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="F_EXPIRACION", type="date", nullable=true)
     */
    private $fExpiracion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="N_INTENTOS", type="integer", nullable=true)
     */
    private $nIntentos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="D_OBERVACION_BAJA", type="string", length=1000, nullable=true)
     */
    private $dObervacionBaja;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ID_DEPENDENCIA", type="integer", nullable=true)
     */
    private $idDependencia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_USUARIO_RESP", type="string", length=30, nullable=true)
     */
    private $cUsuarioResp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="C_COD_VERIFICACION", type="string", length=100, nullable=true)
     */
    private $cCodVerificacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="M_VERIFICADO", type="string", length=1, nullable=true)
     */
    private $mVerificado;

    /**
     * @var string|null
     *
     * @ORM\Column(name="N_LEGAJO", type="string", length=100, nullable=true)
     */
    private $nLegajo;


}
