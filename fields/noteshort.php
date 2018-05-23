<?php
/**
 * @package    Art products module
 * @version    1.1.2
 * @author     Artem Pavluk - www.art-pavluk.com
 * @copyright  Copyright (c) 2010 - 2018 Private master Pavluk. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://art-pavluk.com
 */

defined('_JEXEC') or die;

use Joomla\CMS\Form\FormField;

class JFormFieldNoteShort extends FormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 *
	 * @since  0.5.0
	 */
	protected $type = 'noteshort';

	/**
	 * Name of the layout being used to render the field
	 *
	 * @var    string
	 *
	 * @since  1.1.0
	 */
	protected $layout = 'modules.mod_art_products.noteshort';


	/**
	 * Method to get the data to be passed to the layout for rendering.
	 *
	 * @return  array
	 *
	 * @since  1.1.0
	 */
	protected function getLayoutData()
	{
		JLoader::register('modArtProductsHelper', JPATH_SITE . '/modules/mod_art_products/helper.php');

		$data = parent::getLayoutData();

		$data['fromFields']    = modArtProductsHelper::$_fromFields;
		$data['productFields'] = modArtProductsHelper::$_productFields;

		return $data;
	}


}

