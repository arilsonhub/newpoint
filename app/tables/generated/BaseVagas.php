<?php

/**
 * BaseVagas
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $titulo
 * @property integer $idcargo
 * @property integer $idtipo
 * @property integer $idturno
 * @property integer $idcidade
 * @property string $descricao
 * @property Cargos $Cargos
 * @property Cidades $Cidades
 * @property Tipovaga $Tipovaga
 * @property Turno $Turno
 * @property Doctrine_Collection $CurriculosHasVagas
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVagas extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('vagas');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'vagas_id',
             ));
        $this->hasColumn('titulo', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('idcargo', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('idtipo', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('idturno', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('idcidade', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('descricao', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Cargos', array(
             'local' => 'idcargo',
             'foreign' => 'id'));

        $this->hasOne('Cidades', array(
             'local' => 'idcidade',
             'foreign' => 'id'));

        $this->hasOne('Tipovaga', array(
             'local' => 'idtipo',
             'foreign' => 'id'));

        $this->hasOne('Turno', array(
             'local' => 'idturno',
             'foreign' => 'id'));

        $this->hasMany('CurriculosHasVagas', array(
             'local' => 'id',
             'foreign' => 'idvaga'));
    }
}