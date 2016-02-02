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

use FOS\UserBundle\Controller\ChangePasswordController as BaseController;
use Symfony\Component\HttpFoundation\Request;

class ChangePasswordController extends BaseController
{
  
    public function changePasswordAction(Request $request)
    {
        $event = new \SKCMS\FrontBundle\Event\PreRenderEvent($this->getRequest());
        $this->get('event_dispatcher')
            ->dispatch(\SKCMS\FrontBundle\Event\SKCMSFrontEvents::PRE_RENDER, $event);
        
        $response = parent::changePasswordAction($request);
        return $response;
        
    }
}
