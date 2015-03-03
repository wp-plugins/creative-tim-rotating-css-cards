=== Creative Tim's Rotating CSS Cards ===

Contributors: Hudson Atell
Donate link: mailto:hudson.atwell@gmail.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: css, creative tim, cards, profile cards, company cards, flip cards
Requires at least: 3.8
Tested up to: 4.1
Stable Tag: 1.0.2

This plugin will allow WordPress developers to use Creative Tim's Rotating CSS Cards through a programmable shortcode.

== Description ==

This plugin will allow WordPress developers to use [Creative Tim's Rotating CSS Cards](http://www.creative-tim.com/product/rotating-css-card) through a programmable shortcode.

`
/* note for the shortcode below to work in WordPress it will need to have all it's options on one line */
[card 
    col_md = "4"
    col_sm = "6"
    cover_photo = "http://www.assets.com/assets/images/rotating_card_thumb.png"
    profile_photo = "http://www.assets.com/assets/images/creative_tim.jpg"
    title = "Creative Tim"
    sub_title = "Start designing and developing faster."
    address = "Bld Victoriei 201, Bucharest, Romania"
    company = "Creative Tim"
    show_stars = "true"
    star_count = "5"
    email = "hello@creative-tim.com"
    phone = "+40746 461 075"
    website = "http://www.creative-tim.com/"
    twitter = "https://twitter.com/CreativeTim"
    facebook = "https://www.facebook.com/CreativeTim"
    googleplus = "http://www.creative-tim.com/contact-us"
    motto = "Start designing and developing faster."
]
<h4>Flipped Card Content Header</h4>

<p>
You can use this this rotating CSS card for presenting your team or to show more information about the users from your platform.  We're sure you can find many other use cases for it and we would like to see them all! Just add a link in the comments and we'll let you know what we think.
</p>

[/card]
`

[Follow Development on GitHub ](https://github.com/atwellpub/creative-tim-rotating-css-cards-wordpress-plugin "Follow & Contribute to core development on GitHub")
 |
[Follow Development on Twitter ](https://twitter.com/atwellpub "See our latest development commits on Twitter")


== Installation ==

1. Upload `creative-tim-rotating-css` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

: )

== Screenshots ==


== Changelog ==

= 1.0.2 =

* Enqueue stylesheets only if shortcoe present
* Remove damaging CSS from stylesheet. 

= 1.0.1 =

Initial release!
