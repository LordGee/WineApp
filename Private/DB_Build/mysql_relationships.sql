ALTER TABLE wine
ADD COLUMN category_id_fk INT NOT NULL;
ALTER TABLE wine
ADD FORIEGN KEY fk_category_id (category_id_fk) REFERENCES category (category_id);

ALTER TABLE customer
ADD COLUMN address_id_fk INT NOT NULL;
ALTER TABLE customer
ADD FOREIGN KEY fk_address_id (address_id_fk) REFERENCES address (address_id);

ALTER TABLE payment
ADD COLUMN customer_id_fk INT NOT NULL;
ALTER TABLE payment
ADD FOREIGN KEY fk_customer_id (customer_id_fk) REFERENCES customer (customer_id);

ALTER TABLE wish_list
ADD COLUMN customer_id_fk INT NOT NULL;
ALTER TABLE wish_list
ADD FOREIGN KEY fk_customer_id (customer_id_fk) REFERENCES customer (customer_id);

ALTER TABLE wish_list
ADD COLUMN wine_id_fk INT NOT NULL;
ALTER TABLE wish_list
ADD FOREIGN KEY fk_wine_id (wine_id_fk) REFERENCES wine (wine_id);

ALTER TABLE customer_order
ADD COLUMN payment_id_fk INT NOT NULL;
ALTER TABLE customer_order
ADD FOREIGN KEY fk_payment_id (payment_id_fk) REFERENCES payment (payment_id);

ALTER TABLE customer_order
ADD COLUMN address_id_fk INT NOT NULL;
ALTER TABLE customer_order
ADD FOREIGN KEY fk_address_id (address_id_fk) REFERENCES address (address_id);

ALTER TABLE customer_order
ADD COLUMN customer_id_fk INT NOT NULL;
ALTER TABLE customer_order
ADD FOREIGN KEY fk_customer_id (customer_id_fk) REFERENCES customer (customer_id);

ALTER TABLE customer_order_line
ADD COLUMN wine_id_fk INT NOT NULL;
ALTER TABLE customer_order_line
ADD FOREIGN KEY fk_wine_id (wine_id_fk) REFERENCES wine (wine_id);

ALTER TABLE customer_order_line
ADD COLUMN customer_order_id_fk INT NOT NULL;
ALTER TABLE customer_order_line
ADD FOREIGN KEY fk_customer_order_id (customer_order_id_fk) REFERENCES customer_order (customer_order_id);

ALTER TABLE stock_content
ADD COLUMN navigation_id_fk INT NOT NULL;
ALTER TABLE stock_content
ADD FOREIGN KEY fk_navigation_id (navigation_id_fk) REFERENCES navigation (navigation_id);

ALTER TABLE stock_hold
ADD COLUMN wine_id_fk INT NOT NULL;
ALTER TABLE stock_hold
ADD FOREIGN KEY fk_wine_id (wine_id_fk) REFERENCES wine (wine_id);

ALTER TABLE campaign_line
ADD COLUMN campaign_id_fk INT NOT NULL;
ALTER TABLE campaign_line
ADD FOREIGN KEY fk_campaign_id (campaign_id_fk) REFERENCES campaign (campaign_id);

ALTER TABLE campaign_line
ADD COLUMN wine_id_fk INT NOT NULL;
ALTER TABLE campaign_line
ADD FOREIGN KEY fk_wine_id (wine_id_fk) REFERENCES wine (wine_id);
