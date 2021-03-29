<h1>Pelle Library App</h1>
 <p>This is an application where stores can stock up on books from our warehouse.<br> 
    You can also check selling and buying data about any book or store.</p>
<h2>Install guide</h2>
<ul>
    <li>Download repo</li>
    <li>In your root folder terminal run <code>composer install</code></li>
    <li>Duplicate the '.env.example' file and change the name to '.env'</li>
    <li>Configure the database connections correctly to your database</li>
    <li>Configure your pusher settings</li>
    <li>Configure the APP_KEY and APP_LOCATION</li>
    <li>Configure your mail settings</li>
</ul>
<h2>Start up</h2>
<ul>
    <li>In your terminal go to your route directory</li>
    <li>start the app with <code>php artisan serve</code></li>
    <li>In another tab run <code>php artisan websockets:serve</code></li>
    <li>Go to <i>yourhostname.com/laravel-websockets</i> and hit connect</li>
    <li>Now you're ready to use your application</li>
</ul>
