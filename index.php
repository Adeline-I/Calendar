<?php
    $dateToday = new DateTime();
    $todayDay = $dateToday -> format('Y-m-d');
    $actualYear = $dateToday -> format('Y');
    $actualMonth = $dateToday -> format('m');
    $actualMonthNot = $dateToday -> format('n');
    $actualDay = $dateToday -> format('N');
    $actualNumDay = $dateToday -> format('d');
    $startYear = $actualYear - 30;
    $endYear = $actualYear + 30;
    $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE, 'Europe/Paris');
    $todayFr = $formatter->format($dateToday);
    
    $daysArray =
    [
        '1' => 'Lundi',
        '2' => 'Mardi',
        '3' => 'Mercredi',
        '4' => 'Jeudi',
        '5' => 'Vendredi',
        '6' => 'Samedi',
        '7' => 'Dimanche'
    ];
    
    $monthsArray =
    [
        '1' => 'Janvier',
        '2' => 'Février',
        '3' => 'Mars',
        '4' => 'Avril',
        '5' => 'Mai',
        '6' => 'Juin',
        '7' => 'Juillet',
        '8' => 'Août',
        '9' => 'Septembre',
        '10' => 'Octobre',
        '11' => 'Novembre',
        '12' => 'Décembre'
    ];

    // Rendez-vous
    $appointmentArray = [];
    if (!empty($_POST['lastnameAppointment']) && 
        !empty($_POST['firstnameAppointment']) &&
        !empty($_POST['gynecoObstetricConsultAppointment']) &&
        !empty($_POST['dateAppointment'])) {
            $lastnameAppointment = $_POST['lastnameAppointment'];
            $firstnameAppointment = $_POST['firstnameAppointment'];
            $gynecoObstetricConsultAppointment = $_POST['gynecoObstetricConsultAppointment'];
            $dateAppointment = $_POST['dateAppointment'];

            $appointmentObject =
                (object)
                    [
                        'lastname' => $lastnameAppointment,
                        'firstname' => $firstnameAppointment,
                        'gynecoObstetricConsult' => $gynecoObstetricConsultAppointment,
                        'dateAppointment' => $dateAppointment
                    ];
            array_push($appointmentArray, $appointmentObject);
    };

    // $appointmentArray = [
    //     (object) 
    //         [
    //             'date' => '10/3/2022',
    //             'type' => 'Dentiste',
    //             'name' => 'Dupont'
    //         ],
    //     (object)
    //         [
    //             'date' => '10/3/2022',
    //             'type' => 'Coiffeur',
    //             'name' => 'Durand'
    //         ],
    //     (object)
    //         [
    //             'date' => '10/3/2022',
    //             'type' => 'Médecin',
    //             'name' => 'Doe'
    //         ]
    //         ];
            
    //Navbar : affichage mois et année
    if (!empty($_GET['years'])) {
        $choiceYear = $_GET['years'];
    } else {
        $choiceYear = $actualYear;
    };
    if (!empty($_GET['months'])) {
        $choiceMonth = $monthsArray[$_GET['months']];
        $choiceNumMonth = $_GET['months'];
    } else {
        $choiceMonth = $monthsArray[$actualMonthNot];
        $choiceNumMonth = $actualMonth;
    };
    //Boutons suivant et précédent
    if ($choiceNumMonth == 12) {
        $pastMonth = $choiceNumMonth - 1;
        $pastYear = $choiceYear;
        $nextMonth = 1;
        $nextYear = $choiceYear + 1;
    } else if ($choiceNumMonth == 01) {
        $pastMonth = 12;
        $pastYear = $choiceYear - 1;
        $nextMonth = $choiceNumMonth + 1;
        $nextYear = $choiceYear;
    } else {
        $pastMonth = $choiceNumMonth - 1;
        $pastYear = $choiceYear;
        $nextMonth = $choiceNumMonth + 1;
        $nextYear = $choiceYear;
    };
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Calendrier</title>
</head>

<body>
    <header>
        <!-- NavBar -->
        <nav class="navbar navbar-dark">
            <div class="container-fluid px-5">
                <a class="navbar-brand h1" href="index.php">Calendrier - <?= $choiceMonth.' '.$choiceYear; ?></a>
                <h3 class="todayFr"><?= $todayFr; ?></h3>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-10">
                            <form action="index.php" method="get">
                                <div class="row px-5 justify-content-center">
                                    <div class="col-12 mt-2 col-lg-2 d-flex justify-content-center">
                                        <!-- Bouton mois précédent -->
                                        <a role="button" href="http://calendar.localhost/index.php?months=<?= $pastMonth; ?>&years=<?= $pastYear; ?>" class="btn calendarBtn"><i class="pastNextIcon bi-caret-left-fill"></i> Précédent</a>
                                    </div>
                                    <div class="col-12 mt-2 col-lg-3">
                                        <!-- Sélection du mois -->
                                        <select required class="form-select" name="months" aria-label="years select">
                                            <?php
                                                foreach ($monthsArray as $monthKey => $monthValue) {
                                            ?>
                                                    <option 
                                                        <?php
                                                            if($monthKey == $choiceNumMonth || empty($choiceNumMonth)) {
                                                                echo 'selected="selected"';
                                                            };
                                                        ?> 
                                                        value=<?=$monthKey?>><?=$monthValue?></option>
                                            <?php
                                                };
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 mt-2 col-lg-3">
                                        <!-- Sélection de l'année -->
                                        <select required class="form-select" name="years" aria-label="years select">
                                            <?php
                                                for ($year = $startYear; $year <= $endYear ; $year++) { 
                                            ?>
                                                    <option
                                                    <?php
                                                        if($year == $choiceYear || empty($choiceYear)) {
                                                            echo 'selected="selected"';
                                                        };
                                                    ?> 
                                                    value=<?=$year?>><?=$year?></option>
                                            <?php
                                                };
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 mt-2 col-lg-2 d-flex justify-content-center">
                                        <!-- Envoi du formulaire pour générer le calendrier -->
                                        <button type="submit" class="btn calendarBtn">GÉNÉRER</button>
                                    </div>
                                    <div class="col-12 mt-2 col-lg-2 d-flex justify-content-center">
                                        <!-- Bouton mois suivant -->
                                        <a role="button" href="http://calendar.localhost/index.php?months=<?= $nextMonth; ?>&years=<?= $nextYear; ?>" class="btn calendarBtn">Suivant <i class="pastNextIcon bi-caret-right-fill"></i></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-2 mt-2 d-flex justify-content-center">
                            <!-- Bouton modal Rendez-vous -->
                            <button type="button" class="btn appointmentBtn" data-bs-toggle="modal" data-bs-target="#appointmentModal">
                                Rendez-vous
                            </button>
                            <!-- Bouton modal Rendez-vous -->
                            <!-- Modal Rendez-vous -->
                            <div class="modal fade" id="appointmentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="appointmentModalLabel">Rendez-vous</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="index.php" method="post">
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="lastnameAppointment" id="lastnameAppointment" placeholder="Nom">
                                                                <label for="lastnameAppointment">Nom</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="firstnameAppointment" id="firstnameAppointment" placeholder="Prénom">
                                                                <label for="firstnameAppointment">Prénom</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="date" class="form-control" name="dateAppointment" id="dateAppointment" placeholder="Date">
                                                                <label for="dateAppointment">Date</label>
                                                            </div>
                                                            <p>Type de rendez-vous :</p>
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" type="radio" name="gynecoObstetricConsultAppointment" id="gynecoConsultAppointment" value="Consultation Gynécologique" checked>
                                                                <label class="form-check-label" for="gynecoConsultAppointment">Consultation Gynécologique</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="gynecoObstetricConsultAppointment" id="obstetricConsultAppointment" value="Consultation Obstétrique">
                                                                <label class="form-check-label" for="obstetricConsultAppointment">Consultation Obstétrique</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn saveBtn">ENREGISTRER</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Rendez-vous -->
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mt-2 px-5 text-align-center table-responsive">
                            <!-- Structure du calendrier -->
                            <table class="table table-bordered table-striped">
                                <caption>Calendrier</caption>
                                <thead class="table-dark">
                                    <!-- En-tête des jours de la semaine -->
                                    <tr>
                                        <?php
                                            foreach ($daysArray as $dayKey => $dayValue) {
                                                echo '<th scope="col">'.$dayValue.'</th>';
                                            };
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Remplissage des dates en fonction du mois et de l'année choisis -->
                                    <tr>
                                        <?php
                                            $daysMonthNumber = cal_days_in_month(CAL_GREGORIAN, $choiceNumMonth, $choiceYear);
                                            $daysMonthNumberPast = cal_days_in_month(CAL_GREGORIAN, $pastMonth, $pastYear);
                                            // Autre solution : $firstDay = date('N', strtotime("$choiceYear-$choiceNumMonth-1"));
                                            $firstDay = date('N', mktime(0, 0, 0, $choiceNumMonth, 1, $choiceYear));
                                            $lastDay = date('N', mktime(0, 0, 0, $choiceNumMonth, $daysMonthNumber, $choiceYear));
                                            $firstDayNext = date('j', mktime(0, 0, 0, $nextMonth, 1, $nextYear));
                                            $lastDayPast = date('j', mktime(0, 0, 0, $pastMonth, $daysMonthNumberPast, $pastYear));
                                            $lastDayPast = $lastDayPast - $firstDay + 2;
                                            // Ajout de cases vides au début si le 1er jour du mois ne tombe pas un lundi
                                            for ($i = 0; $i < $firstDay - 1; $i++) { 
                                                echo '<td class="lastDayPast">'.$lastDayPast.'</td>';
                                                $lastDayPast = $lastDayPast + 1;
                                            };

                                            // Les différents jours du mois
                                            for ($day = 1; $day <= $daysMonthNumber ; $day++) {
                                                $newDay = date('Y-m-d', mktime(0, 0, 0, $choiceNumMonth, $day, $choiceYear));

                                                $dayTodayClasse = '';
                                                $dayEvent = '';
                                                // Si le jour ajouté est le jour d'aujourd'hui
                                                if ($newDay == $todayDay) {
                                                    $dayTodayClasse = 'dayToday';
                                                };
                                                // S'il existe un rendez-vous au jour ajouté
                                                if (!empty($appointmentArray)) {
                                                    foreach ($appointmentArray as $appointmentKey => $appointmentValue) {
                                                        if ($newDay == ($appointmentArray[$appointmentKey]->dateAppointment)) {
                                                            $dayEvent = $dayEvent.' <div class="dayAppointement">'.$appointmentArray[$appointmentKey]->lastname.' '.$appointmentArray[$appointmentKey]->gynecoObstetricConsult.'</div>';
                                                        };
                                                    };
                                                };
                                                echo '<td class="dayMonth '.$dayTodayClasse.'">'.$day.' '.$dayEvent.'</td>';

                                                if (($firstDay -1 + $day) % 7 == 0) {
                                                    echo '</tr><tr>';
                                                };

                                            };

                                            // Ajout de cases vides à la fin si le dernier jour du mois ne tombe pas un dimanche
                                            if ($day = $daysMonthNumber ) {
                                                for ($i = 7; $i > $lastDay; $i--) {
                                                    echo '<td class="firstDayNext">'.$firstDayNext.'</td>';
                                                    $firstDayNext = $firstDayNext + 1;
                                                };
                                            };
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>