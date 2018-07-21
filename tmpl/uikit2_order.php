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

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

HTMLHelper::_('jquery.framework');
HTMLHelper::_('script', 'media/mod_art_products/js/order.min.js', array('version' => 'auto'));
?>
<div id="art-products-order<?php echo $module_id; ?>" class="uk-modal">
	<div class="uk-modal-dialog">
		<a class="uk-modal-close uk-close"></a>
		<div class="uk-modal-header">
			<div class="art-products-modal-title uk-h3">
				<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_ORDER'); ?>
			</div>
		</div>
		<form class="uk-text-center uk-form uk-form-stacked">
			<div class="art-products-result" style="display: none">
				<div class="message error uk-alert uk-alert-danger" style="display: none;"></div>
				<div class="message success uk-alert uk-alert-success" style="display: none;"></div>
			</div>
			<?php if ($params->get('order_form_name', 0)):
				$required = ($params->get('order_form_name') == 3) ? '<span class="star text-danger">*</span>' : '';
				?>
				<div class="uk-form-row">
					<label class="uk-form-label">
						<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_NAME'); ?>
						<?php echo $required; ?>
					</label>
					<div class="uk-form-controls">
						<input type="text" name="name" class="uk-form-width-medium">
					</div>
				</div>
			<?php endif; ?>
			<?php if ($params->get('order_form_phone', 0)):
				$required = ($params->get('order_form_phone') == 3) ? '<span class="star text-danger">*</span>' : '';
				?>
				<div class="uk-form-row">
					<label class="uk-form-label">
						<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_PHONE'); ?>
						<?php echo $required; ?>
					</label>
					<div class="uk-form-controls">
						<input type="text" name="phone" class="uk-form-width-medium">
					</div>
				</div>
			<?php endif; ?>
			<?php if ($params->get('order_form_email', 0)):
				$required = ($params->get('order_form_email') == 3) ? '<span class="star text-danger">*</span>' : '';
				?>
				<div class="uk-form-row">
					<label class="uk-form-label">
						<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_EMAIL'); ?>
						<?php echo $required; ?>
					</label>
					<div class="uk-form-controls">
						<input type="text" name="email" class="uk-form-width-medium">
					</div>
				</div>
			<?php endif; ?>
			<?php if ($params->get('order_form_message', 0)):
				$required = ($params->get('order_form_message') == 3) ? '<span class="star text-danger">*</span>' : '';
				?>
				<div class="uk-form-row">
					<label class="uk-form-label">
						<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_MESSAGE'); ?>
						<?php echo $required; ?>
					</label>
					<div class="uk-form-controls">
						<textarea name="message" cols="10" rows="5" class="uk-form-width-medium"></textarea>
					</div>
				</div>
			<?php endif; ?>
			<div class="uk-text-center uk-margin-top">
				<button class="uk-button uk-button-success" type="submit">
					<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_SEND'); ?>
				</button>
			</div>
		</form>
	</div>
</div>
