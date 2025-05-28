# Руководство по запуску ruby-проекта

## Техническая конфигурация:

- Ruby 3.2.0

- Rails 8.0.1

- Mac OS Montery 12.7.4

- Windows 7, 8, 10, 11

- Linux Ubuntu

## Команды по установке руби:

### Варинаты установки RVM:

#### apt (Debian или Ubuntu):
`$ sudo apt-get install ruby-full`

#### Homebrew (macOS):
`$ brew install ruby`

#### В Windows:
[Руководство по установке](https://rubyrush.ru/steps/setup-ruby#:~:text=%D0%94%D0%BB%D1%8F%20Windows%20%D0%B5%D1%81%D1%82%D1%8C%20%D1%81%D0%BF%D0%B5%D1%86%D0%B8%D0%B0%D0%BB%D1%8C%D0%BD%D0%B0%D1%8F%20%D0%B2%D0%B5%D1%80%D1%81%D0%B8%D1%8F,%D0%B8%20%D0%B6%D0%B4%D0%B5%D0%BC%2C%20%D0%BF%D0%BE%D0%BA%D0%B0%20%D1%83%D1%81%D1%82%D0%B0%D0%BD%D0%BE%D0%B2%D0%BA%D0%B0%20%D0%B7%D0%B0%D0%BA%D0%BE%D0%BD%D1%87%D0%B8%D1%82%D1%81%D1%8F.)

### Установить завиисмости:

#### В mac os и ubuntu:
`bundle install`

#### В Windows:
[Bundle Generator](https://apps.microsoft.com/detail/9nblggh43pmq?amp%3Bgl=RU&hl=ru-RU&gl=RU)

## Команды в терминале, чтобы запустить приложение:

### for run local server
`rails s`

### to open app console
`rails c`

### В Windows:
`bin/rails server`
