<!DOCTYPE html>
<html lang="en">
<head>
<title>CS 148 Assignment 3.0</title>
<meta charset="utf-8">
<meta name="author" content="Aaron Brunet">
<meta name="description" content="Assignment index for CS148 Assignment 3">


<!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
<![endif]-->
    
</head>


<?php

$phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");
$path_parts = pathinfo($phpSelf);
print '<body id="' . $path_parts['filename'] . '">';

?>

<p>Aaron Brunet | CS148 | Assignment 3.0</p>

<p>q01. <a href="q01.php">SQL:</a> SELECT DISTINCT tblCourses.fldCourseName FROM tblCourses, tblEnrolls WHERE tblCourses.pmkCourseId = tblEnrolls.fnkCourseId AND tblEnrolls.fldGrade = 100;</p>

<p>q02. <a href="q02.php">SQL:</a> SELECT DISTINCT tblSections.fldDays, concat(tblSections.fldStart, "-", tblSections.fldStop) as classtime FROM tblSections INNER JOIN tblTeachers on pmkNetID = fnkTeacherNetId AND pmkNetId = "rerickso";</p>

<p>q03. <a href="q03.php">SQL:</a> SELECT DISTINCT tblSections.fnkCourseId, tblCourses.fldCourseName FROM tblSections INNER JOIN tblCourses on tblCourses.pmkCourseId = tblSections.fnkCourseId AND fnkTeacherNetId = "rerickso";</p>

<p>q04. <a href="q04.php">SQL:</a> SELECT DISTINCT tblStudents.fldFirstName, tblStudents.fldLastName FROM tblStudents, tblCourses, tblEnrolls WHERE tblCourses.pmkCourseId = tblEnrolls.fnkCourseId AND tblStudents.pmkStudentId = fnkStudentId AND tblCourses.fldCourseNumber = "148" AND tblCourses.fldDepartment = "CS";</p>

<p>q05. <a href="q05.php">SQL:</a> SELECT DISTINCT tblTeachers.pmkNetId, tblSections.fldNumStudents AS total FROM tblTeachers, tblSections WHERE tblTeachers.pmkNetId = tblSections.fnkTeacherNetId HAVING fldNumStudents BETWEEN 190 AND 200;</p>

<p>q06. <a href="q06.php">SQL:</a> SELECT concat(tblStudents.fldFirstName, " ", tblStudents.fldLastName) as Student, tblEnrolls.fnkCourseId FROM tblStudents INNER JOIN tblEnrolls ON tblStudents.pmkStudentId = tblEnrolls.fnkStudentId GROUP BY Student HAVING COUNT(Student) > 2</p>

<p>q07. <a href="q07.php">SQL:</a> SELECT fldFirstName, fldPhone, fldSalary FROM tblTeachers WHERE fldSalary < (SELECT AVG(fldSalary) FROM tblTeachers) </p>

<p>q08.  <a href="q08.php">SQL:</a> SELECT DISTINCT tblCourses.fldCourseName
FROM tblCourses
WHERE tblCourses.pmkCourseId IN (SELECT tblEnrolls.fnkCourseId 
													FROM tblEnrolls 
													WHERE tblEnrolls.fldGrade = 100);</p>

<p>q09.  <a href="q09.php">SQL:</a> SELECT tblEnrolls.fnkStudentId 
FROM tblEnrolls 
WHERE tblEnrolls.fnkCourseId IN (SELECT tblSections.fnkCourseId 
                                 FROM tblSections 
                                 WHERE tblSections.fnkTeacherNetId 
                                 IN (SELECT tblTeachers.pmkNetId 
                                     FROM tblTeachers 
                                     WHERE tblTeachers.pmkNetId = 'rerickso'));</p>

<p>q10. <a href="q10.php">SQL:</a> # FAILURE 
# Cannot get around 'Subquery returns more than one row'
SELECT DISTINCT tblEnrolls.fnkStudentId, tblEnrolls.fldGrade
FROM tblEnrolls, tblStudents
WHERE tblEnrolls.fnkStudentId = tblStudents.pmkStudentId

# Discover AVG by State
AVG(tblEnrolls.fldGrade) > (SELECT AVG(tblEnrolls.fldGrade), tblStudents.fldState
							FROM tblEnrolls, tblStudents
							WHERE tblEnrolls.fnkStudentId = tblStudents.pmkStudentId
							GROUP BY tblStudents.fldState);</p>

</body>
</html>