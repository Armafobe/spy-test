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

INSERT INTO mission (title, description, code_name, country, start_date, end_date, skill_id, mission_type_id, mission_status_id) VALUES 
('Return of the Scorpions', 'Have the heir of the French family Belmont whether he\'s a member of the Necrofire Cult.', 'Gold Lime Lion', 'Morocco', '2022-07-01 09:00', '2022-08-01 00:00', 2, 5, 2),
('Darkest Hope', 'Retrieve the target\'s offshore bank account and transfer the money on Saint-Joseph orphanage.', 'Platinum Purple Cat', 'Haiti', '2022-08-28 11:30:00', '2022-09-03 16:45:00', 1, 3, 1),
('Brilliant King', 'Find and kill the leader of the Chinese mafia.', 'Copper Blue Alligator', 'China', '2022-04-05 06:00', '2022-04-25 06:00', 8, 1, 3),
('Rain of the Lion', 'Make a copy of the queen\'s jewels, rob the original ones and replace them with the copy.', 'Aluminium Red Chicken', 'Finland', '2022-06-12 19:45', '2022-09-12 23:00', 9, 7, 2),
('Last Roar', 'Infiltrate the consolate and put our target\'s folder in the criminal records.', 'Titanium Green Leopard', 'Brazil', '2022-09-30 01:00', '2022-11-15 15:45', 3, 2, 2),
('Ladies Glory', 'Get our target to spend his money on the new hospital charity.', 'Steel Turquoise Dog', 'Poland', '2022-12-25 00:00', '2022-12-26 00:00', 5, 7, 1),
('Sleeping Eagle', 'Kidnap our target in order to have him cancel the fundraising for the creation of a nuclear power plant. Fight if necessary.', 'Lead Silver Shark', 'Indonesia', '2022-03-01 00:00', '2022-03-02 14:00', 7, 6, 4),
('Acid Rain', 'Harass and blackmail our target to convince him to tell his wife about his mistress.', 'Diamond Pink Dolphin', 'Thailand', '2022-05-30 15:45', '2022-08-31 17:15', 4, 8, 2),
('Nightfall', 'Trick our target in telling us about the location of the drug dealers HQs.', 'Bronze Aqua Iguana', 'Argentina', '2022-02-06 06:30', '2022-02-20 19:00', 10, 5, 4),
('Sky Guardian', 'Rob the plans of the new army\'s submarine out of our target\'s safe.', 'Brass Orange Cow', 'Malaysia', '2022-05-07 10:45', '2022-06-07 17:00', 6, 4, 3);

INSERT INTO agent_skill (agent_id, skill_id) VALUES 
(1, 7),
(1, 8),
(2, 1),
(2, 4),
(3, 2),
(3, 5),
(3, 10),
(4, 3),
(4, 6),
(5, 9);

INSERT INTO mission_agent (mission_id, agent_id) VALUES
(1, 3),
(2, 2),
(3, 1),
(4, 4),
(4, 5),
(5, 2),
(5, 4),
(6, 3),
(7, 1),
(8, 2),
(9, 3),
(10, 3),
(10, 4);

INSERT INTO hideout (code, address, type, country_id, mission_id) VALUES
('Shadow Cover', '4889 Bunker Hill Hill', 'Basement', '9', '10'),
('Deepmantle Harbor', '50994 Messerschmidt Point', 'Barber Shop', '2', '6'),
('Nightshield Escape', '2794 Fulton Circle', 'Attic', '3', '8'),
('Monolith Haven', '56 Walton Center', 'Opera Lodge', '14', '9'),
('Sisterhood Cave', '3008 Anniversary Alley', 'Yacht', '8', '1'),
('Lightwork Hideaway', '2451 Golf Course Junction', 'Retirement Home', '4', '5');

INSERT INTO mission_contact (mission_id, contact_id) VALUES
(1, 8),
(2, 6),
(3, 10),
(4, 15),
(5, 4),
(6, 2),
(7, 1),
(8, 3),
(9, 14),
(10, 9);

INSERT INTO target (last_name, first_name, birth_date, code_name, nationality_id, mission_id) VALUES
('Kilius', 'Doyle', '1989-03-01', 'Alopex Lagopus', 8, 1),
('Harbison', 'Misha', '1959-04-18', 'Acanthaster planci', 13, 2),
('Domeny', 'Olympie', '1986-01-14', 'Macaca nemestrina', 10, 3),
('Purves', 'Lilith', '1953-04-23', 'Pterocles gutturalis', 15, 4),
('Rumming', 'Letisha', '1980-05-06', 'Platalea leucordia', 3, 5),
('Reaveley', 'Fredericka', '1965-03-21', 'Tayassu pecari', 5, 6),
('Milmo', 'Daile', '1954-07-01', 'Ratufa indica', 12, 7),
('Winspurr', 'Conrado', '1970-12-18', 'Pteronura brasiliensis', 3, 8),
('Bazley', 'Hannah', '1960-12-02', 'Geochelone radiata', 4, 9),
('Farress', 'Marj', '1967-01-24', 'Trichoglossus chlorolepidotus', 11, 10);
