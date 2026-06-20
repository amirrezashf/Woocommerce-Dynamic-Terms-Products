# Plugin Name

WooCommerce Dynamic Terms Products

## Description

Dynamically displays purchased product names inside the WooCommerce terms and conditions checkbox text on the checkout page.

---

# Short Description

Display WooCommerce product names dynamically inside the terms and conditions acceptance text.

---

# GitHub Repository Name

```text
woocommerce-dynamic-terms-products
```

---

# Plugin File Name

```text
woocommerce-dynamic-terms-products.php
```

---

# README.md

# WooCommerce Dynamic Terms Products

Automatically inserts the products currently in the customer's cart into the WooCommerce terms and conditions acceptance text during checkout.

## Description

WooCommerce Dynamic Terms Products enhances the checkout experience by dynamically displaying the names of products that the customer is purchasing directly inside the terms and conditions checkbox text.

Instead of showing a generic acceptance message, customers can clearly see which products the terms apply to before completing their purchase.

The plugin automatically detects products currently present in the shopping cart and generates a dynamic acceptance message.

## Features

- Dynamic terms and conditions text
- Automatic product name detection
- Supports single-product orders
- Supports multi-product orders
- Automatically adjusts singular and plural wording
- Supports all WooCommerce product types
- Lightweight and performance-friendly
- No settings page required
- No database tables created
- No external requests
- Easy customization through code

## Example Output

Single product:

```text
من قوانین و مقررات فروشگاه و محصول هاست وردپرس را مطالعه کرده و می‌پذیرم.
```

Multiple products:

```text
من قوانین و مقررات فروشگاه و محصولات هاست وردپرس و قالب فروشگاهی را مطالعه کرده و می‌پذیرم.
```

## How It Works

The plugin hooks into:

```php
woocommerce_get_terms_and_conditions_checkbox_text
```

When the checkout page loads:

1. Products are retrieved from the WooCommerce cart.
2. Product names are collected.
3. A custom acceptance message is generated.
4. The generated text replaces the default WooCommerce terms text.

## Technical Details

### Main Hook

```php
woocommerce_get_terms_and_conditions_checkbox_text
```

### WooCommerce Functions Used

```php
WC()->cart
WC()->cart->get_cart()
```

### WordPress Functions Used

```php
get_bloginfo()
wp_strip_all_tags()
esc_html()
```

## Requirements

- WordPress 6.0+
- WooCommerce 7.0+
- PHP 7.4+

## Development Notes

The plugin does not:

- Create custom tables
- Create custom post types
- Store additional metadata
- Modify orders
- Modify products
- Send external requests

The plugin only changes the terms and conditions checkbox text during checkout.

## Customization

Developers can customize the generated message by editing the callback attached to:

```php
woocommerce_get_terms_and_conditions_checkbox_text
```

Possible customizations:

- Store name
- Product separator
- Singular and plural labels
- Product formatting
- HTML styling

## Changelog

### 1.0.0

- Initial release
- Dynamic product names in checkout terms text
- Support for single and multiple products
- Automatic WooCommerce cart integration

---

# فارسی

افزونه WooCommerce Dynamic Terms Products نام محصولات موجود در سبد خرید را به صورت خودکار در متن پذیرش قوانین و مقررات ووکامرس نمایش می‌دهد.

## امکانات

- نمایش خودکار نام محصولات در متن قوانین
- پشتیبانی از سفارش تک محصولی
- پشتیبانی از سفارش چند محصولی
- تشخیص خودکار تعداد محصولات
- سبک و بدون نیاز به تنظیمات
- بدون ایجاد جدول در دیتابیس
- بدون درخواست خارجی
- سازگار با اکثر قالب‌های ووکامرس

## نحوه عملکرد

افزونه از هوک زیر استفاده می‌کند:

```php
woocommerce_get_terms_and_conditions_checkbox_text
```

در هنگام بارگذاری صفحه تسویه حساب:

- محصولات سبد خرید خوانده می‌شوند
- نام محصولات استخراج می‌شود
- متن سفارشی ساخته می‌شود
- متن پیشفرض ووکامرس جایگزین می‌شود

## پیش‌نیازها

- وردپرس
- ووکامرس
- PHP 7.4 یا بالاتر

## تغییرات

### 1.0.0

- انتشار اولیه
- نمایش داینامیک نام محصولات در متن قوانین
- پشتیبانی از سفارش‌های تک محصولی و چند محصولی
- یکپارچگی کامل با ووکامرس

## نویسنده

Amirreza Shayesteh Far

https://amirrezaa.ir/
