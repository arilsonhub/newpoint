<?php

/**
 * BaseCursosHasModulos
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $idcurso
 * @property integer $idmodulo
 * @property Modulos $Modulos
 * @property Cursos $Cursos
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCursosHasModulos extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('cursos_has_modulos');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'cursos_has_modulos_id',
             ));
        $this->hasColumn('idcurso', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('idmodulo', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Modulos', array(
             'local' => 'idmodulo',
             'foreign' => 'id'));

        $this->hasOne('Cursos', array(
             'local' => 'idcurso',
             'foreign' => 'id'));
    }
}