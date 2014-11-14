<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Controller\EntityUsingController;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\View\Model\ViewModel;

class EventsController extends EntityUsingController
{
    public function indexAction()
    {
        $lastfm = new \Dandelionmood\LastFm\LastFm("0c34ee90f3e9ae6a82dbd3018910c566", "a7689b71071ae551f04fe349b9622589");

        $events = $lastfm->geo_getEvents(array(

        ));

        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $tickets = $em->getRepository('\Application\Entity\Ticket');

        return new ViewModel(array(
            'events' => $events->events->event,
            'tickets' => $tickets->getNew()
        ));
    }
}
