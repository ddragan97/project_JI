<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Forum Mercedes</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
        <link rel="shortcut icon" href="favicon.png"/>
    </head>
    <body>
        <div id="frame">
            <?php
                require_once("header.php");
            ?>
            <nav>
                <ul id="navUl">
                    <li><a class="navLiA" href="index.php">Strona główna</a></li>
                    <li><a class="navLiA" href="szukaj.php">Szukaj</a></li>
                    <li><a id="iolog" class="navLiA" href="login.php"></a></li>
                    <li><a id="iorej" class="navLiA" href="rejestracja.php">Rejestracja</a></li>
                    <?php
                        if(isset($_SESSION["czy"]))
                        {
                            echo '
                            <li id="liLogin"><a class="navLiA" href="dodaj.php">Dodatki</a></li>
                            ';
                        }
                    ?>
                </ul>
                
                <?php
                    if(isset($_SESSION["czy"]))
                        {
                ?>

                            <script>

                                var logIO = document.getElementById("iolog");
                                logIO.text="Wyloguj";
                                logIO.href="wyloguj.php";
                                logIO.style.backgroundColor="#333366";

                                var rejIO = document.getElementById("iorej");
                                rejIO.style.visibility="hidden";

                            </script>

                <?php
                        };

                        if(!isset($_SESSION["czy"]))
                        {

                ?>
                            <script>

                                var logIO = document.getElementById("iolog");
                                logIO.text="Zaloguj";
                                logIO.href="login.php";
                                logIO.style.backgroundColor="#424242";

                                var rejIO = document.getElementById("iorej");
                                rejIO.style.visibility="visible";

                            </script>
                <?php
                        };
                ?>

            </nav>
            <main>
                <article id="histM">
                    <h1>Historia marki Mercedes</h1>
                    <p>
                        Historia marki Mercedes-Benz sięga lat 80. XIX wieku, kiedy to niezależnie od siebie Karl Benz i Gottlieb Daimler położyli podwaliny pod rozwój zmotoryzowanego transportu indywidualnego. W grudniu 1883 roku Benz założył w Mannheim firmę Benz & Co., natomiast w listopadzie 1890 roku powstała w Cannstatt spółka Daimler-Motoren-Gesellschaft (DMG) należąca do Gottlieba Daimlera.
                        <br/><br/>
                        By uczynić swoje produkty znanymi i rozpoznawalnymi, obie firmy szukały charakterystycznego znaku towarowego. Najpierw znakami firmowymi były nazwiska samych wynalazców, Benz i Daimler, które gwarantowały pochodzenie oraz jakość silników i pojazdów. Chroniona marka Benz & Cie. nie zmieniła się, a koło zębate w logo z roku 1903 zastąpił w roku 1909 wieniec laurowy otaczający nazwisko Benz. Natomiast produkty Daimler-Motoren-Gesellschaft (DMG) otrzymały na przełomie wieków całkiem nową markę – „Mercedes”. Mercedes to hiszpańskie imię żeńskie, oznaczające łaskę. Takie imię nosiła urodzona w 1889 roku Mercédès Jellinek, córka austriackiego pioniera automobilizmu Emila Jellinka. Jellinek, człowiek nowoczesny i zainteresowany sportem, był wielkim entuzjastą postępu technicznego i samochodów. Był przekonany, że samochód zmieni świat. Już w roku 1897 udał się do Cannstatt i zamówił tam swój pierwszy samochód marki Daimler – pojazd z napędem pasowym i dwucylindrowym silnikiem o mocy 6 KM. W odpowiedzi na wymagania klienta Daimler zbudował model Phönix z zamontowanym z przodu silnikiem 8-konnym. Oba dostarczone we wrześniu 1898 roku automobile były pierwszymi na świecie pojazdami drogowymi z silnikiem czterocylindrowym. Konstrukcję samochodu zaś opracował partner Daimlera, Wilhelm Maybach.
                        <br/><br/>
                        Na początku kwietnia 1900 roku wytwórnia DMG zawarła z Jellinkiem umowę o sprzedaży samochodów i silników Daimlera. Zapadła też decyzja o skonstruowaniu nowego silnika, który miał nosić nazwę „Daimler-Mercedes” – w ten sposób pseudonim Jellinka stał się nazwą produktu. 14 dni później Jellinek zamówił 36 pojazdów za łączną kwotę 550 tys. marek, co przy dzisiejszej wartości pieniądza odpowiada 3 milionom euro. Po kilku tygodniach Jellinek zamówił kolejne 36 pojazdów z silnikami o mocy 8 KM.
                        <br/><br/>
                        Drogi firm Benza i Daimlera zbiegły się na skutek zmian w gospodarce niemieckiej zainicjowanych przez rząd tego kraju w trakcie trwania I wojny światowej. Oba przedsiębiorstwa, które dotąd konkurowały ze sobą w dziedzinie budowy silników oraz karoserii samochodów, zostały związane porozumieniem gwarantującym stabilność ekonomiczną. Oficjalny mariaż nastąpił 28 czerwca 1926 roku, a współpraca w nazwie Daimler-Benz okazała się jedną z najdłuższych w historii motoryzacji. W takim związku obie firmy przetrwały do roku 1998.
                        <br/><br/>
                        Wtedy też niemiecki koncern zdecydował się na wykupienie większości udziałów w amerykańskiej firmie Chrysler. Obie firmy miały zyskać niewątpliwie wielkie korzyści. Daimler-Benz otrzymał możliwość większego dostępu do rynku amerykańskiego zaś Chrysler liczył na udostępnienie zaawansowanej i niezawodnej technologii z której słynęły modele Mercedesa. Alians otrzymał nową nazwę DaimlerChrysler. „Małżeństwo” niemiecko-amerykańskie przetrwało do 14 maja 2007 roku. Ze względu na coraz słabszą kondycję finansową Chryslera, Daimler zdecydował się odsprzedać akcje konsorcjum finansowemu Cerberus. Rozstanie pozwoliło niemieckiej spółce (od teraz Daimler AG – nazwa koncernu, zaś Mercedes-Benz to nazwa jednej z marek wchodzących w jej grupę) ponownie rozjaśnić blask trójramiennej gwiazdy, zaś Chrysler mógł liczyć na spłatę swoich długów.
                        <br/><br/>
                        Od początku swojej działalności niemieckie przedsiębiorstwo starało się budować samochody w oparciu o kilka kluczowych kryteriów: jakość, fascynacja, innowacja i bezpieczeństwo. Nic więc dziwnego, że za produkty, które z dumą mogą obnosić się takimi walorami klienci są w stanie zapłacić więcej niż przeciętnie u innych producentów.
                        <br/><br/>
                        Dzisiejsza kolekcja obejmuje zbiór 550 pojazdów. Wśród nich jest 350 samochodów osobowych, 140 aut wyścigowych i 60 pojazdów użytkowych marki Mercedes-Benz oraz jej poprzedniczek: Benz i Daimler.
                        <br/><br/>
                        19 maja 2006 roku w Stuttgarcie otwarto muzeum marki Mercedes. Na początku 2015 roku Mercedes-Benz zmienił oznaczenia niektórych modeli oraz silników. Wszystkie pojazdy sportowo-użytkowe swoją nazwę zaczynają od GL, a wszystkie modele coupe od CL. Mercedes-Benz klasy M przemianowany został na GLE. Oznaczenia silników CDI zmienione zostaną na D, a BlueTEC Plug-In Hybrid będą oznaczone literą E. Przy okazji zmieniono też nazwy AMG na Mercedes-AMG oraz Maybach na Mercedes-Maybach.
                        <br/><br/>
                        Według raportu BrandZ Top 100 opracowywanego corocznie przez firmę analityczną Millward Brown znak handlowy Mercedesa warty jest obecnie 21,535 mld dolarów. To trzeci wynik spośród wszystkich firm motoryzacyjnych na świecie.
                    </p>
                    <br/><br/><br/>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/Pf7fU_o0ugY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </article>
            </main>
            <footer>
                <p>Designed by DD</p>
                <hr>
                <p>@Projekt WSIiZ</p>
            </footer>
        </div>
    </body>
</html>