SELECT DISTINCT tblTeachers.pmkNetId, tblSections.fldNumStudents AS total
FROM tblTeachers, tblSections
WHERE tblTeachers.pmkNetId = tblSections.fnkTeacherNetId 
HAVING fldNumStudents BETWEEN 190 AND 200