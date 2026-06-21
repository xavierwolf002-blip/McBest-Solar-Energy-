# Lincoln College Lost & Found System

A comprehensive web-based Lost and Found management system for Lincoln College, built with Laravel and Bootstrap.

## Features

### For Students
- **Browse Lost Items**: Search and filter through found items by category, name, or location
- **Claim Items**: Submit claims with proof of ownership
- **Track Claims**: Monitor the status of submitted claims (Pending, Approved, Rejected)
- **Secure Authentication**: Register and login with student credentials

### For Administrators
- **Upload Found Items**: Add new found items with photos, descriptions, and location details
- **Manage Items**: Edit, delete, and track all items in the system
- **Review Claims**: Verify ownership proofs and approve/reject claims
- **Dashboard Analytics**: View statistics on items, claims, and students
- **Student Management**: View all registered students and their claim history

### Security Features
- **Admin-Only Uploads**: Only authorized administrators can upload found items
- **Ownership Verification**: Students must provide detailed proof before claiming items
- **Secure Assignment**: Items are only released after admin approval
- **Role-Based Access Control**: Separate interfaces for students and administrators

## Technology Stack

- **Framework**: Laravel 12
- **Frontend**: Bootstrap 5
- **Database**: MySQL
- **Authentication**: Laravel built-in authentication
- **File Storage**: Laravel Storage (for images)

## Installation

### Prerequisites
- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd lincoln-lost-found
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
   
   Update the `.env` file with your database credentials:
   ```
   DB_DATABASE=lincoln_lost_found
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Run Migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed Database (Optional - creates admin and sample student)**
   ```bash
   php artisan db:seed
   ```

8. **Create Storage Link**
   ```bash
   php artisan storage:link
   ```

9. **Build Assets**
   ```bash
   npm run build
   ```

10. **Start Development Server**
    ```bash
    php artisan serve
    ```

Visit `http://localhost:8000` in your browser.

## Default Credentials

After running the seeder:

**Admin Account:**
- Email: admin@lincoln.edu
- Password: admin123

**Student Account:**
- Email: john@lincoln.edu
- Password: password

**Important**: Change these credentials in production!

## Usage Guide

### For Students

1. **Register**: Create an account with your student ID and email
2. **Browse Items**: Navigate to "Browse Items" to see all available lost items
3. **Search**: Use the search bar to find specific items by name, description, or location
4. **Filter**: Filter items by category (Electronics, ID Cards, Books, etc.)
5. **Claim Item**: Click on an item and provide detailed proof of ownership
6. **Track Claims**: View your claim status in "My Claims" section

### For Administrators

1. **Login**: Use admin credentials to access the admin dashboard
2. **Upload Items**: Click "Upload New Item" to add found items
   - Provide item name, category, description
   - Specify location and date found
   - Upload a clear photo (optional but recommended)
3. **Manage Items**: View, edit, or delete items from the items management page
4. **Review Claims**: 
   - Navigate to "Claims" to see all submitted claims
   - Review proof of ownership provided by students
   - Approve or reject claims with optional notes
5. **Mark as Returned**: Once an item is picked up, mark it as returned
6. **View Statistics**: Monitor system usage through the dashboard

## Database Structure

### Users Table
- id, name, email, password
- role (student/admin)
- student_id, phone
- timestamps

### Lost Items Table
- id, item_name, description, category
- location_found, date_found
- image (optional)
- status (available/claimed/returned)
- uploaded_by, claimed_by
- claimed_at, returned_at
- timestamps

### Claims Table
- id, item_id, user_id
- proof_description, proof_image
- status (pending/approved/rejected)
- admin_notes
- reviewed_by, reviewed_at
- timestamps

## File Structure

```
app/
├── Http/Controllers/
│   ├── AdminController.php
│   ├── AuthController.php
│   ├── ClaimController.php
│   ├── DashboardController.php
│   ├── HomeController.php
│   └── LostItemController.php
├── Models/
│   ├── Claim.php
│   ├── LostItem.php
│   └── User.php
database/
├── migrations/
│   ├── 2026_04_30_000001_add_role_to_users_table.php
│   ├── 2026_04_30_000002_create_lost_items_table.php
│   └── 2026_04_30_000003_create_claims_table.php
resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php
│   ├── auth/
│   │   ├── login.blade.php
│   │   └── register.blade.php
│   ├── dashboard/
│   │   └── index.blade.php
│   ├── items/
│   │   ├── index.blade.php
│   │   ├── show.blade.php
│   │   ├── create.blade.php
│   │   └── edit.blade.php
│   ├── claims/
│   │   ├── create.blade.php
│   │   └── my-claims.blade.php
│   ├── admin/
│   │   ├── dashboard.blade.php
│   │   ├── items/
│   │   │   └── index.blade.php
│   │   ├── claims/
│   │   │   ├── index.blade.php
│   │   │   └── show.blade.php
│   │   └── students.blade.php
│   └── home.blade.php
routes/
└── web.php
```

## Security Considerations

- All passwords are hashed using bcrypt
- CSRF protection on all forms
- Role-based middleware for admin routes
- File upload validation (type and size)
- SQL injection protection via Eloquent ORM
- XSS protection via Blade templating

## Future Enhancements

- Email notifications for claim approvals/rejections
- SMS notifications for item matches
- Advanced search with filters
- Item expiration dates
- Bulk item upload
- Export reports (PDF/Excel)
- Mobile app integration
- QR code generation for items

## Support

For issues or questions, contact the system administrator at admin@lincoln.edu

## License

This project is proprietary software for Lincoln College.

---

**Developed for Lincoln College** - Improving accountability and reducing loss through organized item management.
