# Nasio

Nasio is a lightweight WordPress theme developed by Atanas Yonkov in 2019. Suitable for blogs and portfolio websites. Inspired by Twenty Seventeen theme by Automattic. Nasio is optimized for speed and high performance in Google search results. With its minimalistic and clean design, it's divine purpose is to showcase high quality content.

Nasio uses Bootstrap 4 and Font Awesome to provide first-class user experience. It has fully responsive 3-column grid layout. It comes with starter content for the sidebar and the footer. Option to use a static Homepage. Beautiful pagination. Option to add custom logo, site icon and change the theme accent colors from the customizer.

The theme extends the Recent Posts widget to include beautiful post thumbnail images. Posts without a featured image are displayed with a default thumbnail. Optimized css and font delivery for better performance. Ideal for any type of blog or portfolio website.

# License

* License: [GNU General Public License v2.0](http://www.gnu.org/licenses/gpl-2.0.html)

# Features

## Developer Friendly
Loads of hooks and filters to extend and customise Nasio via plugin and/or child theme.

## Lightweight
The theme is optimized for speed. It loads all the fonts and most of the css in the footer. In this way it limits the render blocking of css and other static resources. All the images are highly optimized.

## Responsive
Nasio has been fully optimised for small screen display. Your content will look beautiful whether it's viewed on a desktop, a tablet or a smartphone.

## Translation-ready
Nasio is a translation-ready theme and it comes with two default languages - English and Bulgarian. You can easily use poedit or any other translation plugin to translate it to any language you need.

## Theme Hook Alliance
Nasio fully supports the [Theme Hook Alliance](https://github.com/zamoose/themehookalliance.

## Typography
All aspects of typography are set up in accordance to a Modular Scale ensuring consistent typographical hierarchy.

# Theme Documentation

## Sidebar Widgets
The theme supports a right sidebar and you can add as many widgets as you want there. The theme works best with the search widget, recent posts widget and recent comments widget. The theme extends the default WordPress recent posts widget to include post thumbnails. This is done for better user experience. 

In your dashboard go to widgets and you will see a list of all the available widgets. Feel free to play around with them. Here is a custom html widget to display info about the webmaster just like on the theme's screenshot:

    <div class="bio text-center"><img src="/wp-content/themes/nasio/images/wordpress-wizard.jpg" alt="webmaster pic" class="img-fluid">
        <div class="bio-body">
            <h2>George Doe</h2>
            <p>Hi, my name is George Doe. I am a blogger, web developer and WordPress enthusiast. In this blog you can find up-to-date and useful information about our favourite open source framework!</p>
            <p><a class="btn btn-primary btn-sm rounded" href="/about">Read my bio</a></p>
            <p class="social"><a href="/#" class="p-2"><span class="fa fa-facebook"></span></a><a href="/#" class="p-2"><span class="fa fa-twitter"></span></a><a href="/#" class="p-2"><span class="fa fa-instagram"></span></a><a href="/#" class="p-2"><span class="fa fa-youtube-play"></span></a></p>
        </div>
    </div>

Pick a custom html widget and drag it to the right sidebar. Paste the above html code there. Now, when you visit the website, you should be able to see a beautiful block with info about the webmaster. Feel free to modify the text and the code as much as you can!

## Footer Widgets
By default, the theme shows default text in the footer but you can change it through the dashboard > widgets. In addition to the right sidebar you can add widgets to two defined regions in the footer. They are named "Footer 1" and "Footer 2". These will be arranged in a beautiful multi-column layout. The theme works best if you add just one widget  in Footer 1 and two widgets in Footer 2. In this way you should have 3 widgets in the footer in total. If you want, you can use and modify the text of the theme's default text widgets. Here is the code for them:
    
    <!-- About me widget-->
    <div class="widget-column footer-widget-1">
        <section id="custom_html-3" class="widget_text col-md-9">
            <h3 class="heading"><?php echo _e( 'About me', 'nasio'); ?></h3>
            <div class="textwidget custom-html-widget">
                <p class="mb-4"><img src="/wp-content/themes/nasio/images/about.jpg" alt="About" class="img-fluid"></p>
                <p>This is a good place to introduce yourself. Write about your work, hobbies and passion.
                    <a href="/about">
                        Read more
                    </a>
                </p>
            </div>
        </section>
    </div>


    <!--Get Social Widget-->
    <h3 class="widget-title">Get Social</h3>
    <div class="textwidget custom-html-widget">
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

### Site identity:

* **Change default logo** - you have the option to upload your own logo that will display in the site's heafer. If you do not specify any logo, the theme's default logo is used. You can hide it with adding the following code to the additional css tab in the customizer (the last one tab):
  
```/* CSS code to hide the theme's logo */
    .custom_logo {
        visibility: hidden;
    }
```
Please keep in mind that in this way you will not be able to show any logos on the frontend.


* **Change Site Title & Tagline** - you have the option to add a site's name and description
### Colors:

Change theme colors such as the header, the headings and the primary menu

### Menus:

Specify which menu to use in the menu location. This website supports two menus - Top menu and Social Links Menu. 

* **Top Menu** - You can create the primary menu from here or you can also go to dashboard > menu. Click on create menu and give it a name, then drag or add the pages you want to it. After that, from the menu locations section, select Top Menu checkbox 

* **Social Links Menu** - The theme uses font awesome classes to show social media icons. To build the social menu in the way it is shown in the theme's screenshot you need to add custom links. 

After you create the Social Links menu, click on add items > custom links and in the navigation label add the following html code: 

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

### Additional CSS:
This section is for more advanced users who want to write custom css to override the default theme's styles.

## Further customisation
If you want to customise Nasio beyond the included options, I strongly recommend that you do so via a [child theme](http://codex.wordpress.org/Child_Themes).

Happy blogging!