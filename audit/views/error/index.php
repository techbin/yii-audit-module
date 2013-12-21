<?php
/**
 * @var $this AuditErrorController
 * @var $auditError AuditError
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-audit-module
 * @license BSD-3-Clause https://raw.github.com/cornernote/yii-audit-module/master/LICENSE
 *
 * @package yii-audit-module
 */

Yii::app()->user->setState('index.auditError', Yii::app()->request->requestUri);
$this->pageTitle = Yii::t('audit', 'Errors');

// links
$items = array();
$items[] = array('label' => Yii::t('audit', 'Search'), 'url' => '#', 'linkOptions' => array('class' => 'auditError-grid-search btn btn-default'));
if (Yii::app()->user->getState('index.auditError') != $this->createUrl('index'))
    $items[] = array('label' => Yii::t('audit', 'Reset Filters'), 'url' => array('index'), 'linkOptions' => array('class' => 'btn btn-default'));
$this->pageHeading = $this->pageTitle . $this->widget('zii.widgets.CMenu', array(
        'items' => $items,
        'htmlOptions' => array('class' => 'list-inline pull-right'),
    ), true);

// search
$this->renderPartial('_search', array(
    'auditError' => $auditError,
));

// grid
$this->renderPartial('_grid', array(
    'auditError' => $auditError,
));