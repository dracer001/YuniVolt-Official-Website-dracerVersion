<?php 

/**
 * Sign Out class
 */
class Signout extends Controller
{
	
	public function index()
	{
        Auth::signout();
        redirect('');
	}
	
}