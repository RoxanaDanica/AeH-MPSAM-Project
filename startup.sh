#!/bin/bash
# Startup script for Azure App Service Linux (PHP)
# Set this as the Startup Command in Azure Portal:
#   bash /home/site/wwwroot/startup.sh

# Install ODBC driver + pdo_sqlsrv if not already present
if ! php -m | grep -q pdo_sqlsrv; then
    curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
    curl "https://packages.microsoft.com/config/ubuntu/$(lsb_release -rs)/prod.list" \
        > /etc/apt/sources.list.d/mssql-release.list
    apt-get update -qq
    ACCEPT_EULA=Y apt-get install -y -qq msodbcsql18 unixodbc-dev
    pecl install sqlsrv pdo_sqlsrv
    echo "extension=sqlsrv.so"     > /usr/local/etc/php/conf.d/50-sqlsrv.ini
    echo "extension=pdo_sqlsrv.so" > /usr/local/etc/php/conf.d/51-pdo_sqlsrv.ini
fi

# Apply custom nginx config
cp /home/site/wwwroot/nginx-site.conf /etc/nginx/sites-enabled/default
service nginx reload

# Keep php-fpm in foreground as the container main process
exec php-fpm
