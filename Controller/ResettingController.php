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

use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Controller\ResettingController as BaseController;

/**
 * Controller managing the resetting of the password
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Christophe Coevoet <stof@notk.org>
 */
class ResettingController extends BaseController
{
    /**
     * Request reset user password: show form
     */
    public function requestAction()
    {
        $event = new \SKCMS\FrontBundle\Event\PreRenderEvent($this->getRequest());
        $this->get('event_dispatcher')
            ->dispatch(\SKCMS\FrontBundle\Event\SKCMSFrontEvents::PRE_RENDER, $event);
        return parent::requestAction();
    }

    
    /**
     * Tell the user to check his email provider
     */
    public function checkEmailAction(Request $request)
    {
        $event = new \SKCMS\FrontBundle\Event\PreRenderEvent($this->getRequest());
        $this->get('event_dispatcher')
            ->dispatch(\SKCMS\FrontBundle\Event\SKCMSFrontEvents::PRE_RENDER, $event);
        
        return parent::checkEmailAction($request);
    }

    /**
     * Reset user password
     */
    public function resetAction(Request $request, $token)
    {
        
        $event = new \SKCMS\FrontBundle\Event\PreRenderEvent($this->getRequest());
        $this->get('event_dispatcher')
            ->dispatch(\SKCMS\FrontBundle\Event\SKCMSFrontEvents::PRE_RENDER, $event);
        return parent::resetAction($request, $token);
    }

    
}
