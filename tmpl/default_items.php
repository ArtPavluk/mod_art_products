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

use Joomla\CMS\Language\Text;

?>

<?php foreach ($items as $item):
	$classGrid = ($item->image) ? 'span9' : 'span3' ?>
	<div class="item">
		<div class="well">
			<div class="row-fluid">
				<?php if ($item->image): ?>
					<div class="span3 product-image">
						<?php if ($item->tag): ?>
							<div class="label label-success product-label product-label-<?php echo $item->tag;?>">
								<?php echo Text::_('MOD_ART_PRODUCTS_PRODUCT_TAG_' . mb_strtolower($item->tag)); ?>
							</div>
						<?php endif; ?>
						<img src="/<?php echo $item->image; ?>" alt="<?php echo $item->name; ?>">
					</div>
				<?php endif; ?>
				<div class="<?php echo $classGrid; ?>">
					<div class="product-name">
						<h3>
							<?php echo $item->name; ?>
						</h3>
						<?php if ($item->code): ?>
							<sup class="small">(<?php echo Text::_('MOD_ART_PRODUCTS_PRODUCT_CODE') . $item->code; ?>)</sup>
						<?php endif; ?>
					</div>
					<?php if ($item->text): ?>
						<div><?php echo $item->text; ?></div>
					<?php endif; ?>
					<?php if ($item->price): ?>
						<div class="product-price-block">
							<?php if ($item->price_old): ?>
								<strike><?php echo $item->price_old; ?></strike>
							<?php endif; ?>
							<div class="product-price"><?php echo $item->price; ?></div>

						</div>

					<?php endif; ?>


				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>