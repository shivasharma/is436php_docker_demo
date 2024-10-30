#!/usr/bin/env bash
host="$1"
port="$2"
shift 2
until nc -z "$host" "$port"; do
  >&2 echo "Waiting for MySQL at $host:$port"
  sleep 2
done
>&2 echo "MySQL is up - executing command"
exec "$@"
