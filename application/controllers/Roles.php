<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends Application
{

    public function actor($role = ROLE_GUEST)
    {
    	if ($role == "Logout")
    		$this->session->set_userdata('userrole', "");
    	else
        	$this->session->set_userdata('userrole',$role);

        redirect($_SERVER['HTTP_REFERER']); // back where we came from
    }

}	

