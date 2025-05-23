##Author's technical configuration:

Ruby 3.0.0

Rails 7.1.3.2

Mac OS Montery 12.7.4

##Ruby Installation commands:

Install RVM stable with ruby:
\curl -sSL https://get.rvm.io | bash -s stable --ruby

Установить завиисмости:
bundle install

##Terminal commands to run application:

rails s for run local server

rails c to open app console

##Docker commands:

Для запуска:
docker run

Собирает сервисы, описанные в конфигурационных файлах:
docker compose build

Запускает собранные сервисы:
docker compose up

Запуск контейнеров на фоне:
docker compose up -d

Если какой-то из сервисов завершит работу, то остальные будут остановлены автоматически:
docker compose up --abort-on-container-exit

Запустит сервис application и выполнит внутри команду make install:
docker compose run application make install

Запустить сервис и подключиться к нему с помощью bash
docker compose run application bash

Останавливает и удаляет все сервисы, которые были запущены с помощью up:
docker compose down
