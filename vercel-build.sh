#!/bin/bash

# Install dependencies
composer install --no-dev --optimize-autoloader

# Copy production environment file
cp .env.production .env

# Generate optimized files
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create database file in /tmp for Vercel
touch /tmp/database.sqlite

# Run migrations
php artisan migrate --force

# Seed the database
php artisan db:seed --class=OfficeSeeder --force

# Ensure storage directory exists
mkdir -p /tmp/storage/framework/cache
mkdir -p /tmp/storage/framework/sessions
mkdir -p /tmp/storage/framework/views
mkdir -p /tmp/storage/logs