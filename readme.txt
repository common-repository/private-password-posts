=== Private Password Posts ===
Contributors: https://tooltips.org/
Author URI: https://tooltips.org/
Donate link: https://tooltips.org/
Tags:private post, password post,password protect post,access, theme, hidden post
Requires at least: 3.2
Tested up to: 6.0
Stable tag: 1.5.0
License: GPLv3 or later

Hide private posts and password protected posts in front end 
 
== Description ==

This plugin will hide private posts and password protected posts in front end. In back end, admin / editor can still edit the post, also if a user know the url of 
private posts and password protected posts, they can open the posts too, of course, because these URLs is not listed in front end, so in general, nobody know
these  private posts and password protected posts, unless you sent URLs to your friends.

Also support custom the wordpress default words of private post to your own words. You will find the "Private Post" menu in wordpress admin area, in "Private Post Settings" panel, you can change default words in " Replace default words of private post" option panel.   
 

Why I develop this plugin: 
On my site, I offten publish new version of my plugins, it means I need add new features in my plugin posts, before I change my posts, I'd like write a backup posts first, and for
avoid users / google read these duplicate posts, I add them as private posts, but I found these private posts is showing my theme's homepage, so I dig the wordpress wp_posts table and 
develop this plugin hide any private posts and password protected posts in front end, it works well.

<h4>My Other Plugins You Might Also Like:</h4>
<li><a href='http://tooltips.org/features-of-wordpress-tooltips-plugin/' target='blank'>WordPress Tooltips Pro</a></li>
<li><a href='http://wordpress.org/plugins/wordpress-tooltips/' target='blank'>WordPress Tooltips Free</a></li>
<li><a href='http://wordpress.org/plugins/frequently-asked-questions/' target='blank'>WordPress Frequently Asked Questions</a></li>
 
   
== Installation ==

1:Upload the Private Password Posts plugin to your blog
2:Activate it 
3:Nothing need to do, all things will works well automatically
4:Also you can custom default tips of "private post" with your own words in backend "Private Post" menu
1, 2, 3, 4: You're done!

== Frequently Asked Questions ==
FAQs can be found here: https://tomas.zhu.bz/private-password-posts.html/

== Screenshots ==


== Changelog ==
= Version 1.5.0 =
re-design the Private Post Settings panel
follow wordpress security standard to use esc_attr to check and filter output in Private Post Settings panel  

= Version 1.4.0 =
follow wordpress security standard to check and filter data which submitted in private password post settings panel by admins 

= Version 1.3.0 =
Support custom the wordpress default words of private post to your own words. 
You will find the "Private Post" menu in wordpress admin area, in "Private Post Settings" panel, you can change default words in " Replace default words of private post" option panel.
In front end, the default words "This content is password protected. To view it please enter your password below:" will be chaned as you specific words

= Version 1.1 =
* Spell out that the license is GPLv3
* Finished the first version
* General code clean up

== Upgrade Notice ==

== Download ==
