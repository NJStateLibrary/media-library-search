=== Plugin Name ===
Contributors: satsura
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=YZVSB5CZHA6P2&lc=RU&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: admin, media, library, search, attach
Requires at least: 3.0
Tested up to: 3.0
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Search media library items by assigned post or page

== Description ==

By default in Wordpress admin media library users not has ability to search media items by attached page or post.
Now you have it! Just enter assigned page title and click search!

== Installation ==

1. Upload `media-library-search.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 1.0 =
* First version
= 1.1 =
* Added readme
= 1.2 =
* Replace hardcoded table names in sql query to $wpdb->{table_name}
= 1.3 =
* New Feature. Added search by attached page in Media Library lightbox while creating posts. (http://wordpress.org/support/topic/media-search?replies=2)