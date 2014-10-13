# FAILURE 
# Cannot get around 'Subquery returns more than one row'
SELECT DISTINCT tblEnrolls.fnkStudentId, tblEnrolls.fldGrade
FROM tblEnrolls, tblStudents
WHERE tblEnrolls.fnkStudentId = tblStudents.pmkStudentId

# Discover AVG by State
AVG(tblEnrolls.fldGrade) > (SELECT AVG(tblEnrolls.fldGrade), tblStudents.fldState
							FROM tblEnrolls, tblStudents
							WHERE tblEnrolls.fnkStudentId = tblStudents.pmkStudentId
							GROUP BY tblStudents.fldState)