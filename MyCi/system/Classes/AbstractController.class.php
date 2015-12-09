<?php
class AbstractController extends CI_Controller
{
    /**
     * Reference to the CI singleton
     *
     * @var	object
     */
    protected static $instance;

    public function __construct()
    {
        parent::__construct();

    }


}