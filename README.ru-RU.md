# Art products
Модуль выводить простой список товаров  с изображением и возможностью заказать.

**[Скачать последнюю версию](https://github.com/ArtPavluk/mod_art_products/releases/latest)**   
**[Посмотреть демо](https://demo.art-pavluk.com)**  
**[Joomla! Extensions Directory](https://extensions.joomla.org/extensions/extension/e-commerce/art-products/)**

**Поддерживаемые версии Joomla:** 3.8.7 и более поздние версии   
**Прочесть на других языках:**
[English](https://github.com/ArtPavluk/mod_art_products/blob/master/README.md), 
[Русский](https://github.com/ArtPavluk/mod_art_products/blob/master/README.ru-RU.md).


## Настройки

### Основные настройки модуля
* **Bключить AJAX** - Да \ Нет  выгружать товары при помощи ajax
* **Кол-во товаров** - по умолчанию 1 сколько товаров выгружать за раз
* **Добавить товар** - список товаров доступные поля:
	* **Название** - Название товара или услуги
	* **Артикул** - Код товара или услуги
	* **Изображение** - Изображение товара или услуги
	* **Цена** - Цена товара или услуги
	* **Старая цена** - Цена товара или услуги
	* **Описание** - Описание товара или услуги
	* **Метка** - Метка товара или услуги, доступные варианты:
		* **Новинка**
		* **Хит продаж**
		* **Скидка**
	
		
### Настройка заказа
* **Включить форму заказа** - Да \ Нет
* **Включить редирект после успешного заказа** - Да \ Нет после отправки формы, произойдет перенаправление
	* **Ссылка перенаправления** - Введите ссылку в формате https://site.com/page.html

#### Поля формы заказа
* **Имя** - доступны 3 параметра (Показать,Обязательное,Скрыть)
* **Телефон** - доступны 3 параметра (Показать,Обязательное,Скрыть)
* **E-mail** - доступны 3 параметра (Показать,Обязательное,Скрыть)
* **Пожелание к заказу** - доступны 3 параметра (Показать,Обязательное,Скрыть)

#### Настройки письма Администратору
* **Почта администратора** - если не указать, почта будет братся с основный настроек сайта
* **Тема письма** - если не указать, будет братся тема по умолчания "Новый заказ"
* **Текст письма** - Письмо пишется в редакторе который выбран у Вас по умолчанию, в письме доступны шорткоды.
	
Название | Вставить имя поля | Вставить значение поля
--- | --- | ---|
Имя | `{form_name:label}` | `{form_name:value}` 
Телефон | `{form_phone:label}` | `{form_phone:value}` 
E-mail | `{form_email:label}` | `{form_email:value}` 
Пожелание к заказу | `{form_message:label}` | `{form_message:value}` 
Название: | `{product_name:label}` | `{product_name:value}` 
Артикул: | `{product_code:label}` | `{product_code:value}` 
Цена: | `{product_price:label}` | `{product_price:value}` 
Старая цена: | `{product_price_old:label}` | `{product_price_old:value}` 
Метка: | `{product_label:label}` | `{product_label:value}` 
Изображение: | `{product_image:label}` | `{product_image:value}`
Описание: | `{product_text:label}` | `{product_text:value}`


## Скриншоты

### Основные настройки модуля
![Основные настройки модуля](https://demo.art-pavluk.com/images/screenshots/mod_art_products/ru/base.png)
### Добавить товар
![Добавить товар](https://demo.art-pavluk.com/images/screenshots/mod_art_products/ru/add.png)
### Настройка заказа
![Настройка заказа](https://demo.art-pavluk.com/images/screenshots/mod_art_products/ru/order.png)
### Внешний вид модуля
![Внешний вид модуля](https://demo.art-pavluk.com/images/screenshots/mod_art_products/ru/front.png)
### Внешний вид формы заказа
![Внешний вид модуля](https://demo.art-pavluk.com/images/screenshots/mod_art_products/ru/front-order.png)