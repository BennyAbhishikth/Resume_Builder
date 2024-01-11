<?php
    require '../Database/connect.inc.php';
    if( isset($_POST['submit']) )
    {
      
        $img_name = $_FILES['profile_photo']['name'];
        $img_size = $_FILES['profile_photo']['size'];
        $tmp_name = $_FILES['profile_photo']['tmp_name'];
        $error = $_FILES['profile_photo']['error'];

        if($error === 0)
        {
            if($img_size > 1048576)
            {
                echo "File size should not be more than 1MB"; 
            }
            else
            {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg", "jpeg", "png");
                if(in_array($img_ex_lc, $allowed_exs ))
                {
                    $new_img_name = uniqid("IMG-", true). '.' .$img_ex_lc;
                    $img_upload_path = 'uploads/'. $new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path );

                    // personal Details 
                    $fname = $_POST['full_name'];
                    $designation  = $_POST['designation']; 
                    // $profile_photo  = $_POST['profile_photo'];

                    // contact details 
                    $email  = $_POST['email'];
                    $country_code  = $_POST['country_code'];
                    $mobile_number = $_POST['mobile_number'];
                    $address = $_POST['address'];

                    // profile links 
                    $linkedin = $_POST['linkedin'];
                    $github = $_POST['github'];
                    $codechef = $_POST['codechef'];
                    $leetcode = $_POST['leetcode'];
                    $hackerrank = $_POST['hackerrank'];
                    $hackerearth = $_POST['hackerearth'];

                    // about 
                    $career_objective = $_POST['career_objective'];
 
                    // education
                    $degree_name = $_POST['degree_name'];
                    $specialization = $_POST['specialization'];
                    $degree_place = $_POST['degree_place'];
                    $degree_duration = $_POST['degree_duration'];
                    $degree_location = $_POST['degree_location'];
                    $degree_cgpa = $_POST['degree_cgpa'];

                    $s_secondary_name = $_POST['s_secondary_name'];
                    $s_specialization = $_POST['s_specialization'];
                    $s_secondary_place = $_POST['s_secondary_place'];
                    $s_secondary_duration = $_POST['s_secondary_duration'];
                    $s_secondary_location = $_POST['s_secondary_location'];
                    $s_secondary_cgpa = $_POST['s_secondary_cgpa'];

                    $secondary_place = $_POST['secondary_place'];
                    $secondary_location = $_POST['secondary_location'];
                    $secondary_duration = $_POST['secondary_duration'];
                    $secondary_cgpa = $_POST['secondary_cgpa'];

                    // skills
                    $skills = $_POST['skills'];

                    // Certifications
                    $certification_name = $_POST['certification_name'];
                    $certified_by = $_POST['certified_by'];
                    $certification_year = $_POST['certification_year'];
                    
                    // Projects
                    $project_name = $_POST['project_name'];
                    $tasks = $_POST['tasks'];
                    $tech = $_POST['tech'];
                    $project_link = $_POST['project_link'];

                    // Achievements
                    $achievement = $_POST['achievement'];

                    // Experience
                    $role  = $_POST['role'];
                    $company = $_POST['company'];
                    $duration  = $_POST['duration'];
                    $description  = $_POST['description'];

                    $skillss =  json_encode($skills);
                    $certification_names = json_encode( $certification_name);
                    $certified_bys = json_encode( $certified_by);
                    $certification_years  =json_encode( $certification_year);
                    $project_names = json_encode($project_name);
                    $taskss = json_encode($tasks);
                    $techs = json_encode( $tech);
                    $project_links = json_encode($project_link);
                    $achievements = json_encode($achievement);
                    $roles = json_encode($role);
                    $companys = json_encode($company);
                    $durations = json_encode($duration);
                    $descriptions = json_encode($description);
                    

                    // $query_signup = " INSERT INTO `users` VALUES('','$fname', '$designation', '$profile_photo', '$mail_id', '$country_code', '$mobile_number', 
                    //   '$address', '$linkedin', '$github', '$codechef', '$leetcode', '$hackerrank', '$hackerearth', '$career_objective', '$degree_name', '$specialization', 
                    //   '$degree_place', '$degree_duration', '$degree_cgpa', '$s_secondary_name', '$s_specialization', '$s_secondary_place', '$s_secondary_duration', '$s_secondary_cgpa', '$secondary_place', '$secondary_duration', 
                    //   '$secondary_cgpa', '$skillss', '$certification_names', '$certified_bys', '$certification_years', '$project_names', '$taskss', '$techs', '$project_links', '$achievements', 
                    //   '$roles', '$companys', '$durations', '$descriptions' ) ";
                  
                    
                      $query_delete = "DELETE FROM `users` WHERE  mail_id ='$email'";
                      
                      mysqli_query( $con, $query_delete );

                      $query_signup = "INSERT INTO `users` VALUES (
                          '$fname', '$designation', '$profile_photo', '$email', '$country_code', '$mobile_number', 
                          '$address', '$linkedin', '$github', '$codechef', '$leetcode', '$hackerrank', '$hackerearth', '$career_objective', 
                          '$degree_name', '$specialization', '$degree_place','$degree_location', '$degree_duration', '$degree_cgpa', 
                          '$s_secondary_name', '$s_specialization', '$s_secondary_place','$s_secondary_location', '$s_secondary_duration', '$s_secondary_cgpa', 
                          '$secondary_place','$secondary_duration', '$secondary_duration', '$secondary_cgpa', 
                          '$skillss', '$certification_names', '$certified_bys', '$certification_years', 
                          '$project_names', '$taskss', '$techs', '$project_links', '$achievements', 
                          '$roles', '$companys', '$durations', '$descriptions'
                      )";
                      
                      
                      mysqli_query( $con, $query_signup );
                      header("Location: resume.php?email=" . urlencode($email));
                      exit();


                }
                else
                {
                    echo $error;
                }
            }
        }
        // else
        // {
        //     echo "emo theliyadhu";
        // }
    }
 
?>


<?php
    require '../Database/connect.inc.php';

    // if(isset($_POST['email']))
    // {
    //     $userid = $_POST['email'];
    //     $sql = "SELECT * FROM users where mail_id ='$userid'";
    //     $result = $con->query($sql);
        
    //     $row = $result->fetch_assoc();
    if(isset($_GET['email']))
    {
        $userid = $_GET['email'];
        $sql = "SELECT * FROM users where mail_id ='$userid'";
        $result = $con->query($sql);
        // echo "hello", $userid;
        $row = $result->fetch_assoc();
    
        // $sql = "SELECT * FROM users where resume_id=11";
        // $result = $con->query($sql);
        // echo "hello", $userid;
        // $row = $result->fetch_assoc();

        // personal Details 
        $fname1 = $row['full_name'];
        $designation1  = $row['designation']; 
        $profile_photo1  =$row['profile_photo_path'];

        // contact details 
        $mail_id1  = $row['mail_id'];
        $country_code1  = $row['country_code'];
        $mobile_number1 = $row['mobile_number'];
        $address1 = $row['address'];

        // profile links 
        $linkedin1 = $row['linkedin_link'];
        $github1 = $row['github_link'];
        $codechef1 = $row['codechef_link'];
        $leetcode1 = $row['leetcode_link'];
        $hackerrank1 = $row['hackerrank_link'];
        $hackerearth1 = $row['hackerearth_link'];

        // about 
        $career_objective1 = $row['career_objective'];

        // education
        $degree_name1 = $row['degree_name'];
        $specialization1 = $row['specialization'];
        $degree_place1 = $row['degree_place'];
        $degree_duration1 = $row['degree_duration'];
        $degree_location1 = $row['degree_location'];
        $degree_cgpa1 = $row['degree_cgpa'];

        $s_secondary_name1 = $row['senior_secondary_name'];
        $s_specialization1 = $row['senior_secondary_specialization'];
        $s_secondary_place1 = $row['senior_secondary_place'];
        $s_secondary_location1 = $row['s_secondary_location'];

        $s_secondary_duration1 = $row['senior_secondary_duration'];
        $s_secondary_cgpa1 = $row['senior_secondary_gpa'];

        $secondary_place1 = $row['secondary_place'];
        $secondary_duration1 = $row['secondary_duration'];
        $secondary_location1 = $row['secondary_location'];

        $secondary_cgpa1 = $row['secondary_gpa']; 

      }

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  
</head>
<body onload="hid()">

  <form  action="update.php" method="post" enctype="multipart/form-data" >
  <!-- enctype='multipart/form-data' -->
    <div id="header">
      <center><h1>Update Resume Form</h1></center>
    </div>
    

    <!-- Personal Details -->
    <h2>Personal Details</h2>
    <!-- <label for="full_name">Full Name:<span style="color: red;">*</span> </label> -->
    <input type="text" id="full_name" value="<?php echo $fname1; ?>" placeholder="Full Name" name="full_name" required>

    <!-- <label for="designation">Designation:<span style="color: red;">*</span> </label> -->
    <input type="text" placeholder="Title" id="designation" value="<?php echo $designation1; ?>" name="designation" required>

    
    <label for="profile_photo">Profile Photo:<span style="color: red;">*</span> </label>
    <input  type="file" name="profile_photo" id="profile_photo" value="<?php echo $profile_photo1; ?>" accept="image/*" onchange="validateFile()" required>
    <div class="file-input-wrapper">
      <span  class="remove-file"  onclick="removeProfilePhoto()"><i class="fas fa-times-circle"></i></span>
    </div>

    <!-- Contact Details -->
    <h2>Contact Details</h2>
    <!-- <label for="mail_id">Mail ID:<span style="color: red;">*</span> </label> -->
    <input type="email" placeholder="Email Id" id="email" value="<?php echo $mail_id1; ?>" name="email" required readonly >

    <label for="mobile_number">Mobile Number:<span style="color: red;">*</span> </label>
    <div class="mobile-number-container">
      <!-- Country Code Dropdown -->
      <div class="country-code">
        <select id="option" name="country_code" id="country_code">
          <option   value="+91">+91 (India)</option>
          <option value="+1">+1 (United States)</option>
          <option value="+44">+44 (United Kingdom)</option>
          <option value="+49">+49 (Germany)</option>
          <option value="+81">+81 (Japan)</option>
          <option value="+33">+33 (France)</option>
          <option value="+91">+91 (India)</option>
          <option value="+86">+86 (China)</option>
          <option value="+7">+7 (Russia)</option>
          <option value="+61">+61 (Australia)</option>
          <option value="+55">+55 (Brazil)</option>
          <option value="+82">+82 (South Korea)</option>
          <option value="+34">+34 (Spain)</option>
          <option value="+39">+39 (Italy)</option>
          <option value="+52">+52 (Mexico)</option>
          <option value="+234">+234 (Nigeria)</option>
          <option value="+27">+27 (South Africa)</option>
          <option value="+351">+351 (Portugal)</option>
          <option value="+31">+31 (Netherlands)</option>
          <option value="+46">+46 (Sweden)</option>
          <option value="+81">+81 (Japan)</option>
          <option value="+966">+966 (Saudi Arabia)</option>
          <option value="+54">+54 (Argentina)</option>
          <option value="+62">+62 (Indonesia)</option>
          <option value="+91">+91 (India)</option>
          <option value="+972">+972 (Israel)</option>
          <option value="+63">+63 (Philippines)</option>
          <option value="+82">+82 (South Korea)</option>
          <option value="+506">+506 (Costa Rica)</option>
          <option value="+507">+507 (Panama)</option>
          <option value="+52">+52 (Mexico)</option>
          <option value="+66">+66 (Thailand)</option>
          <option value="+353">+353 (Ireland)</option>
          <option value="+47">+47 (Norway)</option>
          <option value="+64">+64 (New Zealand)</option>
          <option value="+234">+234 (Nigeria)</option>
          <option value="+92">+92 (Pakistan)</option>
          <option value="+92">+92 (Pakistan)</option>
          <option value="+65">+65 (Singapore)</option>
          <option value="+34">+34 (Spain)</option>
          <option value="+46">+46 (Sweden)</option>
          <option value="+41">+41 (Switzerland)</option>
          <option value="+971">+971 (United Arab Emirates)</option>
          <option value="+90">+90 (Turkey)</option>
          <option value="+256">+256 (Uganda)</option>
          <option value="+380">+380 (Ukraine)</option>
          <option value="+44">+44 (United Kingdom)</option>
          <option value="+598">+598 (Uruguay)</option>
          <option value="+998">+998 (Uzbekistan)</option>
                 
        </select>
      </div>

      
      <input type="tel" name="mobile_number" value="<?php echo $mobile_number1; ?>" id="mobile_number" class="mobile-number-input" pattern="[0-9]{10}" required>
    </div>

    <label for="address">Address:<span style="color: red;">*</span> </label>
    <!-- <textarea id="address" name="address" rows="3" maxlength="100" required></textarea> -->
    <!-- <textarea id="address" name="address" value="<?php echo $address1; ?>" rows="4" cols="50" placeholder="Enter your address" maxlength="100" oninput="updateCharacterCount('address', 'address-count')"></textarea> -->
    <textarea id="address" name="address" rows="4" cols="50" placeholder="Enter your address" maxlength="100" oninput="updateCharacterCount('address', 'address-count')"><?php echo htmlspecialchars($address1); ?></textarea>

    <span id="address-count">100 characters remaining</span>

    <!-- Profile Links -->
    <h2>Profile Links</h2>
    <!-- <label for="linkedin">LinkedIn:<span style="color: red;">*</span> </label> -->
    <input type="text" id="linkedin" value="<?php echo $linkedin1; ?>" placeholder="LinkedIn" name="linkedin" required>

    <!-- <label for="github">GitHub:<span style="color: red;">*</span> </label> -->
    <input type="text" id="github" value="<?php echo $github1; ?>" placeholder="GitHub" name="github" required>

    <!-- <label for="codechef">CodeChef:<span style="color: red;">*</span> </label> -->
    <input type="text" id="codechef" value="<?php echo $codechef1; ?>" placeholder="CodeChef" name="codechef" required>

    <!-- <label for="leetcode">LeetCode:<span style="color: red;">*</span> </label> -->
    <input type="text" id="leetcode" value="<?php echo $leetcode1; ?>" placeholder="LeetCode" name="leetcode" required>

    <!-- <label for="hackerrank">HackerRank:<span style="color: red;">*</span> </label> -->
    <input type="text" id="hackerrank" value="<?php echo $hackerrank1; ?>" placeholder="HackerRank" name="hackerrank" required>

    <!-- <label for="hackerearth">HackerEarth:<span style="color: red;">*</span> </label> -->
    <input type="text" id="hackerearth" value="<?php echo $hackerearth1; ?>" placeholder="HackerEarth" name="hackerearth" required>

    <!-- Career Objective -->
    <h2>Career Objective</h2>
    <!-- <textarea id="career_objective" name="career_objective" rows="4" maxlength="750" required></textarea> -->
    <!-- <textarea id="career_objective" value="<?php echo $career_objective1; ?>" name="career_objective" rows="4" cols="50" placeholder="Enter your career objective" maxlength="750" oninput="updateCharacterCount('career_objective', 'career-objective-count')"></textarea> -->
    <textarea id="career_objective" name="career_objective" rows="4" cols="50" placeholder="Enter your career objective" maxlength="750" oninput="updateCharacterCount('career_objective', 'career-objective-count')"><?php echo htmlspecialchars($career_objective1); ?></textarea>

    <span id="career-objective-count">750 characters remaining</span>
    <button class="helpButton" type="button" name="button">Help</button>

    <div class="cont">
            <div class="item1">
                <input type="radio" onclick="add1()" name="but1" value="">
                <div class="matter1">
                    <label class="labels" for="">I am a skilled Software Engineer with a passion for developing
                        innovative solutions. Seeking a challenging role to apply my expertise in full-stack
                        development, system architecture, and problem-solving. Committed to delivering high-quality
                        software, I aim to contribute to cutting-edge projects, collaborate with talented teams, and
                        continuously enhance my skills in a dynamic tech environment.</label>
                </div>
            </div>
            <div class="item2">
                <input type="radio" onclick="add2()" name="but1" value="">
                <div class="matter2">
                    <label class="labels" for="">Dedicated Software Engineer aiming to leverage my strong foundation in
                        computer science and programming to contribute to dynamic projects. Seeking a challenging role
                        to apply my skills in full-stack development, software design, and collaborative
                        problem-solving. Eager to work with innovative teams and contribute to creating impactful and
                        scalable software solutions.</label>
                </div>
            </div>
            <div class="item3">
                <input type="radio" onclick="add3()" name="but1" value="">
                <div class="matter3">
                    <label class="labels" for="">Results-driven Software Engineer with expertise in developing and
                        optimizing software solutions. Searching for a role that allows me to utilize my proficiency in
                        coding, system architecture, and project management. I am committed to delivering high-quality
                        software products, adapting to new technologies, and contributing to the success of a
                        forward-thinking organization.</label>
                </div>
            </div>
            <div class="item4">
                <input type="radio" onclick="add4()" name="but1" value="">
                <div class="matter4">
                    <label class="labels" for="">Innovative Software Engineer passionate about crafting efficient and
                        robust code. Excited to bring my technical skills in software development, algorithm design, and
                        debugging to a dynamic work environment. Seeking a position that encourages creativity, fosters
                        continuous learning, and provides opportunities to contribute to cutting-edge projects.</label>
                </div>
            </div>
            <div class="item5">
                <input type="radio" onclick="add5()" name="but1" value="">
                <div class="matter5">
                    <label class="labels" for="">Motivated Software Engineer with a strong foundation in software
                        development and a keen eye for detail. I aspire to contribute my skills in full-stack
                        development, software engineering, and problem-solving to a collaborative team. Eager to work on
                        challenging projects that push boundaries, enhance my expertise, and contribute to the success
                        of a forward-looking organization.</label>
                </div>
            </div>
            <div class="item6">
                <input type="radio" onclick="add6()" name="but1" value="">
                <div class="matter6">
                    <label class="labels" for="">Seeking a Web Developer position to apply strong frontend and backend
                        skills, aiming to create seamless, responsive, and visually appealing web applications.
                        Committed to staying current with evolving technologies and contributing to collaborative team
                        environments.</label>
                </div>
            </div>
            <div class="item7">
                <input type="radio" onclick="add7()" name="but1" value="">
                <div class="matter7">
                    <label class="labels" for="">Aspiring Web Developer with a focus on crafting efficient,
                        user-friendly web solutions. Eager to leverage technical skills in HTML, CSS, JavaScript, and
                        backend technologies to contribute to innovative projects and foster continuous professional
                        growth.</label>
                </div>
            </div>
            <div class="item8">
                <input type="radio" onclick="add8()" name="but1" value="">
                <div class="matter8">
                    <label class="labels" for="">Passionate about web development, I am dedicated to securing a role
                        where I can utilize my coding expertise to build scalable and high-performance applications.
                        Excited to collaborate with diverse teams and contribute to the success of dynamic
                        projects.</label>
                </div>
            </div>
            <div class="item9">
                <input type="radio" onclick="add9()" name="but1" value="">
                <div class="matter9">
                    <label class="labels" for="">Dynamic Web Developer aspiring to contribute creativity and technical
                        acumen to cutting-edge projects. Proficient in frontend frameworks and backend technologies, I
                        am enthusiastic about delivering impactful web solutions and adapting to emerging industry
                        trends.</label>
                </div>
            </div>
            <div class="item10">
                <input type="radio" onclick="add10()" name="but1" value="">
                <div class="matter10">
                    <label class="labels" for="">Results-driven Web Developer seeking opportunities to apply
                        comprehensive knowledge of web technologies. With a focus on detail and a commitment to
                        continuous improvement, I aim to contribute to the development of robust, user-focused web
                        applications in a collaborative and innovative environment.</label>
                </div>
            </div>
            <div class="item11">
                <input type="radio" onclick="add11()" name="but1" value="">
                <div class="matter11">
                    <label class="labels" for="">To contribute as a System Administrator, applying advanced skills in
                        server management, network administration, and cybersecurity. Committed to ensuring high
                        availability, reliability, and security of IT systems through proactive monitoring and effective
                        problem resolution.</label>
                </div>
            </div>
            <div class="item12">
                <input type="radio" onclick="add12()" name="but1" value="">
                <div class="matter12">
                    <label class="labels" for="">Seeking a System Administrator role to utilize extensive experience in
                        maintaining and optimizing IT infrastructure. Goal is to implement best practices, enhance
                        system performance, and ensure data integrity while providing seamless technical support to
                        users.</label>
                </div>
            </div>
            <div class="item13">
                <input type="radio" onclick="add13()" name="but1" value="">
                <div class="matter13">
                    <label class="labels" for="">Aspiring System Administrator dedicated to deploying robust IT
                        solutions, implementing disaster recovery strategies, and ensuring optimal system performance.
                        Eager to contribute technical expertise in server administration, troubleshooting, and security
                        to support organizational growth.</label>
                </div>
            </div>
            <div class="item14">
                <input type="radio" onclick="add14()" name="but1" value="">
                <div class="matter14">
                    <label class="labels" for="">To excel as a System Administrator, combining technical proficiency
                        with a proactive approach to system management. Focused on implementing efficient IT solutions,
                        enhancing cybersecurity measures, and providing reliable support for a seamless and secure
                        computing environment.</label>
                </div>
            </div>
            <div class="item15">
                <input type="radio" onclick="add15()" name="but1" value="">
                <div class="matter15">
                    <label class="labels" for="">Dynamic System Administrator aiming to optimize IT operations by
                        leveraging strong skills in server administration, network configuration, and cybersecurity.
                        Committed to ensuring data integrity, minimizing downtime, and enhancing overall system
                        performance for organizational success.</label>
                </div>
            </div>
            <div class="item16">
                <input type="radio" onclick="add16()" name="but1" value="">
                <div class="matter16">
                    <label class="labels" for="">To excel as a Network Engineer, applying expertise in designing,
                        implementing, and managing robust network infrastructures. Committed to optimizing network
                        performance, ensuring scalability, and implementing cutting-edge solutions for seamless
                        connectivity.</label>
                </div>
            </div>
            <div class="item17">
                <input type="radio" onclick="add17()" name="but1" value="">
                <div class="matter17">
                    <label class="labels" for="">Seeking a Network Engineer role to contribute technical proficiency in
                        routing, switching, and network security. Goal is to design and maintain scalable and secure
                        networks, implementing innovative solutions to meet evolving business needs.</label>
                </div>
            </div>
            <div class="item18">
                <input type="radio" onclick="add18()" name="but1" value="">
                <div class="matter18">
                    <label class="labels" for="">Aspiring Network Engineer dedicated to optimizing network architecture
                        for reliability and performance. Aim is to leverage skills in troubleshooting, configuration,
                        and network monitoring to ensure seamless connectivity and contribute to organizational
                        success.</label>
                </div>
            </div>
            <div class="item19">
                <input type="radio" onclick="add19()" name="but1" value="">
                <div class="matter19">
                    <label class="labels" for="">Dynamic Network Engineer aiming to implement secure and scalable
                        network solutions. Committed to staying updated on emerging technologies, providing efficient
                        troubleshooting, and contributing to the design and optimization of resilient network
                        infrastructures.</label>
                </div>
            </div>
            <div class="item20">
                <input type="radio" onclick="add20()" name="but1" value="">
                <div class="matter20">
                    <label class="labels" for="">To thrive as a Network Engineer, combining technical expertise with a
                        strategic approach to enhance network efficiency. Dedicated to deploying advanced technologies,
                        ensuring network security, and contributing to the design and maintenance of robust
                        infrastructures.</label>
                </div>
            </div>
            <button class="clrBtn" type="button" name="button" onclick="clr()">Clear</button>
        </div>


    <!-- Education -->
    <h2>Education</h2>
    
    <b><h3 style="color: black;">Degree</h3></b>
    <!-- <label for="degree_name">Degree Name:<span style="color: red;">*</span> </label> -->
    <input type="text" id="degree_name" placeholder="Degree Name" value="<?php echo $degree_name1; ?>" name="degree_name" required>
    

    <!-- <label for="specialization">Specialization:<span style="color: red;">*</span> </label> -->
    <input type="text" id="specialization" placeholder="Specialization" value="<?php echo $specialization1; ?>" name="specialization" required>


    <!-- <label for="degree_place">Place:<span style="color: red;">*</span> </label> -->
    <input type="text" id="degree_place" placeholder="Place" value="<?php echo $degree_place1; ?>" name="degree_place" required>

    <input type="text" id="degree_location" name="degree_location" value="<?php echo $degree_location1; ?>" placeholder="Location" required>


    <!-- <label for="degree_duration">Duration:<span style="color: red;">*</span> </label> -->
    <input type="text" placeholder="Duration" id="degree_duration" value="<?php echo $degree_duration1; ?>" name="degree_duration" required>

    <!-- <label for="degree_cgpa">CGPA:<span style="color: red;">*</span> </label> -->
    <input type="text" placeholder="CGPA" id="degree_cgpa" value="<?php echo $degree_cgpa1; ?>" name="degree_cgpa" required>


    <b><h3 style="color: black;">12th / Diploma</h3></b>
    <!-- <label for="s_secondary_name">Degree Name:<span style="color: red;">*</span> </label> -->
    <input type="text" id="s_secondary_name" placeholder="Degree Name" value="<?php echo $s_secondary_name1; ?>" name="s_secondary_name" required>
    

    <!-- <label for="s_specialization">Specialization:<span style="color: red;">*</span> </label> -->
    <input type="text" id="s_specialization" placeholder="Specialization" value="<?php echo $s_specialization1; ?>" name="s_specialization" required>


    <!-- <label for="s_secondary_place">Place:<span style="color: red;">*</span> </label> -->
    <input type="text" id="s_secondary_place" placeholder="Place" value="<?php echo $s_secondary_place1; ?>" name="s_secondary_place" required>

    <input type="text" id="s_secondary_location" value="<?php echo $s_secondary_location1; ?>" name="s_secondary_location" placeholder="Location" required>


    <!-- <label for="s_secondary_duration">Duration:<span style="color: red;">*</span> </label> -->
    <input type="text" id="s_secondary_duration" placeholder="Duration" value="<?php echo $s_secondary_duration1; ?>" name="s_secondary_duration" required>

    <!-- <label for="s_secondary_cgpa">CGPA:<span style="color: red;">*</span> </label> -->
    <input type="text" id="s_secondary_cgpa" placeholder="GPA" value="<?php echo $s_secondary_cgpa1; ?>" name="s_secondary_cgpa" required>

    <b><h3 style="color: black;">SSC</h3></b>
    
    <!-- <label for="secondary_place">Place:<span style="color: red;">*</span> </label> -->
    <input type="text" id="secondary_place" placeholder="Place" value="<?php echo $secondary_place1; ?>" name="secondary_place" required>

    <input type="text" id="secondary_location" name="secondary_location" value="<?php echo $secondary_location1; ?>" placeholder="location" required>

    <!-- <label for="seconday_duration">Duration:<span style="color: red;">*</span> </label> -->
    <input type="text" id="secondary_duration" placeholder="Duration" value="<?php echo $secondary_duration1; ?>" name="secondary_duration" required>

    <!-- <label for="secondary_cgpa">CGPA:<span style="color: red;">*</span> </label> -->
    <input type="text" id="secondary_cgpa" placeholder="GPA" value="<?php echo $secondary_cgpa1; ?>" name="secondary_cgpa" required>

    

    <!-- Skills -->
    <h2>Skills <button type="button" class="add-button" onclick="addSkill()"><i class="fas fa-plus"></i></button></h2>
    <div id="skills-container">
        <!-- Initial skill input field -->
        <?php
            $skillsArray = json_decode($row["skills_json"], true);
            if (isset($skillsArray) && is_array($skillsArray)) 
            {
                foreach ($skillsArray as $index => $skill) 
                {
                    echo '<div class="skill-input">';
                    echo '<label for="skill_' . ($index + 1) . '">Skill:<span style="color: red;">*</span></label>';
                    echo '<input type="text" name="skills[]" id="skill_' . ($index + 1) . '" value="' . $skill . '" required>';
                    // echo '<button type="button" class="delete-button" onclick="deleteSkill(this)"><i class="fas fa-trash"></i></button>';
                    echo '</div>';
                }
            }


        ?>
      <!-- <div class="skill-input">
        <label for="skill_1">Skill:<span style="color: red;">*</span> </label>
        <input type="text" name="skills[]" id="skill_1" required> -->
        <!-- Delete button for the initial skill -->
        <!-- <button type="button" class="delete-button" onclick="deleteSkill(this)"><i class="fas fa-trash"></i></button> -->
      <!-- </div> -->
    </div>


    

    <!-- Certifications -->
    <h2>Certifications 
      <!-- <button type="button" class="delete-button" onclick="deleteSection('certifications')"><i class="fas fa-trash"></i></button> -->
      <button type="button" class="add-button" onclick="addCertificationSet()"><i class="fas fa-plus"></i></button>
    </h2>
    <div id="certifications-container">
        <!-- Initial certification set -->
        <?php

            $certificationNamesArray = json_decode($row["certification_name_json"], true);
            $certificationByArray = json_decode($row["certification_by_json"], true);
            $certificationYearArray = json_decode($row["certification_year_json"], true);
            
            $certificationCount = count($certificationNamesArray);

            if (isset($certificationNamesArray) && is_array($certificationNamesArray)) 
            {


                for ($i = 0; $i < $certificationCount; $i++) 
                {
                    $cert = $certificationNamesArray[$i];
                    $certi = $certificationByArray[$i];
                    $certiy =  $certificationYearArray[$i];

                    echo '<div class="certification-set">';
                    echo '<div class="section-input">';
                    echo '<label for="certification_name_' . ($i + 1) . '">Certification Name:<span style="color: red;">*</span> </label>';
                    echo '<input type="text" name="certification_name[]" id="certification_name_' . ($i + 1) . '" value="' . $cert . '" required>';
                    echo '</div>';

                    echo '<div class="section-input">';
                    echo '<label for="certified_by_' . ($i + 1) . '">Certified By:<span style="color: red;">*</span> </label>';
                    echo '<input type="text" name="certified_by[]" id="certified_by_' . ($i + 1) . '" value="' . $certi . '" required>';
                    echo '</div>';
                    
                    echo '<div class="section-input">';
                    echo '<label for="certification_year_' . ($i + 1) . '">Year:<span style="color: red;">*</span> </label>';
                    echo '<input type="text" name="certification_year[]" id="certification_year_' . ($i + 1) . '" value="' . $certiy . '" required>';
                    echo '</div>';
                    
                    echo '<div class="section-input">';
                    // Optional: Add delete button for each certification set if needed
                    // echo '<button type="button" class="delete-button" onclick="deleteCertificationSet(this)"><i class="fas fa-trash"></i></button>';
                    echo '</div>';
        
                    echo '</div>';

                }
               
            }


        ?>
      <!-- <div class="certification-set">
        <div class="section-input">
          <label for="certification_name">Certification Name:<span style="color: red;">*</span> </label>
          <input type="text" name="certification_name[]" required>
        </div>
        <div class="section-input">
          <label for="certified_by">Certified By:<span style="color: red;">*</span> </label>
          <input type="text" name="certified_by[]" required>
        </div>
        <div class="section-input">
          <label for="certification_year">Year:<span style="color: red;">*</span> </label>
          <input type="text" name="certification_year[]" required>
        </div>
        <div class="section-input"> -->
          <!-- <button type="button" class="delete-button" onclick="deleteCertificationSet(this)"><i class="fas fa-trash"></i></button> -->
        <!-- </div>
      </div> -->
    </div>

    <!-- Projects -->
    <h2>Projects
      <!-- <button type="button" class="delete-button" onclick="deleteSection('projects')"><i class="fas fa-trash"></i></button> -->
      <button type="button" class="add-button" onclick="addProjectSet()"><i class="fas fa-plus"></i></button>
    </h2>
    <div id="projects-container">
      <!-- Initial project set -->
      <?php

        $projectnameArray = json_decode($row["project_name_json"], true);
        $projecttasksArray = json_decode($row["project_tasks_json"], true);
        $projecttechArray = json_decode($row["project_tech_json"], true);
        $projectlinkArray = json_decode($row["project_link_json"], true);

        $projectCount = count($projectnameArray);
        if (isset($projectnameArray) && is_array($projectnameArray)) 
        {
            for ($i = 0; $i < $projectCount; $i++) 
            {
                $p1 = $projectnameArray[$i];
                $p2 = $projecttasksArray[$i];
                $p3 = $projecttechArray[$i];
                $p4 = $projectlinkArray[$i];

                echo '<div class="project-set">';
                
                echo '<div class="section-input">';
                echo '<label for="project_name_' . ($i + 1) . '">Project Name:<span style="color: red;">*</span> </label>';
                echo '<input type="text" name="project_name[]" id="project_name_' . ($i + 1) . '" value="' . $p1 . '" required>';
                echo '</div>';
                
                echo '<div class="section-input">';
                echo '<label for="tasks_' . ($i + 1) . '">Tasks:<span style="color: red;">*</span> </label>';
                echo '<input type="text" name="tasks[]" id="tasks_' . ($i + 1) . '" value="' . $p2 . '" required>';
                echo '</div>';
                
                echo '<div class="section-input">';
                echo '<label for="tech_' . ($i + 1) . '">Technology Used:<span style="color: red;">*</span> </label>';
                echo '<input type="text" name="tech[]" id="tech_' . ($i+ 1) . '" value="' . $p3 . '" required>';
                echo '</div>';
                
                echo '<div class="section-input">';
                echo '<label for="project_link_' . ($i + 1) . '">Link:<span style="color: red;">*</span> </label>';
                echo '<input type="text" name="project_link[]" id="project_link_' . ($i + 1) . '" value="' . $p4 . '" required>';
                echo '</div>';
                
                echo '<div class="section-input">';
                // Optional: Add delete button for each project set if needed
                // echo '<button type="button" class="delete-button" onclick="deleteProjectSet(this)"><i class="fas fa-trash"></i></button>';
                echo '</div>';

                echo '</div>';
            }
        }

        
      ?>
      <!-- <div class="project-set">
        <div class="section-input">
          <label for="project_name">Project Name:<span style="color: red;">*</span> </label>
          <input type="text" name="project_name[]" required>
        </div>
        <div class="section-input">
          <label for="tasks">Tasks:<span style="color: red;">*</span> </label>
          <input type="text" name="tasks[]" required>
        </div>
        <div class="section-input">
          <label for="tech">Technology Used:<span style="color: red;">*</span> </label>
          <input type="text" name="tech[]" required>
        </div>
        <div class="section-input">
          <label for="project_link">Link:<span style="color: red;">*</span> </label>
          <input type="text" name="project_link[]" required>
        </div>
        <div class="section-input"> -->
          <!-- <button type="button" class="delete-button" onclick="deleteProjectSet(this)"><i class="fas fa-trash"></i></button> -->
        <!-- </div>
      </div> -->
    </div>

    <br> 
    
    <!-- <button type="button" class="delete-button" onclick="deleteSet(this.parentNode)"><i class="fas fa-trash"></i></button> -->
    <br><br><br>
    </div>


    <!-- Achievements -->
    <h2>Achievements
      <!-- <button type="button" class="delete-button" onclick="deleteSection('achievements')"><i class="fas fa-trash"></i></button> -->
      <button type="button" class="add-button" onclick="addAchievementSet()"><i class="fas fa-plus"></i></button>
    </h2>
    <div id="achievements-container">
      <!-- Initial achievement set -->
      <?php
        $achievementsArray = json_decode($row["achievements_json"], true);
        if (isset($achievementsArray) && is_array($achievementsArray)) 
        {
            foreach($achievementsArray as $index => $a)
            {
                echo '<div class="achievement-set">';
            
                echo '<div class="section-input">';
                echo '<label for="achievement_' . ($index + 1) . '">Achievement:<span style="color: red;">*</span> </label>';
                echo '<input type="text" name="achievement[]" id="achievement_' . ($index + 1) . '" value="' . $a . '" required>';
                echo '</div>';
                
                echo '<div class="section-input">';
                // Optional: Add delete button for each achievement set if needed
                // echo '<button type="button" class="delete-button" onclick="deleteAchievementSet(this)"><i class="fas fa-trash"></i></button>';
                echo '</div>';
    
                echo '</div>';
            }
        }

      ?>
      <!-- <div class="achievement-set">
        <div class="section-input">
          <label for="achievement">Achievement:<span style="color: red;">*</span> </label>
          <input type="text" name="achievement[]" required>
        </div>
        <div class="section-input"> -->
          <!-- <button type="button" class="delete-button" onclick="deleteAchievementSet(this)"><i class="fas fa-trash"></i></button> -->
        <!-- </div>
      </div> -->
    </div>

    <!-- Experience -->
    <h2>Experience
      <!-- <button type="button" class="delete-button" onclick="deleteSection('experience')"><i class="fas fa-trash"></i></button> -->
      <button type="button" class="add-button" onclick="addExperienceSet()"><i class="fas fa-plus"></i></button>
    </h2>
    <div id="experience-container">
      <!-- Initial experience set -->

      <?php
         
         $experienceroleArray = json_decode($row["experience_role_json"], true);
         $experiencecompanyArray = json_decode($row["experience_company_json"], true);
         $experiencedurationArray = json_decode($row["experience_duration_json"], true);
         $experiencedescriptionArray = json_decode($row["experience_description_json"], true);


         // var_dump($certificationNamesArray, $certificationByArray);
         $experienceCount = count($experienceroleArray);
         if (isset($experienceroleArray) && is_array($experienceroleArray)) 
         {
            
            for ($i = 0; $i < $experienceCount; $i++) 
            {
                $e1 = $experienceroleArray[$i];
                $e2 = $experiencecompanyArray[$i];
                $e3 = $experiencedurationArray[$i];
                $e4 = $experiencedescriptionArray[$i];

                echo '<div class="experience-set">';
            
                echo '<div class="section-input">';
                echo '<label for="role_' . ($i + 1) . '">Role:<span style="color: red;">*</span></label>';
                echo '<input type="text" name="role[]" id="role_' . ($i + 1) . '" value="' . $e1 . '" required>';
                echo '</div>';
                
                echo '<div class="section-input">';
                echo '<label for="company_' . ($i + 1) . '">Company:<span style="color: red;">*</span></label>';
                echo '<input type="text" name="company[]" id="company_' . ($i + 1) . '" value="' . $e2 . '" required>';
                echo '</div>';
                
                echo '<div class="section-input">';
                echo '<label for="duration_' . ($i + 1) . '">Duration:<span style="color: red;">*</span></label>';
                echo '<input type="text" name="duration[]" id="duration_' . ($i + 1) . '" value="' . $e3 . '" required>';
                echo '</div>';
                
                echo '<div class="section-input">';
                echo '<label for="description_' . ($i + 1) . '">Description:<span style="color: red;">*</span></label>';
                echo '<textarea id="description_' . ($i + 1) . '" name="description[]" rows="4" cols="50" placeholder="Enter a description" maxlength="200" oninput="updateCharacterCount(\'description_' . ($i + 1) . '\', \'description-count_' . ($i + 1) . '\')" required>' . $e4 . '</textarea>';
                echo '<span id="description-count_' . ($i + 1) . '">200 characters remaining</span>';
                echo '</div>';
                
                echo '<div class="section-input">';
                // Add delete button for each experience set
                // echo '<button type="button" class="delete-button" style="top:2vmin;" onclick="deleteExperienceSet(this)"><i class="fas fa-trash"></i></button>';
                echo '</div>';

                echo '</div>';
        


            }

         }

      ?>
      <!-- <div class="experience-set">
        <div class="section-input">
          <label for="role">Role:<span style="color: red;">*</span></label>
          <input type="text" name="role[]" required>
        </div>
        <div class="section-input">
          <label for="company">Company:<span style="color: red;">*</span></label>
          <input type="text" name="company[]" required>
        </div>
        <div class="section-input">
          <label for="duration">Duration:<span style="color: red;">*</span></label>
          <input type="text" name="duration[]" required>
        </div>
        <div class="section-input">
          <label for="description">Description:<span style="color: red;">*</span></label> -->
          <!-- <textarea name="description[]" rows="4" cols="50" placeholder="Enter job description" required></textarea> -->
          <!-- <textarea id="description" name="description[]" rows="4" cols="50" placeholder="Enter a description" maxlength="200" oninput="updateCharacterCount('description', 'description-count')"></textarea>
          <span id="description-count">200 characters remaining</span>
        </div>
        <div class="section-input">
          <button type="button" class="delete-button" style="top:2vmin;" onclick="deleteExperienceSet(this)"><i class="fas fa-trash"></i></button>
        </div>
      </div> -->
    </div>
    
    <!-- <input type="submit" name="submit" value="Submit" id="button" > -->
    <!-- <a href=""><button type="submit">Submit</button></a> -->
    <center><a href=""><button type="submit">Submit</button></a></center>

  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../JS/script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

</body>
</html>

