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
  watch TINYINT NOT NULL,
  last_modified DATE
);

CREATE TABLE stock_hold (
  stock_hold_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  quantity INTEGER NOT NULL DEFAULT = 0,
);

CREATE TABLE campaign (
  campaign_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  offer_name VARCHAR (255)
);

CREATE TABLE campaign_line (
  campaign_line_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  start_date DATE NOT NULL,
  finish_date DATE NOT NULL
);

CREATE TABLE category (
  category_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  wine_colour VARCHAR (25),
  wine_type VARCHAR (25)
);

CREATE TABLE customer_order (
  customer_order_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  order_date DATE NOT NULL,
  total_value DOUBLE (10, 2),
);

CREATE TABLE customer_order_line (
  customer_order_line_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  line_value DOUBLE (10, 2) NOT NULL
  quantity INTEGER (10),
  container VARCHAR (255)
);

CREATE TABLE payment (
  payment_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  card_type VARCHAR (50) NOT NULL,
  card_name VARCHAR (100) NOT NULL,
  card_number VARCHAR (16) NOT NULL,
  expiry_date DATE NOT NULL
);

-- Web Management

CREATE TABLE admin (
  admin_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  first_name VARCHAR (100),
  last_name VARCHAR (100) NOT NULL,
  email_address VARCHAR (255) NOT NULL UNIQUE,
  password VARCHAR (255) NOT NULL,
  access_level INTEGER NOT NULL
);

CREATE TABLE navigation (
  navigation_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  page_name VARCHAR (255) NOT NULL,
  url_link VARCHAR (255) NOT NULL,
  access_level INTEGER NOT NULL DEFAULT = 10
);

CREATE TABLE static_content (
  static_content_id INTEGER PRIMARY KEY AUTO-INCREMENT,
  subject_heading VARCHAR (255),
  subject_content CLOB NOT NULL,
  paragraph INTEGER NOT NULL DEFAULT = 1,
  image_link VARCHAR (255),
);
