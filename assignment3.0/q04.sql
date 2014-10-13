SELECT DISTINCT tblStudents.fldFirstName, tblStudents.fldLastName
FROM tblStudents, tblCourses, tblEnrolls
WHERE tblCourses.pmkCourseId = tblEnrolls.fnkCourseId
AND tblStudents.pmkStudentId = fnkStudentId
AND tblCourses.fldCourseNumber = "148" 
AND tblCourses.fldDepartment = "CS";