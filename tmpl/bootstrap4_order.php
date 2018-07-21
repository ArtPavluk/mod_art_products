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
<div id="art-products-order<?php echo $module_id; ?>" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="art-products-modal-title modal-title">
					<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_ORDER'); ?>
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="text-center">
					<div class="art-products-result" style="display: none">
						<div class="message error alert alert-danger" style="display: none;"></div>
						<div class="message success alert alert-success" style="display: none;"></div>
					</div>
					<?php if ($params->get('order_form_name', 0)):
						$required = ($params->get('order_form_name') == 3) ? '<span class="star text-danger">*</span>' : '';
						?>
						<div class="form-group">
							<label>
								<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_NAME'); ?>
								<?php echo $required; ?>
							</label>
							<input type="text" class="form-control" name="name">
						</div>
					<?php endif; ?>
					<?php if ($params->get('order_form_phone', 0)):
						$required = ($params->get('order_form_phone') == 3) ? '<span class="star text-danger">*</span>' : '';
						?>
						<div class="form-group">
							<label>
								<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_PHONE'); ?>
								<?php echo $required; ?>
							</label>

							<input type="text" class="form-control" name="phone">
						</div>
					<?php endif; ?>
					<?php if ($params->get('order_form_email', 0)):
						$required = ($params->get('order_form_email') == 3) ? '<span class="star text-danger">*</span>' : '';
						?>
						<div class="form-group">
							<label>
								<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_EMAIL'); ?>
								<?php echo $required; ?>
							</label>
							<input type="text" class="form-control" name="email">
						</div>
					<?php endif; ?>
					<?php if ($params->get('order_form_message', 0)):
						$required = ($params->get('order_form_message') == 3) ? '<span class="star text-danger">*</span>' : '';
						?>
						<div class="form-group">
							<label>
								<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_MESSAGE'); ?>
								<?php echo $required; ?>
							</label>
							<textarea name="message" cols="10" rows="5" class="form-control"></textarea>
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
	</div>
</div>
