create a database name url_shortner
create a  username : test_user
user's password will be : test_user 
form phpmyadmin change test_user previlige set to global
Open command prompt having admin previlige
Go to the project directory using command prompt 

Run following command in command prompt for dependency setup
npm install
composer install

php artisan migrate
      or
import datbase provided as url_shortner.sql or you may run 

run database server or apache 
php artisan serve 
Above command will make the project live

now open your browser write : http://localhost:8000
submit a url 
it will generate two version of short url
http://localhost:8000/unique6alphanumeric
http://localhost:8000/something/unique6alphanumeric


You may open other browser and copy paste the short url and check  whether it is okay

Algorithom & techniques
1. I have created short url for both safe and unsafe url
2. I am not creating the link site has 400,499+ error . 
3. I have handled and catched error related with internet off, database server is not on etc
3. After submission url validation done using laravel url validation method 
4. If any url already exist in system, i have show the url and it's short code rather generating new url
5. during short code creation I saved safe api response in database and last_check time save api call  time
6. If user tried to recreate the url again(within 3 min), it will show api response from database
7. Again after some period of time example(3  min), if user tried to recreate the link. System will show 
existing link and give api call to check api is safe and update last_check   
8. From vue I have called api for generatin short url. Api retured JSON data
9. For ensuring security used middlewear so api call will only accept any request from http://localhost
10. Sancutm also have installed. but to implement sanctum login related work  necessary . So not  implemented
11. I have not used hash key for 6 unique alphanumeric code of short url. 
Because reducing a big hash code to generate 6 alphanumeric code, may create 5 alphanumeric duplicate code
12. I have save a link in database, then using returned unique row id, I have created 6 digit unique code . This number is converted to base 36 based on upto 5 place.
For left most place, I used base 26 conversion ignored 0-9 for beautifcation of url.
13. I used 2 alphanumeric array for this purpose  
14. Before returning response save button become disable