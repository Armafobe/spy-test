CREATE DATABASE IF NOT EXISTS spy CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE spy;

CREATE TABLE IF NOT EXISTS admin (
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	last_name VARCHAR(60) NOT NULL,
	first_name VARCHAR(60) NOT NULL,
	email CHAR(100) NOT NULL UNIQUE,
	password CHAR(255) NOT NULL,
	creation_date DATE NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS nationality (
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	country VARCHAR(60) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS country (
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    	name VARCHAR(60) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS agent (
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	last_name VARCHAR(60) NOT NULL,
	first_name VARCHAR(60) NOT NULL,
	birth_date DATE NOT NULL,
	code_id CHAR(60) NOT NULL,
	nationality_id INT(11) NOT NULL,
	CONSTRAINT FK_nationality_id FOREIGN KEY (nationality_id) REFERENCES nationality(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS skill (
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name VARCHAR(60) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS agent_skill (
	agent_id INT(11) NOT NULL,
	skill_id INT(11) NOT NULL,
	PRIMARY KEY (agent_id, skill_id),
	CONSTRAINT FK_agent_id FOREIGN KEY (agent_id) REFERENCES agent(id),
	CONSTRAINT FK_skill_id FOREIGN KEY (skill_id) REFERENCES skill(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS mission_status (
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	status VARCHAR(60) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS mission_type (
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	type VARCHAR(60) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS mission (
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	title VARCHAR(60) NOT NULL,
	description TINYTEXT NOT NULL,
	code_name VARCHAR(60) NOT NULL,
	country VARCHAR(60) NOT NULL,
	start_date DATETIME NOT NULL,
	end_date DATETIME NOT NULL,
	skill_id INT(11) NOT NULL,
	mission_type_id INT(11) NOT NULL,
	mission_status_id INT(11) NOT NULL,
	CONSTRAINT FK_skill_id_mission FOREIGN KEY (skill_id) REFERENCES skill(id),
	CONSTRAINT FK_mission_type_id FOREIGN KEY (mission_type_id) REFERENCES mission_type(id),
	CONSTRAINT FK_mission_status_id FOREIGN KEY (mission_status_id) REFERENCES mission_status(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS mission_agent (
	mission_id INT(11) NOT NULL,
	agent_id INT(11) NOT NULL,
	PRIMARY KEY (mission_id, agent_id),
	CONSTRAINT FK_mission_id_agent FOREIGN KEY (mission_id) REFERENCES mission(id),
	CONSTRAINT FK_agent_id_mission FOREIGN KEY (agent_id) REFERENCES agent(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS target (
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	last_name VARCHAR(60) NOT NULL,
	first_name VARCHAR(60) NOT NULL,
	birth_date DATE NOT NULL,
	code_name VARCHAR(60) NOT NULL,
	nationality_id INT(11) NOT NULL,
	mission_id INT(11) NOT NULL,
	CONSTRAINT FK_nationality_id_target FOREIGN KEY (nationality_id) REFERENCES nationality(id),
	CONSTRAINT FK_mission_id_target FOREIGN KEY (mission_id) REFERENCES mission(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS contact (
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	last_name VARCHAR(60) NOT NULL,
	first_name VARCHAR(60) NOT NULL,
	birth_date DATE NOT NULL,
	code_name VARCHAR(60) NOT NULL,
	nationality_id INT(11) NOT NULL,
	CONSTRAINT FK_nationality_id_contact FOREIGN KEY (nationality_id) REFERENCES nationality(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS mission_contact (
	mission_id INT(11) NOT NULL,
	contact_id INT(11) NOT NULL,
	PRIMARY KEY (mission_id, contact_id),
	CONSTRAINT FK_mission_id_contact FOREIGN KEY (mission_id) REFERENCES mission(id),
	CONSTRAINT FK_contact_id FOREIGN KEY (contact_id) REFERENCES contact(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS hideout (
	id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    code CHAR(60) NOT NULL,
    address VARCHAR(100) NOT NULL,
    type VARCHAR(100) NOT NULL,
    country_id INT(11) NOT NULL,
    mission_id INT(11) NOT NULL,
    CONSTRAINT FK_country_id FOREIGN KEY (country_id) REFERENCES country(id),
    CONSTRAINT FK_mission_id_hideout FOREIGN KEY (mission_id) REFERENCES mission(id)
) ENGINE=InnoDB;
