<?php require "head.php" ?>
    <title>AAAA Quero que a header do calendário fique assim</title>
</head>
<style>

    .wrap-date {
        background-color: yellow;
        text-align: center;
    }

    .next-event-text {
        padding: 40px 30px 40px 10px;
        background-color: yellow;
    }

    .date {
        padding: 40px;
    }
</style>
<body>

<div class="section-calendar">
    <div class="container calendar-header">
        <div class="row">
            <div class="col-md-4 col-lg-3 wrap-calendar-date">
                <div class="wrap-date t-center">
                    <span class="date">
                        25<br>
                        <strong>Ter</strong>
</span>
                    
                </div>
            </div>

            <div class="col-md-8 col-lg-9 wrap-next-event">
                <span class="next-event-text ab-l-m">
                    <strong>Próximo evento:</strong> Terça, dia 25 de Junho.
                </span>
            </div>
        </div>
    </div>
</div>
</body>
</html>