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

class TicketsController extends EntityUsingController
{
    public function indexAction()
    {

        return new ViewModel(array(

        ));
    }

    public function sellAction()
    {

        $request = $this->getRequest();
        if ($request->isPost()) {
            // add input filter
            $data = $request->getPost();

            /*
            if ($form->isValid()) {
                $article->exchangeArray($this->getRequest()->getPost()->toArray());
                $em = $this->getEntityManager();

                $em->persist($article);
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Article Saved');

                return $this->redirect()->toRoute('home');
            }*/
        }

        return new ViewModel(array(

        ));
    }

    public function detailAction()
    {
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $ticket = $em->getRepository('\Application\Entity\Ticket')->find($this->params()->fromRoute('id', 0));

        return new ViewModel(array(
            'ticket' => $ticket
        ));
    }

    public function buyAction()
    {


        return new ViewModel(array(

        ));
    }

}
