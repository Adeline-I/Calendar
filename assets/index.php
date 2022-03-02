<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Partie 9 - TP Calendrier</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8 my-5 py-5">
                <h1>Partie 9 : Les dates</h1>
            </div>
            <div class="col-8 mb-5 py-5">
                <h3>TP Calendrier</h3>
                <h5>
                    Faire un formulaire avec deux listes déroulantes.<br>
                    La première sert à choisir le mois, et le deuxième permet d'avoir l'année.<br> 
                    En fonction des choix, afficher un calendrier. 
                </h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 mb-5 py-5">
            <form action="planning.html" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-floating">
                                    <select class="form-select" id="monthCalendar" aria-label="monthCalendarLabel">
                                            <option selected>Sélection</option>
                                            <option value="1">Janvier</option>
                                            <option value="2">Février</option>
                                            <option value="3">Mars</option>
                                            <option value="4">Avril</option>
                                            <option value="5">Mai</option>
                                            <option value="6">Juin</option>
                                            <option value="7">Juillet</option>
                                            <option value="8">Août</option>
                                            <option value="9">Septembre</option>
                                            <option value="10">Octobre</option>
                                            <option value="11">Novembre</option>
                                            <option value="12">Décembre</option>
                                        </select>
                                        <label for="monthCalendar">Mois</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-floating">
                                    <select class="form-select" id="yearsCalendar" aria-label="yearsCalendarLabel">
                                            <option selected>Sélection</option>
                                            <option value="1">2010</option>
                                            <option value="2">2011</option>
                                            <option value="3">2012</option>
                                            <option value="4">2013</option>
                                            <option value="5">2014</option>
                                            <option value="6">2015</option>
                                            <option value="7">2016</option>
                                            <option value="8">2017</option>
                                            <option value="9">2018</option>
                                            <option value="10">2019</option>
                                            <option value="11">2020</option>
                                            <option value="12">2021</option>
                                            <option value="13">2022</option>
                                            <option value="14">2023</option>
                                            <option value="15">2024</option>
                                            <option value="16">2025</option>
                                            <option value="17">2026</option>
                                            <option value="18">2027</option>
                                            <option value="19">2028</option>
                                            <option value="20">2029</option>
                                            <option value="21">2030</option>
                                        </select>
                                        <label for="yearsCalendar">Année</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col mt-3 text-align-center table-responsive">
                        <table class="table table-bordered table-striped">
                            <caption>Calendrier</caption>
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Lundi</th>
                                    <th scope="col">Mardi</th>
                                    <th scope="col">Mercredi</th>
                                    <th scope="col">Jeudi</th>
                                    <th scope="col">Vendredi</th>
                                    <th scope="col">Samedi</th>
                                    <th scope="col">Dimanche</th>
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
</body>
</html>