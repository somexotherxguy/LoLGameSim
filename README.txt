To get this running (on Windows), first open XAMPP. Start the Apache and the 
MySQL apps. Click "shell." Before proceeding, you should make sure
the root password is "woot". Afterward, run the following command in the
XAMPP shell:

mysql -u root -p

and enter the password when asked. Once you're logged in as root, run the
following command:

create database lolgamesimulator;

After the database is created, enter:

use lolgamesimulator;

Once you're using the database, run the following command, where "%some path here%"
is the path to the databaseinitial.sql file you downloaded/unzipped:

source C:\%some path here%\databaseintial.sql

This should populate the database with the tables necessary to run the webpage.
After that, you'll need to copy every file you downloaded/unzipped
into the htdocs folder in your XAMPP installation directory (default is C:\xampp\htdocs).
Finally, if Apache and MySQL are still running, open a web browser and enter the following
in the URL bar:

localhost/home.php

If nothing shows up, make sure the above steps were followed correctly.