<?php

namespace Buseta\BodegaBundle\Entity\Repository;

use Buseta\BodegaBundle\Form\Model\AlbaranFilterModel;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * AlbaranRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AlbaranRepository extends EntityRepository
{
    public function filter(AlbaranFilterModel $filter = null)
    {
        $qb = $this->createQueryBuilder('a');
        $query = $qb->where($qb->expr()->eq(true,true));

        if($filter) {
            if ($filter->getProducto() !== null && $filter->getProducto() !== '') {
                $query->innerJoin('a.albaranLineas', 'albaranLineas')
                    ->where($qb->expr()->andX(
                        $qb->expr()->eq('albaranLineas.producto',':producto')
                    ))
                    ->setParameter('producto', $filter->getProducto());
            }
            if ($filter->getNumeroReferencia() !== null && $filter->getNumeroReferencia() !== '') {
                $query->andWhere($qb->expr()->like('a.numeroReferencia',':numeroReferencia'))
                    ->setParameter('numeroReferencia', '%' . $filter->getNumeroReferencia() . '%');
            }
            if ($filter->getConsecutivoCompra() !== null && $filter->getConsecutivoCompra() !== '') {
                $query->andWhere($qb->expr()->like('a.consecutivoCompra',':consecutivoCompra'))
                    ->setParameter('consecutivoCompra', '%' . $filter->getConsecutivoCompra() . '%');
            }
            if ($filter->getAlmacen() !== null && $filter->getAlmacen() !== '') {
                $query->andWhere($query->expr()->eq('a.almacen', ':almacen'))
                    ->setParameter('almacen', $filter->getAlmacen());
            }
            if ($filter->getTercero() !== null && $filter->getTercero() !== '') {
                $query->andWhere($query->expr()->eq('a.tercero', ':tercero'))
                    ->setParameter('tercero', $filter->getTercero());
            }
            if ($filter->getEstado() !== null && $filter->getEstado() !== '') {
                $query->andWhere($query->expr()->eq('a.estadoDocumento', ':estado'))
                    ->setParameter('estado', $filter->getEstado());
            }
            if ($filter->getFechaInicio() !== null && $filter->getFechaInicio() !== '') {
                $query->andWhere($qb->expr()->gte('a.fechaMovimiento',':fechaInicio'))
                    ->setParameter('fechaInicio', $filter->getFechaInicio());
            }
            if ($filter->getFechaFin() !== null && $filter->getFechaFin() !== '') {
                $query->andWhere($qb->expr()->lte('a.fechaMovimiento',':fechaFin'))
                    ->setParameter('fechaFin', $filter->getFechaFin());
            }
        }

        $query->orderBy('a.id', 'ASC');

        try {
            return $query->getQuery();
        } catch (NoResultException $e) {
            return array();
        }
    }
}
