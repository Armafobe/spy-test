INSERT INTO admin (last_name, first_name, email, password, creation_date) VALUES 
('Prudence', 'Liza', 'lprudence0@addthis.com', '$2y$10$CEhIIG8lC6cU1q9GiJcjJOuQYcnfwR8qr3EREbiai5pGidjtIFp16', '2022-02-15 19:13:49'),
('Pulsford', 'Katalin', 'kpulsford1@salon.com', '$2y$10$I3DXwNiQcDdplVbjkf78ZeKZyRgaigmmvG5IuG.YYpjaLWWIiSXu6', '2021-07-15 21:58:19'),
('Godin', 'Jamison', 'jgodin2@reverbnation.com', '$2y$10$374x6zHaEL0WIQf31Qlvwegpe.seEO1QCrcMpYQ9XcD17ADQY7Osi', '2022-04-10 18:56:47');

INSERT INTO nationality (country) VALUES 
('Indonesia'),
('Poland'),
('Thailand'),
('Brazil'),
('Sweden'),
('Haiti'),
('Vietnam'),
('Morocco'),
('Malaysia'),
('China'),
('Colombia'),
('Uzbekistan'),
('Philippines'),
('Argentina'),
('Finland');

INSERT INTO country (name) VALUES
('Indonesia'),
('Poland'),
('Thailand'),
('Brazil'),
('Sweden'),
('Haiti'),
('Vietnam'),
('Morocco'),
('Malaysia'),
('China'),
('Colombia'),
('Uzbekistan'),
('Philippines'),
('Argentina'),
('Finland');

INSERT INTO agent (last_name, first_name, birth_date, code_id, nationality_id) VALUES
('Aubry', 'Melody', '1986-01-18', 'UBG1PJ', 4),
('Teas', 'Ronni', '1993-08-18', 'CDGP7U', 2),
('McDuffie', 'Oren', '1994-10-04', '0357NJ', 12),
('Faulkes', 'Georgie', '1987-12-28', 'P77TWD', 1),
('Chue', 'Clarette', '1968-12-30', 'ORCX8Q', 7);

INSERT INTO contact (last_name, first_name, birth_date, code_name, nationality_id) VALUES
('Lucken', 'Michelle', '1982-08-02', 'Pohlia Moss', 1),
('Ebden', 'Kayle', '1997-04-03', 'Kobuk Locoweed', 2),
('MacElharge', 'Rolfe', '1979-01-06', 'Balansa Clover', 3),
('Lavin', 'Jens', '1975-06-26', 'Ponderosa Violet', 4),
('Lillford', 'Philbert', '1974-07-01', 'Hill Cane', 5),
('Fantone', 'Becki', '1975-10-16', 'Hound''s Tongue', 6),
('Fraser', 'Christine', '1972-03-01', 'Eggyolk Lichen', 7),
('Le Surf', 'Brodie', '1975-07-25', 'Bog Rosemary', 8),
('Ricardin', 'Cristen', '1975-04-12', 'Monkeypuzzle Tree', 9),
('Isaacson', 'Olwen', '1998-09-10', 'September Elm', 10),
('Oulett', 'Emmit', '1990-09-21', 'Stalkless Yellowcress', 11),
('Lidgley', 'Richie', '1968-11-04', 'Weinmannia', 12),
('Corriea', 'Freemon', '1984-02-15', 'Canadian Blacksnakeroot', 13),
('Deppe', 'Truman', '1991-11-15', 'Chokeberry', 14),
('Endricci', 'Paloma', '1968-03-28', 'Stoloniferous Pussytoes', 15);


INSERT INTO skill (name) VALUES
('IT'),
('Social'),
('Infiltration'),
('Games'),
('Polylanguage'),
('Robbery'),
('Fighting'),
('Weapons'),
('Chemistry'),
('Deception');

INSERT INTO mission_status (status) VALUES
('To be started'),
('Ongoing'),
('Completed'),
('Failure');

INSERT INTO mission_type (type) VALUES
('Assassination'),
('Infiltration'),
('Hacking'),
('Robbery'),
('Information'),
('Kidnapping'),
('Extortion'),
('Intimidation');

INSERT INTO mission (title, description, code_name, start_date, end_date, skill_id, mission_type_id, mission_status_id) VALUES 
('Return of the Scorpions', 'Have the heir of the French family Belmont whether he\'s a member of the Necrofire Cult', 'Gold Lime Lion', '2022-07-01 09:00', '2022-08-01 00:00', 2, 5, 2),
('Darkest Hope', 'Retrieve the target\'s ', 'Platinum Purple Cat', '2022-08-28 11:30:00', '2022-09-03 16:45:00', 1, 3, 1),
('Brilliant King', '', 'Copper Blue Alligator', '2022-04-05 06:00', '2022-04-25 06:00', 8, 1, 3),
('Rain of the Lion', '', 'Aluminium Red Chicken', '2022-06-12 19:45', '2022-09-12 23:00', 9, 7, 2),
('Last Roar', '', 'Titanium Green Leopard', '2022-09-30 01:00', '2022-11-15 15:45', 3, 2, 2),
('Ladies Glory', '', 'Steel Turquoise Dog', '2022-12-25 00:00', '2022-12-26 00:00', 5, 7, 1),
('Sleeping Eagle', '', 'Lead Silver Shark', '2022-03-01 00:00', '2022-03-02 14:00', 7, 6, 4),
('Acid Rain', '', 'Diamond Pink Dolphin', '2022-05-30 15:45', '2022-08-31 17:15', 4, 8, 2),
('Nightfall', '', 'Bronze Aqua Iguana', '2022-02-06 06:30', '2022-02-20 19:00', 10, 5, 4),
('Sky Guardian', '', 'Brass Orange Cow', '2022-05-07 10:45', '2022-06-07 17:00', 6, 4, 3);
