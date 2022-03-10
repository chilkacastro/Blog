<?php
class Home extends Controller
{
    public function __construct()
    {
    }

    // WILL LIST ALL THE PUBLICATIONS
    public function index()
    {
        $this->view('Home/index');
    }
}
