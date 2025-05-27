# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# This file is the source Rails uses to define your schema when running `bin/rails
# db:schema:load`. When creating a new database, `bin/rails db:schema:load` tends to
# be faster and is potentially less error prone than running all of your
# migrations from scratch. Old migrations may fail to apply correctly if those
# migrations use external dependencies or application code.
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema[8.0].define(version: 2025_04_30_144143) do
  # These are extensions that must be enabled in order to support this database
  enable_extension "pg_catalog.plpgsql"

  create_table "actors", force: :cascade do |t|
    t.string "first_name"
    t.string "last_name"
    t.string "country", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "facts", force: :cascade do |t|
    t.bigint "film_id", null: false
    t.string "description", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["film_id"], name: "index_facts_on_film_id"
  end

  create_table "films", force: :cascade do |t|
    t.string "title", null: false
    t.string "year", null: false
    t.string "budget", null: false
    t.string "description", null: false
    t.string "poster_link", null: false
    t.string "iframe_link", null: false
    t.string "country", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  create_table "films_actors", force: :cascade do |t|
    t.bigint "film_id", null: false
    t.bigint "actor_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["actor_id"], name: "index_films_actors_on_actor_id"
    t.index ["film_id"], name: "index_films_actors_on_film_id"
  end

  create_table "films_genres", force: :cascade do |t|
    t.bigint "film_id", null: false
    t.bigint "genre_id", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["film_id"], name: "index_films_genres_on_film_id"
    t.index ["genre_id"], name: "index_films_genres_on_genre_id"
  end

  create_table "genres", force: :cascade do |t|
    t.string "description", null: false
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  add_foreign_key "facts", "films"
  add_foreign_key "films_actors", "actors"
  add_foreign_key "films_actors", "films"
  add_foreign_key "films_genres", "films"
  add_foreign_key "films_genres", "genres"
end
