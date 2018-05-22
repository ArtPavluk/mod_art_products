<?php
/**
 * @package    Art products module
 * @version    1.1.1
 * @author     Artem Pavluk - www.art-pavluk.com
 * @copyright  Copyright (c) 2010 - 2018 Private master Pavluk. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://art-pavluk.com
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\Registry\Registry;

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

class mod_Art_ProductsInstallerScript
{
	/**
	 * Move default layouts to /layouts/modules/mod_art_products
	 *
	 * @param  string $type      Type of PostFlight action. Possible values are:
	 *                           - * install
	 *                           - * update
	 *                           - * discover_install
	 * @param         $parent    Parent object calling object.
	 *
	 * @return bool
	 *
	 * @since    1.1.0
	 */
	public function postflight($type, $parent)
	{
		$module = JPATH_ROOT . '/modules/mod_art_products/layouts';

		$layouts = JPATH_ROOT . '/layouts/modules/mod_art_products';

		// Check folders
		if (!JFolder::exists(JPATH_ROOT . '/layouts/modules'))
		{
			JFolder::create(JPATH_ROOT . '/layouts/modules');
		}

		if (JFolder::exists(JPATH_ROOT . '/layouts/modules/mod_art_products'))
		{
			JFolder::delete(JPATH_ROOT . '/layouts/modules/mod_art_products');
		}

		// Move layouts
		JFolder::move($module, $layouts);

		return true;
	}

	/**
	 * This method is called after a component is updated.
	 *
	 * Migration image from version 1.0.0 to 1.1.0
	 *
	 * @param  \stdClass $parent  Parent object calling object.
	 *
	 * @return void
	 *
	 * @since  1.1.0
	 */
	public function update($parent)
	{
		$db    = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select(array('id','params'))
			->from($db->quoteName('#__modules'))
			->where($db->quoteName('module') . ' = ' . $db->quote('mod_art_products'));
		$db->setQuery($query);
		$modules = $db->loadObjectList('id');
		if (!empty($modules)){
			foreach ($modules as $key => $module){
				$params = new Registry($module->params);
				$products = $params->get('products');
				if (!empty($products)){
					foreach ($products as &$product){
						if (isset($product->image)){
							$product->images = array(
								0 => $product->image
							);
							unset($product->image);
						}
					}
					$params->set('products',$products);
				}
				$params = $params->toString();
				$module->params = $params;

				$db->updateObject('#__modules', $module, 'id');

				$db->execute();
			}
		}

	}

	/**
	 * Delete default layouts /layouts/modules/mod_art_product
	 *
	 * @param   JAdapterInstance $adapter The object responsible for running this script
	 *
	 * @since 1.1.0
	 */
	public function uninstall($adapter)
	{
		$folder = JPATH_ROOT . '/layouts/modules/mod_art_products';
		if (JFolder::exists($folder))
		{
			JFolder::delete($folder);
		}
	}

}