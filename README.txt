NEXORA DIGITAL CHILD THEME — INSTALLATION GUIDE
================================================

IMPORTANT
This is a genuine child theme for the official Twenty Twenty-Four parent theme.
It is not a standalone theme. Install the parent theme first. Use only on your
own WordPress install (LocalWP or your own hosting), never on a shared production
site you do not control.

INSTALL
1. In WordPress admin, go to Appearance > Themes > Add New Theme.
2. Search for "Twenty Twenty-Four" and install it. Do not activate it yet if you
   are about to upload this child theme.
3. Go to Appearance > Themes > Add New Theme > Upload Theme.
4. Upload nexora-digital-child.zip and click Install Now, then Activate.
5. Visit the homepage and confirm the navy/gold styling and hero are visible.

PAGES
The theme includes these custom page templates:
- Nexora Custom Landing Page
- Nexora About Page
- Nexora Contact Page

The front-page.php file automatically provides the custom homepage layout when
WordPress is configured to show the latest posts or a static front page. To make
the page setup explicit:
1. Pages > Add New: create "Home". Publish it.
2. In the page editor, open the Template selector and choose "Nexora Custom
   Landing Page", then update.
3. Create "About" and choose "Nexora About Page".
4. Create "Contact" and choose "Nexora Contact Page".
5. Settings > Reading > Your homepage displays > A static page; choose Home.
6. Settings > Permalinks > Save Changes once, to refresh the URL rules.

NAVIGATION
The Twenty Twenty-Four theme uses the WordPress Site Editor for its header and
navigation. Go to Appearance > Editor > Navigation and add Home, About, Contact.
Set the links to the pages you created. You can customise the header in the
Site Editor. A separate "Nexora Footer Menu" location is registered for classic
menu-compatible themes/admin tooling.

FUNCTIONALITY INCLUDED
- Correct child-theme Template header: twentytwentyfour
- Parent and child stylesheet enqueue in functions.php
- Custom homepage (front-page.php) and three selectable page templates
- Custom "Nexora Services" post type (admin sidebar)
- Custom footer widget area (Appearance > Widgets, if supported by setup)
- Custom body class via body_class filter

CONTACT PAGE
The sample email hello@example.com is intentionally a placeholder. Replace it
with your own email address before a public deployment. The contact CTA opens
the visitor's email application; it is not a server-side contact form. For a
real form, install a trusted form plugin and insert its shortcode in the contact
template.

CUSTOM CONTENT
Nexora Digital Solutions is fictional demonstration content. Replace it with
your own business name and genuine information if your assignment requires a
real business.

REVIEW CHECKLIST
[ ] Parent theme installed
[ ] Child theme activated without errors
[ ] Home/About/Contact pages published and assigned the templates
[ ] Settings > Reading points to Home (static page)
[ ] Header navigation links work
[ ] Services menu appears in wp-admin
[ ] Responsive layout checked on mobile and desktop
[ ] Contact email replaced before public sharing

LIVE DEPLOYMENT
A ZIP file does not itself create a live website. To submit a live URL, deploy it
to your own WordPress hosting. If using LocalWP, record a 2–3 minute walkthrough
showing the website, Appearance > Themes (both parent and child), the page
templates, and functions.php in your editor. Upload the recording as unlisted
YouTube or share it via Google Drive.
