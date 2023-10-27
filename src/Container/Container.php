<?php

namespace Terowoc\Framework\Container;

use Terowoc\Framework\Auth\Auth;
use Terowoc\Framework\Auth\AuthInterface;
use Terowoc\Framework\Config\Config;
use Terowoc\Framework\Config\ConfigInterface;
use Terowoc\Framework\Database\Database;
use Terowoc\Framework\Database\DatabaseInterface;
use Terowoc\Framework\Http\Redirect;
use Terowoc\Framework\Http\RedirectInterface;
use Terowoc\Framework\Http\Request;
use Terowoc\Framework\Http\RequestInterface;
use Terowoc\Framework\Router\Router;
use Terowoc\Framework\Router\RouterInterface;
use Terowoc\Framework\Session\Session;
use Terowoc\Framework\Session\SessionInterface;
use Terowoc\Framework\Storage\Storage;
use Terowoc\Framework\Storage\StorageInterface;
use Terowoc\Framework\Validator\Validator;
use Terowoc\Framework\Validator\ValidatorInterface;
use Terowoc\Framework\View\View;
use Terowoc\Framework\View\ViewInterface;

class Container
{
    public readonly RequestInterface $request;

    public readonly RouterInterface $router;

    public readonly ViewInterface $view;

    public readonly ValidatorInterface $validator;

    public readonly RedirectInterface $redirect;

    public readonly SessionInterface $session;

    public readonly ConfigInterface $config;

    public readonly DatabaseInterface $database;

    public readonly AuthInterface $auth;

    public readonly StorageInterface $storage;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->validator = new Validator();
        $this->request->setValidator($this->validator);
        $this->redirect = new Redirect();
        $this->session = new Session();
        $this->config = new Config();
        $this->database = new Database($this->config);
        $this->auth = new Auth($this->database, $this->session, $this->config);
        $this->storage = new Storage($this->config);
        $this->view = new View($this->session, $this->auth, $this->storage);
        $this->router = new Router(
            $this->view,
            $this->request,
            $this->redirect,
            $this->session,
            $this->database,
            $this->auth,
            $this->storage
        );
    }
}
