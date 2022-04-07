# Tips

## Environments

```sh
#
export $(sed 's/[[:blank:]]//g; /^#/d' .env | xargs)
```

## Local

```sh
mysqldump \
  -h 127.0.0.1 \
  -P 3306 \
  -u root \
  -p'root' \
  wordpress_dev \
  > ./dump-local.sql

mysql \
  -h 127.0.0.1 \
  -P 3306 \
  -u root \
  -p'root' \
  wordpress_dev \
  < ./dump-prod.sql

mysql \
  -h 127.0.0.1 \
  -P 3306 \
  -D wordpress_dev \
  -u root \
  -p'root' \
  -v <<-\EOSQL
UPDATE `wp_options` SET `option_value` = "http://127.0.0.1:8000" WHERE `wp_options`.`option_name` = "siteurl";
UPDATE `wp_options` SET `option_value` = "http://127.0.0.1:8000" WHERE `wp_options`.`option_name` = "home";
EOSQL

wp option get authLDAPOptions \
  --path='wp'

wp option update authLDAPOptions --format=json < <(cat << EOF
{
  "Enabled": "1",
  "CachePW": false,
  "URI": "",
  "URISeparator": "",
  "Filter": "",
  "NameAttr": "",
  "SecName": "",
  "UidAttr": "",
  "MailAttr": "",
  "WebAttr": "",
  "Groups": {
    "administrator": "",
    "editor": "",
    "author": "",
    "contributor": "",
    "subscriber": ""
  },
  "Debug": false,
  "GroupAttr": "",
  "GroupFilter": "",
  "DefaultRole": "author",
  "GroupEnable": false,
  "GroupOverUser": "1",
  "Version": 1,
  "DoNotOverwriteNonLdapUsers": false,
  "StartTLS": false,
  "GroupSeparator": "",
  "GroupBase": ""
}
EOF
)
```

## Develop

```sh
dotenv -- mysqldump \
  -h silo01.mysql.bdh.desenv.bb.com.br \
  -P 3306 \
  -u user_fabrica_software \
  -p"$MYSQL_DEVELOP_ROOT_PASSWORD" \
  --set-gtid-purged=OFF \
  --column-statistics=0 \
  fabricaSoftwareDev \
  > ./dump-develop.sql

du -h ./dump-develop.sql

mysql \
  -h silo01.mysql.bdh.desenv.bb.com.br \
  -P 3306 \
  -u user_fabrica_software \
  -p"$MYSQL_DEVELOP_ROOT_PASSWORD" \
  fabricaSoftwareDev \
  < ./dump-prod.sql

mysql \
  -h silo01.mysql.bdh.desenv.bb.com.br \
  -P 3306 \
  -u user_fabrica_software \
  -p"$MYSQL_DEVELOP_ROOT_PASSWORD" \
  fabricaSoftwareDev \
  -ve 'SHOW TABLES;'

mysql \
  -h silo01.mysql.bdh.desenv.bb.com.br \
  -P 3306 \
  -D fabricaSoftwareDev \
  -u user_fabrica_software \
  -p"$MYSQL_DEVELOP_ROOT_PASSWORD" \
  -v <<-\EOSQL
UPDATE `wp_options` SET `option_value` = "http://portal.stt.desenv.bb.com.br" WHERE `wp_options`.`option_name` = "siteurl";
UPDATE `wp_options` SET `option_value` = "http://portal.stt.desenv.bb.com.br" WHERE `wp_options`.`option_name` = "home";
EOSQL
```

## Staging

```sh
mysqldump \
  -h silo01.mysql.bdh.hm.bb.com.br \
  -P 3306 \
  -u user_fabrica_software \
  -p"$MYSQL_STAGING_ROOT_PASSWORD" \
  --set-gtid-purged=OFF \
  --column-statistics=0 \
  fabricaSoftwareHm \
  > ./dump-staging.sql

du -h ./dump-staging.sql

mysql \
  -h silo01.mysql.bdh.hm.bb.com.br \
  -P 3306 \
  -u user_fabrica_software \
  -p"$MYSQL_STAGING_ROOT_PASSWORD" \
  fabricaSoftwareHm \
  < ./dump-prod.sql

mysql \
  -h silo01.mysql.bdh.hm.bb.com.br \
  -P 3306 \
  -u user_fabrica_software \
  -p"$MYSQL_STAGING_ROOT_PASSWORD" \
  fabricaSoftwareHm \
  -ve 'SHOW TABLES;'

mysql \
  -h silo01.mysql.bdh.hm.bb.com.br \
  -P 3306 \
  -D fabricaSoftwareHm \
  -u user_fabrica_software \
  -p"$MYSQL_STAGING_ROOT_PASSWORD" \
  -v <<-\EOSQL
UPDATE `wp_options` SET `option_value` = "http://portal.stt.hm.bb.com.br/" WHERE `wp_options`.`option_name` = "siteurl";
UPDATE `wp_options` SET `option_value` = "http://portal.stt.hm.bb.com.br/" WHERE `wp_options`.`option_name` = "home";
EOSQL
```

## Production

```sh
mysqldump \
  -h silo02-master.mysql.bdh.servicos.bb.com.br \
  -P 3306 \
  -u user_fabrica_software \
  -p"$MYSQL_PROD_ROOT_PASSWORD" \
  --set-gtid-purged=OFF \
  --column-statistics=0 \
  fabricaSoftware \
  > ./dump-prod.sql

du -h ./dump-prod.sql

mysql \
  -h silo02-master.mysql.bdh.servicos.bb.com.br \
  -P 3306 \
  -u user_fabrica_software \
  -p"$MYSQL_PROD_ROOT_PASSWORD" \
  fabricaSoftware \
  < ./dump-*.sql

mysql \
  -h silo02-master.mysql.bdh.servicos.bb.com.br \
  -P 3306 \
  -u user_fabrica_software \
  -p"$MYSQL_PROD_ROOT_PASSWORD" \
  fabricaSoftware \
  -ve 'SHOW TABLES;'

mysql \
  -h silo02-master.mysql.bdh.servicos.bb.com.br \
  -P 3306 \
  -D fabricaSoftware \
  -u user_fabrica_software \
  -p"$MYSQL_PROD_ROOT_PASSWORD" \
  -v <<-\EOSQL
UPDATE `wp_options` SET `option_value` = "http://portal.stt.intranet.bb.com.br/" WHERE `wp_options`.`option_name` = "siteurl";
UPDATE `wp_options` SET `option_value` = "http://portal.stt.intranet.bb.com.br/" WHERE `wp_options`.`option_name` = "home";
EOSQL
```

## Kubernetes

```sh
#
kubectx bb-prod

#
kubectl get pod -n stt-fabrica

kubectl exec -it \
  $(kubectl get pod -l 'app=bb-aplic' -o jsonpath='{.items[0].metadata.name}' -n stt-fabrica) \
  -n stt-fabrica \
  -- /bin/bash
```
