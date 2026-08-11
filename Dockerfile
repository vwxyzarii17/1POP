FROM php:8.3-cli

WORKDIR /app

COPY bot.php .

CMD ["php", "bot.php"]
