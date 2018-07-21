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
	$classGrid = (!empty($item->images)) ? 'col-sm-9' : 'col-sm-12' ?>
	<div class="itemProduct" data-art-product>
		<div class="well">
			<div class="row">
				<?php if ($item->images): ?>
					<div class="col-sm-3 art-product-image">
						<?php if ($item->label): ?>
							<div class="label label-default art-product-label art-product-label-<?php echo $item->label; ?>">
								<?php echo Text::_('MOD_ART_PRODUCTS_PRODUCT_LABEL_' . mb_strtolower($item->label)); ?>
							</div>
						<?php endif; ?>
						<?php if (count($item->images) > 1): ?>
							<div id="productImage<?php echo $key; ?>" class="carousel slide">
								<div class="carousel-inner">
									<?php foreach ($item->images as $i => $image): ?>
										<div class="item <?php echo ($i == 0) ? ' active ' : ''; ?>">
											<img src="/<?php echo $image; ?>" alt="<?php echo $item->name; ?>">
										</div>
									<?php endforeach; ?>
								</div>
								<!-- Controls -->
								<a class="left carousel-control" href="#productImage<?php echo $key; ?>" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#productImage<?php echo $key; ?>" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
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
							   href="#art-products-order<?php echo $module_id; ?>"
							   role="button" class="btn btn-success" data-toggle="modal">
								<?php echo Text::_('MOD_ART_PRODUCTS_ORDER_FORM_ORDER'); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>