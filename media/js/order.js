/*
 * @package    Art products module
 * @version    1.1.1
 * @author     Artem Pavluk - www.art-pavluk.com
 * @copyright  Copyright (c) 2010 - 2018 Private master Pavluk. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://art-pavluk.com
 */

(function ($) {
	$(document).ready(function () {
		$('body').on('click', '[data-mod-art-products-order]', function () {
			const block = $(this).closest('[data-mod-art-products]'),
				module_id = block.data('mod-art-products'),
				product_id = $(this).data('mod-art-products-order'),
				modal = block.find('#art-products-order' + module_id),
				form = modal.find('form'),
				formData = {},
				result = form.find('.art-products-result');
			form.on('submit', function () {
				$(form.serializeArray()).each(function (key, field) {
					formData[field.name] = field.value;
				});
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '/index.php?option=com_ajax&module=art_products&task=order&format=json',
					data: {form: formData, product_id: product_id, module_id: module_id},
					beforeSend: function () {
						$(result).hide();
						$(result).find('.message').hide().html('');
					},
					success: function (response) {
						if (response.success) {
							if (response.data.redirect) {
								window.location.href = response.data.redirect;

							}
							else {
								$(result).find('.message.success').html(response.messages.success.join('<br />')).show();
								$(form)[0].reset();
							}

						}
						else {
							$(result).show();
							$(result).find('.message.error').html(response.message.replace(/\n/g, '<br />')).show();
						}
						$(result).show();
					},
				});

				return false
			});
		});
	});
})(jQuery);
