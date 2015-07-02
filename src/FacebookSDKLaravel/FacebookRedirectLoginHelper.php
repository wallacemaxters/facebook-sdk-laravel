<?php

namespace WallaceMaxters\FacebookSDKLaravel;

/**
* @version 1.0.0
* @author Wallace de Souza Vizerra <wallacemaxters@gmail.com>
*/

use Session;
use Request;

class FacebookRedirectLoginHelper extends \Facebook\FacebookRedirectLoginHelper
{

    /**
    * @var string
    */

    private $sessionStateIndex = 'facebook.state';

    /**
    * @param string $state
    * @return void
    */
    protected function storeState($state)
    {
        Session::put($this->getSessionStateIndex(), $state);
    }

    /**
    * @param string $state
    * @return string
    */
    protected function loadState()
    {
        return $this->state = Session::get($this->getSessionStateIndex());
    }

    /**
    * @return boolean
    */
    protected function isValidRedirect() 
    {
        $this->loadState();

        return $this->getCode() && Request::query('state') == $this->state;
    }

    /**
    * @return string    
    */
    protected function getCode()
    {
        return Request::query('code');
    }

    /**
    * @return void
    */
    public function setSessionStateIndex($index)
    {
        $this->sessionStateIndex = $index;
    }

<<<<<<< HEAD
    /**
    * @return string
    */
    public function getSessionStateIndex()
    {
        return $this->sessionStateIndex;
    }
}
=======
  	/**
  	* @return string
  	*/
  	public function getSessionStateIndex()
  	{
  		return $this->sessionStateIndex;
  	}
}
>>>>>>> 782247bd6e80aa1bb8eb7f74b69be12fafed2295
