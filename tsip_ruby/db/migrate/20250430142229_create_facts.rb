class CreateFacts < ActiveRecord::Migration[8.0]
  def change
    create_table :facts do |t|
      t.references :film, null: false, foreign_key: { to_table: :films }
      t.string :description, null: false

      t.timestamps
    end
  end
end
