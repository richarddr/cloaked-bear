<?php

namespace Buseta\BusesBundle\DataFixtures\ORM;

use Buseta\NomencladorBundle\Entity\AceiteCajaCambios;
use Buseta\NomencladorBundle\Entity\AceiteHidraulico;
use Buseta\NomencladorBundle\Entity\AceiteMotor;
use Buseta\NomencladorBundle\Entity\AceiteTransmision;
use Buseta\NomencladorBundle\Entity\Color;
use Buseta\NomencladorBundle\Entity\Combustible;
use Buseta\NomencladorBundle\Entity\Condicion;
use Buseta\NomencladorBundle\Entity\Estilo;
use Buseta\NomencladorBundle\Entity\FormaPago;
use Buseta\NomencladorBundle\Entity\GarantiaTarea;
use Buseta\NomencladorBundle\Entity\Grupo;
use Buseta\NomencladorBundle\Entity\Marca;
use Buseta\NomencladorBundle\Entity\MarcaMotor;
use Buseta\NomencladorBundle\Entity\Modelo;
use Buseta\NomencladorBundle\Entity\Moneda;
use Buseta\NomencladorBundle\Entity\Subgrupo;
use Buseta\NomencladorBundle\Entity\TipoCompra;
use Buseta\NomencladorBundle\Entity\TipoContacto;
use Buseta\NomencladorBundle\Entity\CajaChica;
use Buseta\NomencladorBundle\Entity\UOM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class NomencladorData extends AbstractFixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 3; $i++) {
            $aceite_caja_cambios = new AceiteCajaCambios();

            $codigo = uniqid();
            $aceite_caja_cambios->setValor($this->valores[$i]);

            $manager->persist($aceite_caja_cambios);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $aceite_hidraulico = new AceiteHidraulico();
            $codigo = uniqid();
            $aceite_hidraulico->setValor($this->valores[$i]);

            $manager->persist($aceite_hidraulico);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $aceite_motor = new AceiteMotor();
            $codigo = uniqid();
            $aceite_motor->setValor($this->valores[$i]);

            $manager->persist($aceite_motor);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $aceite_transmision = new AceiteTransmision();
            $codigo = uniqid();
            $aceite_transmision->setValor($this->valores[$i]);

            $manager->persist($aceite_transmision);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $objeto = new Estilo();
            $codigo = uniqid();
            $objeto->setValor($this->estilos[$i]);

            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $objeto = new Combustible();
            $codigo = uniqid();
            $objeto->setValor($this->combustibles[$i]);

            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $objeto = new Condicion();
            $codigo = uniqid();
            $objeto->setValor($this->condiciones[$i]);

            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $objeto = new Color();
            $codigo = uniqid();
            $objeto->setValor($this->colores[$i]);

            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $marca = new Marca();
            $codigo = uniqid();
            $marca->setValor($this->marca_autobuses[$i]);

            $manager->persist($marca);
            $manager->flush();
            $this->setReference('marca' . $i, $marca);
            $manager->clear();
            /*******************************/

            $objeto = new Modelo();
            $codigo = uniqid();
            $objeto->setValor($this->marca_autobuses[$i]);
            $objeto->setMarca($this->getReference('marca' . $i));

            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $objeto = new Grupo();
            $codigo = uniqid();
            $objeto->setValor($this->grupos[$i]);

            $manager->persist($objeto);
            $manager->flush();
            $this->setReference('grupo' . $i, $objeto);
            $manager->clear();
            /*******************************/

            $objeto = new Subgrupo();
            $codigo = uniqid();
            $objeto->setValor($this->grupos[$i]);
            $objeto->setGrupo($this->getReference('grupo' . $i));

            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $objeto = new MarcaMotor();
            $codigo = uniqid();
            $objeto->setValor($this->marca_motores[$i]);

            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $objeto = new TipoContacto();
            $codigo = uniqid();
            $objeto->setValor($this->tipo_contactos[$i]);

            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $objeto = new UOM();
            $codigo = uniqid();
            $objeto->setValor($this->oums[$i]);
            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $objeto = new Moneda();
            $codigo = uniqid();
            $objeto->setValor($this->monedas[$i]);
            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $objeto = new TipoCompra();
            $codigo = uniqid();
            $objeto->setValor($this->tipo_compras[$i]);
            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $objeto = new GarantiaTarea();
            $codigo = uniqid();
            $objeto->setValor($this->garantia_compras[$i]);
            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/

            $objeto = new CajaChica();
            $codigo = uniqid();
            $objeto->setValor($this->caja_chicas[$i]);

            $manager->persist($objeto);
            $manager->flush();
            $this->setReference('cajaChica' . $i, $objeto);
            $manager->clear();
            /*******************************/

            $objeto = new FormaPago();
            $codigo = uniqid();
            $objeto->setValor($this->forma_pagos[$i]);
            $objeto->setCajaChica($this->getReference('cajaChica' . $i));

            $manager->persist($objeto);
            $manager->flush();
            $manager->clear();
            /*******************************/
        }
    }

    private $forma_pagos = array(
        'Forma Pago A',
        'Forma Pago B',
        'Forma Pago C',
    );

    private $caja_chicas = array(
        'Caja Chica A',
        'Caja Chica B',
        'Caja Chica C',
    );

    private $garantia_compras = array(
        'Garantía Compra A',
        'Garantía Compra B',
        'Garantía Compra C',
    );

    private $tipo_compras = array(
        'Tipo Compra A',
        'Tipo Compra B',
        'Tipo Compra C',
    );

    private $monedas = array(
        'euro',
        'dólar americano',
        'dólar canadiense',
        'libra esterlina',
    );

    private $oums = array(
        'lts',
        'kgs',
        'ctm',
    );

    private $tipo_contactos = array(
        'email',
        'celular',
        'teléfono fijo',
    );

    private $marca_motores = array(
        'Audi',
        'Chevrolet',
        'Ford',
    );

    private $subgrupos = array(
        'SubGrupo A',
        'SubGrupo B',
        'SubGrupo C',
    );

    private $grupos = array(
        'Grupo A',
        'Grupo B',
        'Grupo C',
    );

    private $modelos = array(
        '2010',
        '2011',
        '2012',
    );

    private $marca_autobuses = array(
        'Audi',
        'Chevrolet',
        'Ford',
    );

    private $colores = array(
        'Negro',
        'Azul',
        'Rojo',
    );

    private $condiciones = array(
        'Condiciones A',
        'Condiciones B',
        'Condiciones C',
    );

    private $combustibles = array(
        'Diesel',
        'Gasolina',
        'Nafta',
    );

    private $estilos = array(
        'Antiguo',
        'Moderno',
        'Futurista',
    );

    private $valores = array(
        'Aceite Negro',
        'Aceite Blanco',
        'Aceite Rojo',
    );

    private $descripciones = array(
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'Mauris consectetur felis a dui consequat suscipit.',
        'Praesent commodo est ut mollis gravida.',
        'Nulla aliquet nibh ac dui fermentum, quis accumsan sapien rhoncus.',
        'Etiam malesuada diam rutrum velit vulputate semper.',
        'Praesent ut sem vitae justo aliquet scelerisque ut sit amet libero.',
        'Nam nec arcu nec tellus tristique feugiat.',
        'Aliquam aliquet enim in vestibulum vehicula.',
        'Cras ullamcorper nisi fringilla libero faucibus dignissim.',
        'Vestibulum sit amet lorem at elit viverra posuere non a dui.',
        'Sed placerat est semper odio imperdiet facilisis.',
        'Curabitur placerat enim nec ipsum cursus, ac vulputate nibh interdum.',
        'Phasellus pharetra justo id ornare consectetur.',
        'Mauris et ipsum vehicula, dapibus purus at, vehicula diam.',
        'Maecenas vitae lacus eget enim dapibus dapibus at et nisl.',
    );
} 