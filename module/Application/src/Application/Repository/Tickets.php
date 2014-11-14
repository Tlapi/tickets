<?php

namespace Application\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class Tickets
 * @package Application\Repository
 */
class Tickets extends EntityRepository
{
    /**
     * getNew
     */
    public function getNew()
    {
        return $this->findBy(array(), array('id' => 'DESC'), 10);
    }
}