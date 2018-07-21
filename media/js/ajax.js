/*
 * @package    Art products module
 * @version    1.2.0
 * @author     Artem Pavluk - www.art-pavluk.com
 * @copyright  Copyright (c) 2010 - 2018 Private master Pavluk. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://art-pavluk.com
 */

(function ($) {
	$(document).ready(function () {
		$('[data-mod-art-products]').each(function () {
			// Prepare variables
			const block = $(this),
				module_id = block.data('mod-art-products'),
				itemsBlock = block.find('.items'),
				more = block.find('.ajax-more');


			// Send Ajax
			function getItems() {
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '/index.php?option=com_ajax&module=art_products&task=items&format=json',
					data: {module_id: module_id, offset: itemsBlock.find('[data-art-product]').length},
					success: function (response) {
						if (response.data) {
							$(response.data).appendTo(itemsBlock);
						}
						else {
							more.hide();
						}
					}
				});
			}

			// Get items
			getItems();
			more.on('click', function () {
				getItems();
			});
		});
	});
})(jQuery);