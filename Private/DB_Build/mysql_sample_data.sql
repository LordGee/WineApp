/* CATEGORY TABLE */
INSERT INTO category (wine_colour, wine_type)
VALUES
  ('Red', 'Wine'),
  ('White', 'Wine'),
  ('Rose', 'Wine'),
  (NULL, 'Champagne'),
  (NULL, 'Sparkling');

/* WINE TABLE */
INSERT INTO wine (wine_name, country, bottle_size, description,
                  price_per_bottle, bottles_per_case, asset_link, category_id_fk)
VALUES ('Bereich Nierstein Qba', 'German', 75, 'Easy drinking, medium-dry white with passion fruit flavour. Ideal for Chinese or Thai dishes',
        2.54, 6, '/img/1.jpg', 2),
('Liebfraumilch', 'German', 100, 'Party on down with this easy-drinking, fruity, medium sweet wine.  Serve well chilled.  Serves 8 glasses.',
        2.83, 6, '/img/2.jpg', 2),
('Piersporter Michelsberg', 'German', 150, 'Easy-drinking, floral medium white.  Perfect for parties, serves 12 glasses.',
        4.70, 12, '/img/3.jpg', 2),
('The Bend in the River', 'German', 75, 'Easy-drinking, floral medium white.  Perfect for parties, serves 12 glasses.',
        4.74, 6, '/img/4.jpg', 2),
('Robertson Cabernet Sauvignon', 'South African', 75, 'Smooth, full-bodied style with rich mulberry, plum and cassis supported by soft tannins. The wine is deep red in colour, smooth with good weight, made in a friendly new Cape style with no hard edges. Enjoy now with roast beef, stews, lamb, venison, pasta and steak.',
        3.31, 12, '/img/5.jpg', 1),
('Mouton-Cadet Blanc', 'French', 75, 'Party on down with this easy-drinking, fruity, medium sweet wine.  Serve well chilled.  Serves 8 glasses.',
        5.69, 6, '/img/6.jpg', 1),
('Ogio Pinot Grigio Rosé', 'Italy', 75, 'Pinot Grigio is the grape behind this wine and this juicy strawberry fruit-scented rose makes a really refreshing change to white PG.',
        5.50, 6, '/img/7.jpg', 3),
('Bollinger Rosé Champagne', 'France', 75, 'A subtle combination of structure, length and vivacity, with a tannic finish due to the addition of red wine; flavours of wild berried and bubbles like velvet.',
        45.00, 6, '/img/8.jpg', 4),
('Plaza Centro Prosecco DOC', 'Italy', 75, 'Made in the north-eastern region of Veneto, in Italy, this is such a great style of Prosecco. Full of lively, little bubbles and lovely soft lemon fruit, its fantastically refreshing and works brilliantly as an aperitif. Add a dash of bitters (like Campari) and youve got a jewel-coloured gem of a cocktail.',
        6.75, 6, '/img/9.jpg', 5);