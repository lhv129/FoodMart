# ![image](https://github.com/user-attachments/assets/2f09c1b1-4e88-42d6-b112-abe0181d0cdf)
# FoodMart - Warehouse Management System
<table>
<tr>
<td>
  FoodMart is a modern warehouse management website that helps users easily shop for food products and manage orders. The project focuses on providing a convenient and efficient online shopping experience, while ensuring accuracy in warehouse management.
</td>
</tr>
</table>

## Demo
Here is a working live demo :  http://lhv.io.vn/

## Key Features

### Users:

* **Login/Registration:**
    * Login with Google account.
    * Send account confirmation email after registration.
    * Password recovery via email.
* **Product Management:**
    * Display product list with detailed information.
    * Search products by name or category.
    * Display remaining product quantity.
    * Display out-of-stock notifications.
* **Shopping Cart:**
    * Add products to the cart if they are in stock.
    * Display out-of-stock notifications if the product quantity is insufficient.
    * Update product quantity in the cart.
    * Automatically remove products from the cart if the quantity reaches 0.
    * Remove products from the cart.
    * Payment restriction: Do not allow payment if any product in the cart is out of stock.
* **Online Payment:**
    * Integrate online payment via VNPay.
    * Payment using multiple payment methods provided by VNPay.
* **Order Management:**
    * View order history.
    * Track order status.
    * Cancel and reorder when the order is in pending status.

### Admin:

* **Role Management:**
    * Assign roles for employees and admins.
* **Notifications:**
    * Notifications for import orders.
    * Notifications for sales orders (both online and at the counter).
* **Create Sales Order:**
    * Check product quantity in stock when creating sales orders for employees.
* **Statistics Dashboard:**
    * Statistics on import order amounts.
    * Statistics on sales order amounts.
    * Statistics on user count.
* **Account Management:**
    * Manage user accounts.
    * Block or restrict user accounts.

## Technology Stack

* **Frontend:** Template Free Bootstrap 5, Bootstrap, Tailwind CSS, JavaScript
* **Backend:** Laravel
* **Database:** MySql
* **Authentication:** Google OAuth2
* **Email:** Mailers
* **Payment:** VNPay
* **Deployment:** Ubuntu Server

## Mobile support
The WebApp is compatible with devices of all sizes and all OS's, and consistent improvements are being made.

![Thiết kế chưa có tên (1)](https://github.com/user-attachments/assets/02a66b09-ec2e-4fb3-8c76-53d8d742e0f6)

## [Usage](http://lhv.io.vn/) 

### Users:

1.  Access the FoodMart website on a browser (PC, tablet, mobile).
2.  Register or log in to an account.
3.  Search for and select products to purchase.
4.  View the remaining quantity of products.
5.  Add products to the shopping cart.
6.  View the shopping cart and proceed to checkout.
7.  If any product in the cart is out of stock, the system will not allow payment.
8.  Choose the VNPay payment method and complete the transaction.
9.  Track order status in the order history.

### Admin:

1.  Log in with an admin account.
2.  Access the dashboard to view statistics.
3.  Manage products, orders, and users.
4.  Assign roles for employees.
5.  View and process notifications.
6.  Create sales orders for employees.
7.  Manage user accounts, including blocking or restricting accounts.

## Contributing

Contributions are welcome.

* Please create a pull request to propose changes.
* Report bugs and suggest new features via GitHub Issues.

## License

This project is licensed under the MIT license.

## Contact

* Email: vietlh.hn@gmail.com
* GitHub: https://github.com/lhv129
