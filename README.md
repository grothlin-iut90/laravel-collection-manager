# PHP Collection Manager

A Laravel-based web application for managing personal collections of items. Users can create, organize, and share their collections of various collectibles like books, movies, games, and more.

## Features

### User Management
- **Role-based Access**: Support for consumers, providers, and administrators
- **Authentication**: Secure login and registration system
- **Profile Management**: Users can update their profiles

### Item Management
- **Create Items**: Add items with title, description, rating, and condition
- **Categorization**: Organize items into categories (Books, Movies, Music, Games, etc.)
- **View Items**: Browse all available items or manage personal items

### Collection System
- **Create Collections**: Users can create multiple personal collections
- **Add Items to Collections**: Easily add items from the catalog to personal lists
- **Collection Previews**: View first 5 items in each collection on the dashboard
- **Full Collection View**: See all items in a collection in a detailed table format
- **Manage Collections**: Edit, delete, and organize collections

### Dashboard
- **Personal Dashboard**: Overview of user's items and collections
- **Quick Access**: Direct links to manage collections and items
- **Role-specific Views**: Different interfaces for consumers and providers

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd php-collection-manager
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup**
   ```bash
   # Configure your database in .env file
   php artisan migrate
   php artisan db:seed

   # try
   php artisan migrate:fresh --seed
   ```

5. **Build Assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

6. **Start the Application**
   ```bash
   php artisan serve
   ```

## Usage

### Sample Accounts
After seeding, you can log in with these accounts:

- **Consumer**: consumer1@example.com / password
- **Provider**: provider1@example.com / password
- **Admin**: admin1@example.com / password

### Key Workflows

1. **As a Consumer**:
   - Browse available items on the dashboard
   - Create personal collections
   - Add items to collections from item detail pages
   - View collection previews and full lists

2. **As a Provider**:
   - Create and manage categories
   - Add new items to the catalog
   - Manage personal inventory

3. **As an Admin**:
   - Full access to all features
   - User and content management

## Technology Stack

- **Framework**: Laravel 11
- **Database**: MySQL
- **Frontend**: Blade templates with Tailwind CSS
- **Authentication**: Laravel Breeze
- **Testing**: PHPUnit with Pest

## Database Schema

- **Users**: User accounts with roles (consumer, provider, admin)
- **Categories**: Item categories managed by providers
- **Items**: Collectible items with ratings and conditions
- **Collections**: User-created lists of items
- **Item-Collection**: Many-to-many relationship between items and collections

## API Endpoints

The application includes RESTful routes for:
- User authentication and profiles
- Item CRUD operations
- Category management
- Collection management with item associations

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## License

This project is licensed under the MIT License.
