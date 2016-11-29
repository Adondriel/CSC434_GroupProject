/* Launch your mysql cmd line. */
/* 
C:\MAMP\bin\mysql\bin\mysql.exe --host=localhost -uroot -proot
*/

CREATE USER 'adamunbh_csc434'@'localhost' IDENTIFIED BY 'ThisAccountWillBeDeleted';
GRANT ALL PRIVILEGES ON * . * TO 'adamunbh_csc434'@'localhost';

CREATE SCHEMA adamunbh_ecommerce;
USE adamunbh_ecommerce;

/*

Now execute the "tables.sql" file, and your local environment should be setup.
registration works, if you would like to test it, login for my acount is:  U: adondriel, P: testing
*/




