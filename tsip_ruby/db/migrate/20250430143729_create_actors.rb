class CreateActors < ActiveRecord::Migration[8.0]
  def change
    create_table :actors do |t|
      t.string :first_name, null: :false
      t.string :last_name, null: :false
      t.string :country, null: false

      t.timestamps
    end
  end
end
