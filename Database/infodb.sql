SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";


CREATE TABLE `users` (

    -- Primary Key to identify the record
    -- `resume_id` INT PRIMARY KEY AUTO_INCREMENT,

    -- Personal Details
    `full_name` VARCHAR(255),
    `designation` VARCHAR(255),
    `profile_photo_path` VARCHAR(255),

    -- Contact Details
    `mail_id` VARCHAR(255),
    `country_code` VARCHAR(5),
    `mobile_number` VARCHAR(15),
    `address` VARCHAR(500),

    -- Profile Links
    `linkedin_link` VARCHAR(255),
    `github_link` VARCHAR(255),
    `codechef_link` VARCHAR(255),
    `leetcode_link` VARCHAR(255),
    `hackerrank_link` VARCHAR(255),
    `hackerearth_link` VARCHAR(255),

    -- About
    `career_objective` VARCHAR(750),

    -- Education
    `degree_name` VARCHAR(255),
    `specialization` VARCHAR(255),
    `degree_place` VARCHAR(255),
    `degree_duration` VARCHAR(50),
    `degree_cgpa` DECIMAL(4, 2),
    `senior_secondary_name` VARCHAR(255),
    `senior_secondary_specialization` VARCHAR(255),
    `senior_secondary_place` VARCHAR(255),
    `senior_secondary_duration` VARCHAR(50),
    `senior_secondary_gpa` DECIMAL(4, 2),
    `secondary_place` VARCHAR(255),
    `secondary_duration` VARCHAR(50),
    `secondary_gpa` DECIMAL(4, 2),

    -- Skills
    `skills_json` JSON, 

    -- Certifications
    `certification_name_json` JSON, 
    `certification_by_json` JSON, 
    `certification_year_json` JSON, 

    -- Projects
    `project_name_json` JSON, 
    `project_tasks_json` JSON, 
    `project_tech_json` JSON, 
    `project_link_json` JSON, 

    -- Certifications
    `achievements_json` JSON,

    -- experience
    `experience_role_json` JSON, 
    `experience_company_json` JSON, 
    `experience_duration_json` JSON, 
    `experience_description_json` JSON

    
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

