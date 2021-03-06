<?php
/**
 * @copyright Copyright (c) 2015 Kévin Walter <walkev13@gmail.com> - Kalibao
 * @license https://github.com/kalibao/kalibao-framework/blob/master/LICENSE
 */

use yii\helpers\Url;
?>
<div class="actions">
    <div class="pull-right">
        <?php if (Yii::$app->user->canMultiple([$this->context->getActionControllerPermission('create'), 'permission.create:*'])): ?>
            <a href="<?= Url::to(['create']); ?>" class="btn btn-sm btn-danger btn-create">
                <span class="glyphicon glyphicon-plus-sign"></span>
                <b><?= Yii::t('kalibao', 'btn_add'); ?></b>
            </a>
        <?php endif; ?>
        <?php if (Yii::$app->user->canMultiple([$this->context->getActionControllerPermission('update'), 'permission.update:*'])): ?>
            <a href="<?= Url::to(['refresh-pages']); ?>" class="btn btn-sm btn-default btn-refresh-all">
                <?= Yii::t('kalibao.backend', 'btn_refresh_all_cms_page'); ?>
            </a>
        <?php endif; ?>
        <a href="#" class="btn btn-default btn-sm btn-advanced-filters">
            <span class="glyphicon glyphicon-search"></span>
            <span><?= Yii::t('kalibao', 'btn_advanced_search'); ?></span>
        </a>
        <a href="<?= Url::to(['settings']); ?>" class="btn btn-default btn-sm btn-settings">
            <span class="glyphicon glyphicon-wrench"></span>
            <span><?= Yii::t('kalibao', 'btn_settings'); ?></span>
        </a>
        <a href="<?= Url::to(['export'] + $crudList->requestParams); ?>" class="btn btn-default btn-sm btn-export">
            <i class="icon-download-alt"></i>
            <span class="glyphicon glyphicon-download-alt"></span>
            <span><?= Yii::t('kalibao', 'btn_export_csv'); ?></span>
        </a>
    </div>
</div>