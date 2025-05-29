class CreateFilms < ActiveRecord::Migration[8.0]
  def change
    create_table :films do |t|
      t.string :title, null: false
      t.string :year, null: false
      t.string :budget, null: false
      t.string :description, null: false
      t.string :poster_link, null: false
      t.string :iframe_link, null: false
      t.string :country, null: false

      t.timestamps
    end
  end
end
