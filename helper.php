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

use Joomla\CMS\Factory;
use Joomla\Registry\Registry;
use Joomla\Utilities\ArrayHelper;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

class modArtProductsHelper
{
	/**
	 * Form field list
	 *
	 * @var    array
	 *
	 * @since  1.0.0
	 */
	public static $_fromFields = array('name', 'phone', 'email', 'message');

	/**
	 * Product field list
	 *
	 * @var    array
	 *
	 * @since  1.0.0
	 */
	public static $_productFields = array('name', 'code', 'price', 'price_old', 'label', 'image', 'text');

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

		if ($params = self::getModuleParams($module_id = $app->input->get('module_id', 0)))
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

				elseif ($task && $task == 'order')
				{
					// Fields
					$fields = self::$_fromFields;
					$labels = array();
					$values = array();
					$errors = array();

					$product_id = $app->input->get('product_id', '');
					$form       = $app->input->post->get('form', array(), 'array');

					foreach ($fields as $field)
					{
							$label = Text::_('MOD_ART_PRODUCTS_ORDER_FORM_' . mb_strtoupper($field));
							$param = $params->get('order_form_' . $field, 0, 'int');

							if (isset($form[$field])){
								$value = $form[$field];
							}


						if ($param && isset($form[$field]))
						{
							$labels['form_' . $field] = $label;
							$values['form_' . $field] = $value;

							// Validate
							if ($param == 3 && empty($value))
							{
								$errors[] = Text::sprintf('MOD_ART_PRODUCTS_ORDER_FORM_ERROR', $label);
							}
						}
					}

					$product = ArrayHelper::fromObject($params->get('products'))[$product_id];

					if (count($errors))
					{
						throw new Exception(implode(PHP_EOL, $errors), 404);
					}
					else
					{
						$sendMail = self::sendAdminMail($product, $labels, $values, $params);
						$message  = ($sendMail) ? Text::_('MOD_ART_PRODUCTS_ORDER_FORM_SEND_SUCCESS') :
							Text::_('MOD_ART_PRODUCTS_ORDER_FORM_ERROR_SEND');
						$app->enqueueMessage($message, 'success');

						$app->input->set('ignoreMessages', false);

						if ($params->get('order_redirect') && !empty($params->get('order_redirect_link') && $sendMail))
						{
							$response           = new stdClass();
							$response->redirect = $params->get('order_redirect_link');

							return $response;
						}

						return true;
					}

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
			foreach ($products as $key => $item)
			{
				if ($limit == 0 || (($i >= $offset && $i < ($offset + $limit))))
				{
					$imagesArray = !empty($item->images) ? $item->images : array();
					$images      = array();

					foreach ($imagesArray as $image)
					{
						if ($image)
						{
							$images[] = $image;
						}
					}
					$item->images = $images;

					$items[$key] = $item;
				}

				$i++;
			}


			return $items;
		}

		return false;

	}

	/**
	 * Send mail admin email
	 *
	 * @param array   $product Order product
	 * @param array   $labels  Form field label
	 * @param array   $values  Form field values
	 * @param JObject $params  Module params
	 *
	 * @return bool
	 *
	 * @since 1.0.0
	 *
	 */

	protected static function sendAdminMail($product = null, $labels = array(), $values = array(), $params)
	{
		if (empty($product))
		{
			return false;
		}
		$app    = Factory::getApplication();
		$config = Factory::getConfig();
		$sender = array($config->get('mailfrom'), $config->get('sitename'));

		$recipient = (!empty($params->get('order_admin', ''))) ? $params->get('order_admin') :
			$config->get('mailfrom');

		$subject = (!empty($params->get('order_subject', ''))) ? $params->get('order_subject') :
			Text::_('MOD_ART_PRODUCTS_ORDER_SUBJECT_DEFAULT');

		$message = (!empty($params->get('order_admin_text', ''))) ? $params->get('order_admin_text') :
			Text::_('MOD_ART_PRODUCTS_ORDER_ADMIN_TEXT_DEFAULT');

		if (!empty($params->get('order_admin_text', '')))
		{
			$fields = self::$_fromFields;

			foreach ($fields as $field)
			{
				$key     = 'form_' . $field;
				$label   = (!empty($labels[$key])) ? $labels[$key] : '';
				$message = str_replace('{' . $key . ':label}', $label, $message);

				$value   = (!empty($values[$key])) ? $values[$key] : '';
				$message = str_replace('{' . $key . ':value}', $value, $message);
			}
			$productOrder = self::$_productFields;

			foreach ($productOrder as $field)
			{
				$label   = Text::_('MOD_ART_PRODUCTS_PRODUCT_' . mb_strtoupper($field));
				$message = str_replace('{product_' . $field . ':label}', $label, $message);

				$value = (!empty($product[$field])) ? $product[$field] : '';

				if (!empty($product['images']) && $field == 'image')
				{

					$value = '<img src="' . Uri::base() . $product['images'][0] . '">';
				}
				if (!empty($value) && $field == 'label')
				{
					$value = Text::_('MOD_ART_PRODUCTS_PRODUCT_LABEL_' . mb_strtolower($value));
				}
				$message = str_replace('{product_' . $field . ':value}', $value, $message);
			}
		}
		else
		{
			$message = '<a href="' . Uri::base() . 'administrator/index.php?option=com_modules&amp;task=module.edit&amp;id=' .
				$app->input->get('module_id', 0) . '">' .
				Text::_('MOD_ART_PRODUCTS_ORDER_ADMIN_TEXT_DEFAULT') . '</a>';
		}

		$mail = Factory::getMailer();
		$mail->setSender($sender);
		$mail->addRecipient($recipient);
		$mail->setSubject($subject);
		$mail->isHtml(true);
		$mail->Encoding = 'base64';
		$mail->setBody($message);

		return $mail->send();
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