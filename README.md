# Nasio

Nasio is an extremely lightweight WordPress theme without any frameworks developed by Atanas Yonkov in 2020. Ideal for blogs and portfolio websites. Very easy to set up even for people without coding experience thanks to its extensive documentation and generous theme options. Nasio is optimized for speed and high performance in Google search results. With its minimalistic and clean design, its divine purpose is to showcase high quality content.

Nasio does not use Bootstrap or any other css framework (only custom css!) to provide first-class user experience. As a result, the whole theme's zip file is less than 300KB. It has fully responsive 3-column grid layout. It supports nested menu items. Option to use a static Homepage. Beautiful pagination. Option to add custom header, custom logo, site icon and change the theme accent colors from the customizer. Option to switch between right sidebar layout and full-width layout. The visitors can choose between light and dark theme mode and change their preferences any time.

The theme extends the Recent Posts widget to include beautiful post thumbnail images in the right sidebar. Posts without a featured image are displayed with a default thumbnail. Optimized css and font delivery for better performance. Static files (css and js) are minifed. Fully compatible with Gutenberg but also supports the good old Classic editor.

Live example: https://phototravelworld.com/

**Table of Contents**
- [Nasio](#nasio)
- [Features](#features)
  - [Lightweight](#lightweight)
  - [Responsive](#responsive)
  - [Translation-ready](#translation-ready)
  - [RTL Language support](#rtl-language-support)
  - [Light and Dark Mode](#light-and-dark-mode)
  - [Typography](#typography)
- [Theme Documentation](#theme-documentation)
  - [Right Sidebar Layout](#right-sidebar-layout)
  - [Full-width Layout (No Sidebar)](#full-width-layout-no-sidebar)
  - [Footer Widgets](#footer-widgets)
  - [Theme Customizer](#theme-customizer)
    - [Header Image:](#header-image)
    - [Site identity:](#site-identity)
    - [Colors:](#colors)
    - [Menus:](#menus)
    - [Widgets:](#widgets)
    - [Homepage Settings:](#homepage-settings)
    - [Dark Mode](#dark-mode)
    - [Additional CSS:](#additional-css)
  - [Further Customisation](#further-customisation)
- [License](#license)

# Features

## Lightweight
The theme is optimized for speed. It loads all the fonts and most of the css in the footer. In this way it limits the render blocking of css and other static resources. All the images are highly optimized.

## Responsive
Nasio has been fully optimised for small screen display. Your content will look beautiful whether it's viewed on a desktop, a tablet or a smartphone.

## Translation-ready
Nasio is a translation-ready theme and it comes with two default languages - English and Bulgarian. You can easily use poedit or any other translation plugin to translate it to any language you need.

## RTL Language support

Since v. 2.0.2, Nasio fully supports languages that are read from right to left. It automatically rotates the layout if the user switches to any rtl language. You only need to pick a site language from Settings> General> Site Language and the rest is automatically done for you.

## Light and Dark Mode
Since v. 2.1.1, the theme enables the website visitors to switch between light and dark theme mode to improve the readability of text, images and videos. Reading website content at night time can be difficult. Enable the dark mode switcher to help your visitors to read more articles, spend more time on your website and protect their eyes from being hurt.

## Typography
All aspects of typography are set up in accordance to a Modular Scale ensuring consistent typographical hierarchy.

# Theme Documentation
The following extensive documentation will provide you with all the necessary information to get started as soon as possible. The aim of this document is to provide help not only to WordPress developers but also to people with little or no coding experience at all. If you need any further assistance, do not hesitate to contact me by [email](mailto:yonkov.atanas@gmail.com).

## Right Sidebar Layout
The theme supports a right sidebar and you can add as many widgets as you want there. The theme works best with the search widget, recent posts widget and recent comments widget. The theme extends the default WordPress recent posts widget to include post thumbnails. This is done for better user experience. By default, the theme shows default text in the right sidebar (search widget and recent posts widget) but you can add your own widgets through dashboard > widgets. We will get to that in a minute.

Now, let's set up some widgets in the right sidebar and remove the default ones! In your dashboard, go to widgets and you will see a list of all the available widgets. Feel free to play around with them. Here is a custom html widget to display info about the webmaster just like on the theme's screenshot:

    <div class="bio text-center"><img src="/wp-content/themes/nasio/images/wordpress-wizard.jpg" alt="webmaster pic" class="img-fluid">
        <div class="bio-body">
            <h2>George Doe</h2>
            <p>Hi, my name is George Doe. I am a blogger, web developer and WordPress enthusiast. In this blog you can find up-to-date and useful information about our favourite open source framework!</p>
            <p><a class="btn btn-primary btn-sm rounded" href="/about">Read my bio</a></p>
            <p class="social"><a href="/#" class="p-2"><span class="fa fa-facebook"></span></a><a href="/#" class="p-2"><span class="fa fa-twitter"></span></a><a href="/#" class="p-2"><span class="fa fa-instagram"></span></a><a href="/#" class="p-2"><span class="fa fa-youtube-play"></span></a></p>
        </div>
    </div>

Pick a custom html widget and drag it to the right sidebar. Paste the above html code there. Do not forget to add the correct urls to the different social media inside the anchor tags. Now, when you visit the website, you should be able to see a beautiful block with info about the webmaster. Feel free to modify the text and the code as much as you can!

## Full-width Layout (No Sidebar)

Since version 1.04, the the theme support full-width layout out of the box. You just need to go to Appearance > Customize > Page Layout and click on the "full-width" radio box and the right sidebar will be hidden.

## Footer Widgets
 In addition to the right sidebar you can add widgets to two defined regions in the footer. They are named "Footer 1" and "Footer 2". These will be arranged in a beautiful multi-column layout. The theme works best if you add just one widget in Footer 1 and two widgets in Footer 2. In this way, you should have 3 widgets in the footer in total. If you want, you can use and modify the text of the theme's default text widgets. Here is the code for them:
    
    <!-- About me widget-->
    <h3 class="heading">About me</h3><p class="page-title"><img src="/wp-content/themes/nasio/images/about.jpg" alt="placeholder" class="img-fluid"></p><p>This is a good place to introduce yourself. Write about your work, hobbies and passion.<a href="/about"> Read More</a></p>

    <!--Get Social Widget-->
    <h3 class="widget-title">Get Social</h3>
    <div class="textwidget custom-html-widget col-footer">
        <ul class="list-unstyled footer-social">
            <li><a href="/#"><span class="fa fa-twitter"></span> Twitter</a></li>
            <li><a href="/#"><span class="fa fa-facebook"></span> Facebook</a></li>
            <li><a href="/#"><span class="fa fa-instagram"></span> Instagram</a></li>
            <li><a href="/#"><span class="fa fa-vimeo"></span> Vimeo</a></li>
            <li><a href="/#"><span class="fa fa-youtube-play"></span> Youtube</a></li>
            <li><a href="/#"><span class="fa fa-snapchat"></span> Snapshot</a></li>
        </ul>
    </div>

For the above code you will need to use two custom html widgets. Drag them to the footer sidebars and paste the code there. Do not forget to save. In this way you will be able to customize the footer the way you like it.

## Theme Customizer
Use the theme customizer to customize the theme to taste. There are just enough options to make your site unique. You can change the header background color, the headings text color and the primary menu text color. 

To use the theme's customizer log in to your dashboard and navigate to Appearance > Customize. You can also access the customizer from the admin bar on the top of the page.

### Header Image:
Since v. 1.04, the theme supports the option to add custom header image via the theme customizer. Go to Appearance > Customize > Header Image and upload a header image from your PC. As simple as that. As a general recommendation, I would suggest to always compress the images that you upload, otherwise the site performace may deteriorate with time. Read more about that [here](https://rawinfopages.co.uk/squash-images-with-squoosh-to-improve-website-performance/).

In some occasions, you might want to remove the light blue header bar on top of each page. You can remove it with the following css code. In the theme customizer, navigate to "Additional css" tab in the customizer (the last one tab):
  
```/* CSS code to remove top bar */
.top-bar {
    display: none;
}
```
Please note that this is also the place to put social media icons, so do not remove the top bar if you plan to add social icons later there.

### Site identity:

* **Change default logo** - you have the option to upload your own custom site logo that will display in the site's header. If you do not specify any logo, the theme's default logo will be used. You can disable the default theme logo by removing the tick from `Show Default Theme Logo` button.

* **Change Site Title & Tagline** - you have the option to add a site's name and description

### Colors:

Change theme colors such as the header, the headings and the primary menu.

### Menus:

Specify which menu to use in the menu location. This website supports two menus - Top menu and Social Links Menu. 

* **Top Menu** - You can create the primary menu from the theme customizer or you can also go to dashboard > menu. Click on create menu and give it a name, then drag or add the pages you want to it. After that, from the menu locations section, select Top Menu checkbox. This theme supports as many sub-menus as you want and it is also working on mobile version.

* **Social Links Menu** - The theme uses font awesome classes to show social media icons. To build the social menu in the way it is shown in the theme's screenshot you need to add custom links. Don't worry, it is very easy.

After you create the Social Links menu, click on add items > custom links and in the link text tab add the following html code: 

```<span class="fa fa-facebook"></span>```

In the url tab add the exact address of the facebook link, e.g. https://facebook.com/wordpress

Other menu items that you may wish to add:

```<span class="fa fa-twitter"></span>```

```<span class="fa fa-instagram"></span>```

```<span class="fa fa-youtube-play"></span>```

You can add as many social icons as you wish. For more information check Font Awesome's documentation: https://fontawesome.com/v4.7.0/icons/

### Widgets:
This is another place where you can customize the right sidebar's widgets as well as the footer widgets.

### Homepage Settings:
Optionally specify a static front page.

### Dark Mode

Protect your visitor's eyes and help them spend more time on your website by allowing them to switch between day and night mode (light and dark layout). To change to dark mode, you need to click on the toggle button in the theme footer. If you wish, you can remove the dark mode via the theme customizer. You can also change the background color and add custom css to change the main colors of the night mode. For example, if you want to change the link colors, you can use the following css:

    body.dark-mode a {
	    color: rgb(102, 222, 209) !important;
    }

### Additional CSS:
This section is for more advanced users who want to write custom css to override the default theme's styles.

## Further Customisation
If you want to customise Nasio beyond the included options, I strongly recommend that you do so via a [child theme](http://codex.wordpress.org/Child_Themes). Here is a [premade child theme](https://github.com/yonkov/nasio-child-theme) of the Nasio theme that you can use to get started.

# License
This theme, like WordPress, is licensed under the GPL.
It is distributed in the hope that it will be useful,
but without any warranty; without even the implied warranty of
merchantability or fitness for a particular purpose. See the
[GNU General Public License v 2.0](http://www.gnu.org/licenses/gpl-2.0.html) for more details.

Happy blogging!