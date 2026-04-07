# Fix Middleware Permission Errors - TODO

## Steps:
- [ ] Step 1: Verify/update app/Models/User.php with HasRoles trait
- [x] Step 2: Create database/seeders/PermissionSeeder.php (permissions, roles, assign to users)
- [x] Step 3: Update database/seeders/DatabaseSeeder.php to call PermissionSeeder
- [x] Step 4: Run `php artisan migrate:fresh --seed` 
- [x] Step 5: Run `php artisan permission:cache-reset`
- [ ] Step 6: Test /admin/user access with admin@example.com/admin123

**Users to seed:**
- admin@example.com (pw: admin123, role: admin)
- karyawan@example.com (pw: karyawan123, role: karyawan) 
- kasir@example.com (pw: kasir123, role: kasir)
