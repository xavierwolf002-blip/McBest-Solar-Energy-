# McBest Solar Energy

A comprehensive corporate website and management system for McBest Solar Energy, built with Laravel, Tailwind CSS v4, and Filament Admin Panel.

## Features

- **Public Website**: Modern, responsive corporate site with pages for About, Services, Portfolio, Team, FAQ, and Contact.
- **Lead Generation**: Built-in forms for user callbacks, newsletter subscriptions, and general contact inquiries.
- **Admin Panel**: Powered by Filament for managing Leads, Callbacks, Portfolio Projects, Team Members, FAQs, and Reviews.
- **Modern Styling**: Styled with Tailwind CSS v4 for a beautiful and highly responsive design.

## Technology Stack

- **Framework**: Laravel
- **Admin Panel**: Filament PHP
- **Frontend**: Tailwind CSS v4, Blade Templates, JavaScript
- **Database**: MySQL

## Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/xavierwolf002-blip/McBest-Solar-Energy-.git
   cd McBest-Solar-Energy-
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   ```bash
   cp .env.example .env
   ```
   Update the `.env` file with your database credentials.

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Run Migrations & Seeders**
   ```bash
   php artisan migrate --seed
   ```

7. **Build Assets**
   ```bash
   npm run build
   ```

8. **Start Development Server**
   ```bash
   php artisan serve
   ```

## Admin Access

Access the admin panel by navigating to `/admin` in your browser.