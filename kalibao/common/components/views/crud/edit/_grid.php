<?php
/**
 * @copyright Copyright (c) 2015 Kévin Walter <walkev13@gmail.com> - Kalibao
 * @license https://github.com/kalibao/kalibao-framework/blob/master/LICENSE
 */
?>
<table class="table table-bordered table-condensed">
    <?= $this->render('crud/edit/_gridBody', ['crudEdit' => $crudEdit], $this->context); ?>
    <?= $this->render('crud/edit/_gridFoot', ['crudEdit' => $crudEdit], $this->context); ?>
</table>