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

use Joomla\CMS\Language\Text;

?>
<div id="art-products-order<?php echo $module_id; ?>" class="modal jviewport-width20 hide fade" tabindex="-1" role="dialog"
	 aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 class="art-products-modal-title">
			<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_ORDER'); ?>
		</h3>
	</div>
	<div class="modal-body jviewport-height">
		<form class="text-center">
			<div class="art-products-result" style="display: none">
				<div class="message error alert alert-error" style="display: none;"></div>
				<div class="message success alert alert-success" style="display: none;"></div>
			</div>
			<?php if ($params->get('order_form_name', 0)):
				$required = ($params->get('order_form_name') == 3) ? '<span class="star text-error">*</span>' : '';
				?>
				<div class="control-group">
					<div class="control-label">
						<label>
							<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_NAME'); ?>
							<?php echo $required; ?>
						</label>
					</div>
					<div class="controls">
						<input type="text" name="name">
					</div>
				</div>
			<?php endif; ?>
			<?php if ($params->get('order_form_phone', 0)):
				$required = ($params->get('order_form_phone') == 3) ? '<span class="star text-error">*</span>' : '';
				?>
				<div class="control-group">
					<div class="control-label">
						<label>
							<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_PHONE'); ?>
							<?php echo $required;?>
						</label>
					</div>
					<div class="controls">
						<input type="text" name="phone">
					</div>
				</div>
			<?php endif; ?>
			<?php if ($params->get('order_form_email', 0)):
				$required = ($params->get('order_form_email') == 3) ? '<span class="star text-error">*</span>' : '';
				?>
				<div class="control-group">
					<div class="control-label">
						<label>
							<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_EMAIL'); ?>
							<?php echo $required; ?>
						</label>
					</div>
					<div class="controls">
						<input type="text" name="email">
					</div>
				</div>
			<?php endif; ?>
			<?php if ($params->get('order_form_message', 0)):
				$required = ($params->get('order_form_message') == 3) ? '<span class="star text-error">*</span>' : '';
				?>
				<div class="control-group">
					<div class="control-label">
						<label>
							<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_MESSAGE'); ?>
							<?php echo $required; ?>
						</label>
					</div>
					<div class="controls">
						<textarea name="message" cols="10" rows="5"></textarea>
					</div>
				</div>
			<?php endif; ?>
			<div class="text-center">
				<button class="btn btn-success" type="submit">
					<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_SEND'); ?>
				</button>
			</div>
		</form>
	</div>
</div>
