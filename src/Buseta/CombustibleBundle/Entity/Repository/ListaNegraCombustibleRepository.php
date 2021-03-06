<?php

namespace Buseta\CombustibleBundle\Entity\Repository;

use Buseta\CombustibleBundle\Form\Model\ListaNegraCombustibleFilterModel;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * ListaNegraCombustibleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ListaNegraCombustibleRepository extends EntityRepository
{
    public function filter(ListaNegraCombustibleFilterModel $filter = null)
    {
        $qb = $this->createQueryBuilder('l');
        $query = $qb->where($qb->expr()->eq(true,true));

        if($filter) {
            if ($filter->getAutobus() !== null && $filter->getAutobus() !== '') {
                $query->andWhere($query->expr()->eq('l.autobus', ':autobus'))
                    ->setParameter('autobus', $filter->getAutobus());
            }
            if ($filter->getFecha() !== null && $filter->getFecha() !== '') {
                $query->andWhere($qb->expr()->lte('l.fechaInicio',':fecha'))
                    ->andWhere($qb->expr()->gte('l.fechaFinal',':fecha'))
                    ->setParameter('fecha', $filter->getFecha());
            }
        }

        $query->orderBy('l.id', 'ASC');

        try {
            return $query->getQuery();
        } catch (NoResultException $e) {
            return array();
        }
    }
}



