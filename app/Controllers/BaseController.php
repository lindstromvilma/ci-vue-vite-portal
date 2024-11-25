<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers: class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    protected $session;
    protected $menu;
    protected $config;
    protected $cname;
    protected $data; // This contains all the data to be send for the view rendering

    /**
		 * Constructor
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger); // Do Not Edit This Line

        /**
         * Get called controller class name for directory level mapping
         */
        $class = new \ReflectionClass(get_class($this));
        $this->cname = $class->getShortName();
    }

		/**
     * Render a View - Extends CI4 view function by allowing us to refer
     * directly to a file under folder named after controller/method
     */
    public function rView($data, $file = false)
    {
        $data = (array) $data;
        $file = $file != false ? $file : debug_backtrace()[1]['function'];
        return view($this->cname.'/'.$file, $data);
		}
}
