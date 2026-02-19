# Laravel Userstamps 📜

![GitHub release](https://img.shields.io/github/release/Gopal137/laravel-userstamps.svg)
![GitHub issues](https://img.shields.io/github/issues/Gopal137/laravel-userstamps.svg)
![GitHub forks](https://img.shields.io/github/forks/Gopal137/laravel-userstamps.svg)
![GitHub stars](https://img.shields.io/github/stars/Gopal137/laravel-userstamps.svg)

## Overview

Laravel Userstamps is a powerful package designed to track user actions on Eloquent models within Laravel applications. With this package, you can automatically log the user who created, updated, or deleted any model. This feature enhances accountability and makes it easier to audit changes in your application.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Configuration](#configuration)
- [Contributing](#contributing)
- [License](#license)
- [Links](#links)

## Features

- **Automatic User Tracking**: Log the user responsible for creating, updating, or deleting models.
- **Eloquent Integration**: Seamlessly integrates with Laravel's Eloquent ORM.
- **Audit Trail**: Keep a clear history of user actions for better accountability.
- **Customizable**: Easily configure which fields to track and how to log them.
- **Database Helpers**: Use built-in helpers to simplify user tracking.

## Installation

To install Laravel Userstamps, follow these steps:

1. **Install via Composer**:

   Run the following command in your terminal:

   ```bash
   composer require gopal137/laravel-userstamps
   ```

2. **Publish the Configuration**:

   After installation, publish the configuration file:

   ```bash
   php artisan vendor:publish --provider="Gopal137\Userstamps\UserstampsServiceProvider"
   ```

3. **Run Migrations**:

   Ensure your database is set up, then run:

   ```bash
   php artisan migrate
   ```

## Usage

To use Laravel Userstamps, you need to include the trait in your Eloquent models. Here's how:

1. **Include the Trait**:

   In your model, include the `Userstamps` trait:

   ```php
   use Gopal137\Userstamps\Userstamps;

   class Post extends Model
   {
       use Userstamps;

       // Your model code here
   }
   ```

2. **Track User Actions**:

   Once the trait is included, the package will automatically track the user who created, updated, or deleted the model. You can access this information through the model's attributes.

3. **Example**:

   Here’s an example of creating a new post:

   ```php
   $post = new Post();
   $post->title = 'My First Post';
   $post->content = 'This is the content of my first post.';
   $post->save();

   echo $post->created_by; // Outputs the ID of the user who created the post
   ```

## Configuration

You can customize the package's behavior by editing the published configuration file located at `config/userstamps.php`. Here are some key settings:

- **User Model**: Define which user model to use for tracking.
- **Fields**: Specify which fields should be tracked.
- **Custom Logic**: Implement any custom logic for user tracking.

## Contributing

Contributions are welcome! If you have suggestions or improvements, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/YourFeature`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add some feature'`).
5. Push to the branch (`git push origin feature/YourFeature`).
6. Open a Pull Request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Links

For the latest releases, visit [Releases](https://github.com/Gopal137/laravel-userstamps/releases). You can download the latest version and execute it to start using Laravel Userstamps.

For more information and updates, check the [Releases](https://github.com/Gopal137/laravel-userstamps/releases) section of the repository.

## Acknowledgments

- Thanks to the Laravel community for their ongoing support and contributions.
- Special thanks to all contributors who help improve this package.

## Conclusion

Laravel Userstamps provides a straightforward way to track user actions on your Eloquent models. By integrating this package into your application, you enhance accountability and maintain a clear audit trail. Start using Laravel Userstamps today to streamline your user tracking needs.