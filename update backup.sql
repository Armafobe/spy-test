UPDATE `spy`.`mission` SET `title`='Return of the Scorpions', `description`="Have the heir of the French family Belmont tell us whether he's a member of a cult.",`code_name`='Gold Lime Lion', `country`='Morocco', `start_date`='2022-07-01 09:00:00', `end_date`='2022-08-01 00:00:00', `mission_type_id`='5' WHERE  `id`=1;

UPDATE `spy`.`mission` SET `title`='Darkest Hope', `description`="Find the target's offshore bank account and transfer the savings on Saint-Joseph orphanage.", `code_name`='Platinum Purple Cat', `country`='Haiti', `start_date`='2022-08-28 11:30:00', `end_date`='2022-09-03 16:45:00', `skill_id`='1', `mission_type_id`='3', `mission_status_id`='1' WHERE  `id`=2;

UPDATE `spy`.`mission` SET `title`='Brilliant King', `description`='Find and kill the leader of the Chinese mafia. Discretion and carefulness advised.', `code_name`='Copper Blue Alligator', `country`='China', `start_date`='2022-04-05 06:00:00', `end_date`='2022-04-25 06:00:00', `skill_id`='8', `mission_type_id`='1', `mission_status_id`='3' WHERE  `id`=3;

UPDATE `spy`.`mission` SET `title`='Rain of the Lion', `description`="Make a copy of the queen's jewels, rob the original ones and replace them with the copy.", `code_name`='Aluminium Red Chicken', `country`='Finland', `start_date`='2022-06-12 19:45:00', `end_date`='2022-09-12 23:00:00', `skill_id`='9', `mission_type_id`='7' WHERE  `id`=4;

UPDATE `spy`.`mission` SET `title`='Last Roar', `description`="Infiltrate the consolate and put our target's folder in the criminal records.", `code_name`='Titanium Green Leopard', `country`='Brazil', `start_date`='2022-09-30 01:00:00', `end_date`='2022-11-15 15:45:00', `skill_id`='3', `mission_type_id`='2' WHERE  `id`=5;

UPDATE `spy`.`mission` SET `title`='Ladies Glory', `description`='Get our target to spend his money on the new hospital charity.', `code_name`='Steel Turquoise Dog', `country`='Poland', `start_date`='2022-12-25 00:00:00', `end_date`='2022-12-26 00:00:00', `skill_id`='5', `mission_type_id`='7', `mission_status_id`='1' WHERE  `id`=6;

UPDATE `spy`.`mission` SET `title`='Sleeping Eagle', `description`='Kidnap our target in order to have him cancel the fundraising for the creation of a nuclear power plant. Fight if necessary.', `code_name`='Lead Silver Shark', `start_date`='2022-03-01 00:00:00', `end_date`='2022-03-02 14:00:00', `skill_id`='7', `mission_type_id`='6', `mission_status_id`='4' WHERE  `id`=7;

UPDATE `spy`.`mission` SET `title`='Acid Rain', `description`='Harass and blackmail our target to convince him to tell his wife about his mistress.', `code_name`='Diamond Pink Dolphin', `country`='Thailand', `start_date`='2022-05-30 15:45:00', `end_date`='2022-08-31 17:15:00', `skill_id`='4', `mission_type_id`='8' WHERE 'id' = 8;

UPDATE `spy`.`mission` SET `title`='Nightfall', `description`='Trick our target in telling us about the location of the drug dealers HQs.', `code_name`='Bronze Aqua Iguana', `country`='Argentina', `start_date`='2022-02-06 06:30:00', `end_date`='2022-02-20 19:00:00', `skill_id`='10', `mission_type_id`='5', `mission_status_id`='4' WHERE  `id`=9;

UPDATE `spy`.`mission` SET `title`='Sky Guardian', `description`="Rob the plans of the new army's submarine out of our target's safe.", `code_name`='Brass Orange Cow', `country`='Malaysia', `start_date`='2022-05-07 10:45:00', `end_date`='2022-06-07 17:00:00', `skill_id`='6', `mission_status_id`='3' WHERE  `id`=10;

INSERT INTO `mission` VALUES (1, 'Return of the Scorpions', 'Have the heir of the French family Belmont tell us whether he\'s a member of a cult.', 'Gold Lime Lion', 'Morocco', '2022-07-01 09:00:00', '2022-08-01 00:00:00', 2, 5, 2);
INSERT INTO `mission` VALUES (2, 'Darkest Hope', 'Find the target\'s offshore bank account and transfer the savings on Saint-Joseph orphanage.', 'Platinum Purple Cat', 'Haiti', '2022-08-28 11:30:00', '2022-09-03 16:45:00', 1, 3, 1);
INSERT INTO `mission` VALUES (3, 'Brilliant King', 'Find and kill the leader of the Chinese mafia. Discretion and carefulness advised.', 'Copper Blue Alligator', 'China', '2022-04-05 06:00:00', '2022-04-25 06:00:00', 8, 1, 3);
INSERT INTO `mission` VALUES (4, 'Rain of the Lion', Make a copy of the queen\'s jewels, rob the original ones and replace them with the copy.', 'Aluminium Red Chicken', 'Finland', '2022-06-12 19:45:00', '2022-09-12 23:00:00', 9, 7, 2);
INSERT INTO `mission` VALUES (5, 'Last Roar', 'Infiltrate the consolate and put our target\'s folder in the criminal records.', 'Titanium Green Leopard', 'Brazil', '2022-09-30 01:00:00', '2022-11-15 15:45:00', 3, 2, 2);
INSERT INTO `mission` VALUES (6, 'Ladies Glory', 'Get our target to spend his money on the new hospital charity.', 'Steel Turquoise Dog', 'Poland', '2022-12-25 00:00:00', '2022-12-26 00:00:00', 5, 7, 1);
INSERT INTO `mission` VALUES (7, 'Sleeping Eagle', 'Kidnap our target in order to have him cancel the fundraising for the creation of a nuclear power plant. Fight if necessary.', 'Lead Silver Shark', 'Indonesia', '2022-03-01 00:00:00', '2022-03-02 14:00:00', 7, 6, 4);
INSERT INTO `mission` VALUES (8, 'Acid Rain', 'Harass and blackmail our target to convince him to tell his wife about his mistress.', 'Diamond Pink Dolphin', 'Thailand', '2022-05-30 15:45:00', '2022-08-31 17:15:00', 4, 8, 2);
INSERT INTO `mission` VALUES (9, 'Nightfall', 'Trick our target in telling us about the location of the drug dealers HQs.', 'Bronze Aqua Iguana', 'Argentina', '2022-02-06 06:30:00', '2022-02-20 19:00:00', 10, 5, 4);
INSERT INTO `mission` VALUES (10, 'Sky Guardian', 'Rob the plans of the new army\'s submarine out of our target\'s safe.', 'Brass Orange Cow', 'Malaysia', '2022-05-07 10:45:00', '2022-06-07 17:00:00', 6, 4, 3);


INSERT INTO `agent_skill` VALUES (2, 1);
INSERT INTO `agent_skill` VALUES (3, 2);
INSERT INTO `agent_skill` VALUES (4, 3);
INSERT INTO `agent_skill` VALUES (2, 4);
INSERT INTO `agent_skill` VALUES (3, 5);
INSERT INTO `agent_skill` VALUES (4, 6);
INSERT INTO `agent_skill` VALUES (1, 7);
INSERT INTO `agent_skill` VALUES (1, 8);
INSERT INTO `agent_skill` VALUES (5, 9);
INSERT INTO `agent_skill` VALUES (3, 10);
