<?php
/**
 * @copyright Copyright (c) 2015 Kévin Walter <walkev13@gmail.com> - Kalibao
 * @license https://github.com/kalibao/kalibao-framework/blob/master/LICENSE
 */
?>
<tbody>
    <?php if (count($crudList->gridRows) > 0): ?>
        <?php foreach ($crudList->gridRows as $row): ?>
            <?= $this->render('crud/list/_gridBodyRow', ['row' => $row], $this->context); ?>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="<?= count($crudList->gridHeadAttributes) + 2; ?>" class="text-center">
                <em><?= Yii::t('kalibao', 'no_results'); ?></em>
            </td>
        </tr>
    <?php endif; ?>
</tbody>