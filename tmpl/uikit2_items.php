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

use Joomla\CMS\Language\Text;

?>

<?php foreach ($items as $key => $item):
	$classGrid = (!empty($item->images)) ? 'uk-width-medium-3-4' : 'uk-width-medium-1-1' ?>
	<div class="itemProduct" data-art-product>
		<div class="uk-panel uk-panel-box uk-margin-bottom">
			<div class="uk-grid uk-grid-small">
				<?php if ($item->images): ?>
					<div class="uk-width-medium-1-4 art-product-image">
						<?php if ($item->label): ?>
							<div class="uk-badge art-product-label art-product-label-<?php echo $item->label; ?>">
								<?php echo Text::_('MOD_ART_PRODUCTS_PRODUCT_LABEL_' . mb_strtolower($item->label)); ?>
							</div>
						<?php endif; ?>
						<?php if (count($item->images) > 1): ?>
							<div class="uk-slidenav-position" data-uk-slideshow>
								<ul class="uk-slideshow">
									<?php foreach ($item->images as $i => $image): ?>
										<li class="item <?php echo ($i == 0) ? ' uk-active ' : ''; ?>">
											<img src="/<?php echo $image; ?>" alt="<?php echo $item->name; ?>">
										</li>
									<?php endforeach; ?>
								</ul>
								<!-- Controls -->
								<a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
								<a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next"></a>
							</div>
						<?php else: ?>
							<img class="img-responsive" src="/<?php echo $item->images[0]; ?>" alt="<?php echo $item->name; ?>">
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<div class="<?php echo $classGrid; ?>">
					<div class="art-product-name">
						<h3>
							<?php echo $item->name; ?>
						</h3>
						<?php if ($item->code): ?>
							<sup class="small">(<?php echo Text::_('MOD_ART_PRODUCTS_PRODUCT_CODE') . $item->code; ?>
								)</sup>
						<?php endif; ?>
					</div>
					<?php if ($item->text): ?>
						<div><?php echo $item->text; ?></div>
					<?php endif; ?>
					<?php if ($item->price): ?>
						<div class="art-product-price-block">
							<?php if ($item->price_old): ?>
								<strike><?php echo $item->price_old; ?></strike>
							<?php endif; ?>
							<div class="art-product-price"><?php echo $item->price; ?></div>
						</div>
					<?php endif; ?>
					<?php if ($params->get('order_enable')): ?>
						<div class="art-product-order">
							<a data-mod-art-products-order="<?php echo $key; ?>"
							   href="#art-products-order<?php echo $module_id; ?>" class="uk-button uk-button-success"
							   data-uk-modal>
								<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_ORDER'); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>