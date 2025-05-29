class CreateFilmsGenre < ActiveRecord::Migration[8.0]
  def change
    create_table :films_genres do |t|
      t.references :film, null: false, foreign_key: { to_table: :films }
      t.references :genre, null: false, foreign_key: { to_table: :genres }

      t.timestamps
    end
  end
end
