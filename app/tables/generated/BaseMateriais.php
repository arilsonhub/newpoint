<?php

/**
 * BaseMateriais
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $titulo
 * @property string $aplicacao
 * @property integer $idcurso
 * @property integer $idprofessor
 * @property Cursos $Cursos
 * @property Usuario $Usuario
 * @property Doctrine_Collection $Materiaisarquivos
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMateriais extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('materiais');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'materiais_id',
             ));
        $this->hasColumn('titulo', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('aplicacao', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('idcurso', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('idprofessor', 'integer', 4, array(
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
        $this->hasOne('Cursos', array(
             'local' => 'idcurso',
             'foreign' => 'id'));

        $this->hasOne('Usuario', array(
             'local' => 'idprofessor',
             'foreign' => 'id'));

        $this->hasMany('Materiaisarquivos', array(
             'local' => 'id',
             'foreign' => 'idmaterial'));
    }
}