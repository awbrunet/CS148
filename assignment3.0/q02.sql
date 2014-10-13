SELECT DISTINCT tblSections.fldDays, concat(tblSections.fldStart, "-", tblSections.fldStop) as classtime
FROM tblSections
INNER JOIN tblTeachers on pmkNetID = fnkTeacherNetId AND pmkNetId = "rerickso"