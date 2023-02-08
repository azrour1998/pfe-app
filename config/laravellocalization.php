RewriteEngine On

# Redirect Trailing Slashes...
RewriteRule ^(.*)/$ /$1 [L,R=301]

RewriteRule ^(themes|modules|css|js|fonts|assets)/(.*) /public/$1/$2 [L]

# Handle Front Controller...
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ /public/index.php [L]