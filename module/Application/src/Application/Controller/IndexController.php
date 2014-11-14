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

class IndexController extends EntityUsingController
{
    public function indexAction()
    {
        /*
        $article = new \Application\Entity\Article();

        $form = new \Application\Form\Article($this->getEntityManager());
        $form->setHydrator(new DoctrineEntity($this->getEntityManager(),'\Application\Entity\Article'));
        $form->bind($article);

        $request = $this->getRequest();
        if ($request->isPost()) {
            // add input filter
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $article->exchangeArray($this->getRequest()->getPost()->toArray());
                $em = $this->getEntityManager();

                $em->persist($article);
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Article Saved');

                return $this->redirect()->toRoute('home');
            }
        }*/

        return new ViewModel(array(
            //'form' => $form
        ));
    }
}
