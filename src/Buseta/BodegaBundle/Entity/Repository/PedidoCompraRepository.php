<?php

namespace Buseta\BodegaBundle\Entity\Repository;

use Buseta\BodegaBundle\Form\Model\PedidoCompraFilterModel;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;


/**
 * PedidoCompraRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PedidoCompraRepository extends EntityRepository
{
    public function filter(PedidoCompraFilterModel $filter = null)
    {
        $qb = $this->createQueryBuilder('r');
        $query = $qb->where($qb->expr()->eq(true,true));

        if($filter) {
            if ($filter->getNumeroDocumento() !== null && $filter->getNumeroDocumento() !== '') {
                $query->andWhere($qb->expr()->like('r.numero_documento',':numero_documento'))
                    ->setParameter('numero_documento', '%' . $filter->getNumeroDocumento() . '%');
            }
            if ($filter->getTercero() !== null && $filter->getTercero() !== '') {
                $query->andWhere($query->expr()->eq('r.tercero', ':tercero'))
                    ->setParameter('tercero', $filter->getTercero());
            }
            if ($filter->getAlmacen() !== null && $filter->getAlmacen() !== '') {
                $query->andWhere($query->expr()->eq('r.almacen', ':almacen'))
                    ->setParameter('almacen', $filter->getAlmacen());
            }
            if ($filter->getMoneda() !== null && $filter->getMoneda() !== '') {
                $query->andWhere($query->expr()->eq('r.moneda', ':moneda'))
                    ->setParameter('moneda', $filter->getMoneda());
            }
            if ($filter->getFormaPago() !== null && $filter->getFormaPago() !== '') {
                $query->andWhere($query->expr()->eq('r.forma_pago', ':forma_pago'))
                    ->setParameter('forma_pago', $filter->getFormaPago());
            }
            if ($filter->getCondicionesPago() !== null && $filter->getCondicionesPago() !== '') {
                $query->andWhere($query->expr()->eq('r.condiciones_pago', ':condiciones_pago'))
                    ->setParameter('condiciones_pago', $filter->getCondicionesPago());
            }
            if ($filter->getImporteTotalLineas() !== null && $filter->getImporteTotalLineas() !== '') {
                $query->andWhere($query->expr()->eq('r.importe_total_lineas', ':importe_total_lineas'))
                    ->setParameter('importe_total_lineas', $filter->getImporteTotalLineas());
            }
            if ($filter->getImporteTotal() !== null && $filter->getImporteTotal() !== '') {
                $query->andWhere($query->expr()->eq('r.importe_total', ':importe_total'))
                    ->setParameter('importe_total', $filter->getImporteTotal());
            }
        }

        $query->orderBy('r.id', 'ASC');

        try {
            return $query->getQuery();
        } catch (NoResultException $e) {
            return array();
        }
    }

    public function consecutivoLast()
    {
        $qb = $this->_em->createQueryBuilder();

        $q = $qb->select('p.consecutivo_compra')
            ->from('BusetaBodegaBundle:PedidoCompra', 'p')
            ->orderBy('p.consecutivo_compra','DESC')
            ->getQuery()
            ->setMaxResults(1);

        try {
            return $q->getSingleResult();
        } catch (NoResultException $e) {
            return false;
        }
    }


}
