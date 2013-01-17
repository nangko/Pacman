INSERT INTO `password`
(`id`,`project_id`,`category_id`,`notes`,`url`,`username`,`password`)
values
(1,1,1,'Test notes','localhost','testuser','testpassword'),
(2,1,1,'Test notes 2','1.1.1.1:3306','testroot','testrootpassword2'),
(3,1,2,'Test FTP notes','1.1.1.1:21','ftptestuser','ftptestpassword3'),
(4,1,2,'Test FTP notes 2','1.2.3.4:21','ftptestuser2','ftptestpassword4');

-- add environments to password

INSERT INTO `password_environment`
(`password_id`,`environment_id`)
values
(1,1), -- Development
(1,2), -- Test
(2,4), -- Production
(3,4), -- Production
(4,2), -- Test
(4,3); -- Acceptance
