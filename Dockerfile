FROM php:8.3-cli

WORKDIR /app

COPY bot.php .
COPY start.sh .

RUN chmod +x /app/start.sh

CMD ["/app/start.sh"]
