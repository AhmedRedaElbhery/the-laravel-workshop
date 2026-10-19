# Laravel Workshop: Social Feed

A small social media application built with Laravel, Vue 3, and Inertia.js. Users can create posts, reply to posts, like and repost content, quote posts, and follow other profiles.

## Features

-   **Timeline:** View a home feed of posts and reposts (`/home`).
-   **Posts:** Create posts, view individual posts and their replies, and delete your own posts.
-   **Replies:** Reply to posts and view threaded conversations.
-   **Likes:** Like and unlike posts.
-   **Reposts and Quotes:** Repost existing content or share it with a quote.
-   **Profiles:** View public profiles, including their posts and replies.
-   **Follow System:** Follow and unfollow other profiles.

## Tech Stack

| Layer      | Technologies                                 |
| ---------- | -------------------------------------------- |
| Backend    | PHP 8.3+, Laravel 13                         |
| Frontend   | Vue 3, Inertia.js, Tailwind CSS, Headless UI |
| Routing    | Laravel, Ziggy                               |
| Build Tool | Vite                                         |
| Database   | MySQL                                        |

## Getting Started

### Requirements

-   PHP 8.3 or later
-   Composer
-   Node.js and npm
-   MySQL
-   Git

For local development, you can use [Laravel Herd](https://herd.laravel.com/).

### Installation

Clone the repository and switch to the Laravel branch:

```bash
git clone -b laravel-branch https://github.com/AhmedRedaElbhery/the-laravel-workshop.git laravel-workshop

cd laravel-workshop
```

Install the dependencies:

```bash
composer install
npm install
```

Create your environment file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

### Database Configuration

Create a MySQL database named `laravel_workshop`, then configure your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_workshop
DB_USERNAME=root
DB_PASSWORD=
```

Update the database credentials to match your local environment.

Run the migrations and seed the database:

```bash
php artisan migrate --seed
```

The seeder creates demo profiles and sample social-feed content for local development.

### Running the Application

**Option 1: Using Laravel's development command**

```bash
composer run dev
```

Use this if your `composer.json` defines the `dev` script. With the standard Laravel 13 setup, the development command starts the local server and supporting development processes.

**Option 2: Using Laravel Herd**

If you have configured the project in Herd, start the Vite development server:

```bash
npm run dev
```

Then open your configured local domain, for example:

[http://laravel-workshop.test](http://laravel-workshop.test)

Make sure the domain is configured correctly in Herd. Start a queue worker separately if your application requires one.

## Development Authentication

The application currently uses development-only helper routes instead of a complete authentication system.

| Route         | Action                                                              |
| ------------- | ------------------------------------------------------------------- |
| `/dev/login`  | Logs in as a randomly selected seeded user and opens their profile. |
| `/dev/logout` | Logs out and redirects to the welcome page.                         |

**Important:** These routes are intended for local development only and must not be accessible in production.

## Testing

Run the test suite with:

```bash
composer test
```

Alternatively:

```bash
php artisan test
```

The feature tests cover the social-feed functionality, including posting, replying, reposting, likes, and follows.

## Code Style

Format the code using Laravel Pint:

```bash
./vendor/bin/pint
```

## License

This project is licensed under the MIT License, provided the repository includes the corresponding MIT license file.
