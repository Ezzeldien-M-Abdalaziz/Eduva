# Eduva - Learning Management System (LMS)

Eduva is a full-featured **Learning Management System** built with Laravel 12, designed for online course selling and learning. It supports three user roles — **Admin**, **Instructor**, and **Student** — with multi-gateway payment processing, course content management, certificate generation, and a dynamic CMS-powered frontend.

---

## 🚀 Getting Started

### Prerequisites

- **PHP** >= 8.2
- **MySQL** (configured in `.env`)
- **Composer** >= 2.x
- **Node.js** & **npm**
- PHP extensions: `gd` or `imagick` (for image processing)

### Installation

```bash
# 1. Clone the repository
git clone <repo-url>
cd Eduva

# 2. Install PHP dependencies
composer install

# 3. Configure environment
cp .env.example .env
php artisan key:generate

# 4. Update .env with your database credentials
# DB_DATABASE=eduva
# DB_USERNAME=root
# DB_PASSWORD=your_password

# 5. Run migrations
php artisan migrate

# 6. Run seeders (optional — creates admin, sample users & courses)
php artisan db:seed

# 7. Install frontend dependencies
npm install

# 8. Build assets
npm run build

# 9. Start the development server
composer run dev
# Or manually:
# php artisan serve
# npm run dev              # in another terminal
# php artisan queue:listen # for queued jobs
```

### Quick Setup (One Command)

```bash
composer run setup
```

This runs: `composer install` → `.env` copy → `key:generate` → `migrate` → `npm install` → `npm run build`

---

## 🏗️ Project Architecture

### Tech Stack

| Layer | Technology |
|-------|-----------|
| **Backend** | Laravel 12 (PHP 8.2+) |
| **Frontend** | Blade Templates, Alpine.js, TailwindCSS 3 |
| **Build Tool** | Vite 7 |
| **Database** | MySQL |
| **Auth** | Laravel Breeze (multi-guard: web, admin) |
| **File Manager** | UniSharp Laravel Filemanager |
| **PDF Generation** | barryvdh/laravel-dompdf |
| **Image Processing** | Intervention Image |
| **Notifications** | Notyf (JS flash notifications) |

### Directory Structure (Key Paths)

```
app/
├── Http/Controllers/
│   ├── Admin/              # 35+ admin controllers
│   ├── Auth/               # Authentication controllers
│   └── Frontend/           # 17 frontend controllers
├── Helpers/
│   └── global_helpers.php  # cartCount(), cartTotal(), user(), etc.
├── Mail/
│   ├── ContactMail.php
│   ├── InstructorRequestApprovedMail.php
│   └── InstructorRequestRejectMail.php
├── Models/                 # 43 Eloquent models
├── Providers/
│   ├── AppServiceProvider.php
│   ├── SettingServiceProvider.php
│   └── PaymentGatewaySettingServiceProvider.php
├── Service/
│   ├── OrderService.php
│   ├── SettingService.php
│   └── PaymentGatewaySettingService.php
├── Traits/
│   └── FileUpload.php
└── View/Components/        # Blade components (layouts, input blocks)

routes/
├── web.php                 # Frontend + Student + Instructor routes
├── admin.php               # Admin panel routes
├── auth.php                # User authentication routes
└── console.php             # Artisan commands

resources/views/
├── admin/                  # Admin panel views (89 items)
├── frontend/               # Public + dashboard views
│   ├── pages/              # Public pages + home sections
│   ├── student-dashboard/
│   └── instructor-dashboard/
├── auth/                   # Login/Register views
├── components/             # Reusable Blade components
├── layouts/                # Master layouts
└── mail/                   # Email templates
```

---

## 📦 Packages & Dependencies

### Production (composer.json `require`)

| Package | Purpose |
|---------|---------|
| `laravel/framework` ^12.0 | Core Laravel framework |
| `laravel/tinker` ^2.10.1 | Interactive REPL |
| `unisharp/laravel-filemanager` ^2.9 | File/media manager for admin & instructors |
| `srmklive/paypal` | PayPal payment gateway integration |
| `stripe/stripe-php` | Stripe Checkout payment gateway |
| `razorpay/razorpay` | Razorpay payment gateway (INR focus) |
| `barryvdh/laravel-dompdf` | PDF generation for certificates |
| `intervention/image` | Image manipulation & processing |
| `flasher/notyf-laravel` | Frontend flash notification toasts |

### Development (composer.json `require-dev`)

| Package | Purpose |
|---------|---------|
| `laravel/breeze` ^2.3 | Auth scaffolding (login, register, password reset) |
| `barryvdh/laravel-debugbar` ^4.0 | Debug bar for local dev |
| `fakerphp/faker` ^1.23 | Fake data generation for seeders |
| `laravel/pint` ^1.24 | Code style fixer |
| `pestphp/pest` ^4.3 | Testing framework |
| `mockery/mockery` ^1.6 | Mocking library for tests |

### Frontend (package.json)

| Package | Purpose |
|---------|---------|
| `tailwindcss` ^3.1 | Utility-first CSS framework |
| `alpinejs` ^3.4.2 | Lightweight JS reactivity |
| `axios` ^1.11 | HTTP client |
| `vite` ^7.0.7 | Frontend build tool |
| `laravel-vite-plugin` ^2.0 | Laravel integration for Vite |
| `concurrently` ^9.0.1 | Run multiple dev servers simultaneously |

---

## ✨ Features

### 🌐 Public Frontend

- **Home Page** — Dynamic CMS sections: Hero banner, Features, About Us, Latest Courses, Become Instructor, Video Section, Brand Partners, Featured Instructors, Testimonials, Counters
- **Course Listing** — Browse all courses with category/level/language filters
- **Course Detail Page** — Full course info, curriculum, instructor profile, reviews
- **Blog** — Blog listing, detail pages, and comment system
- **About Page** — Dynamic about-us content
- **Contact Page** — Contact form with email delivery
- **Newsletter Subscription** — Email subscription from footer
- **Custom Pages** — Admin-created static pages (Terms, Privacy, etc.)

### 👨‍🎓 Student Dashboard

- **Enrolled Courses** — View all enrolled courses
- **Course Player** — Video/content player with chapter & lesson navigation
- **Watch History** — Tracks lesson progress, resume from last watched
- **Lesson Completion** — Mark lessons as complete/incomplete
- **File Download** — Download lesson attachments
- **Certificate Download** — Auto-generated PDF certificate upon course completion
- **Reviews** — Submit & manage course reviews
- **Orders** — View order history & details
- **Become Instructor** — Request to upgrade role to instructor (with document upload)
- **Profile Management** — Update name, password, social links

### 👨‍🏫 Instructor Dashboard

- **Course Management** — Create, edit, update courses with multi-step form
- **Course Content Builder** — Create chapters & lessons with drag-and-drop sorting
- **Lesson Types** — Video (upload/YouTube/Vimeo/external), Audio, Document, PDF, File
- **File Manager** — Integrated Laravel Filemanager for rich media uploads
- **Order History** — View student purchases for instructor's courses
- **Withdrawals** — Request payout with gateway info, view withdrawal history
- **Profile Management** — Update profile, password, social links, payout gateway info

### 🛒 Cart & Checkout

- **Shopping Cart** — Add/remove courses, cart count & total calculation
- **Multi-Gateway Checkout** — PayPal, Stripe, Razorpay
- **Currency Conversion** — Configurable exchange rates per gateway
- **Order Processing** — Automated order creation, enrollment, and instructor wallet credit
- **Commission System** — Configurable platform commission deducted from instructor earnings

### 💰 Payment System

- **PayPal** — Sandbox/Live mode, full OAuth2 checkout flow
- **Stripe** — Checkout Session integration
- **Razorpay** — Direct payment capture (INR-oriented)
- **Payment Settings** — Admin configures API keys, modes, currencies, rates per gateway
- **Payout Gateways** — Admin defines available payout methods for instructors
- **Withdrawal Requests** — Instructors request payouts, admin approves/rejects

### 🔧 Admin Panel

- **Dashboard** — Overview stats (courses, students, instructors, orders, revenue)
- **Instructor Requests** — Approve/reject instructor applications, download documents
- **Course Management** — Full CRUD + approval system for courses
- **Course Content** — Manage chapters, lessons, sorting (same as instructor)
- **Order Management** — View all orders & details
- **Review Moderation** — Manage course reviews
- **Certificate Builder** — Visual builder to position title, subtitle, description, signature on certificate template
- **Blog & Categories** — Full blog CMS with categories
- **Custom Pages** — Create/edit static pages
- **CMS Sections** — Manage all homepage sections (Hero, Features, About, Latest Courses, Become Instructor, Video, Brands, Featured Instructors, Testimonials, Counters)
- **Contact Management** — View incoming messages, configure contact settings
- **Site Settings** — General settings, commission rate, SMTP, logo
- **Payment Settings** — PayPal, Stripe, Razorpay configuration
- **Payout Gateways** — Configure withdrawal methods
- **Withdrawal Requests** — Approve/reject instructor payout requests
- **Top Bar & Footer** — Manage top bar content, footer columns, social links
- **Database Clear** — Utility to clear/reset database tables
- **Profile** — Admin profile & password management

### 📧 Email System

- **Contact Mail** — Sends contact form submissions to admin
- **Instructor Approval Mail** — Notifies user when instructor request is approved
- **Instructor Rejection Mail** — Notifies user when instructor request is rejected

### 🔐 Authentication & Authorization

- **Multi-Guard Auth** — Separate auth for `web` (students/instructors) and `admin`
- **Role Middleware** — `check_role:student`, `check_role:instructor` route protection
- **Email Verification** — Built-in email verification flow
- **Password Reset** — Forgot/reset password for both user and admin guards
- **Laravel Breeze** — Auth scaffolding with Blade views

---

## 🔄 Application Flow

```
┌─────────────────────────────────────────────────────────────┐
│                        PUBLIC USER                          │
│  Home → Courses → Course Detail → Register/Login            │
│  Blog → Blog Detail → Comment                              │
│  About → Contact → Newsletter Subscribe                     │
│  Custom Pages                                               │
└──────────────────────┬──────────────────────────────────────┘
                       │ Register/Login
                       ▼
┌──────────────────────────────────────────────────────────────┐
│                      STUDENT (role=student)                  │
│                                                              │
│  Browse Courses → Add to Cart → Checkout                     │
│       │                                          │           │
│       │              ┌───────────────────────────┤           │
│       │              │                           │           │
│       │              ▼                           ▼           │
│       │         PayPal/Stripe/Razorpay    Order Failed       │
│       │              │                                       │
│       │              ▼                                       │
│       │         Order Success → Enrollment Created            │
│       │              │                                       │
│       │              ▼                                       │
│       │    Course Player → Watch Lessons → Complete Lessons   │
│       │              │                                       │
│       │              ▼ (all lessons completed)               │
│       │    Download Certificate (PDF)                         │
│       │                                                      │
│       ├── Manage Reviews                                     │
│       ├── View Orders                                        │
│       ├── Request Become Instructor (upload document)        │
│       └── Manage Profile                                     │
└──────────────────────────────────────────────────────────────┘
                       │ Admin approves instructor request
                       ▼
┌──────────────────────────────────────────────────────────────┐
│                    INSTRUCTOR (role=instructor)               │
│                                                              │
│  Dashboard (stats: courses, students, revenue)               │
│       │                                                      │
│       ├── Create Course (basic info → price/image/desc)      │
│       ├── Build Content (chapters → lessons → sort)          │
│       │       ├── Video lessons (upload/YouTube/Vimeo/link)  │
│       │       ├── Audio, Document, PDF, File attachments    │
│       │       └── File Manager for rich media                │
│       ├── View Orders                                        │
│       ├── Request Withdrawal (select payout gateway)         │
│       └── Manage Profile + Payout Gateway Info               │
└──────────────────────────────────────────────────────────────┘

┌──────────────────────────────────────────────────────────────┐
│                    ADMIN (guard=admin)                        │
│                                                              │
│  Dashboard → Manage All                                      │
│       │                                                      │
│       ├── Instructor Requests (approve/reject)               │
│       ├── Courses (CRUD + approve)                           │
│       ├── Course Content (chapters/lessons)                  │
│       ├── Orders (view all)                                  │
│       ├── Reviews (moderate)                                 │
│       ├── Certificate Builder (visual template editor)       │
│       ├── Blog & Categories (CMS)                            │
│       ├── Custom Pages                                       │
│       ├── Homepage Sections (Hero, Features, About, etc.)    │
│       ├── Contact Messages & Settings                        │
│       ├── Site Settings (general, commission, SMTP, logo)    │
│       ├── Payment Settings (PayPal/Stripe/Razorpay)          │
│       ├── Payout Gateways & Withdrawal Requests              │
│       ├── Top Bar, Footer, Social Links                      │
│       ├── Database Clear                                     │
│       └── Admin Profile                                      │
└──────────────────────────────────────────────────────────────┘
```

---

## 🗄️ Database Schema (45 Migrations)

### Core Tables

| Table | Description |
|-------|-------------|
| `users` | Students & instructors (role: student/instructor, wallet, approve_status, document) |
| `admins` | Admin users (separate guard) |
| `courses` | Courses with title, slug, price, discount, instructor_id, category, level, language, status, approval |
| `course_categories` | Course categories with icon & slug |
| `course_chapters` | Chapters within a course (sortable) |
| `course_chapter_lessions` | Lessons within chapters (video/audio/doc/pdf/file, source: upload/youtube/vimeo/external) |
| `course_languages` | Available course languages |
| `course_levels` | Available course levels |
| `carts` | Shopping cart items (user_id, course_id) |
| `orders` | Orders with invoice_id, transaction_id, status, amounts, payment_method |
| `order_items` | Order line items with commission_rate |
| `enrollments` | Student-course enrollments (have_access flag) |
| `watch_histories` | Lesson watch tracking (is_completed flag) |
| `reviews` | Course reviews (rating, comment, status) |
| `payment_settings` | Gateway credentials (key-value pairs) |
| `settings` | Site-wide settings (key-value pairs) |
| `payout_gateways` | Available payout methods for instructors |
| `instructor_payout_information` | Instructor's payout gateway details |
| `withdraws` | Withdrawal requests with status |

### CMS Tables

| Table | Description |
|-------|-------------|
| `heroes` | Hero section content |
| `features` | Feature cards |
| `about_us_sections` | About us page content |
| `latest_course_sections` | Latest courses section settings |
| `become_instructor_sections` | Become instructor section |
| `video_sections` | Video section |
| `brands` | Brand partner logos |
| `featured_instructors` | Featured instructor picks |
| `testimonials` | Testimonial entries |
| `counters` | Counter/stat items |
| `contacts` | Contact form submissions |
| `contact_settings` | Contact page settings |
| `top_bars` | Top bar content |
| `footers` | Footer content |
| `footer_column_ones` | Footer column 1 links |
| `footer_column_twos` | Footer column 2 links |
| `social_links` | Social media links |
| `custom_pages` | Static pages (terms, privacy, etc.) |
| `blog_categories` | Blog categories |
| `blogs` | Blog posts |
| `blog_comments` | Blog post comments |
| `certificate_builders` | Certificate template settings |
| `certificate_builder_items` | Certificate element positions (x, y coordinates) |
| `newsletters` | Newsletter subscribers |

---

## 🛠️ Key Services & Helpers

### Global Helpers (`app/Helpers/global_helpers.php`)

| Function | Description |
|----------|-------------|
| `user()` | Get currently logged-in user (web guard) |
| `adminUser()` | Get currently logged-in admin |
| `cartCount()` | Count items in current user's cart |
| `cartTotal()` | Calculate total price of cart items (with discount) |
| `calculateCommission($amount, $rate)` | Calculate instructor commission |
| `convertMinutesToHours($minutes)` | Format minutes as "Xh YM" |
| `sidebarItemActive($routes)` | Return 'active' class for matching route |

### Services

| Service | Description |
|---------|-------------|
| `OrderService` | Handles order creation, enrollment, instructor wallet credit, cart clearing |
| `SettingService` | Loads site settings from DB, caches forever, sets `config('settings')` |
| `PaymentGatewaySettingService` | Loads payment gateway settings, caches, sets `config('gateway_settings')` |

### Traits

| Trait | Description |
|-------|-------------|
| `FileUpload` | Upload files to storage with unique names, delete existing files |

### Middleware

| Middleware | Description |
|-----------|-------------|
| `CheckRoleMiddleWare` | Restricts routes by user role (student/instructor) |
| `RedirectIfAuthenticated` | Redirects authenticated users away from guest pages |

---

## 📝 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
