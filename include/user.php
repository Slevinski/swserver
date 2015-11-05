<?php
/**
 * The User Controll Class allows for the manipulation of user accounts: including registration, login, manipulation and listings.
 * @author     Stephen E Slevinski Jr <slevin@signpuddle.net>
 * @copyright  Copyright (c) 2013-2015, Stephen E Slevinski Jr
 * @license    MIT
 */
class User {

	/**
	 * This creates a salt value for the current session to use with a user-login command.  Each salt is only used once and never sent with the password.  Easy passwords can be easily crasked.  Complex passwords are secure.
	 */
	static function salt(){
          return uniqid();
	}

}
?>