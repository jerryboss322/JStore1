# JSTORE V3 — Quick Start Guide (5 minutes)

**Get JSTORE V3 running in your development environment immediately.**

---

## 🚀 5-Minute Setup

### Prerequisites Check
```bash
php --version          # Should be 8.3+
composer --version     # Should be 2.7+
npm --version          # Should be 18+
psql --version         # PostgreSQL 14+
```

### Step 1: Create Laravel Project (2 min)
```bash
composer create-project laravel/laravel jstore
cd jstore
```

### Step 2: Copy Files (1 min)
Download all 23 files from the outputs folder and copy them to your project:

```bash
# Models
cp app_Models_*.php app/Models/

# Migrations (rename with proper timestamps first)
cp migration_*.php database/migrations/

# Views
cp resources_views_*.blade.php resources/views/
cp resources_views_components_*.blade.php resources/views/components/

# Configuration
cp .env.example .env
cp tailwind.config.js .
```

### Step 3: Environment Setup (1 min)
```bash
# Generate app key
php artisan key:generate

# Edit .env with your database credentials
nano .env
# Set: DB_CONNECTION=pgsql, DB_DATABASE=jstore, etc.

# Create database
createdb jstore
```

### Step 4: Install Dependencies (1 min)
```bash
npm install
php artisan migrate --seed
```

### Step 5: Start Server
```bash
php artisan serve
npm run dev  # In another terminal
```

Visit: **http://localhost:8000**

---

## 📁 File Mapping Quick Reference

```
Downloaded Files               →  Project Location
────────────────────────────────────────────────────
app_Models_*.php              →  app/Models/
migration_*.php               →  database/migrations/
resources_views_layouts_*.php →  resources/views/layouts/
resources_views_components_*.php → resources/views/components/
resources_views_pages_*.php   →  resources/views/pages/
.env.example                  →  .env
tailwind.config.js            →  tailwind.config.js (root)
```

---

## 🔧 Common Commands

### Development
```bash
php artisan serve              # Start dev server (port 8000)
npm run dev                    # Build assets with hot reload
php artisan migrate            # Run database migrations
php artisan migrate:refresh    # Reset database (dev only)
php artisan db:seed           # Seed sample data
```

### Production Build
```bash
npm run build                  # Minified CSS/JS
php artisan config:cache      # Cache configuration
php artisan route:cache       # Cache routes
php artisan view:cache        # Cache views
```

### Testing
```bash
php artisan test              # Run all tests
php artisan test --coverage   # With code coverage
php artisan tinker            # Interactive shell
```

---

## 🔌 Key Files Explained

### Models (app/Models/) - 6 files
1. **User.php** - Authentication, relationships to orders/wishlist
2. **Category.php** - Product categories with scopes
3. **Product.php** - Full search/filter capabilities
4. **Order.php** - Order management with status tracking
5. **OrderItem.php** - Order line items
6. **Cart.php** - Shopping cart with JSON items

### Migrations (database/migrations/) - 7 files
Create database schema:
- users, categories, products, wishlists, carts, orders, order_items

### Views (resources/views/) - 4 files
**Layouts:** app.blade.php (main container)
**Components:** navbar.blade.php, footer.blade.php
**Pages:** home.blade.php (landing page)

### Configuration
- **.env.example** - Environment variables template
- **tailwind.config.js** - Tailwind CSS with custom design system

---

## 📋 Database Tables at a Glance

| Table | Purpose | Key Fields |
|-------|---------|-----------|
| users | Authentication | id, email, password, is_admin |
| categories | Product organization | id, name, slug |
| products | Catalog | id, name, price, discount_percentage, sku |
| wishlists | User favorites | user_id, product_id |
| carts | Shopping carts | user_id, items (JSON), total_price |
| orders | Order management | user_id, order_number, status, total_amount |
| order_items | Order line items | order_id, product_id, quantity, subtotal |

---

## 🎨 Design Colors Quick Reference

```css
Background:  #FFFBF4  (Warm cream)
Text:        #111827  (Dark ink)
Secondary:   #6B7280  (Gray)
Accent:      #D4AF37  (Gold) ← Primary brand color
Success:     #22C55E  (Green)
Error:       #EF4444  (Red)
```

---

## 🔗 Key Routes to Know

### Public Routes
```
GET  /                    # Home page
GET  /products            # Product catalog
GET  /products/{slug}     # Product detail
```

### User Routes (Protected)
```
GET  /cart                # Shopping cart
GET  /wishlist            # Saved items
GET  /profile             # User profile
GET  /orders              # Order history
```

### Admin Routes (Admin Only)
```
GET  /admin               # Dashboard
GET  /admin/products      # Manage products
GET  /admin/orders        # Manage orders
GET  /admin/categories    # Manage categories
```

---

## 🐛 Troubleshooting Quick Fixes

### "Database connection error"
```bash
# Check PostgreSQL is running
sudo systemctl start postgresql

# Verify credentials in .env
createdb jstore
```

### "Class not found" error
```bash
composer dump-autoload
php artisan cache:clear
```

### "npm not found"
```bash
# Install Node.js from nodejs.org
node --version  # Verify install
npm install
```

### "Migration errors"
```bash
# Reset migrations (development only)
php artisan migrate:refresh --seed

# Check migration files are in database/migrations/
ls database/migrations/
```

### "Permission denied" on storage
```bash
chmod -R 775 storage bootstrap/cache
```

---

## 📚 Essential Links

- **Laravel Docs:** https://laravel.com/docs
- **Blade Guide:** https://laravel.com/docs/blade
- **Eloquent ORM:** https://laravel.com/docs/eloquent
- **Tailwind CSS:** https://tailwindcss.com
- **Livewire:** https://livewire.laravel.com
- **Alpine.js:** https://alpinejs.dev

---

## ✅ Verification Checklist

After setup, verify everything works:

- [ ] `php artisan serve` runs without errors
- [ ] `npm run dev` compiles CSS/JS
- [ ] Database migrations ran successfully
- [ ] Home page loads at http://localhost:8000
- [ ] Navigation bar displays correctly
- [ ] Footer displays correctly
- [ ] No console errors in browser dev tools

---

## 🎯 Next: Build Controllers (Milestone 2)

Once this is working, you'll build:
1. **ProductController** - Browse, search, filter products
2. **CartController** - Add/update/remove cart items
3. **OrderController** - Create and view orders
4. **AuthController** - Registration, login, logout
5. **WishlistController** - Manage wishlisted items

---

## 📞 Quick Help

**Q: Where do I get the files?**  
A: They're in the `/mnt/user-data/outputs/` folder (all 23 files)

**Q: How long does setup take?**  
A: 5-10 minutes for experienced developers, 15-20 for beginners

**Q: Can I use MySQL instead of PostgreSQL?**  
A: Yes, change `DB_CONNECTION=mysql` in .env

**Q: Do I need all the files?**  
A: Yes, they're interdependent. Copy them all.

**Q: Can I modify the design?**  
A: Yes, all colors/spacing are in tailwind.config.js

**Q: What's the next milestone?**  
A: Controllers, views, and Livewire components (Milestone 2)

---

## 🚀 You're Ready!

```bash
cd jstore
composer install
php artisan key:generate
# Configure .env with database
php artisan migrate
npm install && npm run dev
php artisan serve
# Visit http://localhost:8000
```

Happy coding! ✨

---

*Last Updated: June 23, 2025*  
*Estimated Read Time: 2 minutes*  
*Estimated Setup Time: 5-10 minutes*
