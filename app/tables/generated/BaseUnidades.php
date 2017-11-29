<?php

/**
 * BaseUnidades
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $idcidade
 * @property string $endereco
 * @property string $telefone
 * @property string $email
 * @property string $codigomapa
 * @property Cidades $Cidades
 * @property Doctrine_Collection $Aulademonstrativa
 * @property Doctrine_Collection $Trabalheconosco
 * @property Doctrine_Collection $Nivelamentocandidatos
 * @property Doctrine_Collection $Sac
 * @property Doctrine_Collection $Unidadesfotos
 * @property Doctrine_Collection $Album
 * @property Doctrine_Collection $Querosabermais
 * @property Doctrine_Collection $Usuario
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUnidades extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('unidades');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'unidades_id',
             ));
        $this->hasColumn('idcidade', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('endereco', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('telefone', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('email', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('codigomapa', 'string', null, array(
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
        $this->hasOne('Cidades', array(
             'local' => 'idcidade',
             'foreign' => 'id'));

        $this->hasMany('Aulademonstrativa', array(
             'local' => 'id',
             'foreign' => 'idunidade'));

        $this->hasMany('Trabalheconosco', array(
             'local' => 'id',
             'foreign' => 'idunidade'));

        $this->hasMany('Nivelamentocandidatos', array(
             'local' => 'id',
             'foreign' => 'idunidade'));

        $this->hasMany('Sac', array(
             'local' => 'id',
             'foreign' => 'idunidade'));

        $this->hasMany('Unidadesfotos', array(
             'local' => 'id',
             'foreign' => 'idunidade'));

        $this->hasMany('Album', array(
             'local' => 'id',
             'foreign' => 'idunidade'));

        $this->hasMany('Querosabermais', array(
             'local' => 'id',
             'foreign' => 'idunidade'));

        $this->hasMany('Usuario', array(
             'local' => 'id',
             'foreign' => 'idunidade'));
    }
}