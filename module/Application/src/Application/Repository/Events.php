<?php

namespace Application\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class Events
 * @package Application\Repository
 */
class Events extends EntityRepository
{
    /**
     * getLatest
     */
    public function getClosest()
    {
        return $this->findBy(array(), array('date' => 'DESC'), 10);
    }
}