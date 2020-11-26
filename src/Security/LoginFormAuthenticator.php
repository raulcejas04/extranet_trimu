<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use App\Repository\UserRepository;
use Symfony\Component\Routing\RouterInterface; //segudo parametro constructor
use Symfony\Component\Security\Core\Security; //Security::

use Symfony\Component\HttpFoundation\RedirectResponse; //redirect response
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface; //CSR Token
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Http\Util\TargetPathTrait;


use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface; //password
use App\Security\Encoder\MyCustomPasswordEncoder;
use Symfony\Component\Security\Guard\PasswordAuthenticatedInterface;
use App\Security\PasswordEncoderInterface;


//class LoginFormAuthenticator extends AbstractFormLoginAuthenticator
class LoginFormAuthenticator extends AbstractFormLoginAuthenticator implements PasswordAuthenticatedInterface
{
    use TargetPathTrait;
    
    private $userRepository;
    private $router;
    private $csrfTokenManager;
    private $passwordEncoder;
    
    //UserPasswordEncoderInterface $passwordEncoder
    public function __construct(UserRepository $userRepository, RouterInterface $router, 
        CsrfTokenManagerInterface $csrfTokenManager, MyCustomPasswordEncoder $passwordEncoder)
    {
        $this->userRepository = $userRepository;
        $this->router = $router;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function supports(Request $request)
    {
        return $request->attributes->get('_route') === 'app_login'
            && $request->isMethod('POST');
    }

    public function getCredentials(Request $request)
    {
        // todo
        //dd($request->request->all()); //esto es lo mismo que die(dump())
        /*return [
            'email' => $request->request->get('email'),
            'password' => $request->request->get('password'),
        ];*/
        //dd($request);
        $credentials = [
            'cuit' => $request->request->get('cuit'),
            'csrf_token' => $request->request->get('_csrf_token'),
            'password' => $request->request->get('password'),
        ];
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['cuit']
        );

        return $credentials;

    }

    public function getPassword($credentials): ?string
    {
        return $credentials['password'];
    }

    public function getUser($credentials, UserProviderInterface $userProvider )
    {

        $token = new CsrfToken('authenticate', $credentials['csrf_token']);
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }
        $User=$this->userRepository->find($credentials['cuit']);
        return $User;
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return $this->userRepository->validarPasswordTrimu( $user->getPassword(), $credentials['password'], $user->getId() );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        echo "entro";
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        //dd('Success');
        return new RedirectResponse($this->router->generate('app_homepage'));
    }

    protected function getLoginUrl()
    {
        // TODO: Implement getLoginUrl() method.
        return $this->router->generate('app_login');
    }
}

