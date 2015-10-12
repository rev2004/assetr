# Introduction #

This document is meant to ease the installation of assetr. Make sure to hop on the Google Groups for assetr if you have any questions.

## Required Settings ##
### SQL Settings ###

The purpose for calling the array variable 'sql' is to allow for portability to the PostgreSQL version.

```
$config['sql']['server'] = "localhost";
```
  * This specifies the SQL server to connect to.

```
$config['sql']['user'] = "root";
```
  * This specifies the SQL user to use.

```
$config['sql']['password'] = "somepw123!";
```
  * This specifies the SQL user's password to the SQL server.

```
$config['sql']['database'] = "assetr";
```
  * This is the database that the assetr tables will be housed. Make sure to use a valid database.

```
$config['sql']['pre'] = "";
```
  * This is the prefix for the assetr tables. This is useful if you have multiple applications sharing a single database, or your webhost only gives you one database. Either way, if you specify a prefix, then you need to edit the .sql file and change the names of the tables to reflect the prefix.

### Cookie Settings ###
These are to help you specify settings dealing with the use of cookies.

```
$config['cookie']['keeptime'] = time()+(60 * 60 * 24 * 90);
```
  * This sets the cookie's alive time. Once the cookie hits the time (above is 90 days), the cookie is destroyed. The method above is ideal for logging the cookie's alive time. If you wish to change the length of time the cookie is alive for, then change the information inside the parenthesis (seconds x minutes x hours x days[x weeks[ x years ](.md)]) etc. To kill the auto-login just make the variable blank.

```
$config['cookie']['domain'] = "domainname.tld";
```
  * This is to specify the IP address or domain that the cookies for assetr are linked to.

### File and Folder Settings ###
These are specific to the file/folder creation and saving functions in assetr.

```
$config['folder']['absolute'] = "/var/www/assetr"; 
```
  * The absolute folder path to assetr (preferably where index.php and config.php are housed) on the server. This cannot include a trailing slash, or assetr will break.

```
$config['folder']['rep'] = "/repositories";
```
  * This specifies where the repositories folder is located in the assetr directory. This is not supposed to be absolute path on the server. This cannot include a trailing slash or assetr will break.

```
$config['folder']['permission'] = "0777";
```
  * For all new folders, they need to be created with a permission. This is where you can specify what the permission settings will be.

```
$config['file']['permission'] = "0777";
```
  * For all new files, they need to be created with a permission. This is where you can specify what the permission settings will be.

## Optional Settings ##
### SMTP Settings ###
assetr has a built in ability to e-mail files to a user checking out, as well as inform others of the change.

### IMAP Settings ###
assetr has a built in ability to recieve e-mailed files for input in to a repository.