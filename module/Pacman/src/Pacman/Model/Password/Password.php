<?php
/**
 * Pacman (https://github.com/Enrise/Pacman)
 * @link https://github.com/Enrise/Pacman for the canonical source repository
 * @copyright Copyright (c) 2012 Enrise (www.enrise.com)
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Pacman\Model\Password;

class Password
{
    /**
     * Primary Key
     * @var int
     */
    public $id;

    /**
     * Foreign Key Project
     * @var int
     */
    public $project_id;

    /**
     * Foreign Key Category
     * @var int
     */
    public $category_id;

    /**
     * notes
     * @var string
     */
    public $notes;

    /**
     * url
     * @var string
     */
    public $url;

    /**
     * username
     * @var string
     */
    public $username;

    /**
     * password
     * @var password
     */
    public $password;

    /**
     * Populate Entity Properties
     * @param array $data
     */
    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->project_id = (isset($data['project_id'])) ? $data['project_id'] : null;
        $this->category_id = (isset($data['category_id'])) ? $data['category_id'] : null;
        $this->notes = (isset($data['notes'])) ? $data['notes'] : null;
        $this->url = (isset($data['url'])) ? $data['url'] : null;
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->password= (isset($data['password'])) ? $data['password'] : null;
    }
}
