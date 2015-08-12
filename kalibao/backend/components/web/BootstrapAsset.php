<?php
/**
 * @copyright Copyright (c) 2015 Kévin Walter <walkev13@gmail.com> - Kalibao
 * @license https://github.com/kalibao/kalibao-framework/blob/master/LICENSE
 */

namespace kalibao\backend\components\web;

use kalibao\common\components\web\AssetBundle;

/**
 * Class BootstrapAsset provide an asset bundle containing bootstrap resources
 *
 * @package kalibao\backend\components\web
 * @version 1.0
 * @author Kevin Walter <walkev13@gmail.com>
 */
class BootstrapAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $publishOptions = [
        //'forceCopy' => YII_ENV_DEV
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'kalibao\backend\components\web\AdminLTEAsset',
        'kalibao\backend\components\web\CrudAsset',
        'kalibao\backend\components\web\AppAsset',
        'kalibao\backend\modules\message\components\message\web\MessageAsset',
        'kalibao\backend\modules\rbac\components\rbacPermissionRole\web\RbacPermissionRoleAsset',
        'kalibao\backend\modules\mail\components\mailTemplate\web\MailTemplateAsset',
        'kalibao\backend\modules\mail\components\mailSendingRole\web\MailSendingRoleAsset',
        'kalibao\backend\modules\cms\components\cmsPage\web\CmsPageAsset',
        'kalibao\backend\modules\cms\components\cmsImage\web\CmsImageAsset',
        'kalibao\backend\modules\cms\components\cmsSimpleMenuGroup\web\CmsSimpleMenuGroupAsset',
        'kalibao\backend\modules\cms\components\cmsSimpleMenu\web\CmsSimpleMenuAsset',
        'kalibao\backend\modules\dashboard\components\dashboard\web\DashboardAsset',
    ];
}