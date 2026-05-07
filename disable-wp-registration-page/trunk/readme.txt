=== Disable WP Registration Page ===
Contributors: maurisrx
Donate link:
Tags: registration, redirect, disable registration, spam prevention, spam
Requires at least: 3.0
Tested up to: 6.9
Stable tag: 1.0.3
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Disable default WP registration page.

== Description ==

This plugin disables default WP registration page by redirecting users who access the registration page URL to the default WP login page. If somehow you still want to accept user registration but want to disable default WP registration page to prevent bot, SPAM registration or something like that, this plugin is for you. No settings needed. Install, activate, done.

== Installation ==

= Automatic Installation =

1. Log in to the WP admin dashboard.
2. Go to "Plugins > Add Plugin".
2. Enter "Disable WP Registration Page" to the search box and press enter.
3. Install and activate the plugin.

= Manual Installation (via WordPress Admin Dashboard) =

1. Download the plugin zip file.
2. Log in to the WP admin dashboard.
3. Go to the "Plugins > Add Plugin".
3. Click the "Upload Plugin" button, and an upload box will appear.
4. Click the "Choose File" button and select the plugin zip file.
5. Click the "Install Now" button and wait until the plugin has been fully installed.
6. Activate the plugin.

= Manual Installation (via FTP/SFTP) =

1. Download the plugin and extract the plugin zip file.
2. Connect to your website server via FTP/SFTP using an FTP/SFTP client such as FileZilla.
2. Upload "disable-wp-registration-page" folder to "/wp-content/plugins/" directory of your website.
3. Go to "Plugins > Installed Plugins".
4. Find "Disable WP Registration Page" and click "activate".

== Frequently Asked Questions ==

= How can I change the text "Manual registration is disabled" on the login page? =

You can add the following PHP code snippets to your active theme's `functions.php` or a snippet plugin:

```php
add_filter(
    'dwprp_registration_link',
    function() {
        return '<span class="dwprp-registration-link">Your custom registration link text</span>'
    }
);
```

= How can I change the redirect destination URL which defaults to the login page? =

You can add the following PHP code snippets to your active theme's `functions.php` or a snippet plugin:

```php
add_filter(
    'dwprp_registration_redirect_url',
    function() {
        return site_url( '/your-custom-registration-page' );
    }
);
```

= How can I hide the registration link and text entirely on the login page? =

You can add the following CSS to your active theme's `style.css` or a snippet plugin:

```css
.dwprp-registration-link {
    display: none;
}
```

== Changelog ==

= 1.0.3 =
* Added filters: `dwprp_registration_link`, `dwprp_registration_redirect_url`.

= 1.0.2 =
* Update plugin tested up to tag

= 1.0.1 =
* Bug fix: wp registration page didn't redirect on some servers.

= 1.0 =
* Initial release.