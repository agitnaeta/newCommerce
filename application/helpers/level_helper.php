<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('level'))
{
 function level($data) { 
        
        switch ($data) {
                         case '0':
                                                return "Super User";
                                                break;
        	case '1':
        	                       return "Billing";
        	                       break;
        	case '2':
        	                       return "Sales";
                                                 break;
        	case '3':
        		return "Support";
        		break;
        	default:
        		return "Not Set";
        		break;
        }
	}
}
