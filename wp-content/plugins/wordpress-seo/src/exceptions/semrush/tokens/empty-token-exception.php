<?php

namespace Yoast\WP\SEO\Exceptions\SEMrush\Tokens;

/**
 * Class Empty_Token_Exception
 */
class Empty_Token_Exception extends \Exception {

	/**
	 * Empty_Token_Exception constructor.
	 */
	public function __construct() {
		parent::__construct( 'Token usage failed. Token is empty.', 400 );
	}
}
