<p align="center">

  <p align="center">
    <a href="https://github.com/Auro-93/bonny-state-bonuses-laravel">
        <img src="public/images/favicon.png" alt="Logo" width= "200" height = "200">
    </a>
   </p>
  
  <h3 align="center">Bonny State Bonuses</h3>

  <p align="center">
     A project developed in Laravel and MySQL that includes two functionalities: a REST API and a web app.
    Bonny is a fictional startup whose aim is to make state bonuses more accessible to citizens.
    The application allows the user to access / filter / create / update / delete state bonuses and the categories to which they belong.
  </p>

  <br>
  <br>

  <h3 align="center">Preview</h3>

  <a href="https://github.com/Auro-93/bonny-state-bonuses-laravel">
    <img src="public/screenshots/overview.png" alt="site-homepage-overview">
  </a>

  <a href="https://github.com/Auro-93/bonny-state-bonuses-laravel">
    <img src="public/screenshots/bonuses-table.png" alt="site-bonuses-table">
  </a>

  <a href="https://github.com/Auro-93/bonny-state-bonuses-laravel">
    <img src="public/screenshots/create-category.png" alt="site-create-category">
  </a>

</p>

<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#license">License</a></li>
    <li><a href="#links-contacts">Links & Contacts</a></li>
    <li><a href="#acknowledgements">Acknowledgements</a></li>
  </ol>
</details>

## About The Project

User can perform various actions:

<ul>
<li><strong>GET</strong> requests to access bonuses and categories </li>
<li><strong>GET</strong> requests with params to filter bonuses by category and sale data range; </li>
<li><strong>GET</strong> requests to access aggregate data about categories such as total, max and min saved minutes</li>
<li><strong>POST</strong> requests to create bonuses and categories; </li>
<li><strong>PUT</strong> requests to update bonuses and categories; </li>
<li><strong>DELETE</strong> requests to delete bonuses and categories; </li>
</ul>

REST API project section endpoints:

<ul>
<li><strong>GET</strong> /bonuses</li>
<li><strong>GET</strong> /bonuses/{id}</li>
<li><strong>POST</strong> /bonuses/store</li>
<li><strong>PUT</strong> /bonuses/{id}/update</li>
<li><strong>DELETE</strong> /bonuses/{id}/delete</li>

<li><strong>GET</strong> /categories</li>
<li><strong>GET</strong> /categories/{id}</li>
<li><strong>POST</strong> /categories/store</li>
<li><strong>PUT</strong> /categories/{id}/update</li>
<li><strong>DELETE</strong> /categories/{id}/delete</li>

<li><strong>GET</strong> /categories/aggregate/max-saved-minutes</li>
<li><strong>GET</strong> /categories/aggregate/min-saved-minutes</li>
<li><strong>GET</strong> /categories/aggregate/total-saved-minutes</li>
</ul>

### Built With

-   [Laravel](https://laravel.com/)
-   [MySQL](https://www.mysql.com/)
-   [SASS](https://sass-lang.com/)
-   [Tailwind CSS](https://tailwindcss.com/)

## Getting Started

### Prerequisites

Please check the official laravel installation guide for requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)

### Installation

1. Clone the repository locally with the git command:

    ```sh
    git clone https://github.com/Auro-93/bonny-state-bonuses-laravel.git
    ```

2. Switch to the project folder:

    ```sh
    cd bonny-state-bonuses-laravel
    ```

3. Install composer dependencies:

    ```sh
    composer install
    ```

4. Install NPM Dependencies:

    ```sh
    npm install
    ```

5. Copy the example env file and make the required configuration changes in the .env file:

```sh
 cp .env.example .env
```

6.  Generate an app encryption key:

```sh
 php artisan key:generate
```

7.  Create an empty database for our application with your preferred tools (ex. phpMyAdmin or MySQL Workbench)

8.  In the .env file, add database information to allow Laravel to connect to the database

    In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created.


9.  Migrate the database

```sh
 php artisan migrate
```

10. Seed the database with dummy data to test the app faster (optional):

```sh
 php artisan db:seed
```

11. Start the local development server:

```sh
   php artisan serve
```

You can now access the server at http://localhost:8000

## License

Distributed under the MIT License. See `LICENSE` for more information.

## Links & Contacts

[@Aurora Sirigu](https://www.linkedin.com/in/aurora-sirigu-a001301b4/) - 93a.sirigu at gmail dot com

Project Repository: [bonny-state-bonuses-laravel](https://github.com/Auro-93/bonny-state-bonuses-laravel)

Project Website: [bonny-state-bonuses - Heroku](https://bonny-state-bonuses.herokuapp.com/)

Portfolio: [aurodev-web-developer-portfolio](https://aurodev-web-developer-portfolio.netlify.app/)

## Acknowledgements

-   [Best-README-Template](https://github.com/othneildrew/Best-README-Template)
-   [Awesome README](https://github.com/matiassingers/awesome-readme)
-   [Laravel](https://laravel.com/)
-   [Tailwind CSS](https://tailwindcss.com/)
