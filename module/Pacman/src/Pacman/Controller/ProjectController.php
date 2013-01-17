<?php
/**
 * Pacman (https://github.com/Enrise/Pacman)
 * @link https://github.com/Enrise/Pacman for the canonical source repository
 * @copyright Copyright (c) 2012 Enrise (www.enrise.com)
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Pacman\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProjectController extends AbstractActionController
{
    /**
     * Project TableGateway
     * @var Pacman\Model\Project\ProjectTable
     */
    protected $projectTable;

    /**
     * Password TableGateway
     * @var Pacman\Model\Password\PasswordTable
     */
    protected $passwordTable;

    /**
     * Category TableGateway
     * @var Pacman\Model\Category\CategoryTable
     */
    protected $categoryTable;

    /**
     * Environment TableGateway
     * @var Pacman\Model\Environment\EnvironmentTable
     */
    protected $environmentTable;

    /**
     * list of projects
     */
    public function listAction()
    {
        return new ViewModel(array(
            'projects' => $this->getProjectTable()->fetchAll(),
        ));
    }

    /**
     * Display project info by id
     */
    public function viewAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        try {
            $project = $this->getProjectTable()->findProject($id);
        } catch (\Exception $e) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        return new ViewModel(array(
            'project' => $project,
            'categories' => $this->getCategoryTable()->fetchByProject($project->id),
            'passwordTable' => $this->getPasswordTable(),
            'environmentTable' => $this->getEnvironmentTable(),
        ));
    }

    /**
     * get Project TableGateway
     *
     * @return Pacman\Model\Project\ProjectTable
     */
    protected function getProjectTable()
    {
        if (!$this->projectTable) {
            $sm = $this->getServiceLocator();
            $this->projectTable = $sm->get('Pacman\Model\Project\ProjectTable');
        }
        return $this->projectTable;
    }

    /**
     * get Password TableGateway
     *
     * @return Pacman\Model\Password\PasswordTable
     */
    protected function getPasswordTable()
    {
        if (!$this->passwordTable) {
            $sm = $this->getServiceLocator();
            $this->passwordTable = $sm->get('Pacman\Model\Password\PasswordTable');
        }
        return $this->passwordTable;
    }

    /**
     * get Category TableGateway
     *
     * @return Pacman\Model\Category\CategoryTable
     */
    protected function getCategoryTable()
    {
        if (!$this->categoryTable) {
            $sm = $this->getServiceLocator();
            $this->categoryTable = $sm->get('Pacman\Model\Category\CategoryTable');
        }
        return $this->categoryTable;
    }

    /**
     * get Environment TableGateway
     *
     * @return Pacman\Model\Environment\EnvironmentTable
     */
    protected function getEnvironmentTable()
    {
        if (!$this->environmentTable) {
            $sm = $this->getServiceLocator();
            $this->environmentTable = $sm->get('Pacman\Model\Environment\EnvironmentTable');
        }
        return $this->environmentTable;
    }
}
