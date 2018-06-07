=== WooCommerce Waitlist ===
Requires at least: 4.2
Tested up to: 4.8.2
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
WC requires at least: 2.4.0
WC tested up to: 3.2.1

This plugin enables registered users to request an email notification when an out-of-stock product comes back into stock. It tallies these registrations in the admin panel for review and provides details.

== Description ==
The WooCommerce Waitlist extension lets you track demand for out-of-stock and backordered items, making sure your customers feel informed, and therefore more likely to buy.
With the WooCommerce Waitlist extension, customers of your site can sign up to be notified by email when an out-of-stock product becomes available. As the site owner you can also review which users are on the waiting list for which products, and sort your products by the number of people registered on the waiting list.

== Installation ==
1) Unzip and upload the plugin’s folder to your /wp-content/plugins/ directory
2) Activate the extension through the ‘Plugins’ menu in WordPress

== Frequently Asked Questions ==
Can a customer view all the products they are on a waiting list for?
There is an experimental shortcode [woocommerce_my_waitlist] which will display a table listing all the products that the currently logged in user is waiting for.

Are customers put on a waitlist in a particular order?
No. It doesn’t operate on a ‘first come, first serve’ basis.

Does this work for affiliate products?
No. At the moment stock status has no bearing on the output of an affiliate product listing so these have been left well alone.

Does this work for variable products?
There is a known issue when using WooCommerce Waitlist in conjunction with variable products that prevents the ‘Join Waitlist’ button from being displayed  when the ‘Out of Stock Visibility’ option is set to ON. The only current solution to this problem is to turn this option off.

How do I change the subject / content of emails?
The content of the email and the subject line are both editable via the WooCommerce email system. WooCommerce Waitlist adds a new section to the ‘Emails’ tab of WooCommerce Settings where this can be managed. For more information please see the WooCommerce Documentation.

What if I don’t want users to be automatically emailed when a product is back in stock?
We’ve got you covered. Add the following snippet to your functions.php file in your theme and no email will be sent out and users will remain on the waitlist.
add_filter( 'wcwl_automatic_mailouts_are_disabled', '__return_true' );

What if I want to email users automatically, but don’t want them to be removed from the waitlist?
We’ve got that one too. Add the following snippet to your functions.php file in your theme and users will remain on the waitlist until they purchase that product.
add_filter( 'wcwl_persistent_waitlists_are_disabled', '__return_false' );

Why does the Waitlist only show up for some products?
If you’re using the Advanced Notifications extension make sure you disable the backorder setting.

== Changelog ==

2017.10.27 - version 1.5.82
* Updated translation file

2017.10.25 - version 1.5.8
* Fix: updated archive validation
* Fix: add user to archive not working if archives not returning as array

2017.08.14
* Fix: added check that array is returned when returning existing waitlist archives

2017.08.07 - version 1.5.7
* Fix: fixed issue where waitlist counts were showing as 1 by default when updated
* Fix: made settings text translatable
* Fix: fixed bug where updating waitlist counts when no products exist
* Fix: updated order->user_id to use new format order->get_user_id()
* Added in setting to update waitlist counts manually
* Added support for multiple parent products (grouped products)
* Added product ID to filter for disabling persistent waitlists
* Added product ID to filter for disabling automatic mailouts
* Removed auto updates of waitlist counts to avoid issues with large product databases

2017.07.26 - version 1.5.6
* Fix: Adjusted mailouts for variable products so the parent variable can control mailouts for child variations if managing stock
* Fix: Adjusted how grouped products are handled to avoid waitlist adjustments on page reloads
* Fix: Added appropriate message for logged out users when registration is required

2017.07.26
* Fix: Adjusted mailouts for variable products so the parent variable can control mailouts for child variations if managing stock

2017.05.31 - version 1.5.5
* Fix: Deprecated function notice for product tab
* Added a filter to disable automatic waitlist count updates "wcwl_disable_auto_waitlist_updates"

2017.05.09 - version 1.5.4
* Fix: email hook not firing

2017.05.02 - version 1.5.3
* Fix: adjusted frontend JS to reference the email input field properly to avoid users not being added when logged out in some cases
* Fix: removed check for parent variables when updating waitlist counts as counts were sometimes showing inaccurately
* Fix: fatal error when working with bundled products, currently not working with this extension

2017.04.22
* Fix: added conditional checks to fix potential bug of product not found when deleting users
* Fix: changed selector to "this" on frontend JS for adding logged out users to waitlist after bug report

2017.04.11
* Fix: Added check for product object before loading waitlist for product

2017.04.10
* Fix: Activation hooks not firing

2017.04.07 - version 1.5.2
* Fix: bug with upgrade process causing fatal error

2017.04.03 - version 1.5.1
* Fix: definitions not loading early enough for registration hooks
* fully updated and tested for woocommerce 3.0

2017.03.28
* Fix: initial waitlist counts starting at 1

2017.03.25
* Fix: waitlist not always saving for variable products on frontend
* Fix: compatibility for woocommerce filters
* Refactor of code for handling logged out users

2017.03.24
* Added compatibility class to ensure compatibility with WooCommerce
* Refactor of main plugin class
* Refactor frontend class

2017.03.11
* Fixed: waitlist count sortable columns not showing all products
* Fixed: shortcode not working for variations
* Fixed: waitlist column not reliably sorting by amount of users on waitlist
* Added postmeta for waitlist count for all products to reliably store amount of users on waitlist
* Added function to update postmeta for waitlist counts if they don't exist
* Added functionality for variable and grouped products to reliably store a count for child waitlists

2017.03.10
* Added "date added" postmeta for when users are added to waitlist
* Fixed issues with new date added field conflicting with older waitlist versions
* Adjusted and re-styled product tab table

2017.02.02
* CSS tweak, changed waitlist icon on product edit screen
* Added product ID to email template

2017.02.02 - version 1.5.0
* Added support for WC Subscriptions
* Fixed bug where simple subscriptions were not showing email field for logged out users
* Fixed bug where mailouts were not triggered for variable subscriptions

2017.01.30
* Fixed bug where users were added across multiple inputs on admin waitlists
* Added email validation in admin

2017.01.28
* Fixed archiving - now each user is archived once an email is sent
* Adjusted archives to record per day rather than time, all records for each day are now collated

2017.01.27 - version 1.4.14
* Fixed bug where archiving wasn't working for new installs as options weren't loading in by default

2016.04.18 - version 1.4.13
* Fixed bug where user accounts were created but user wasn't always sent a password
* Fixed bug where archiving waitlists wasn't switched on by default
* Fixed bug that caused users to be added/removed from waitlist on page refresh in the frontend
* Fixed bug that prevented waitlists from being shown when product was in stock but waitlist still had users
* Adjusted hooks for mailouts when products come back in stock - now triggered when stock status/level changes
* Fixed bug that prevented API stock changes to send required mailouts

2016.04.14 - version 1.4.12
* Fixed bug with variable product upsells
* Fixed bug with join waitlist button not working on some variable products

2016.04.12 - version 1.4.11
* Fixed bug where product object was not verified before being used on the frontend

2016.03.14 - version 1.4.10
* Adjusted the way stock status was stored for variable products
* Fixed JS error for grouped product waitlist data not allowing users to be added
* Fixed bug with add to cart button displaying when it shouldn't
* Adjusted when to display waitlists on the product page; now show when product is out of stock or if a user is present on the waitlist

2016.03.01 - version 1.4.9
* Fixed javascript bug preventing variable products from being added to cart

2016.03.01 - version 1.4.8
* Fixed email address bug preventing logged out users from joining a waitlist

2016.02.25 - version 1.4.7
* Fixed wcwl_data undefined bug causing variable products and other javascript based extensions to fail

2016.02.17 - version 1.4.6
* Fixed bug with JS adding user email multiple times to query string on front end

2015.11.23 - version 1.4.5
* Updated translation template (.pot)

2015.10.21 - version 1.4.4
* Updated docblock
* Removed debugging code on edit product screen

2015.10.21 - version 1.4.3
* Fixed bug where waitlists weren't showing on product edit screen when persistent waitlists were enabled
* Added notification text to product edit screen when persistent waitlists are enabled

2015.10.18 - version 1.4.2
* Fixed update bug for variations, conflict with another plugin

2015.10.14 - version 1.4.1
* Fixed version numbers

2015.10.12 - version 1.4.0
* Added new feature - Waitlist Archives for recording a history of mailed out waitlists

2015.09.18 - version 1.3.13
* Fixed bug with mailouts not working when updating stock when using WC 2.4

2015.08.12 - version 1.3.12
* Fixed bug with updating waitlists for variables when using WooCommerce 2.4

2015.07.08 - version 1.3.11
* filtered text on "new account" tab of woocommerce email settings with gettext

2015.07.08 - version 1.3.10
* removed meta-box and instead added a waitlist tab to the product data panel on product edit pages
* added readme

2015.05.25 - version 1.3.9
* changed Admin UI to show the waitlist meta-box if there are any users on the waitlist, rather than if the product is out of stock

2015.05.25 - version 1.3.8
* fixed settings bug, settings now being updated correctly
* updated translation functions
* fixed frontend button bug, now outputting same button type if user is logged in or not

2015.04.21 - version 1.3.7
* Fix - Potential XSS with add_query_arg

2015.01.11 - version 1.3.6
* added notice and deactivated plugin if WooCommerce is not at least version 2.0
* removed functionality for WooCommerce versions less than 2.0
* updated settings functions for woocommerce v2.3.0

2014.12.19 - version 1.3.5
* fix \"Email Address\" hard coded string

2014.12.01 - version 1.3.4
* Fixed bug where deleting users triggered a PHP error
* Fixed bug causing php notice when updating with quick edit

2014.11.26 - version 1.3.3
* WordPress 4.0.1 compatability
* Fixed bug removing users from waitlist when \'enable stock management\' was ticked on certain products (related to quickedit bug)
* Refactored and annotated all functions
* Fixed \'woocommerce_my_waitlist\' shortcode so it can be displayed on any page
* Fixed bug with mailouts not sending when product was updated using quick edit

2014.11.19 - version 1.3.2
 * fix \"Join Waitlist\" hard coded string

2014.09.11 - version 1.3.1
 * fix version number, causing endless update loop

2014.09.05 - version 1.3.0
* WordPress 4.0 compatability
* WooCommerce 2.2 compatability
* Added support for non-registered and logged out users to join waitlists
* Added support for Admin to add users to waitlist from product page
* Added support for users to be removed from waitlists when they are deleted from wordpress
* Added frontend fixes for variable and grouped products and css and jquery

2014.03.03 - version 1.2.0
* Added support for WC_Mail templates
* Added support for Bulk Stock Management
* Fixed ‘call to member function on non-object’ notice in Frontend_UI notice

2014.02.25 - version 1.1.8
* Added filterable version of automatic mailout control

2014.02.24 - version 1.1.7
* Fix deprecated call to WooCommerce->add_message
* Fix broken link to Inventory Settings after 2.1 change

2014.02.18 - version 1.1.6
 * Fix in security issue in wp-admin

2013.11.06 - version 1.1.5
 * [woocommerce_my_waitlist] only displays for logged in users
 * [woocommerce_my_waitlist] not dependent on WP numberposts setting

2013.10.31 - version 1.1.4
 * Patch fixed the error with 1.1.3 - no closures in PHP 5.2 dummy! Happy Halloween everyone

2013.10.29 - version 1.1.3
 * Added a beta shortcode to display a user waitlist using [woocommerce_my_waitlist]

2013.02.21 - version 1.1.2
 * Fixed a bug that prevented in-stock variable products from being added directly after an out-of-stock variation was clicked

2013.02.21 - version 1.1.1
 * Added filterable version of persistent waitlist support

2013.01.24 - version 1.1.0
 * Added support for waitlists on product variations
 * Added control to auto waitlist creation to allow it to be turned off
 * Added dismissable admin nag alerting shop managers to turn off \'Hide out of stock products\' setting
 * Replace WCWL_HOOK_PREFIX constant with greppable string
 * Added correct plugin URI to plugin meta
 * Improved WC 2.0 compat
 * Improved PHPDocs


2012.01.04 - version 1.0.4
 * WC 2.0 compat
 * Added several missing translatable strings
 * Improved efficiency on activaton task that was causing memory issues on stores with many products
 * Re-instated WCWL_SLUG

2012.12.04 - version 1.0.3
 * New updater

2012.12.03 - version 1.0.2
 * Fixed a bug that caused the mailto: value to be empty when emailing all users on a waitilist
 * Removed some debugging output that hadn\'t been cleaned up properly!
 * Removed WCWL_SLUG for codestyling localisation
 * WC future compat
 * Login URL switch to my account page

2012.11.08 - version 1.0.1
 * Fixed a bug that caused only products with an existing waitlist to be displayed when sorting by waitlist
 * Fixed a bug that caused no products to be displayed when sorting by waitlist on some installs
 * Refined waitlist custom column display to be more coherent with existing Admin UI
 * Added cleanup on uninstall

2012.10.01 - version 1.0
 * First Release
