<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

<body>
    <div class="wrapper">
        <?php include("partials/_sidebar.php"); ?>
        <div class="main">
            <?php include("partials/_navbar.php"); ?>
            <section class="Agents px-4">
                <table class="agent table align-middle bg-white" style="min-width: 700px;">
                    <thead class="bg-light">
                        <tr>
                            <th>Name Candidat</th>
                            <th>description</th>
                            <th>tags</th>
                            <th>status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">John Doe</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">I need someone for InDesign work on a semi-regular basis. Must be proficient in Indesign and page layout. Must be detail-oriented and highly organized. Fast turnaround times are a must and need to work during USA EST business hours.</p>

                            </td>
                            <td>
                                <a href="#" class="f_status">Adobe InDesign Brochure Design Graphic Design PDF Photoshop</a>
                            </td>
                            <td class="f_position">Inactif</td>
                            <td class="">
                                <img class="accept_task w-50" src="dashboard/img/journal-check.svg" alt="icon" >
                                <img class="delet_user w-50" src="dashboard/img/journal-x.svg" alt="icon">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">John Doe</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">I need someone for InDesign work on a semi-regular basis. Must be proficient in Indesign and page layout. Must be detail-oriented and highly organized. Fast turnaround times are a must and need to work during USA EST business hours.                                </p>

                            </td>
                            <td>
                                <a href="#" class="f_status">Adobe InDesign Graphic Design Brochure Design Photoshop PDF</a>
                            </td>
                            <td class="f_position">Actif</td>
                            <td class="">
                                <img class="accept_task w-50" src="dashboard/img/journal-check.svg" alt="icon" >
                                <img class="delet_user w-50" src="dashboard/img/journal-x.svg" alt="icon">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">John Doe</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">I am looking for a metadata expert who can optimize the metadata for my project.</p>

                            </td>
                            <td>
                                <a href="#" class="f_status">Ghostwriting Reviews Search Engine Marketing</a>
                            </td>
                            <td class="f_position">Inactif</td>
                            <td class="">
                                <img class="accept_task w-50" src="dashboard/img/journal-check.svg" alt="icon" >
                                <img class="delet_user w-50" src="dashboard/img/journal-x.svg" alt="icon">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">John Doe</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">I am looking for a freelancer to help me with an AI project it’s very small and I need it in 5 hours.                                </p>

                            </td>
                            <td>
                                <a href="#" class="f_status">Python Mathematics</a>
                            </td>
                            <td class="f_position">Actif</td>
                            <td class="">
                                <img class="accept_task w-50" src="dashboard/img/journal-check.svg" alt="icon" >
                                <img class="delet_user w-50" src="dashboard/img/journal-x.svg" alt="icon">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">John Doe</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">I am looking for a photo editor who can assist me with my project. The specific edits that I require for my photos are color correction. I have more than 20 photos that need editing, and I am looking for a quick turnaround time of within 24 hours.</p>

                            </td>
                            <td>
                                <a href="#" class="f_status">Photoshop Photo Editing Photoshop Design Photography Graphic Design </a>
                            </td>
                            <td class="f_position">Inactif</td>
                            <td class="">
                                <img class="accept_task w-50" src="dashboard/img/journal-check.svg" alt="icon" >
                                <img class="delet_user w-50" src="dashboard/img/journal-x.svg" alt="icon">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">John Doe</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">I need someone for InDesign work on a semi-regular basis. Must be proficient in Indesign and page layout. Must be detail-oriented and highly organized. Fast turnaround times are a must and need to work during USA EST business hours.</p>

                            </td>
                            <td>
                                <a href="#" class="f_status">Adobe InDesign Brochure Design Graphic Design PDF Photoshop</a>
                            </td>
                            <td class="f_position">Actif</td>
                            <td class="">
                                <img class="accept_task w-50" src="dashboard/img/journal-check.svg" alt="icon" >
                                <img class="delet_user w-50" src="dashboard/img/journal-x.svg" alt="icon">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">John Doe</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">I need someone for InDesign work on a semi-regular basis. Must be proficient in Indesign and page layout. Must be detail-oriented and highly organized. Fast turnaround times are a must and need to work during USA EST business hours.</p>

                            </td>
                            <td>
                                <a href="#" class="f_status">Adobe InDesign Brochure Design Graphic Design PDF Photoshop</a>
                            </td>
                            <td class="f_position">Actif</td>
                            <td class="">
                                <img class="accept_task w-50" src="dashboard/img/journal-check.svg" alt="icon" >
                                <img class="delet_user w-50" src="dashboard/img/journal-x.svg" alt="icon">
                            </td>
                        </tr>
                    </tbody>
                </table>


            </section>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="dashboard/dashboard.js"></script>
</body>

</html>