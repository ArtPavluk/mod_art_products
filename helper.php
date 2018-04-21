<?php
/**
 * @package    Art products module
 * @version    1.0.0
 * @author     Artem Pavluk - www.art-pavluk.com
 * @copyright  Copyright (c) 2010 - 2018 Private master Pavluk. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://art-pavluk.com
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\Registry\Registry;
use Joomla\Utilities\ArrayHelper;
use Joomla\CMS\Helper\ModuleHelper;

class modArtProductsHelper
{
	/**
	 * Form fields list
	 *
	 * @var    array
	 *
	 * @since  1.0.0
	 */
	public static $_fromFields = array('name', 'phone', 'email','message');

	/**
	 * Product fields list
	 *
	 * @var    array
	 *
	 * @since  1.0.0
	 */
	public static $_productFields = array('name', 'code', 'price','price_old', 'tag', 'image', 'text');

	/**
	 * Get items layout
	 *
	 * @return bool|string
	 *
	 * @since 1.0.0
	 */
	public static function getAjax()
	{
		$app  = Factory::getApplication();
		$task = $app->input->get('task', false);
		if ($params = self::getModuleParams($app->input->get('module_id', 0)))
		{
			$items = self::getItems($params);
			if (count($items))
			{
				if ($task && $task == 'items')
				{
					ob_start();
					require ModuleHelper::getLayoutPath('mod_art_products', $params->get('layout', 'default') . '_items');
					$response = ob_get_contents();
					ob_end_clean();

					return $response;
				}
			}
		}

		return false;
	}

	/**
	 * Get Products items
	 *
	 * @param Registry $params Module parameters
	 *
	 * @return bool|array;
	 *
	 * @since 1.0.0
	 */
	public static function getItems($params)
	{

		$products = ArrayHelper::fromObject($params->get('products', array()), false);
		if (count($products))
		{
			$ajax   = $params->get('ajax', 0);
			$offset = ($ajax) ? Factory::getApplication()->input->get('offset', 0) : 0;
			$limit  = ($ajax) ? $params->get('limit', 0) : 0;

			// Prepare items
			$items = array();
			$i     = 0;
			foreach ($products as $item)
			{
				if ($limit == 0 || (($i >= $offset && $i < ($offset + $limit))))
				{
					$items[] = $item;
				}
				$i++;
			}


			return $items;
		}

		return false;

	}

	/**
	 * Get Module parameters
	 *
	 * @param int $pk module id
	 *
	 * @return bool|Registry
	 *
	 * @since 1.0.0
	 */
	protected static function getModuleParams($pk = null)
	{
		$pk = (empty($pk)) ? Factory::getApplication()->input->get('module_id', 0) : $pk;
		if (empty($pk))
		{
			return false;
		}

		// Get Params
		$db    = Factory::getDbo();
		$query = $db->getQuery(true)
			->select('params')
			->from('#__modules')
			->where('id =' . $pk);
		$db->setQuery($query);
		$params = $db->loadResult();

		return (!empty($params)) ? new Registry($params) : false;
	}
}