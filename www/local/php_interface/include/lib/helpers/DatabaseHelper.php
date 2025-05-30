<?php
namespace helpers;

final class DatabaseHelper
{
    private const DATABASE_HOSTNAME = 'MySQL-8.0';
    private const DATABASE_ROOT_USERNAME = 'root';
    private const DATABASE_ROOT_PASSWORD = '';
    private const DATABASE_TABLE_NAME = 'kinopoisk';

    private const TB_FILMS = 'films';
    private const TB_FILMS_DETAILS = 'film_details';
    private const TB_FILMS_GENRES = 'film_genres';
    private const TB_GENRES = 'genres';
    private const TB_FILMS_ACTORS = 'film_actors';
    private const TB_ACTORS = 'actors';

    public function __construct()
    {

    }

    public function connect(): void
    {
        $this->connection = mysqli_connect(
            self::DATABASE_HOSTNAME,
            self::DATABASE_ROOT_USERNAME,
            self::DATABASE_ROOT_PASSWORD,
            self::DATABASE_TABLE_NAME
        );
        if (!$this->connection) {
            throw new Exception('Не удалось установить подключение');
        }

        if (!\Bitrix\Main\Loader::includeModule('Iblock')) {
             throw new Exception('Не установлен модуль инфоблоков');
        }
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }

    public function getFilms() : ?array{
        // Получить информацию о фильмах
        $query = "SELECT * FROM ". self::TB_FILMS . " 
            INNER JOIN " . self::TB_FILMS_DETAILS . " 
            ON ". self::TB_FILMS .".id = " . self::TB_FILMS_DETAILS . ".film_id
            ;";

        $resultFilms = $this->connection->query($query);

        $films = [];
        while ($film = $resultFilms->fetch_assoc()) {

            // Получить информацию о жанрах
            $query = "SELECT * FROM ". self::TB_FILMS_GENRES . " 
                INNER JOIN " . self::TB_GENRES . " 
                ON ". self::TB_FILMS_GENRES .".genre_id = " . self::TB_GENRES . ".id
                WHERE " . self::TB_FILMS_GENRES  . ".film_id = ". $film['id'] . " ;";

            $resultGenres = $this->connection->query($query);

            $genres = [];
            while ($genre = $resultGenres->fetch_assoc()) {
                $genres[$genre['id']] = $genre['name'];
            }

            // Получить информацию о актёрах
            $query = "SELECT * FROM ". self::TB_FILMS_ACTORS . " 
                INNER JOIN " . self::TB_ACTORS . " 
                ON ". self::TB_FILMS_ACTORS .".actor_id = " . self::TB_ACTORS . ".id
                WHERE " . self::TB_FILMS_ACTORS  . ".film_id = ". $film['id'] . " ;";

            $resultActors = $this->connection->query($query);
            $actors = [];
            while ($actor = $resultActors->fetch_assoc()) {

                $actors[$actor['id']] = array(
                    "FIRSTNAME" => $actor['firstname'],
                    "LASTNAME" => $actor['lastname'],
                    "BIRTHDAY" => $actor['birthday'],
                    "GENDER" => $actor['gender'],
                );
            }


            $film['GENRES'] = $genres;
            $film['ACTORS'] = $actors;

            $films[] = $film;
        }

        return $films ?: [];
    }
}