<?php
    $days = array
    (
        'Lundi',
        'Mardi',
        'Mercredi',
        'Jeudi',
        'Vendredi',
        'Samedi',
        'Dimanche'
    );
    $months = array
    (
        'Janvier',
        'Février',
        'Mars',
        'Avril',
        'Mai',
        'Juin',
        'Juillet',
        'Août',
        'Septembre',
        'Octobre',
        'Novembre',
        'Décembre'
    );

    function getAll($year) {
    $result = array();
    $date = new DateTime($year.'-01-01');
    while ($date -> format('Y') <= $year) {
        $y = $date -> format('Y');
        $m = $date -> format('n');
        $d = $date -> format('j');
        $w = $date -> format('N');
        $result[$y][$m][$d] = $w;
        $date -> add(new DateInterval('P1D'));
    };
    return $result;
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
</head>
<body>
    <?php
        $date = new DateTime();
        $year = date('Y');
        $dates = $date -> getAll($year);
    ?>
    <div class="periods">
        <div class="year">
            <?= $year; ?>
        </div>
        <div class="months">
            <ul>
                <?php foreach ($date -> months as $id => $m) 
                { ?>
                <li><a href="#" id="linkMonth<?= $id + 1; ?>"><?= $m; ?></a></li>
                <?php 
                }; ?>
            </ul>
        </div>
        <?php $dates = current($dates); ?>
        <?php foreach ($dates as $m => $days)
        { 
        ?>
            <div class="month" id="month <?= $m; ?>">
                <table>
                    <thead>
                        <tr>
                            <?php foreach ($date -> days as $d) 
                            { 
                            ?>
                                <th><?= $d; ?></th>
                            <?php 
                            }; 
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $end = end($days); foreach ($days as $d => $w) 
                            { 
                            ?>
                                <?php if ($d == 1) 
                                {
                                ?>
                                    <td colspan="<?= $w - 1; ?>"></td>
                                <?php
                                };
                                ?>
                                <td>
                                    <?= $d; ?>
                                </td>
                                <?php if ($w == 7) 
                                { 
                                ?>
                                    <tr></tr>
                                <?php
                                };
                                ?>
                            <?php
                            };
                            ?>
                            <?php if($end != 7) 
                            {
                            ?>
                                <td colspan="<?= 7 - $end; ?>"></td>
                            <?php
                            };
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php 
        }; 
        ?>
    </div>
</body>
</html>