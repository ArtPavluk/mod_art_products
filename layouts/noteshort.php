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

extract($displayData);

?>
<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#shortcode">
	<?php echo Text::_('MOD_ART_PRODUCTS_DESCRIPTION_SHORT_BUTTON'); ?>
</button>
<div id="shortcode" class="collapse">
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th></th>
			<th><?php echo Text::_('MOD_ART_PRODUCTS_DESCRIPTION_SHORT_LABEL'); ?></th>
			<th><?php echo Text::_('MOD_ART_PRODUCTS_DESCRIPTION_SHORT_VALUE'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($fromFields as $field):?>
			<tr>
				<td>
					<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_' . mb_strtoupper($field));?>
				</td>
				<td><code>{form_<?php echo $field;?>:label}</code></td>
				<td><code>{form_<?php echo $field;?>:value}</code></td>
				</tr>
		<?php endforeach;?>

		<?php foreach ($productFields as $field):?>
			<tr>
				<td>
					<?php echo Text::_('MOD_ART_PRODUCTS_PRODUCT_' . mb_strtoupper($field));?>
				</td>
				<td><code>{product_<?php echo $field;?>:label}</code></td>
				<td><code>{product_<?php echo $field;?>:value}</code></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
</div>