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

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Form\Field\MediaField;

class JFormFieldProdImages extends MediaField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 *
	 * @since  1.1.0
	 */
	protected $type = 'prodimages';

	/**
	 * Name of the layout being used to render the field
	 *
	 * @var    string
	 *
	 * @since  1.1.0
	 *
	 * @return string
	 */

	protected function getInput()
	{
		HTMLHelper::_('stylesheet', 'media/mod_art_products/css/admin.min.css', array('version' => 'auto'));

		$value  = $value  = (!empty($this->value)) ? $this->value : array();
		if (!is_array($this->value)){
			$value = array($this->value);
		}
		$fields = array();
		$name   = $this->name;
		for ($i = 0; $i < $this->element->attributes()->count; $i++)
		{
			$this->value = (isset($value[$i])) ? $value[$i] : '';
			$this->name  = $name . '[' . $i . ']';
			$fields[]    = parent::getInput();
		}

		return implode('', $fields);
	}
}