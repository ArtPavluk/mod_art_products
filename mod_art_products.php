<?php
/**
 * @package    Art products module
 * @version    1.2.0
 * @author     Artem Pavluk - www.art-pavluk.com
 * @copyright  Copyright (c) 2010 - 2018 Private master Pavluk. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://art-pavluk.com
 */


defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

require_once __DIR__ . '/helper.php';

$helper = new modArtProductsHelper();
$ajax   = ($params->get('ajax', 0));
$order   = ($params->get('order_enable', 0));
$limit  = $params->get('limit', 0);
$layout = $params->get('layout', 'default');
$module_id = $module->id;
$items  = ($ajax) ? array() : $helper::getItems($params);

require ModuleHelper::getLayoutPath($module->module, $layout);