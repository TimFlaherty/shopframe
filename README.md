# ShopFrame
ShopFrame is a web application that integrates inventory and stock management with a templated online store. ShopFrame generates a functional web store from an online stock database, which is in turn controlled by the administrator, who can dictate which product categories and stock locations will be visible to customers. Employees are able to log in to manage stock at various locations, and can add items to a cart in order check customers out. Customers can visit the online store, browse for items and add them to a cart, and manipulate cart contents from the cart page.

## Set Up
1. Copy the project files to the desired directory on your PHP-enabled server
2. Configure lib/mvc.php to define the correct top level directory as “tld”
3. Configure lib/keys.php to define your cryptographic keys
4. Configure controllers/handler.php to define your database credentials

## User Guide
Log in as “admin” using default password “cs130b” to manage the inventory or to update online visibility options. Please note that changes you make will be visible to others, and there is no mechanism to prevent multiple admins from making changes simultaneously – this system is intended for a single administrative account, but for the purposes of demonstration there will be several so please be mindful of this and reset any changes you make.

Log in as “employee” using default password “employed” to manage stock at the different locations. This feature is not fully implemented, and changes made here are currently inconsequential because ordering is not functional.

Log in as “customer” using default password “shopping” or register a new customer account using the registration dialog. Currently you will see your username in the header but customer profiles have not been implemented yet to see order information etc.

