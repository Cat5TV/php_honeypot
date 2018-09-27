# php_honeypot

A simple honeypot script for PHP + CSF/LFD on Linux

## Possible placements

```
/wp-login.php
/xmlrpc.php
/phpMyAdmin/scripts/setup.php
/scripts/setup.php
/pma/scripts/setup.php
```

Check your logs for other scripts that are getting whacked away at and add them.

Can be placed manually (ie., multiple copies), through PHP include, or through .htaccess rewrites... it's really up to you how you implement.

This simply logs the IP address of the user hitting non-existent scripts. Then, use CSF/LFD to watch that log file and block the offending IP.
