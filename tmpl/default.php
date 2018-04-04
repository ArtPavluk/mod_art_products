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
use Joomla\CMS\Language\Text;


HTMLHelper::_('jquery.framework');
HTMLHelper::_('script', 'media/mod_art_products/js/products.js', array('version' => 'auto'));
HTMLHelper::_('stylesheet', 'media/mod_art_products/css/products.css', array('version' => 'auto'));
?>
<div data-mod-art-products="<?php echo $module->id; ?>">
	<div class="loading">
		<?php echo Text::_('MOD_ART_PRODUCTS_LOADING'); ?>
	</div>
	<div class="result">
		<div class="items"></div>
	</div>
</div>