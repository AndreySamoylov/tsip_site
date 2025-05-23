class CreateFilmsActors < ActiveRecord::Migration[8.0]
  def change
    create_table :films_actors do |t|
      t.references :film, null: false, foreign_key: { to_table: :films }
      t.references :actor, null: false, foreign_key: { to_table: :actors }

      t.timestamps
    end
  end
end
