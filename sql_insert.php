

 INSERT INTO prek_absents (
 student_profile_id, 
 k_level_id, 
 reason,
 quarter_name,
 quarter_day_present, 
 absent_type,
 absent_date, 
 created_at, 
 updated_at)
VALUES (
 
	371, 
	11, 
	'non-count-daypresent',
	'quarter_1', 
	'41',
	'non-count',
	'2019-11-01', 
	now(), 
	now() 
	),
	
	(
	371, 
	11, 
	'non-count-daypresent',
	'quarter_2', 
	'51',
	'non-count',
	'2019-11-01', 
	now(), 
	now() 
	),
	(
 
	371, 
	11, 
	'non-count-daypresent',
	'quarter_3', 
	'45',
	'non-count',
	'2019-11-01', 
	now(), 
	now() 
	),
	(
 
	371, 
	11, 
	'non-count-daypresent',
	'quarter_4', 
	'46',
	'non-count',
	'2019-11-01', 
	now(), 
	now() 
	)



/*

INSERT INTO absent_records (student_profile_id, grade_id, reason,quarter_name,quarter_day_present, absent_type,absent_date, created_at, updated_at)
VALUES (380, 30, 'non-count-daypresent','quarter_4', '46','non-count','2019-11-01', now(), now() ); */



--   select * from absent_records where student_profile_id = 371 and grade_id =30

HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\Curent\Version\FontSubstitutes
