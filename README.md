<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About BrainFarm

With the developments in technology and advancements made globally, farmers are facing complex decision making due to factors such as global warming, constant change and fluctuation in market prices and prices of relevant inputs. As a result of factors such as global warming, traditional methods of weather forecasting are becoming obsolete and thus farmers are growing plants that do not match the changing conditions. In addition, farmers do not have access to enough tools and information that will help them make informed decisions when it comes to deciding what to plant at specific times of the year. They may end up making losses when this could have been mitigated if they had more viable options at their disposal. 
Farmers currently get advice on what to plant from websites such as NAFIS that provides current market prices of farm produce, other farmers online from groups such as Digital Farmers Kenya and budgeting analysis from apps such as Budget Mkononi. This separation can be a challenge to track down especially if a farmer is not that conversant with technology.
The goal of this proposed system therefore, would be to create a recommendation system that would help farmers make better decisions regarding what crops to grow based on their financial situation and weather conditions surrounding them. With these inputs, the system would calculate the farmer’s profit/loss and give the farmer insights on what to plant in order to combat their losses or improve their profit. 



## Installation

You will first of all need to install composer dependencies that rely the application relies on. Run the follwoing command:

composer install

Then you will need to set up the database. Run the follwoing command

php artisan migrate

Then import pre-existing data into the database by running

php artisan db:seed

## Log In and Try out Some Stuff

Login with any of the accounts located in the User Seeder which have a default password of 12345678

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
