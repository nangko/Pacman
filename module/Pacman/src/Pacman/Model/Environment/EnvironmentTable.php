<?php
/**
 * Pacman (https://github.com/Enrise/Pacman)
 * @link https://github.com/Enrise/Pacman for the canonical source repository
 * @copyright Copyright (c) 2012 Enrise (www.enrise.com)
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Pacman\Model\Environment;

use Pacman\Model\Environment\Environment;
use Zend\Db\TableGateway\TableGateway;

class EnvironmentTable
{
    /**
     * Table gateway
     * @var TableGateway
     */
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    /**
     * Fetch all
     *
     * @return ResultSet
     */
    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    /**
     * Find environment by id
     *
     * @param int $id
     * @return Entity
     */
    public function findEnvironment($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array(
            'id' => $id,
        ));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find environment with ID $id");
        }

        return $row;
    }

    /**
     * Fetch Environments by password
     *
     * @param int $passwordId
     * @return Entity
     */
    public function fetchByPassword($passwordId)
    {
        $passwordId = (int) $passwordId;
        $select = $this->tableGateway->getSql()->select()
            ->join('password_environment', "environment.id = password_environment.environment_id",array())
            ->where("password_environment.password_id = $passwordId")
            ->order('name ASC');

        $resultSet = $this->tableGateway->selectWith($select);
        return $resultSet;
    }
}
