SELECT DISTINCT fldBuilding, COUNT(fnkCourseID) FROM tblSections GROUP BY fldBuilding;