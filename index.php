<?php
    $dateToday = new DateTime();
    $todayDay = $dateToday -> format('j/n/Y');
    $actualYear = $dateToday -> format('Y');
    $actualMonth = $dateToday -> format('n');
    $actualDay = $dateToday -> format('N');
    $actualNumDay = $dateToday -> format('j');
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

    $appointmentArray =
    [
        '7/3/2022' => 'Médecin'
    ];
    
    if (!empty($_GET['years'])) {
        $choiceYear = $_GET['years'];
    } else {
        $choiceYear = $actualYear;
    };
    if (!empty($_GET['months'])) {
        $choiceMonth = $monthsArray[$_GET['months']];
        $choiceNumMonth = $_GET['months'];
    } else {
        $choiceMonth = $monthsArray[$actualMonth];
        $choiceNumMonth = $actualMonth;
    };
    
    if ($choiceNumMonth == 12) {
        $pastMonth = $choiceNumMonth - 1;
        $pastYear = $choiceYear;
        $nextMonth = 01;
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
                    <form action="index.php" method="get">
                        <div class="row px-5 justify-content-center">
                            <div class="col-12 mt-2 col-lg-2 d-flex justify-content-center">
                                <a role="button" href="http://calendar.localhost/index.php?months=<?= $pastMonth; ?>&years=<?= $pastYear; ?>" class="btn calendarBtn"><i class="pastNextIcon bi-caret-left-fill"></i> Précédent</a>
                            </div>
                            <div class="col-12 mt-2 col-lg-3">
                                <select required class="form-select" name="months" aria-label="years select">
                                    <option value=<?= $choiceNumMonth; ?> selected><?= $choiceMonth; ?></option>
                                    <?php
                                        foreach ($monthsArray as $monthKey => $monthValue) {
                                    ?>
                                    <option value=<?=$monthKey?>><?=$monthValue?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 mt-2 col-lg-3">
                                <select required class="form-select" name="years" aria-label="years select">
                                    <option value=<?= $choiceYear; ?> selected><?= $choiceYear; ?></option>
                                    <?php
                                        for ($year = $startYear; $year <= $endYear ; $year++) { 
                                    ?>
                                    <option value=<?=$year?>><?=$year?></option>
                                    <?php
                                        };
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 mt-2 col-lg-2 d-flex justify-content-center">
                                <button type="submit" class="btn calendarBtn">GÉNÉRER</button>
                            </div>
                            <div class="col-12 mt-2 col-lg-2 d-flex justify-content-center">
                                <a role="button" href="http://calendar.localhost/index.php?months=<?= $nextMonth; ?>&years=<?= $nextYear; ?>" class="btn calendarBtn">Suivant <i class="pastNextIcon bi-caret-right-fill"></i></a>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col mt-2 px-5 text-align-center table-responsive">
                            <table class="table table-bordered table-striped">
                                <caption>Calendrier</caption>
                                <thead class="table-dark">
                                    <tr>
                                        <?php
                                            foreach ($daysArray as $dayKey => $dayValue) {
                                        ?>
                                        <th scope="col"><?=$dayValue?></th>
                                        <?php
                                        };
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                            $daysMonthNumber = cal_days_in_month(CAL_GREGORIAN, $choiceNumMonth, $choiceYear);
                                            // $firstDay = date('N', strtotime("$choiceYear-$choiceNumMonth-1"));
                                            $firstDay = date('N', mktime(0, 0, 0, $choiceNumMonth, 1, $choiceYear));
                                            $lastDay = date('N', mktime(0, 0, 0, $choiceNumMonth, $daysMonthNumber, $choiceYear));
                                            for ($i = 0; $i < $firstDay - 1; $i++) { 
                                        ?>
                                        <td role="button" class="dayMonth"></td>
                                        <?php
                                            };
                                            for ($day = 1; $day <= $daysMonthNumber ; $day++) {
                                                $newDay = date('j/n/Y', mktime(0, 0, 0, $choiceNumMonth, $day, $choiceYear));
                                                if ($newDay == $todayDay) {
                                        ?>
                                        <td role="button" class="dayMonth dayToday"><?= $day; ?></td>
                                        <?php
                                                } else {
                                        ?>
                                        <td role="button" class="dayMonth"><?= $day; ?></td>
                                        <?php
                                                };
                                        ?>
                                        <?php
                                                if (($firstDay -1 + $day) % 7 == 0) {
                                        ?>
                                    </tr><tr>
                                        <?php
                                                };
                                            };
                                            if ($day = $daysMonthNumber ) {
                                                for ($i = 7; $i > $lastDay; $i--) {
                                        ?>
                                        <td role="button" class="dayMonth"></td>
                                        <?php
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
</body>

</html>