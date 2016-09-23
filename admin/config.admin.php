<?php

    //classes
    include('classes/Database.php');
    include('classes/User.php');
    include('classes/Permissions.php');
    include('classes/View.php');
    include('classes/Form.php');

    //helpers
    include('helpers/string.functions.php');
    include('helpers/parser.functions.php');
    include('helpers/errors.functions.php');

    //defines
    #GROUPS
    define('GROUP_NAME','Nazwa grupy');
    define('GROUP_MODULE','Moduł');
    define('GROUP_YEARS','Ilość lat');
    define('GROUP_DAYS','Tydzień roboczy/weekendy');
    define('GROUP_STUDENTS','Aktualna ilość uczniów');
    define('GROUP_STATUS','Status');
    define('GROUP_START','Data otwarcia grupy');
    define('GROUP_END','Data zamknięcia grupy');


?>
