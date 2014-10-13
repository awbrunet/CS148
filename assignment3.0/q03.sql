SELECT DISTINCT tblSections.fnkCourseId, tblCourses.fldCourseName
FROM tblSections
INNER JOIN tblCourses on tblCourses.pmkCourseId = tblSections.fnkCourseId AND fnkTeacherNetId = "rerickso"