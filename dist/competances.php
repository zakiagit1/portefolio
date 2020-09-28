<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link rel="stylesheet" href="css/main.css">
    <title>Welcome To My Portfolio</title>
</head>
<style>


/*---cerles chart-competances----*/

.competances{
display: flex;
flex-direction: row;
margin-left: 40px;
//margin-top: 100px;
justify-content: space-between;
//padding-top: 50px;


  
}

.circle-chart__circle {
  animation: circle-chart-fill 2s reverse; /* 1 */ 
  transform: rotate(-90deg); /* 2, 3 */
  transform-origin: center; /* 4 */
}



.circle-chart__circle--negative {
  transform: rotate(-90deg) scale(1,-1); /* 1, 2, 3 */
}

.circle-chart__info {
  animation: circle-chart-appear 2s forwards;
  opacity: 0;
  transform: translateY(0.3em);
}

@keyframes circle-chart-fill {
  to { stroke-dasharray: 0 100; }
}

@keyframes circle-chart-appear {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Layout styles only, not needed for functionality */
html {
  font-family: sans-serif;
  padding-right: 5em;
  padding-left: 1em;
}

.competances {
 display: grid;
 grid-column-gap: 1em;
  grid-row-gap: 5em;
  grid-template-columns: repeat(1, 1fr);
}

@media (min-width: 31em) {
  .competances {
    grid-template-columns: repeat(4, 1fr);
  }
}





</style>
<body>
 <?php include 'menu.php';?>

    <h1 class="lg-heading">
        Mes Competances
        <span class="text-secondary"></span>
    </h1>
    <h2 class="sm-heading">
        Check out some of my projects...
    </h2>


    <div class="competances">




        <div class="1">
            <h2>HTML</h2>
            <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="200" height="200">
                <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431"
                    cy="16.91549431" r="15.91549431" />
                <circle class="circle-chart__circle" stroke="#00acc1" stroke-width="2" stroke-dasharray="30,100"
                    stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                <g class="circle-chart__info">
                    <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central"
                        text-anchor="middle" font-size="8">30%</text>
                    <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central"
                        text-anchor="middle" font-size="2">Yay 30% progress!</text>
                </g>
            </svg>
        </div>
        <div class="2">
            <h2>CSS</h2>
            <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="200" height="200">
                <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431"
                    cy="16.91549431" r="15.91549431" />
                <circle class="circle-chart__circle" stroke="#00acc1" stroke-width="2" stroke-dasharray="30,100"
                    stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                <g class="circle-chart__info">
                    <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central"
                        text-anchor="middle" font-size="8">30%</text>
                    <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central"
                        text-anchor="middle" font-size="2">Yay 30% progress!</text>
                </g>
            </svg>
        </div>
        <div class="3">
            <h2>JavaScript</h2>

            <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="200" height="200">
                <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431"
                    cy="16.91549431" r="15.91549431" />
                <circle class="circle-chart__circle" stroke="#00acc1" stroke-width="2" stroke-dasharray="30,100"
                    stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                <g class="circle-chart__info">
                    <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central"
                        text-anchor="middle" font-size="8">30%</text>
                    <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central"
                        text-anchor="middle" font-size="2">Yay 30% progress!</text>
                </g>
            </svg>
        </div>
        <div class="4">

            <h2>PHP</h2>

            <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="200" height="200">
                <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431"
                    cy="16.91549431" r="15.91549431" />
                <circle class="circle-chart__circle" stroke="#000" stroke-width="2" stroke-dasharray="30,100"
                    stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                <g class="circle-chart__info">
                    <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central"
                        text-anchor="middle" font-size="8">30%</text>
                    <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central"
                        text-anchor="middle" font-size="2">Yay 30% progress!</text>
                </g>
            </svg>
        </div>
        <div class="5">

            <h2>CMR</h2>

            <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="200" height="200">
                <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431"
                    cy="16.91549431" r="15.91549431" />
                <circle class="circle-chart__circle" stroke="#000" stroke-width="2" stroke-dasharray="30,100"
                    stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                <g class="circle-chart__info">
                    <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central"
                        text-anchor="middle" font-size="8">30%</text>
                    <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central"
                        text-anchor="middle" font-size="2">Yay 30% progress!</text>
                </g>
            </svg>
        </div>
        <div class="6">

            <h2>BOSTRAP</h2>

            <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="200" height="200">
                <circle class="circle-chart__background" stroke="#efefef" stroke-width="2" fill="none" cx="16.91549431"
                    cy="16.91549431" r="15.91549431" />
                <circle class="circle-chart__circle" stroke="#000" stroke-width="2" stroke-dasharray="30,100"
                    stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
                <g class="circle-chart__info">
                    <text class="circle-chart__percent" x="16.91549431" y="15.5" alignment-baseline="central"
                        text-anchor="middle" font-size="8">30%</text>
                    <text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central"
                        text-anchor="middle" font-size="2">Yay 30% progress!</text>
                </g>
            </svg>
        </div>

    </div>
</body>
<script src="js/main.js"></script>

</html>