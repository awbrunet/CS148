SELECT tblEnrolls.fnkStudentId 
FROM tblEnrolls 
WHERE tblEnrolls.fnkCourseId IN (SELECT tblSections.fnkCourseId 
                                 FROM tblSections 
                                 WHERE tblSections.fnkTeacherNetId 
                                 IN (SELECT tblTeachers.pmkNetId 
                                     FROM tblTeachers 
                                     WHERE tblTeachers.pmkNetId = 'rerickso'));