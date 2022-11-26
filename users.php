<?php

include('datas.php');

?>

<?php


//Delete a driver
if (isset($_GET['deleteDriver']) &&  $_GET['deleteDriver'] == 'yes') {

    $deleteQuery = $db->prepare("DELETE FROM chauffeurs WHERE id_chauffeur= {$_GET['driverId']}")->execute();
}


//Add new driver

if ((isset($_POST['driver_name']) && $_POST['driver_name'] != '') && (isset($_POST['driver_email']) && isset($_POST['driver_phone']) && $_POST['driver_phone'] != '')) {


    $addQuery = $db->prepare("INSERT INTO chauffeurs (nom_et_prenom_chauffeur,adresse_email_chauffeur,numero_de_telephone_chauffeur) VALUES ('{$_POST['driver_name']}','{$_POST['driver_email']}','{$_POST['driver_phone']}')")->execute();

    echo "<script type='text/javascript'> 
    document.getElementById('driversList'). load(window. location. href + ' #driversList' );
    </script>";
}











//Delete an employe
if (isset($_GET['deleteEmploye']) &&  $_GET['deleteEmploye'] == 'yes') {

    $deleteQuery = $db->prepare("DELETE FROM employes WHERE id_employe= {$_GET['employeId']}")->execute();
}

// //Update an employe

// if (isset($_GET['modifEmploye']) && isset($_GET['employeId'])) {

//     if ($_GET['isValidated'] == 'yes') {

//         $name = "<script>document.write(document.querySelector('#username').value);</script>";
//         $email =  "<script>document.write(document.querySelector('#email').value);</script>";
//         $matricule = "<script>document.write(document.querySelector('#matricule').value);</script>";

//         $updateQuery = $db->prepare("UPDATE employes SET nom_et_prenom= '{$name}', adresse_email='{$email}',numero_matricule='{$matricule}'WHERE id_employe= {$_GET['idEmploye']}")->execute();
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">


<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UTILISATEURS VBS-TRANSPORT</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <!-- Sidebar space-->
        <?php include('components/sidebar.php'); ?>

        <!------------------>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6 col-md-6 order-md-1 ">
                            <h3>Gestion des utilisateurs</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 ">

                        </div>
                    </div>
                </div><br />
                <section class="section" id="employesList">
                    <div class="card">
                        <div class="card-header">
                            <h4>Employés enregistrés <span Class="me-50"> 👥 </span></h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>N.Matricule</th>
                                        <th>Nom & Prénom</th>
                                        <th>Email</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($employes as $employe) {

                                        $matricule = "<td>{$employe['numero_matricule']} </td>";
                                        $email = "<td>{$employe['adresse_email']} </td>";
                                        $username = "<td>{$employe['nom_et_prenom']}</td>";
                                        $action = "<td><a href='users.php?menuItem=2&modifEmploye=yes&employeId={$employe['id_employe']} #employesList' class='btn icon icon-left'><i class='bi bi-pencil'></i>Modifier</a></td>";

                                        if (isset($_GET['modifEmploye'])) {

                                            if ($_GET['modifEmploye'] == 'yes' && $_GET['employeId'] == intval($employe['id_employe'])) {
                                                $matricule = "<td><input type='text' placeholder='' value='{$employe['numero_matricule']}' id='matricule' name='matricule' class='form-control'></td>";
                                                $email = "<td><input type='email' placeholder='' value='{$employe['adresse_email']}' id='email' name='email' class='form-control'></td>";
                                                $username = "<td><input type='text' placeholder='' value='{$employe['nom_et_prenom']}' id='username' name='username' class='form-control'></td>";
                                                $action = "<td><a href='users.php?menuItem=2&isValidated=yes&modifEmploye=no&employeId={$employe['id_employe']} #employesList' class='btn icon icon-left'><i class='bi bi-check2'></i>Valider</a></td>";
                                            } else {

                                                $matricule = "<td>{$employe['numero_matricule']} </td>";
                                                $email = "<td>{$employe['adresse_email']} </td>";
                                                $username = "<td>{$employe['nom_et_prenom']}</td>";
                                                $action = "<td><a href='users.php?menuItem=2&modifEmploye=yes&employeId={$employe['id_employe']} #employesList' class='btn icon icon-left'><i class='bi bi-pencil'></i>Modifier</a></td>";
                                            }
                                        }
                                        echo "<tr>
                                                <form method='post' action='users.php'>
                                                    $matricule $username $email
                                                    $action
                                                    
                                                    <td><a href='users.php?menuItem=2&deleteEmploye=yes&employeId={$employe['id_employe']} #employesList' class='btn icon icon-left'><i class='bi bi-trash'></i></a></td>
                                                </form>
                                            </tr> ";
                                    }

                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
                <br />
                <section class="section" id="driversList">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-6 col-md-6 order-md-1 ">
                                    <h4>Chauffeurs enregistrés <span Class="me-50"> 🚘 </span></h4>
                                </div>
                                <div class="col-12 col-md-6 order-md-2 ">
                                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                            <span Class="me-50"> ➕ </span> Nouveau chauffeur
                                        </button>


                                        <!--login form Modal -->
                                        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33">Enregistrement de nouveau chauffeur</h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>


                                                    </div>

                                                    <form id="driver_form" method="post" action="users.php?menuItem=2 #driversList">
                                                        <div class="modal-body">
                                                            <label><b>Nom & Prénom:</b> </label>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Le nom entier du chauffeur" name="driver_name" class="form-control">
                                                            </div>
                                                            <label><b>Email</b>(facultatif)<b>:</b></label>
                                                            <div class="form-group">
                                                                <input type="email" placeholder="Adresse email" name="driver_email" class="form-control">
                                                            </div>
                                                            <label><b>Numéro de téléphone:</b> </label>
                                                            <div class="form-group">
                                                                <input type="phone" placeholder="Numéro de téléphone du chauffeur" name="driver_phone" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block bi bi-x"></i>
                                                                <span class="d-none d-sm-block">Annuler</span>
                                                            </button>

                                                            <button onclick="form_submit()" class="btn btn-primary ml-1">
                                                                <i class="bx bx-x d-block bi bi-check2"></i>
                                                                <span class="d-none d-sm-block">Enregistrer</span>
                                                            </button>


                                                        </div>
                                                    </form>


                                                    <script type="text/javascript">
                                                        function form_submit() {
                                                            document.getElementById("driver_form").submit();
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table2">
                                <thead>
                                    <tr>
                                        <th>Nom & Prénom</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php



                                    foreach ($drivers as $driver) {

                                        $driverName = "<td>{$driver['nom_et_prenom_chauffeur']} </td>";
                                        $driverEmail = "<td>{$driver['adresse_email_chauffeur']} </td>";
                                        $driverPhone = "<td>{$driver['numero_de_telephone_chauffeur']}</td>";
                                        $action = "<td><a href='users.php?menuItem=2&modifDriver=yes&driverId={$driver['id_chauffeur']} #driversList' class='btn icon icon-left'><i class='bi bi-pencil'></i>Modifier</a></td>";

                                        if (isset($_GET['modifDriver'])) {

                                            if ($_GET['modifDriver'] == 'yes' && $_GET['driverId'] == intval($driver['id_chauffeur'])) {
                                                $driverName = "<td><input type='text' placeholder='' value='{$driver['nom_et_prenom_chauffeur']}' id='chauffeur_name' name='chauffeur_name' class='form-control'></td>";
                                                $driverEmail = "<td><input type='email' placeholder='' value='{$driver['adresse_email_chauffeur']}' id='email_chauffeur' name='email_chauffeur' class='form-control'></td>";
                                                $driverPhone = "<td><input type='text' placeholder='' value='{$driver['numero_de_telephone_chauffeur']}' id='chauffeur_name' name='chauffeur_name' class='form-control'></td>";
                                                $action = "<td><a href='users.php?menuItem=2&isValidatedDriver=yes&modifDriver=no&driverId={$driver['id_chauffeur']} #driversList' class='btn icon icon-left'><i class='bi bi-check2'></i>Valider</a></td>";
                                            } else {

                                                $driverName = "<td>{$driver['nom_et_prenom_chauffeur']} </td>";
                                                $driverEmail = "<td>{$driver['adresse_email_chauffeur']} </td>";
                                                $driverPhone = "<td>{$driver['numero_de_telephone_chauffeur']}</td>";
                                                $action = "<td><a href='users.php?menuItem=2&modifDriver=yes&driverId={$driver['id_chauffeur']} #driversList' class='btn icon icon-left'><i class='bi bi-pencil'></i>Modifier</a></td>";
                                            }
                                        }
                                        echo "<tr>
                                                <form method='post' action='users.php'>
                                                    $driverName $driverEmail $driverPhone
                                                    $action
                                                    
                                                    <td><a href='users.php?menuItem=2&deleteDriver=yes&driverId={$driver['id_chauffeur']} #driversList' class='btn icon icon-left'><i class='bi bi-trash'></i></a></td>
                                                </form>
                                            </tr> ";
                                    }

                                    ?>



                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>

            <!-- Sidebar space-->
            <?php include('components/footer.php'); ?>

            <!------------------>
        </div>
    </div>




    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>



    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/toastify/toastify.js"></script>
    <script src="assets/js/extensions/toastify.js"></script>


    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable1 = new simpleDatatables.DataTable(table1);

        let table2 = document.querySelector('#table2');
        let dataTable2 = new simpleDatatables.DataTable(table2);
    </script>

    <script src="assets/js/main.js"></script>
</body>

</html>