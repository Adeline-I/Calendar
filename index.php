<?php
    $dateToday = new DateTime();
    $actualYear = $dateToday -> format('Y');
    $actualMonth = $dateToday -> format('n');
    $actualDay = $dateToday -> format('N');
    $actualNumDay = $dateToday -> format('j');
    // $daysMonthNumber = cal_days_in_month(CAL_GREGORIAN, $choiceNumMonth, $choiceYear);
    $startYear = $actualYear - 30;
    $endYear = $actualYear + 30;
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
    if (!empty($_POST['years'])) {
        $choiceYear = $_POST['years'];
    } else {
        $choiceYear = $actualYear;
    };
    if (!empty($_POST['months'])) {
        $choiceMonth = $monthsArray[$_POST['months']];
        $choiceNumMonth = $_POST['months'];
    } else {
        $choiceMonth = $monthsArray[$actualMonth];
        $choiceNumMonth = $actualMonth;
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Calendrier</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand h1 ps-5" href="index.php">Calendrier - <?= $choiceMonth.' '.$choiceYear; ?></a>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <form action="index.php" method="post">
                        <div class="row px-5 justify-content-center">
                            <div class="col-12 mt-3 col-lg-2">
                                <select required class="form-select" name="months" aria-label="years select">
                                    <option value="<?= $actualMonth; ?>" selected><?= $monthsArray[$actualMonth]; ?></option>
                                    <?php
                                        foreach ($monthsArray as $monthKey => $monthValue) {
                                            echo '<option value="'.$monthKey.'">'.$monthValue.'</option>';
                                        };
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 mt-3 col-lg-2">
                                <select required class="form-select" name="years" aria-label="years select">
                                    <option value="<?= $actualYear; ?>" selected><?= $actualYear; ?></option>
                                    <?php
                                        for ($year = $startYear; $year <= $endYear ; $year++) { 
                                            echo '<option value="'.$year.'">'.$year.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 mt-3 col-lg-2 d-flex justify-content-center">
                                <button type="submit" class="btn calendarBtn">GÉNÉRER</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col mt-3 px-5 text-align-center table-responsive">
                            <table class="table table-bordered table-striped">
                                <caption>Calendrier</caption>
                                <thead class="table-dark">
                                    <tr>
                                    <?php
                                        foreach ($daysArray as $dayKey => $dayValue) {
                                            echo '<th scope="col">'.$dayValue.'</th>';
                                        };
                                    ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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