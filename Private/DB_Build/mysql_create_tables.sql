CREATE DATABASE db_wine_app;

USE db_wine_app;

CREATE TABLE wine (
  wine_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  wine_name VARCHAR (100) NOT NULL,
  country VARCHAR (100) NOT NULL,
  description CLOB,
  price_per_bottle DOUBLE(10, 2) NOT NULL,
  bottles_per_case INTEGER NOT NULL
  asset_link VARCHAR (255)
);

CREATE TABLE customer (
  customer_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  first_name VARCHAR (100) NOT NULL,
  last_name VARCHAR (100) NOT NULL,
  phone_number VARCHAR (15),
  email_address VARCHAR (255) NOT NULL,
  password VARCHAR (255) NOT NULL,
);

CREATE TABLE address (
  address_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  door_number_name VARCHAR (25) NOT NULL,
  street _name VARCHAR (255),
  city VARCHAR (255),
  county VARCHAR (255),
  post_code VARCHAR (10)
);

CREATE TABLE wish_list (
  wish_list_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  watch TINYINT NOT NULL
);

CREATE TABLE stock_hold (
  stock_hold_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  quantity INTEGER NOT NULL DEFAULT = 0,
);
