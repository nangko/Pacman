<?php
/**
 * Pacman (https://github.com/Enrise/Pacman)
 * @link https://github.com/Enrise/Pacman for the canonical source repository
 * @copyright Copyright (c) 2012 Enrise (www.enrise.com)
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Pacman\Model\Password;

use Zend\Db\Sql\Select;

use Pacman\Model\Password\Password;
use Zend\Db\TableGateway\TableGateway;

class PasswordTable
{
    /**
     * Table gateway
     * @var Zend\Db\TableGateway\TableGateway
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
     * Find password by id
     *
     * @param int $id
     * @return Entity
     */
    public function findPassword($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array(
            'id' => $id,
        ));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find password with ID $id");
        }

        return $row;
    }

    /**
     * Fetch passwords by Project and Category
     *
     * @param int $projectId
     * @param int $categoryId
     * @return ResultSet
     */
    public function fetchByProjectAndCategory($projectId,$categoryId)
    {
        $projectId = (int) $projectId;
        $categoryId = (int) $categoryId;

        return $this->tableGateway->select(array(
                'project_id' => $projectId,
                'category_id' => $categoryId,
            ));
    }
}
