# Use the official PHP image
FROM php:8.2-apache

# Copy application files to the container
COPY . /var/www/html/