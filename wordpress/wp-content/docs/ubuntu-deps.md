# Ubuntu Dependencies

```sh
docker network create workbench \
  --subnet 10.1.1.0/24
```

```sh
docker run -i --rm \
  $(echo "$DOCKER_RUN_OPTS") \
  -h ubuntu \
  --name ubuntu \
  -w /deps \
  -v "$PWD"/deps:/deps \
  --network workbench \
  docker.io/library/ubuntu:18.04 /bin/sh << \EOSHELL
apt update
apt download libldap-2.4-2
apt download libldap2-dev
apt download libtidy-dev
apt download libtidy5
EOSHELL
```
