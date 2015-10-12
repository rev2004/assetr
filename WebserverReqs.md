### Software Versions ###

PHP5:
> Right now, the current version of PHP 5 (5.2.5) is required for use. The reason for this is because assetr uses the PHP 5 changes to Object Oriented PHP Code. This includes use for protected/private/public elements in a class. If your webserver does not have the latest version, please put in a request to your webhost and have them update it.

PEAR MDB2:
> The PEAR Repository for MDB2 is required for use. There will be a version included with assetr (the latest assetr development version), but running the following command:
```
pear install MDB2
```
Will install it to your server's PEAR repository. Make sure to also install with the appropriate driver for your SQL Server.

Relational Database Server:
> A Relational Database Server (like MySQL or PostgreSQL) is required for assetr to run.

### Space Requirements ###

At least 1GB of space reserved for assetr: While assetr only clocks in at about 8-9MB (for the files), The reason for the 1GB requirement is for your files and repositories. Since assetr creates a new file for each version, there is a potential for having thousands of files filled with similar data that takes up space. Ideally, assetr should have it's own server for large projects, however, assetr was built with the idea of being put in a less than 20MB space.