ElectroStore - Bootstrap eCommerce (Demo)
---------------------------------------
How to run (Windows + XAMPP + VS Code):
1. Copy the extracted folder 'ecommerce_project_bootstrap' to C:\xampp\htdocs\
2. Start Apache and MySQL from XAMPP Control Panel.
3. Open http://localhost/phpmyadmin and import ecommerce.sql
4. If your MySQL root user requires a password, edit db.php and set $pass accordingly.
5. Open these pages:
   - User: http://localhost/ecommerce_project_bootstrap/user/
   - Admin: http://localhost/ecommerce_project_bootstrap/admin/
   Admin demo login: username: admin  password: admin123
Notes:
- Uploaded images are stored in the uploads/ folder. Sample product images are preloaded.
- This is a demo project for learning and presentations. For production, never store plaintext passwords and always validate/sanitize inputs more strictly.
