# Art products
The module displays a simple list of products with an image and the ability to order.

**[Download last version](https://github.com/ArtPavluk/mod_art_products/releases/latest)**   
**[Live Demo](https://demo.art-pavluk.com/en)**   
**[Joomla! Extensions Directory](https://extensions.joomla.org/extensions/extension/e-commerce/art-products/)**

**Supported Joomla versions:** 3.8.7 and later  
**Read this in other languages:** 
[English](https://github.com/ArtPavluk/mod_art_products/blob/master/README.md), 
[Русский](https://github.com/ArtPavluk/mod_art_products/blob/master/README.ru-RU.md).

## Settings

### Basic settings of the module
* **Enable AJAX** - Yes \ No  unload goods with ajax
* **Limit of products** - by default 1 how many products are uploaded at a time
* **Add item** - list of products available fields:
	* **Name** - Product or service name
	* **Code** - Product or service code
	* **Image** - Product or service image
	* **Price** - Product or service price
	* **Price old** - Product or service price old
	* **Description** - Product or service description
	* **Label** - Product or service label, available options:
		* **New**
		* **Sales Hit**
		* **Discount**
	
		
### Order setup
* **Enable Order Form** - Yes \ No
* **Enable redirect after successful order** - Yes \ No after submitting the form, redirection takes place
	* **Referral link** - Enter the link in the format https://site.com/page.html

#### Order Form Fields
* **Name** - 3 options are available (Show, Required, Hide)
* **Phone** - 3 options are available (Show, Required, Hide)
* **E-mail** - 3 options are available (Show, Required, Hide)
* **Wish to order** - 3 options are available (Show, Required, Hide)

#### Mail settings for the Administrator
* **Administrator Mail** - if you do not specify, the mail will be taken from the main site settings
* **Subject of the letter** - if you do not specify, the default theme "New order"
* **Text of the letter** - The letter is written in the editor that you selected by default, in the letter shortcodes are available.
	
Name fields | Insert field name | Insert field value
--- | --- | ---|
Name | `{form_name:label}` | `{form_name:value}` 
Phone | `{form_phone:label}` | `{form_phone:value}` 
E-mail | `{form_email:label}` | `{form_email:value}` 
Wish to order | `{form_message:label}` | `{form_message:value}` 
Name: | `{product_name:label}` | `{product_name:value}` 
Code: | `{product_code:label}` | `{product_code:value}` 
Price: | `{product_price:label}` | `{product_price:value}` 
Price old: | `{product_price_old:label}` | `{product_price_old:value}` 
Label: | `{product_label:label}` | `{product_label:value}` 
Image: | `{product_image:label}` | `{product_image:value}`
Description: | `{product_text:label}` | `{product_text:value}`


## Screenshots

### Basic settings of the module
![Basic settings of the module](https://demo.art-pavluk.com/images/screenshots/mod_art_products/en/base.png)
### Add item
![Add item](https://demo.art-pavluk.com/images/screenshots/mod_art_products/en/add.png)
### Order setting
![Order setting](https://demo.art-pavluk.com/images/screenshots/mod_art_products/en/order.png)
### Appearance of the module
![Appearance of the module](https://demo.art-pavluk.com/images/screenshots/mod_art_products/en/front.png)
### Appearance of the order form
![Appearance of the order form](https://demo.art-pavluk.com/images/screenshots/mod_art_products/en/front-order.png)
