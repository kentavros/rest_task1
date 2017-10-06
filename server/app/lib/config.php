<?php
/**
 * for Data Base MySQL
 */
define('DSN_MY', 'mysql:host=localhost;dbname=user6');
define('USER_NAME', 'user6');
define('PASS', 'tuser6');

/**
 * Errors
 */
define('ERR_DB', 'Error connecting to DB');
define('ERR_QUERY', 'Error query to DB');
define('ERR_PARAMS', 'Error - missing year parameter! Fill out the required field "Year"');
define('ERR_FIELDS', 'Error - some fields are empty!');
define('ERR_PAY', 'Field payment must be "cash" or "credit_card"');
define('ERR_SEARCH', 'Nothing found');