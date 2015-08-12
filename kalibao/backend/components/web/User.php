<?php
/**
 * @copyright Copyright (c) 2015 Kévin Walter <walkev13@gmail.com> - Kalibao
 * @license https://github.com/kalibao/kalibao-framework/blob/master/LICENSE
 */

namespace kalibao\backend\components\web;

use Yii;

/**
 * Class User class override default User component to provide a specific RBAC system
 *
 * @package kalibao\backend\components\web
 * @version 1.0.1
 * @author Kévin Walter <walkev13@gmail.com>
 */
class User extends \kalibao\common\components\web\User
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // logout users don't have special permission
        if (!$this->isGuest && !$this->hasPermission('navigate:backend')) {
            $this->logout();
        }
    }
}
