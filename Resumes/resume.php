<?php
    require '../Database/connect.inc.php';
    
    if(isset($_GET['email']))
    {
        $userid = $_GET['email'];
        $sql = "SELECT * FROM users where mail_id ='$userid'";
        $result = $con->query($sql);
        // echo "hello", $userid;
        $row = $result->fetch_assoc();
        $imagePath = $row['profile_photo_path'];

        //Build the Image URL
        
        $baseUrl = 'http://localhost:8080/CraftingCareers/'; 
        $imageUrl = $baseUrl . '/uploads/' . $imagePath;
        
        echo   '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-xw51gFkSij6Wys+J0S0r+w7ByP9d4I+1jrnhlR8aXpOVPSMIJiFlfs3z9F5lFHj1" crossorigin="anonymous">
            <script src="https://kit.fontawesome.com/540139e47b.js" crossorigin="anonymous"></script>
        
            <style>
                .skills li {
                    display: inline-block;
                    margin-right: 15px;
                    margin-bottom: 10px;
                    margin-left: 0px;
                    padding: 5px 5px;
                    border: 1px solid #ccc;
                    border-radius: 10px;
                    font-size: 12px;
                    line-height: 1.0;
                }
                body{
                    background-color: whitesmoke;
                    font-family: Calibri, sans-serif;
                }
                #resume
                {
                    width: 793px;
                    height: 1120px;
                    background-color: white;
                    margin-left: auto;
                    margin-right: auto;
                }
                #header
                {
                    height: 15%;
                    width: 100%;
                }
                #details
                {
                    height: 100%;
                    width: 625px;
                }
                #profile
                {
                    height: 100%;
                    width: 168px;
                    margin-left: 625px;
                    margin-top: -168px;
                }
                #profile-pic
                {
                    width: 80%;
                    height: 80%;
                    border-radius: 50%;
                    margin-top: 10%;
                    margin-left: 10%;
                }
                #name
                {
                    margin: 40px;
                    margin-top: 20px;
                    margin-bottom: 0px;
                }
                #designation
                {
                    margin: 40px;
                    margin-top: 0px;
                    margin-bottom: 0px;
                    color: rgb(61, 0, 150);
                }
                #table
                {
                    width: 545px;
                    height: 60px;
                    margin-left: 40px;
                    margin-top: 5px;
                }
                #table1
                {
                    width: 400px;
                    height: 38px;
                    margin-left: 37px;
                    margin-top: -5px;
                    margin-bottom:5px;
                }
                table
                {
                    width: 100%;
                    height: 100%;
                }
                td
                {
                    font-size: 10px;
                }
                a
                {
                    text-decoration: none;
                    color: black;
                }
                #left
                {
                    height: 85%;
                    width: 60%;
                }
                #right
                {
                    height: 85%;
                    width: 40%;
                    margin-left: 60%;
                    margin-top: -952px;
                }
                #namee
                {
                    margin: 40px;
                    margin-top: 20px;
                    margin-bottom: 0px;
                    color: rgb(61, 0, 150);
                }
                hr 
                {
                    height: 2px; 
                    background-color: rgb(61, 0, 150);
                    border: none; 
                    margin: 10px 0; 
                    
                }
                #role
                {
                    margin: 40px;
                    margin-top: 15px;
                    margin-bottom: 5px;
                    font-weight: 100;
                    font-size:18px;
                }
                #company
                {
                    margin: 40px;
                    margin-top: 3px;
                    margin-bottom: 10px;
                    font-weight: 800;
                    color: rgb(61, 0, 150);
                    font-size:16px;
                }
                span,p
                {
                    margin: 40px;
                    margin-top: 10px;
                    margin-bottom: 5px;
                    font-weight: 00;
                    font-size: 16px;
                    text-align: justify;
                    color: rgb(87, 86, 86);
                }
                li
                {
                    margin: 20px;
                    margin-right: 40px;
                    margin-top: 5px;
                    margin-bottom: 5px;
                    font-weight: 00;
                    font-size: 14px;
                    text-align: justify;
                    color: rgb(87, 86, 86);
                }
            </style>
        </head>
        <body>
            <center><button onclick="down()" >Download</button></center>
            <div id="resume">
        
                <!-- Header Section  -->
                <div id="header">
                    <div id="details">
                        <br>
                        <h2 id="name" >',$row["full_name"],'</h2>
                        <h3 id="designation">',$row["designation"],'</h3>
                        <div id="table">
                            <table>
                                <tr>
                                    <td style="width: 10px;" ><i class="fa-solid fa-at" style="width: 100%;" ></i></td>
                                    <td style="width: 150px;" ><a href="', $row["mail_id"] , '">', $row["mail_id"] , '</a></td>
                                    <td style="width: 10px;" ><i class="fa-solid fa-phone"></i></td>
                                    <td style="width: 150px;" ><a href="',$row["mobile_number"] , '">', $row["country_code"],' ',$row["mobile_number"] , '</a></td>
                                    <td style="width: 10px;" ><i class="fa-solid fa-location-dot"></i></td>
                                    <td style="width: 150px;"><a href="',$row["address"],'">',$row["address"],'</a></td>
                                </tr>
                                <tr>
                                    <td style="width: 10px;" ><i class="fa-brands fa-linkedin-in"></i></td>
                                    <td style="width: 150px;" ><a href="',$row["linkedin_link"],'">',$row["linkedin_link"],'</a></td>
                                    <td style="width: 10px;" ><i class="fa-brands fa-github"></i></td>
                                    <td style="width: 150px;" ><a href="',$row["github_link"],'">',$row["github_link"],'</a></td>
                                    <td style="width: 10px;" ><i class="fa-brands fa-hackerrank"></i></td>
                                    <td style="width: 150px;"><a href="',$row["hackerrank_link"],'">',$row["hackerrank_link"],'</a></td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                    <div id="profile">
                        <img src="',$imageUrl,'" alt="" id="profile-pic" >
                    </div>
                </div>
        
                <!-- Body Part -->
                <div id="left">';

                    $experienceroleArray = json_decode($row["experience_role_json"], true);
                    $experiencecompanyArray = json_decode($row["experience_company_json"], true);
                    $experiencedurationArray = json_decode($row["experience_duration_json"], true);
                    $experiencedescriptionArray = json_decode($row["experience_description_json"], true);


                    // var_dump($certificationNamesArray, $certificationByArray);
                    $experienceCount = count($experienceroleArray);
                    if($experienceCount >0)
                    {
                        echo '<h2 id="namee" >WORK EXPERIENCE</h2>
                        <hr style="margin:40px;margin-top:0px;margin-bottom:10px">';
                    }        
                    // <h2 id="namee" >WORK EXPERIENCE</h2>
                    // <hr style="margin:40px;margin-top:0px;margin-bottom:10px">

                    for ($i = 0; $i < $experienceCount; $i++) 
                    {
                        $e1 = $experienceroleArray[$i];
                        $e2 = $experiencecompanyArray[$i];
                        $e3 = $experiencedurationArray[$i];
                        $e4 = $experiencedescriptionArray[$i];

                        echo '<h4 id="role" >',$e1 ,'</h4>
                        <h5 id="company">', $e2, '</h5>
                        <span><i class="far fa-calendar-alt calendar-icon"></i> ', $e3, '</span>
                        <p>', $e4, '</p>';

                    }
        
                    // <h4 id="role" >Full Stack Developer</h4>
                    // <h5 id="company">OurEye.ai</h5>
                    // <span><i class="far fa-calendar-alt calendar-icon"></i> December 22, 2023</span>
                    // <p>Developed scalable and highly interactive mobile applications using React Native and WebApplications using ReactJS. Additionally Handling APIs and making new features.</p>
        
                    echo '
        
                    <h2 id="namee" >EDUCATION</h2>
                    <hr style="margin:40px;margin-top:0px;margin-bottom:10px">
        
                    <h4 id="role" > ',$row["degree_name"],' in ',$row["specialization"] , '</h4>
                    <div id="table1">
                        <table>
                            <tr>
                                <td style="font-size: 16px;color:rgb(61, 0, 150);font-weight:550;" >',$row["degree_place"],'</td>
                                <td style="font-size: 16px;text-align:right;color:rgb(61, 0, 150);font-weight:550;width: 140px;" > <i class="fas fa-graduation-cap graduation-cap-icon"></i> CGPA: ',$row["degree_cgpa"],'</td>
                            </tr>
                        </table>
                    </div>
                    <span><i class="far fa-calendar-alt calendar-icon"></i> ', $row["degree_duration"],'</span>
        
                    <h4 id="role" style="margin-top: 30px;" > ',$row["senior_secondary_name"],'</h4>
                    <div id="table1">
                        <table>
                            <tr>
                                <td style="font-size: 16px;color:rgb(61, 0, 150);font-weight:550;" >',$row["senior_secondary_place"],'</td>
                                <td style="font-size: 16px;text-align:right;color:rgb(61, 0, 150);font-weight:550;width: 140px;" > <i class="fas fa-graduation-cap graduation-cap-icon"></i> CGPA: ',$row["senior_secondary_gpa"],'</td>
                            </tr>
                        </table>
                    </div>
                    <span><i class="far fa-calendar-alt calendar-icon"></i> ', $row["senior_secondary_duration"],'</span>
        
                    <h4 id="role" style="margin-top: 30px;"> Secondary (X)</h4>
                    <div id="table1">
                        <table>
                            <tr>
                                <td style="font-size: 16px;color:rgb(61, 0, 150);font-weight:550;" >',$row["secondary_place"],'</td>
                                <td style="font-size: 16px;text-align:right;color:rgb(61, 0, 150);font-weight:550;width: 140px;" > <i class="fas fa-graduation-cap graduation-cap-icon"></i> CGPA: ',$row["secondary_gpa"],'</td>
                            </tr>
                        </table>
                    </div>
                    <span><i class="far fa-calendar-alt calendar-icon"></i> ', $row["secondary_duration"],'</span>
        
                    
        
        
                    
                </div>
                <div id="right">
                    <h2 id="namee" style="margin-top: 0%;" >ACHIEVEMENTS</h2>
                    <hr style="margin:40px;margin-top:0px;margin-bottom:20px;">';
                    $achievementsArray = json_decode($row["achievements_json"], true);
                    foreach($achievementsArray as $a)
                    {
                        echo '<p><i class="fas fa-trophy achievement-icon"></i> ', $a , '</p>';
                    }
                    // <p><i class="fas fa-trophy achievement-icon"></i> Winner Quantum Hack International Hackathon Made an application using React Native that lets users use their vacant space for organic farming thereby reducing pollution, generate income and employment.</p>
                    // <p><i class="fas fa-trophy achievement-icon"></i> Organizer Award - HackSRM 2019 HackSRM is a premium student led national level hackathon held in India that aims to gather the great student minds under one roof and solve potential real world problem through technology.</p>
                    $projectnameArray = json_decode($row["project_name_json"], true);
                    $projecttasksArray = json_decode($row["project_tasks_json"], true);
                    $projecttechArray = json_decode($row["project_tech_json"], true);
                    $projectlinkArray = json_decode($row["project_link_json"], true);

                    $projectCount = count($projectnameArray);
                    if($projectCount > 0)
                    {
                        echo ' <h2 id="namee" style="margin-top: 20px;" >PROJECTS</h2>
                        <hr style="margin:40px;margin-top:0px;margin-bottom:20px;">';
                    }
                    // <h2 id="namee" style="margin-top: 20px;" >PROJECTS</h2>
                    // <hr style="margin:40px;margin-top:0px;margin-bottom:20px;">

                    for ($i = 0; $i < $projectCount; $i++) 
                    {
                        $p1 = $projectnameArray[$i];
                        $p2 = $projecttasksArray[$i];
                        $p3 = $projecttechArray[$i];
                        $p4 = $projectlinkArray[$i];

                        echo '<h4 id="role" style="font-weight: 1000;"> ', $p1 ,'</h4>
                        <ul>
                            <li>', $p2 ,'</li>
                            <li> Tech Stack: ', $p3 ,'</li>
                        </ul>';   
                    }

                    // <h4 id="role" style="font-weight: 1000;"> React Native App</h4>
                    // <ul>
                        
                    //     <li>Tech Stack: React Native, JS/JSX, Python,
                    //         FastAPI, MongoDB, Expo, Android Studio.</li>
                    // </ul>
        
                    // <h4 id="role" style="font-weight: 1000;"> React Native App</h4>
                    // <ul>
                        
                    //     <li>Tech Stack: React Native, JS/JSX, Python,
                    //         FastAPI, MongoDB, Expo, Android Studio.</li>
                    // </ul>
        
                    // <h4 id="role" style="font-weight: 1000;"> React Native App</h4>
                    // <ul>
                        
                    //     <li>Tech Stack: React Native, JS/JSX, Python,
                    //         FastAPI, MongoDB, Expo, Android Studio.</li>
                    // </ul>
                    echo '
                    <h2 id="namee" style="margin-top: 20px;" >SKILLS</h2>
                    <hr style="margin:40px;margin-top:0px;margin-bottom:20px;">
                    <div class="skills">
                        <ul>';
                            $skillsArray = json_decode($row["skills_json"], true);
                            foreach($skillsArray as $s)
                            {
                                
                                echo '<li>', $s,'</li>';
                            }
                            // <li>C,Java</li>
                            // <li>Flutter, Dart</li>
                            // <li>GIT &AMP; LINUX</li>
                            // <li>HTML, CSS</li>
                            // <li>JavaScript</li>
                            // <li>Php, Mysql</li>
                            // <li>Networking</li>
                            // <li>Figma, Prototyping</li>
                            echo '
                        </ul>
                    </div>
                </div>
        
            </div>
            <script>
                function down()
                {
                    var element = document.getElementById("resume");
                    var opt = {
                        margin: 0,
                        filename: "resume.pdf",
                        image: { type: "jpeg", quality: 1.00 },
                        html2canvas: { scale: 3 },
                        jsPDF: { unit: "mm", format: "a4", orientation: "portrait" }
                    };
                    
                    html2pdf(element, opt);
                }
            </script>
        </body>
        </html>';
              
    }

?>