<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SKCMS\UserBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as BaseController;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends BaseController
{
    public function loginAction(Request $request)
    {
        $event = new \SKCMS\FrontBundle\Event\PreRenderEvent($this->getRequest());
        $this->get('event_dispatcher')
            ->dispatch(\SKCMS\FrontBundle\Event\SKCMSFrontEvents::PRE_RENDER, $event);

        
        $response = parent::loginAction($request);
        
        return $response;
    }

    
}
