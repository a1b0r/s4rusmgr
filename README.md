# Slim 4 REST user management

git clone https://github.com/a1b0r/s4rusmgr.git
cd s4rusmgr
docker-compose up -d

docker exec -it msql /opt/mssql-tools/bin/sqlcmd -S localhost -U SA -P "p@Ssw0Rd" -i /usr/share/mssql/exp.sql
docker exec -it s4usrmgr composer install

git config --global user.email "a1b0@pm.me"
