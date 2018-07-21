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

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;


HTMLHelper::_('stylesheet', 'media/mod_art_products/css/default.min.css', array('version' => 'auto'));

if ($ajax)
{
	HTMLHelper::_('jquery.framework');
	HTMLHelper::_('script', 'media/mod_art_products/js/ajax.min.js', array('version' => 'auto'));
}

?>

<div class="art-products" <?php echo ($ajax || $order) ? 'data-mod-art-products="' . $module->id . '"' : ''; ?>>
	<div class="items">
		<?php if (!$ajax)
		{
			require ModuleHelper::getLayoutPath($module->module, $layout . '_items');
		} ?>
	</div>

	<?php if ($ajax && $limit): ?>
		<div class="row-fluid">
			<a class="btn span12 ajax-more"><?php echo Text::_('MOD_ART_PRODUCTS_AJAX_MORE'); ?></a>
		</div>
	<?php endif; ?>

	<?php if ($order)
	{
		require ModuleHelper::getLayoutPath($module->module, $layout . '_order');
	} ?>
</div>