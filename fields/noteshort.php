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

use Joomla\CMS\Form\FormField;
use Joomla\CMS\Language\Text;

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

	function getInput()
	{
		JLoader::register('modArtProductsHelper', JPATH_SITE . '/modules/mod_art_products/helper.php');
		$fromFields    = modArtProductsHelper::$_fromFields;
		$productFields = modArtProductsHelper::$_productFields;

		$html = '<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#shortcode">';
		$html .= Text::_('MOD_ART_PRODUCTS_DESCRIPTION_SHORT_BUTTON');
		$html .= '</button>';
		$html .= '<div id="shortcode" class="collapse">';
		$html .= '<table class="table table-bordered">';
		$html .= '<thead><tr><th></th><th>' . Text::_('MOD_ART_PRODUCTS_DESCRIPTION_SHORT_LABEL') . '</th>';
		$html .= '<th>' . Text::_('MOD_ART_PRODUCTS_DESCRIPTION_SHORT_VALUE') . '</th></tr></thead>';
		$html .= '<tbody>';

		foreach ($fromFields as $field)
		{
			$html .= '<tr>';
			$html .= '<td>' . Text::_('MOD_ART_PRODUCTS_ORDER_FORM_' . mb_strtoupper($field)) . '</td>';
			$html .= '<td><code>{form_' . $field . ':label}</code></td>';
			$html .= '<td><code>{form_' . $field . ':value}</code></td>';
			$html .= '</tr>';
		}

		foreach ($productFields as $field)
		{
			$html .= '<tr>';
			$html .= '<td>' . Text::_('MOD_ART_PRODUCTS_PRODUCT_' . mb_strtoupper($field)) . '</td>';
			$html .= '<td><code>{product_' . $field . ':label}</code></td>';
			$html .= '<td><code>{product_' . $field . ':value}</code></td>';
			$html .= '</tr>';
		}
		$html .= '</tbody></table></div>';

		return $html;
	}

}

