<?php

namespace Buseta\BodegaBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * PedidoCompraLineaRepository.
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PedidoCompraLineaRepository extends EntityRepository
{
    public function findAllByPedidoCompraId($id)
    {
        $qb = $this->createQueryBuilder('d');
        $query = $qb
            ->join('d.pedidoCompra', 't')
            ->where($qb->expr()->eq(':id', 't.id'))
            ->setParameter('id', $id);

        $query->orderBy('d.id', 'DESC');
        $query->getQuery();

        try {
            return $query->getQuery();
        } catch (NoResultException $e) {
            return array();
        }
    }
}