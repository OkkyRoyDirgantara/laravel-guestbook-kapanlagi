# Laravel GuestBook Kapanlagi
This app created using laravel v8.77.1(php v8.0.13)

## Features
This App is a guestbook simple program.
with features :

### Admin Panel
- Login page
```
email : "You Can Create Your Email at Form Register"
password : "You Can Create Your Password at Form Register"
```
- Logout 
- List table Guestbook 
- Add Guest Book 
- Edit Guest Book 
- Delete Guest Book

### Frontend
Show Guestbook form with input :
- First Name and Last Name 
- Organization 
- Address 
- Province 
- City

## How to use
- Clone this project to your local machine
- ``` Composer install```
- `clone .env.example .env`
- `php artisan key:generate`
- `php artisan migrate`
- `127.0.0.0:8000`
- "You can see your guestbook at [http://localhost:8000/guest](http://127.0.0.1:8000/admin/guestbook)"
- "You can see your admin panel at [http://127.0.0.1:8000/admin/guestbook](http://127.0.0.1:8000/admin/guestbook)"
