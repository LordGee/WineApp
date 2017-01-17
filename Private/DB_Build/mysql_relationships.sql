ALTER TABLE wine
ADD COLUMN category_id_fk INT NOT NULL;
ALTER TABLE wine
ADD FORIEGN KEY fk_category_id (category_id_fk) REFERENCES category (category_id);
