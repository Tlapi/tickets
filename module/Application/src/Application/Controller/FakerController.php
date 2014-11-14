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

class FakerController extends EntityUsingController
{
    public function indexAction()
    {
        echo 'This is FAKER!';

        /*
        $generator = \Faker\Factory::create();
        $populator = new \Faker\ORM\Doctrine\Populator($generator, $this->getEntityManager());
        $populator->addEntity('SomeEntity', 1000);
        $populator->addEntity('ZfcUser\Entity\User', 100, array(
            'username' => null
        ));
        $insertedPKs = $populator->execute();
        */
    }
}
