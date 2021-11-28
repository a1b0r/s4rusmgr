# Slim 4 REST user management

## Install
```PowerShell
git clone https://github.com/a1b0r/s4rusmgr.git
cd s4rusmgr
docker-compose up -d
docker exec -it msql /opt/mssql-tools/bin/sqlcmd -S localhost -U SA -P "p@Ssw0Rd" -i /usr/share/mssql/exp.sql
docker exec -it s4usrmgr composer install
```
## Test
[Swagger](https://app.swaggerhub.com/apis/a1b0r/s4rusmgr)
```PowerShell
curl.exe -X 'GET' `
  'http://127.0.0.1:8080/users' `
  -H 'accept: application/json'
```

```PowerShell
curl.exe -X 'POST' `
  'http://127.0.0.1:8080/users' `
  -H 'accept: text/html; charset=UTF-8' `
  -H 'Content-Type: application/json' `
  -d @"
[
  {
    \"first_name\": \"Max\",
    \"last_name\": \"Max`$\",
    \"active\": 0
  },
  {
    \"id\": 1,
    \"first_name\": \"Max$3\",
    \"last_name\": \"Max$4\",
    \"active\": 0
  }
]
"@
```

```PowerShell
curl.exe -X 'GET' `
  'http://127.0.0.1:8080/users/4' `
  -H 'accept: application/json'
```


```PowerShell
curl.exe -X 'DELETE' `
  'http://127.0.0.1:8080/users/3' `
  -H 'accept: application/json'
 ```
