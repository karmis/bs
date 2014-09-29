<?php

namespace Brainstrap\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BrainstrapUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
