<h1 align="center"> Bug&Plan </h1>
<p align="center">A BugTracker created with Laravel<p>
                 
## Table of Contents
* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
* [Roadmap](#roadmap)
* [Contributing](#contributing)
* [License](#license)
* [Contact](#contact)
* [Acknowledgements](#acknowledgements)

## About The Project
<img alt="Dashboard of the page" src="https://raw.githubusercontent.com/AitorGarciaM/BugAndPlan/main/Readme/Images/Dashboard.PNG" height="216" width="400" align="center">

There are many great BugTrackers but I didn't find one that implements a Project Manager, so I decided to create one that include it.
Here's why:
* Your time should be focused on creating something amazing. A project that solves a problem and helps others
* You shouldn't be loosing time copy pasting tasks form the BugTracker to your scrum backlog

<img alt="Page that show all projects of the user" src="/main/Readme/Images/Projects.PNG" height="216" width="400" align="left">

At this time the project manager it's not included, but I'll be adding features in my free time, like the project manager or other 
specified in the Roadmap. You may also suggest changes by forking this repository and creating a pull request or opening an issue.
<img alt="Page that show all the users of the project" src="https://raw.githubusercontent.com/AitorGarciaM/BugAndPlan/main/Readme/Images/Users.PNG" height="216" width="400" align="right">

### Built With
This project uses:
* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)
* [Laravel](https://laravel.com)

## Getting Started
<img alt="Page that show all the users of the project" src="https://raw.githubusercontent.com/AitorGarciaM/BugAndPlan/main/Readme/Images/Project.PNG" height="216" width="400" align="right">

### Prerequisites
* Apache
* PHP >= 7.3
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

### Installation
1. Clone this repo
2. install Composer in your new directory.
```sh
composer install 
```
3. open the .env file and change the database host location, username and password.
4. open the config/database.php file and change database configuration to fit yours.
5. Generate your app key by running the following command:
```sh
php artisan key:generate
```
6. to create new users (temporarily) open the database/seeds/UserTableSeeders.php and edit the users are in the file.
7. To push the database info stored in the seeders run the following command:
```sh
php artisan db:seed
```
8. To test the application in local use:
```sh
php artisan serve
```
## Roadmap
The next features that will be included in Bug&Plan are:
* User roles depending on the project 
* Forum system to discuss the Issue reports
* Project Manager
    - Task creation and Assignement
    - Time tracking
    - Automatice task creation when bug is reportedtice
    
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the project
2. Create your Feature Branch (``` git checkout -b feature/[YourAmazingNewFeature]```)
3. Commit your changes (``` git commit -m "Add [YourAmazingNewFeature]"```)
4. Push to the Branch (``` git push origin feature/[YourAmazingNewFeature]```)
5. Open a Pull Request

## License
Licensed under the [Apache License](LICENSE).

## Contact
Aitor Garcia - aitor.garciamin@gmail.com - [Aitor Garcia Miñana](https://www.linkedin.com/in/aitor-garcia-mi%C3%B1ana-13aab618a/)

## Acknowledgements
* [Laravel](https://laravel.com/)
* [GitHub](https://github.com)
* [FontAwsome](https://fontawesome.com/)
* [Bootstrap](https://getbootstrap.com/)
* [Spatie](https://spatie.be/)


