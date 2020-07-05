# pi-uptime
Home raspberry pi uptime monitoring

Uses travis to confirm it's still up. Once a day is fine.

## On the pi

```
0 * * * * timeout --preserve-status -s 9 60 /path/to/ping-runner.sh
```

## On travis

```
php pong.php
```