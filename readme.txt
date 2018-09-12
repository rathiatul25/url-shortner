Follow the instructions

1 Run the command
"git clone https://github.com/rathiatul25/url-shortner.git"

2. Create virtual host named "urlshortner.local.com"

3 Change user name and password in .env file. Create db with name "url_converter"
Default User : root
Password : 

4. Run the migration using "php artisan migrate"

5. Hit the url http://urlshortner.local.com/ 

6. You will see the listing page of "Top 100 board with the most frequently accessed URLs"
There are two columns on listing page-
In the first column there is long url and in the second column short url.
Just click on the url or copy and paste the url in browser and hit enter, you will be redirected to respective site.


7. Click on create menu, where you can add unique url.

Note : I didn't add any validation and didn't work on UI