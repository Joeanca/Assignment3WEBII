<?php
session_start();
if(empty($_SESSION['UserID'])){
    $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
    header("Location:/login.php");
}
require_once('includes/config.php'); 
//include_once('includes/analytics.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About us</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?php 
    include "includes/importStatements.inc.php"; 
    $analyticsInstance = new AnalyticsGateway;
    $getVisits = $analyticsInstance->getVisitsCount();
?>
</head>
<style>
.analytics-table-background{
    text-align:center !important;
}
</style>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <?php include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
    <main class="mdl-layout__content mdl-color--grey-50">
    <div class='mdl-cell mdl-cell--middle mdl-cell--12-col mdl-card__title mdl-color--orange'><h3 class="mdl-card__title-text">Analytics</h3></div>
        <section class="page-content">
            <div class="mdl-grid containerBackground">
              <!-- mdl-cell + mdl-card -->
                    <div class="mdl-grid mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-color--purple-300" >
                        <div class="mdl-cell--12-col mdl-cell--top mdl-color-text--grey-50" style="height:auto;">Total visits</div>
                            <div class="mdl-cell--12-col">
                                <div class="mdl-grid mdl-grid--no-spacing">
                                    <div class="mdl-cell--4-col  mdl-cell--middle" style="text-align:center;">
                                        <i class="mdl-icon-toggle__label material-icons mdl-color-text--grey-50" style="font-size: 2.5em;">beenhere</i>
                                    </div>
                                    <div class="mdl-cell--8-col mdl-cell--middle">
                                    <div class="mdl-grid mdl-grid--no-spacing">
                                        <div class="mdl-cell--middle mdl-cell--12-col mdl-cell--middle mdl-color-text--grey-50" style="text-align:right;">
                                            <h3><span class="count mdl-color-text--grey-50"><?php echo $getVisits[visits]; ?></span></h3>
                                        </div>
                                        <div class="mdl-cell--middle mdl-cell--12-col mdl-cell--middle mdl-color-text--grey-50" style="text-align:right;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-grid mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-color--teal-300" >
                        <div class="mdl-cell--12-col mdl-cell--top mdl-color-text--grey-50" style="height:auto;">Visiting countries </div>
                            <div class="mdl-cell--12-col">
                                <div class="mdl-grid mdl-grid--no-spacing">
                                    <div class="mdl-cell--4-col  mdl-cell--middle" style="text-align:center;">
                                        <i class="mdl-icon-toggle__label material-icons mdl-color-text--grey-50" style="font-size: 2.5em;">flight takeoff</i>
                                    </div>
                                    <div class="mdl-cell--8-col mdl-cell--middle">
                                    <div class="mdl-grid mdl-grid--no-spacing">
                                        <div class="mdl-cell--middle mdl-cell--12-col mdl-cell--middle mdl-color-text--grey-50" style="text-align:right;">
                                            <h3><span class="count mdl-color-text--grey-50"><?php echo $getVisits[uniqueCountries]; ?></span></h3>
                                        </div>
                                        <div class="mdl-cell--middle mdl-cell--12-col mdl-cell--middle mdl-color-text--grey-50" style="text-align:right;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-grid mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-color--grey-500" >
                        <div class="mdl-cell--12-col mdl-cell--top mdl-color-text--grey-50" style="height:auto;">To-Dos </div>
                            <div class="mdl-cell--12-col">
                                <div class="mdl-grid mdl-grid--no-spacing">
                                    <div class="mdl-cell--4-col  mdl-cell--middle" style="text-align:center;">
                                        <i class="mdl-icon-toggle__label material-icons mdl-color-text--grey-50" style="font-size: 2.5em;">assignment</i>
                                    </div>
                                    <div class="mdl-cell--8-col mdl-cell--middle">
                                    <div class="mdl-grid mdl-grid--no-spacing">
                                        <div class="mdl-cell--middle mdl-cell--12-col mdl-cell--middle mdl-color-text--grey-50" style="text-align:right;">
                                            <h3><span class="count mdl-color-text--grey-50"><?php echo $analyticsInstance->getToDo();?></span></h3>
                                        </div>
                                        <div class="mdl-cell--middle mdl-cell--12-col mdl-cell--middle mdl-color-text--grey-50" style="text-align:right;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="mdl-grid mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-color--green-A700" >
                        <div class="mdl-cell--12-col mdl-cell--top mdl-color-text--grey-50" style="height:auto;">Employee messages sent </div>
                            <div class="mdl-cell--12-col">
                                <div class="mdl-grid mdl-grid--no-spacing">
                                    <div class="mdl-cell--4-col  mdl-cell--middle" style="text-align:center;">
                                        <i class="mdl-icon-toggle__label material-icons mdl-color-text--grey-50" style="font-size: 2.5em;">chat bubble outline</i>
                                    </div>
                                    <div class="mdl-cell--8-col mdl-cell--middle">
                                    <div class="mdl-grid mdl-grid--no-spacing">
                                        <div class="mdl-cell--middle mdl-cell--12-col mdl-cell--middle mdl-color-text--grey-50" style="text-align:right;">
                                            <h3><span class="count mdl-color-text--grey-50"><?php echo $analyticsInstance->getMssgs();?></span></h3>
                                        </div>
                                        <div class="mdl-cell--middle mdl-cell--12-col mdl-cell--middle mdl-color-text--grey-50" style="text-align:right;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp" >
                        <div  class="mdl-cell mdl-cell--12-col mdl-cell--middle mdl-grid book-container demo-card-square " style="text-align:center;min-height: 100% !important" >
                            <div class='mdl-cell mdl-cell--12-col mdl-cell--top mdl-card__title-text'>Top 15 Visiting Countries</div>
                            <div class='mdl-cell mdl-cell--12-col mdl-cell--stretch' style="height: 100% !important"><div id="regions_div" style="width: 100%; height: auto;"></div></div>
                            
                        </div>
                     </div>
                    <div id="right-container-analytics"  class="mdl-cell mdl-cell--6-col mdl-grid " style="text-align:center">
                             <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--top book-container demo-card-square " style="text-align:center">
                            <div class='mdl-cell mdl-cell--12-col mdl-card__title-text'>Visits Per Month</div>
                            <div class='mdl-cell mdl-cell--12-col '><div id="chart_div" style="width: 100%; height: auto;"></div></div>
                            
                        </div>
                     </div>
                        <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp  mdl-grid--no-spacing ">

                         <div class="mdl-cell mdl-cell--12-col mdl-cell--top book-container demo-card-square" style="text-align:center">
                        <div class='mdl-cell mdl-cell--12-col mdl-card__title-text'>Country Details</div>
                        <div id="top10books" style="width: 100%; height: auto; text-align:-webkit-center">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height getmdl-select__fullwidth">
                                    <input class="mdl-textfield__input" type="text" id="sample2" value="Belarus" readonly tabIndex="-1">
                                    <label for="sample2">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="sample2" class="mdl-textfield__label">Country</label>
                                    <ul for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu" id="sample3">
                                        <li class="mdl-menu__item" data-val="DE">Germany</li>
                                    </ul>
                                </div>
                            <div class="typo-styles__demo mdl-typography--title" id="help">
                                <p>This is a trial for the text direction</p>
                            </div>
                        </div>
                    </div>
                        </div>
                        
                    </div>
                 
                  
             <div class="mdl-cell mdl-cell--12-col mdl-cell--top book-container demo-card-square">
              <div class=' mdl-color--teal-300 mdl-color-text--grey-50' style="text-align:center; min-height: 50px; font-size: 1.5em;">
                <div style="padding: 20px;">Top 10 Adopted Books</div>
                    <table class="mdl-data-table mdl-js-data-table dl-shadow--2dp" style="width: -webkit-fill-available;">
                      <thead>
                        <tr>
                          <th class="mdl-data-table__cell--non-numeric">Book Cover</th>
                          <th class="mdl-data-table__cell--non-numeric">Title</th>
                          <th>Adoption Qty</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php 
                     $bookList = $analyticsInstance->getTopTenBooks();
                    foreach ($bookList as $book){
                        ?>
                        <tr style="min-height:100px">
                            <td class="mdl-data-table__cell--center analytics-table-background">
                                <img src='book-images/thumb/<?php echo $book['ISBN10'] ?>.jpg'/>
                            </td>
                            <td class="mdl-data-table__cell--non-numeric">
                            <a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect' href="./single-book.php?i10=<?php echo $book['ISBN10']?>">
                            <?php echo $book['Title']?></a></td>
                            <td class="mdl-data-table__cell--numeric" style="color:black"><?php echo $book['adopted'];?></td>
                        </tr>
                <?php ;} ?>  
                </tbody>
            </table>
        </div>
        </div>
    </div>
</section>
</main>
</div>
<?php //echo counter(); ?>
<script type="text/javascript" src="/includes/analyticsFunctions.inc.js"></script>
</body>
</html>
