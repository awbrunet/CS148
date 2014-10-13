SELECT concat(tblStudents.fldFirstName, " ", tblStudents.fldLastName) as Student, tblEnrolls.fnkCourseId 
FROM tblStudents 
INNER JOIN tblEnrolls ON tblStudents.pmkStudentId = tblEnrolls.fnkStudentId 
GROUP BY Student
HAVING COUNT(Student) > 2