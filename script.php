<?php
/**
 * @package    Art products module
 * @version    1.1.0
 * @author     Artem Pavluk - www.art-pavluk.com
 * @copyright  Copyright (c) 2010 - 2018 Private master Pavluk. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://art-pavluk.com
 */

defined('_JEXEC') or die;

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