<?php
include "top.php";
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1 Initialize variables
//
// SECTION: 1a.
// variables for the classroom purposes to help find errors.

$debug = false;

if (isset($_GET["debug"])) { // ONLY do this in a classroom environment
    $debug = true;
}

if ($debug)
    print "<p>DEBUG MODE IS ON</p>";

/* ##### Step one
*
* create your database object using the appropriate database username
*/

require_once('../bin/myDatabase.php');

$dbUserName = get_current_user() . '_reader';
$whichPass = "r"; //flag for which one to use.
$dbName = strtoupper(get_current_user()) . '_UVM_Courses';

$thisDatabase = new myDatabase($dbUserName, $whichPass, $dbName);

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b Security
//
// define security variable to be used in SECTION 2a.
$yourURL = $domain . $phpSelf;


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c form variables
//
// Initialize variables one for each form element
// in the order they appear on the form
$subject = "";
$courseNum = "";
$startTime = "";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1d form error flags
//
// Initialize Error Flags one for each form element we validate
// in the order they appear in section 1c.
$firstNameERROR = false;
$emailERROR = false;

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1e misc variables
//
// create array to hold error messages filled (if any) in 2d displayed in 3c.
$errorMsg = array();

// array used to hold form values that will be written to a CSV file
$dataRecord = array();

$mailed=false; // have we mailed the information to the user?
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//
// SECTION: 2 Process for when the form is submitted
//
if (isset($_POST["btnSubmit"])) {

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2a Security
    // 
    if (!securityCheck(true)) {
        $msg = "<p>Sorry you cannot access this page. ";
        $msg.= "Security breach detected and reported</p>";
        die($msg);
    }
    
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2b Sanitize (clean) data 
    // remove any potential JavaScript or html code from users input on the
    // form. Note it is best to follow the same order as declared in section 1c.

    $subject = htmlentities($_POST["txtSubject"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $subject;


    $courseNum = filter_var($_POST["txtCourseNum"], FILTER_SANITIZE_EMAIL);
    $dataRecord[] = $courseNum;


    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2c Validation
    //
    // Validation section. Check each value for possible errors, empty or
    // not what we expect. You will need an IF block for each element you will
    // check (see above section 1c and 1d). The if blocks should also be in the
    // order that the elements appear on your form so that the error messages
    // will be in the order they appear. errorMsg will be displayed on the form
    // see section 3b. The error flag ($emailERROR) will be used in section 3c.

    /*if ($subject == "") {
        $errorMsg[] = "Please enter your first name";
        $firstNameERROR = true;
    } elseif (!verifyAlphaNum($firstName)) {
        $errorMsg[] = "Your first name appears to have extra character.";
        $firstNameERROR = true;
    }

    if ($email == "") {
        $errorMsg[] = "Please enter your email address";
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg[] = "Your email address appears to be incorrect.";
        $emailERROR = true;
    }*/


    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2d Process Form - Passed Validation
    //
    // Process for when the form passes validation (the errorMsg array is empty)
    //
    if (!$errorMsg) {
        if ($debug)
            print "<p>Form is valid</p>";

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2e Save Data
        //
        // This block saves the data to a CSV file.

        
        //Build query
        $query  = "SELECT fldCRN  ";
        $query .= "FROM tblSections ";
        $query .= 'WHERE fldNumStudents > 100';

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
        // SECTION: 2f Create message
        //
        // build a message to display on the screen in section 3a and to mail
        // to the person filling out the form (section 2g).

        $message = '<h2>Your information.</h2>';

        foreach ($_POST as $key => $value) {

            $message .= "<p>";

            $camelCase = preg_split('/(?=[A-Z])/', substr($key, 3));

            foreach ($camelCase as $one) {
                $message .= $one . " ";
            }
            $message .= " = " . htmlentities($value, ENT_QUOTES, "UTF-8") . "</p>";
        }
       
    } // end form is valid
    
} // ends if form was submitted.

//#############################################################################
//
// SECTION 3 Display Form
//
?>
<article id="main">

    <?php
    //####################################
    //
    // SECTION 3a.
    //
    // 
    // 
    // 
    // If its the first time coming to the form or there are errors we are going
    // to display the form.
    if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { // closing of if marked with: end body submit
        print "<p>yay</p>";

        /*if (!$mailed) {
            print "not ";
        }

        print "been processed</h1>";

        print "<p>A copy of this message has ";
        if (!$mailed) {
            print "not ";
        }
        print "been sent</p>";
        print "<p>To: " . $email . "</p>";
        print "<p>Mail Message:</p>";

        print $message;*/
    } else {


        //####################################
        //
        // SECTION 3b Error Messages
        //
        // display any error messages before we print out the form

        if ($errorMsg) {
            print '<div id="errors">';
            print "<ol>\n";
            foreach ($errorMsg as $err) {
                print "<li>" . $err . "</li>\n";
            }
            print "</ol>\n";
            print '</div>';
        }


        //####################################
        //
        // SECTION 3c html Form
        //
        /* Display the HTML form. note that the action is to this same page. $phpSelf
          is defined in top.php
          NOTE the line:

          value="<?php print $email; ?>

          this makes the form sticky by displaying either the initial default value (line 35)
          or the value they typed in (line 84)

          NOTE this line:

          <?php if($emailERROR) print 'class="mistake"'; ?>

          this prints out a css class so that we can highlight the background etc. to
          make it stand out that a mistake happened here.

         */
        ?>
    <br>
        <form action="<?php print $phpSelf; ?>"
              method="post"
              id="frmClassSearch">

            <fieldset class="wrapper">
                <legend>UVM Spring Courses</legend>
                <p>Fill out the search terms below to begin the hunt!</p>

                <fieldset class="wrapperTwo">
                    <fieldset class="searchterms">
                        <label for="txtSubject">Subject</label>
                            <input type="text" id="txtfield" name="txtSubject"
                                   value="<?php print $subject; ?>"
                                   tabindex="100" maxlength="100" placeholder="Enter course subject (ex: CS)"
                                   onfocus="this.select()"
                                   autofocus>
                        
                        <br>
                        
                        <label for="txtCourseNum">Course #</label>
                            <input type="text" id="txtfield" name="txtCourseNum"
                                   value="<?php print $courseNum; ?>"
                                   tabindex="120" maxlength="100" placeholder="Enter course # (ex: 148)"
                                   onfocus="this.select()" 
                                   >
                        <br>
                        
                        <label for="lstBuilding">Building</label>
                            <select id="lstbox" name="lstBuilding" 
                                   tabindex="130" size="1"
                                onfocus="this.select()">
                                <option selected value></option>
                            </select>
                        <br>
                        
                        <label for="txtCourseNum">Start Time</label>
                            <input type="text" id="txtfield" name="txtStartTime"
                                   value="<?php print $startTime; ?>"
                                   tabindex="140" maxlength="100" placeholder="Enter start time (ex: 13:00)"
                                   onfocus="this.select()" 
                                   >
                        <br>
                        
                        <label for="txtProfessor">Professor</label>
                            <input type="text" id="txtfield" name="txtProfessor"
                                   value="<?php print $professor; ?>"
                                   tabindex="150" maxlength="100" placeholder="Enter professor's last name (ex: Erickson)"
                                   onfocus="this.select()" 
                                   >
                        <br>
                        
                        <label for="lstClassType">Class Type</label>
                            <select id="lstbox" name="lstClassType" 
                                   tabindex="160" size="1"
                                onfocus="this.select()">
                                <option selected value></option>
                            </select>
                        <br>
                        
                    </fieldset> <!-- ends contact -->
                    
                </fieldset> <!-- ends wrapper Two -->
                <br>
                <fieldset class="buttons">
                    <input type="button" id="btnSearch" name="btnSearch" value="Search for classes" tabindex="900" class="button">
                </fieldset> <!-- ends buttons -->
                
            </fieldset> <!-- Ends Wrapper -->
        </form>

    

</article>

 

<!-- 
-->


 <?php include "footer.php"; ?>

</body>
</html>