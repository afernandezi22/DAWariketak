FROM mysql:8.2

# .sql scriptak /docker-entrypoint-initdb.d direktorioan kopiatzen dugu
COPY 01BD_sortu.sql /docker-entrypoint-initdb.d/
COPY 02BD_txertatu_datuak.sql /docker-entrypoint-initdb.d/

EXPOSE 3306
CMD ["mysqld", "--daemonize=0"]