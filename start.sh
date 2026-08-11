#!/bin/sh

WORKERS="${WORKERS:-10}"

echo "Starting $WORKERS workers..."

pids=""

start_worker() {
    php /app/bot.php &
    echo $!
}

i=1
while [ "$i" -le "$WORKERS" ]; do
    pid=$(start_worker)
    pids="$pids $pid"
    echo "Worker $i started: PID $pid"
    i=$((i + 1))
done

trap 'kill $pids 2>/dev/null; exit 0' INT TERM

while true; do
    sleep 5

    for pid in $pids; do
        if ! kill -0 "$pid" 2>/dev/null; then
            echo "Worker $pid stopped."
        fi
    done
done
