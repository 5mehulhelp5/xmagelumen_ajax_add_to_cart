# Magento 2 Extension — Quick Add To Cart

![Magento](https://img.shields.io/badge/Magento-2.x-orange?logo=magento)  ![PHP](https://img.shields.io/badge/PHP-8.x-blue?logo=php) ![Contributions](https://img.shields.io/badge/Contributions-Welcome-brightgreen)  
  
##### Magento 2 module that enhances the add-to-cart experience by enabling AJAX-based product additions. Customers can add products to the cart without page reloads, with optional features to automatically open the mini cart or redirect to the cart page. Fully compatible with Luma and Hyvä themes, with configurable settings via the admin panel.
---

## Installation  

1. Copy the contents of this repository into:  
   ```bash
   {MAGENTO_ROOT}/app/code/DevScripts/QuickAddToCart/
   ```
2. Run the following commands in your Magento root directory:  
   ```bash
   php bin/magento setup:upgrade
   php bin/magento setup:static-content:deploy
   php bin/magento cache:flush
   ```
---

## Screenshots  

**Admin Configuration**  

![Admin Configuration](https://github.com/inadeemkhan/magento2-quick-add-to-cart/blob/master/images/add-to-cart-configuration.png) 

**Add To Cart**

![Admin Configuration](https://github.com/inadeemkhan/magento2-quick-add-to-cart/blob/master/images/add-to-cart-open.png) 

---

## Prerequisites  

Ensure the following requirements are met before installing this extension:

| Prerequisite | How to Check | Documentation |
|--------------|--------------|---------------|
| Apache / Nginx | `apache2 -v` (Ubuntu)<br><br>`nginx -v` | [Apache Docs](https://devdocs.magento.com/guides/v2.2/install-gde/prereq/apache.html) <br> [Nginx Docs](https://docs.nginx.com/nginx/admin-guide/installing-nginx/installing-nginx-open-source/)|
| PHP >= 8.1 | `php -v` | [PHP on Ubuntu](http://devdocs.magento.com/guides/v2.2/install-gde/prereq/php-ubuntu.html)<br>[PHP on CentOS](http://devdocs.magento.com/guides/v2.2/install-gde/prereq/php-centos.html) |
| MySQL 5.6.x | `mysql -u [root username] -p` | [MySQL Docs](http://devdocs.magento.com/guides/v2.2/install-gde/prereq/mysql.html) |

---

## Contribution  

Contributions are welcome!  
The fastest way to contribute is by submitting a [pull request](https://help.github.com/articles/about-pull-requests/) on GitHub.  

---

## Issues & Support  

If you encounter any issues or bugs, please [open an issue](https://github.com/inadeemkhan/magento2-quick-add-to-cart/issues) on GitHub.  

For direct support or feedback, feel free to contact:  
📧 [khannadeem243@gmail.com](mailto:khannadeem243@gmail.com)  
