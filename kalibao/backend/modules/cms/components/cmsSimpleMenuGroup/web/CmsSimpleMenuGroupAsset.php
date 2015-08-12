<?php
/**
 * @copyright Copyright (c) 2015 Kévin Walter <walkev13@gmail.com> - Kalibao
 * @license https://github.com/kalibao/kalibao-framework/blob/master/LICENSE
 */

namespace kalibao\backend\modules\cms\components\cmsSimpleMenuGroup\web;

use kalibao\common\components\web\AssetBundle;

/**
 * Class CmsSimpleMenuGroupAsset
 *
 * @package kalibao\backend\modules\cms\components\cmsSimpleMenuGroup\web
 * @version 1.0
 * @author Kevin Walter <walkev13@gmail.com>
 */
class CmsSimpleMenuGroupAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@kalibao/backend/modules/cms/components/cmsSimpleMenuGroup/resources';

    /**
     * @inheritdoc
     */
    public $publishOptions = [
        //'forceCopy' => YII_ENV_DEV
    ];

    /**
     * @inheritdoc
     */
    public $js = [
        'dist/js/kalibao.backend.cms.CmsSimpleMenuGroupList.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'kalibao\backend\components\web\AppAsset'
    ];
}