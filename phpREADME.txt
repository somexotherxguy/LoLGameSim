To get this running, first open Xampp and MySQL. Create a database
named "lolgamesimulator" and source databaseinitial.sql like so:

source C:\%some path here%\databaseintial.sql

After that, you'll need to copy every file you cloned from git
into C:\%some path here%\xampp\htdocs. For me, the path is just
C:\xampp\htdocs. Then start Apache from Xampp, open a web browser
and go to localhost/home.php. It should open the web page.

You can open localhost/phpmyadmin to keep track of the database as
you play around with values. Right now the only table being accessed
and changed is rune_page_stats.

All edits should be made to the home.php now, rather than home.html.