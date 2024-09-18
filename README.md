# CodeIgniter 4 with Vite and Vue 3

Example how to integrate CodeIgniter 4 with Vite, Vue 3.
It also includes Tailwind CSS to streamline UI design and enhance development efficiency.
This setup provides a solid foundation for building fast, responsive web applications using modern tooling and best practices.

## Prerequisites

Before you begin, ensure you have the following installed:

- **PHP 8.0+**
- **Composer**: Dependency manager for PHP
- **Node.js 16+**: To manage Vite, Vue 3, and Tailwind CSS
- **NPM or Yarn**: Node package manager

## Cloning the Repository

Clone the repository to your local machine:
```bash
git clone https://github.com/vilmavnex/ci-vite-vue.git
```

## Installation
#### Install Backend Dependencies

Install the PHP dependencies for CodeIgniter 4 using Composer:
```bash
composer install
```

#### Install Frontend Dependencies

Install the required Node.js packages for Vite, Vue 3, and Tailwind CSS:
```bash
npm install
# or if you're using Yarn
yarn install
```

## Running the Application Locally

### Start the CodeIgniter Backend
```bash
php spark serve
```
This will serve your application on http://localhost:8080/ or in what port you have defined in environment variables.

### Start Vite development server

To run Vite in development mode, which will enable hot module reloading (HMR) for Vue components:
```bash
npm run dev
# or with Yarn
yarn dev
```

This will start the Vite development server and allow you to view changes instantly as you develop the frontend.

## Building Frontend Assets for Production

### Production Build

To create a production-ready build of your frontend assets, use:
```bash
npm run build
# or with Yarn
yarn build
```

This will generate optimized, minified assets in the public/build/assets/ directory, which can then be served by CodeIgniter.
Running the Application.
This directory can be configured in environment variables.

## Environment Variables

You may need to configure the .env file for the application, depending on your local setup. By default, CodeIgniter comes with a .env file where you can set the database configuration, base URLs, etc.

For Vite, ensure that the VITE_BASE_URL and other variables are correctly set in the .env for local development.

### Development vs Production

#### Development:

Vite:
```bash npm run dev```\
CodeIgniter:
```bash php spark serve```\
to work with the backend and frontend in real-time.

#### Production:

To bundle and optimize your frontend assets for production:
```bash npm run build```\
Ensure that CodeIgniter is properly configured to serve static files from the public/build/assets/ directory in a production environment.

## Conclusion

This repository is designed as a starting point for projects that need a modern frontend with Vue 3 and Vite, coupled with CodeIgniter 4 for the backend. Feel free to contribute, customize, or expand upon this setup!