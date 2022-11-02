1. Project Title : Admin Panel
    -To manage records of Company and Employee

2. How to Install and Run the Project :
    Clone the project by copying the link from git hub and type in cmd git clone "link project github"
    
    Go to the folder application using cd command on your cmd or terminal
    
    Run composer install on your cmd or terminal
    
    Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
    
    Open your .env file and change the database name (DB_DATABASE) to assignment0 or whatever u have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
    
    Run follwoing commands
    
    php artisan key:generate
    
    composer require laravel/breeze --dev
    
    php artisan breeze:install
    
    npm install && npm run dev
    
    php artisan migrate
    
    php artisan db:seed
    
    php artisan serve
    
    Go to http://localhost:8000/
    
    Login credentials :
    email : admin@admin.com
    password : password
