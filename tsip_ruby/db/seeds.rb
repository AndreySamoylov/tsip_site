return if Film.exists? && Fact.exists? && Genre.exists? && Actor.exists?

films = Film.create!([
                      { title: 'Чужой',
                        year: '1979',
                        budget: '11000000',
                        description: 'В космосе никто не услышит твоего крика',
                        poster_link: 'https://drive.google.com/file/d/1Ey2NI0v_nhlLfqHE2LBjV_qZXweiFNLt/view?usp=drive_link',
                        iframe_link: '<iframe width="720" height="405" src="https://rutube.ru/play/embed/df4ce5db4f57f9ce306c6b0a332e3b34/" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
                        country: 'Америка' }
                    ])

facts = Fact.create!([
                      { film_id: films[0].id, description: 'Сцена с лицехватом снималась вверх ногами' }, # чужой 1979
                      { film_id: films[0].id, description: 'Актеры не были подготовлены к сцене с грудоломом' }, # чужой 1979
                      { film_id: films[0].id, description: 'Чужого сыграл очень худой нигерийский студент' }, # чужой 1979
                      { film_id: films[0].id, description: 'Зрители на тестовых показах испытывали приступы тошноты и падали в обморок' }, # чужой 1979
                      { film_id: films[0].id, description: 'В первый уикенд фильм заработал $3,5 млн' } # чужой 1979
                    ])

genres = Genre.create!([
                      { description: 'Научная фантастика' }, # 0
                      { description: 'Ужасы' }, # 1
                      { description: 'Боевик' }, # 2
                      { description: 'Комедия' }, # 3
                      { description: 'Драма' }, # 4
                      { description: 'Исторический' }, # 5
                      { description: 'Детектив' }, # 6
                      { description: 'Аниме' }, # 7
                      { description: 'Биография' }, # 8
                      { description: 'Фэнтези' }, # 9
                      { description: 'Дорама' }, # 10
                      { description: 'Документальное' } # 11
                    ])

actors = Actor.create!([
                      { last_name: 'Сигурни', first_name: 'Уивер', country: 'Америка' }, # 0
                      { last_name: 'Том', first_name: 'Скеррит', country: 'Америка' }, # 1
                      { last_name: 'Вероника', first_name: 'Картрайт', country: 'Америка' }, # 2
                      { last_name: 'Джон', first_name: 'Хёрт', country: 'Америка' }, # 3
                      { last_name: 'Гарри Дин', first_name: 'Стэнтон', country: 'Америка' }, # 4
                      { last_name: 'Иэн', first_name: 'Холм', country: 'Великобритания' } # 5
                    ])

films_actors = FilmsActor.create!([
                      { film_id: films[0], actor_id: actors[0] },
                      { film_id: films[0], actor_id: actors[1] },
                      { film_id: films[0], actor_id: actors[2] },
                      { film_id: films[0], actor_id: actors[3] },
                      { film_id: films[0], actor_id: actors[4] },
                      { film_id: films[0], actor_id: actors[5] }
                    ])

films_genres = FilmsGenre.create!([
                      { film_id: films[0], genre_id: genres[0] },
                      { film_id: films[0], genre_id: genres[1] },
                      { film_id: films[0], genre_id: genres[2] }
                    ])
