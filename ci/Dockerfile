FROM docker.io/library/composer:2
WORKDIR /sdk
COPY . .
RUN composer install --no-dev --no-interaction --quiet
CMD ["php", "ci/smoke_test.php"]
