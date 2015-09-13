<?php

namespace AA\Core\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AACoreUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
