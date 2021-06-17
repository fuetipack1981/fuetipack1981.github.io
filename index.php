<?php
$api = [
    'key' => '1620',
    'secret' => '8ed7a968858535999c1733936392a422',
    'flow_url' => 'https://leadrock.com/URL-B98E6-89381'
];

function send_the_order($post, $api)
{
    $params = [
        'flow_url' => $api['flow_url'],
        'user_phone' => $post['phone'],
        'user_name' => $post['name'],
        'other' => $post['other'],
        'ip' => $_SERVER['REMOTE_ADDR'],
        'ua' => $_SERVER['HTTP_USER_AGENT'],
        'api_key' => $api['key'],
        'sub1' => $post['sub1'],
        'sub2' => $post['sub2'],
        'sub3' => $post['sub3'],
        'sub4' => $post['sub4'],
        'sub5' => $post['sub5'],
        'ajax' => 1,
    ];
    $url = 'https://leadrock.com/api/v2/lead/save';

    $trackUrl = $params['flow_url'] . (strpos($params['flow_url'], '?') === false ? '?' : '&') . http_build_query($params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $trackUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    $params['track_id'] = curl_exec($ch);

    $params['sign'] = sha1(http_build_query($params) . $api['secret']);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_exec($ch);
    curl_close($ch);

    header('Location: ' . (empty($post['success_page']) ? 'confirm.html' : $post['success_page']));
}

if (!empty($_POST['phone'])) {
    send_the_order($_REQUEST, $api);
}

if (!empty($_GET)) {
?>
    <script type="text/javascript">
        window.onload = function() {
            let forms = document.getElementsByTagName("form");
            for(let i=0; i<form action="index.php" s.length; i++) {
                let form = forms[i];
                form.setAttribute('action', form.getAttribute('action') + "?<?php echo http_build_query($_GET)?>");
                form.setAttribute('method', 'post');
            }
        };
    </script>
<?php
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="description" content />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Web Leggings</title>
    <link rel="apple-touch-icon" href="apple-touch-icon.png" />
    <link rel="stylesheet" href="styles/main.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>

    <script>
      (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
         m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
     (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
  ym(76651749, "init", {
     clickmap:true,
     trackLinks:true,
     accurateTrackBounce:true,
     webvisor:true
  });
  </script>
    <div class="main-wrapper">
    <div class="mk-wrapper">
      <header class="header">
        <div class="header__hero hero">
          <h1 class="hero__title">Web Leggings<sup> tm</sup></h1>
          <p class="hero__subtitle">
            Una nuova generazione<br> di vestiti modellanti
          </p>
          <ul class="hero__list">
            <li><p>Vita 4-7 cm più sottile</p></li>
            <li><p>Glutei e addome stretti</p></li>
            <li><p>Figura seducente</p></li>
          </ul>
          <div class="hero__numerouno"></div>
          <div class="hero__arrows">
                    <div class="static"></div>
                    <div class="dynamic"></div>
                </div>
        </div>
        <div class="header__price">
          <div class="product">
            <div class="product__discount">
              <img src="images/product-hero.png" alt />
              <div>
                <p>sconto <span> 45%</span></p>
              </div>
            </div>
            <div class="price">
              <p class="offerta">Offerta 2x1</p>
                    <p class="main-price">59,99€</p>
                    <p class="invence">invece di <span>109,99€</span></p>
            </div>
          </div>
        </div>
        <div class="header__timer timer">
          <p class="timer__intime">Sbrigati per acquistare con uno sconto</p>
          <div class="timer__wrap">
            <div class="timer__part"><span class="num t-hour"> 0</span></div>
            <div class="timer__part"><span class="num t-min"> 0</span></div>
            <div class="timer__part"><span class="num t-sec"> 0</span></div>
          </div>
        </div>
        <a href="#order-form" class="mk-button"> acquistare</a>
      </header>
      <section class="section flawless">
        <h2 class="section__title" style="margin-bottom: .2rem;">Aiutiamo le donne a sembrare perfette</h2>
        
        <p class="section__text">
          L'azienda Web Leggings™ produce la biancheria modellante da oltre 15
          anni.
        </p>
        <p class="section__text">
          <strong> Siamo esperti e leader nel mercato.</strong> Nel <script>document.write(new Date().getFullYear())</script>, siamo
          lieti di presentavi la nostra novità: i leggings modellanti che ogni
          donna sogna!
        </p>
      </section>
      <section class="section pros">
        <h2 class="section__title section__title--dark">
          Nascondi i difetti sottolineando i vantaggi
        </h2>
        <ul class="pros__list">
          <li>
            <div class="text">
              <h3>Vita</h3>
              <p>Inserti laterali sottolineano la vita</p>
            </div>
          </li>
          <li>
            <div class="text">
              <h3>Addome</h3>
              <p>Inserto stretto rende l'addome piatto</p>
            </div>
          </li>
          <li>
            <div class="text">
              <h3>Glutei</h3>
              <p>Inserti obliqui modellano i glutei</p>
            </div>
          </li>
          <li>
            <div class="text">
              <h3>Fianchi</h3>
              <p>Il tessuto spesso toglie le "orecchie”</p>
            </div>
          </li>
          <li>
            <div class="text">
              <h3>Gambe</h3>
              <p>Il taglio speciale rende le gambe più sottili</p>
            </div>
          </li>
        </ul>
      </section>
      <section class="section buynow">
        <h2 class="section__title buynow__title">
          Acquista ora, diventa magra domani!
        </h2>
        <ul class="hero__list buynow__list">
          <li><p>Bella figura</p></li>
          <li><p>Figura seducente</p></li>
          <li><p>Sicurezza</p></li>
        </ul>
        <div class="header__price">
          <div class="product">
            <div class="price price--alt">
              <p class="offerta">Offerta 2x1</p>
                    <p class="main-price">59,99€</p>
                    <p class="invence">invece di <span>109,99€</span></p>
            </div>
          </div>
        </div>
        <div class="buynow__chaos">
          <img src="images/product.png" alt class="buynow__product" />
          <div class="hero__numerouno buynow__numerouno"></div>
          <img src="images/buynow-woman.png" alt class="buynow__woman" />
        </div>
        <div class="header__timer timer">
          <p class="timer__intime">Sbrigati per acquistare con uno sconto</p>
          <div class="timer__wrap">
            <div class="timer__part"><span class="num t-hour"> 0</span></div>
            <div class="timer__part"><span class="num t-min"> 0</span></div>
            <div class="timer__part"><span class="num t-sec"> 0</span></div>
          </div>
        </div>
        <a href="#order-form" class="mk-button"> acquistare</a>
      </section>
      <section class="section noanalog">
        <h2 class="section__title">Web Leggings<sup> tm</sup> non ha analoghi</h2>
        <ul class="noanalog__list">
          <li>
            <div class="icon"></div>
            <p>
              <strong> Taglio brevettato</strong> Il materiale sottile e
              resistente nasconde tutti i difetti della figura
            </p>
          </li>
          <li>
            <div class="icon"></div>
            <p>
              <strong> Materiale innovativo TermoFi<sup> tm</sup></strong> Offre
              comfort in qualsiasi tempo
            </p>
          </li>
          <li>
            <div class="icon"></div>
            <p>
              <strong> Stile universale</strong> I leggings sono adatti per
              camminare, fare sport e anche per creare un look casual
            </p>
          </li>
          <li>
            <div class="icon"></div>
            <p>
              <strong> 100% di comfort</strong> Non premono e non lasciano segni
              rossi, e neanche spremono i vasi
            </p>
          </li>
        </ul>
      </section>
      <section class="section reviews">
        <h2 class="section__title section__title--dark">
          Le donne scelgono Web Leggings<sup> tm</sup>
        </h2>
        <div class="reviews__wrap">
          <ul class="reviews__slider">
            <li class="slide">
              <div class="slide__head">
                <img src="images/ava1.png" alt class="slide__ava" />
                <div class="slide__person">
                  <p class="name">Ramona A. <span class="date"> 44047</span></p>
                  <div class="rating"></div>
                </div>
              </div>
              <div class="slide__image">
                <img src="images/review1.jpg" alt />
              </div>
              <p class="slide__text">
                Questi sono i migliori pantaloni modellanti! Prima non credevo
                che un tale materiale potesse stringere qualcosa. Ma quando li
                ho messi, sono stata impazzita, quindi sembro più sottile di una
                taglia e mezzo o anche due. Ragazze, consiglio a tutte voi!
              </p>
            </li>
            <li class="slide">
              <div class="slide__head">
                <img src="images/ava2.png" alt class="slide__ava" />
                <div class="slide__person">
                  <p class="name">Tira l. <span class="date"> 44047</span></p>
                  <div class="rating"></div>
                </div>
              </div>
              <div class="slide__image">
                <img src="images/review2.jpg" alt />
              </div>
              <p class="slide__text">
                Snelliscono perfettamente! Confortevoli, ben cuciti, il
                materiale è piacevole al corpo. Grazie per la qualità del
                prodotto. Ne prenderò un altro paio.
              </p>
            </li>
            <li class="slide">
              <div class="slide__head">
                <img src="images/ava3.png" alt class="slide__ava" />
                <div class="slide__person">
                  <p class="name">Maria C. <span class="date"> 44047</span></p>
                  <div class="rating"></div>
                </div>
              </div>
              <div class="slide__image">
                <img src="images/review3.jpg" alt />
              </div>
              <p class="slide__text">
                I leggings sono molto comodi, si sentono come una seconda pelle.
                Mi piace un sacco che il materiale sia traspirante, non fanno
                caldo quando si sta a +30. Ma anche siamo andati in montagna per
                il fine settimana, lì la sera la temperatura è di 13 gradi, e mi
                sentivo comodissima! Beh, rendono la mia figura impeccabile!
              </p>
            </li>
            <li class="slide">
              <div class="slide__head">
                <img src="images/ava4.png" alt class="slide__ava" />
                <div class="slide__person">
                  <p class="name">Donna S. <span class="date"> 44047</span></p>
                  <div class="rating"></div>
                </div>
              </div>
              <div class="slide__image">
                <img src="images/review4.jpg" alt />
              </div>
              <p class="slide__text">
                I leggings mi sono piaciuti molto. Ottimi per stringere i
                glutei. Il mio fidanzato mi ha chiesta: "Tesoro, dove hai preso
                quel culo?", LOL
              </p>
            </li>
            <li class="slide">
              <div class="slide__head">
                <img src="images/ava5.png" alt class="slide__ava" />
                <div class="slide__person">
                  <p class="name">Sara <span class="date"> 44047</span></p>
                  <div class="rating"></div>
                </div>
              </div>
              <div class="slide__image">
                <img src="images/review5.jpg" alt />
              </div>
              <p class="slide__text">
                Tutto quello che voglio dire è che indosso questi leggings con
                piacere e anche posso entrare nei jeans di 2 taglie meno.
                L'effetto è incredibile, sono molto felice!
              </p>
            </li>
            <li class="slide">
              <div class="slide__head">
                <img src="images/ava6.png" alt class="slide__ava" />
                <div class="slide__person">
                  <p class="name">Miss E. <span class="date"> 44047</span></p>
                  <div class="rating"></div>
                </div>
              </div>
              <div class="slide__image">
                <img src="images/review6.jpg" alt />
              </div>
              <p class="slide__text">
                La qualità è incredibile! Sottili, il tessuto è setoso,
                resistente ed elastico. Si siedono perfettamente, la mia
                Web Leggings diventa molto bella, senza lati appesi, tutte le
                curve sono lisce. Sono rimasta 100% contenta dell'acquisto e ne
                voglio ordinare un paio di più. Le cose buone scompaiono
                rapidamente dal mercato.
              </p>
            </li>
          </ul>
          <p class="reviews__slides">
            <span class="slideCurrent">1</span>/<span class="slidesTotal"
              >0</span
            >
          </p>
        </div>
      </section>
      <section class="section order">
        <h2 class="section__title">Consegna e pagamento</h2>
        <ul class="order__list">
          <li><p>Lascia una richiesta sul sito</p></li>
          <li><p>Attendi la chiamata del manager</p></li>
          <li><p>Paga l'ordine alla consegna</p></li>
        </ul>
        <img src="images/product.png" alt class="order__product" />
      </section>
      <section class="service">
        <p class="service__text">
          Consegna senza contatto<br />
          100% garanzia di qualità<br />
          Pagamento alla consegna
        </p>
      </section>
      <section class="header">
        <div class="header__hero hero">
          <h1 class="hero__title">Web Leggings<sup> tm</sup></h1>
          <p class="hero__subtitle">
            Una nuova generazione di vestiti modellanti
          </p>
          <ul class="hero__list">
            <li><p>Vita 4-7 cm più sottile</p></li>
            <li><p>Glutei e addome stretti</p></li>
            <li><p>Figura seducente</p></li>
          </ul>
          <div class="hero__numerouno"></div>
          <div class="hero__arrows">
                    <div class="static"></div>
                    <div class="dynamic"></div>
                </div>
        </div>
        <div class="header__price">
          <div class="product">
            <div class="product__discount">
              <img src="images/product-hero.png" alt />
              <div>
                <p>sconto <span> 45%</span></p>
              </div>
            </div>
            <div class="price">
              <p class="offerta">Offerta 2x1</p>
                    <p class="main-price">59,99€</p>
                    <p class="invence">invece di <span>109,99€</span></p>
            </div>
          </div>
        </div>
        <form action="index.php"  action method="POST" class="form" id="order-form">
          <label for="name0">Nome e Cognome</label>
            <input id="name0" type="text" name="name" placeholder="Inserisci Nome e Cognome" required>
            <label for="phone0">Telefono (Meglio Cellulare)</label>
            <input id="phone0" type="tel" name="phone" placeholder="Inserisci il tuo numero di telefono" required>
            <label for="address0">Indirizzo e n. civico</label>
            <input id="address0" type="text" name="other[address]" placeholder="ES. Via Aldo moro, 130" required>
            <label for="city0">Città</label>
            <input id="city0" type="text" name="other[city]" placeholder="ES. Milano" required>
            <label for="zip0">CAP</label>
            <input id="zip0" type="text" name="other[zipcode]" placeholder="ES. 94112" required>
            <label for="sel0">Scegli un'offerta</label>
            <select name="other[quantity]" id="sel0" required>
                <option selected value="2">2 Web Leggins 59.99€</option> 
                <option value="4">4 Web Leggins 99.90€</option>
            </select>
            <p class="sped">La spedizione è gratis!</p>
            <label for="notes0">Note per il corriere</label>
            <input id="notes0" type="text" name="other[notes]" placeholder="ES. Citofonare al Sig. Rossi" >


        <input type="hidden" name="sub1" value="{subid}">
</form>
        <div class="header__timer timer">
          <p class="timer__intime">Sbrigati per acquistare con uno sconto</p>
          <div class="timer__wrap">
            <div class="timer__part"><span class="num t-hour"> 0</span></div>
            <div class="timer__part"><span class="num t-min"> 0</span></div>
            <div class="timer__part"><span class="num t-sec"> 0</span></div>
          </div>
        </div>
        <div class="form__button">
          <button form="order-form" class="mk-button" type="submit">
            Acquistare
          </button>
        </div>
        <img src="images/secure.png" alt class="header__secure" />
      </section>
      <footer class="footer">
        <p class="footer__text">
          PETREARTE PLC, 73B Lake Valley Rd, office A, Singapore 248373<br /><a href="policy_it.html" target="_blank">
            Informativa sulla privacy</a
          >
        </p>
      </footer>
    </div>
  </div>
   
    <script src="scripts/vendor.js"></script>
    <script src="scripts/main.js"></script>
    <script>
      $('.feedback').click(function () {
          $('.popup-window').show();
      });
      $('.close-popup').click(function () {
          $('.popup-window').hide();
      });
  </script>
 
  <script type="text/javascript" src="https://cdn.ldrock.com/additionals.js?geo=IT"></script>
  <script type="text/javascript" src="https://cdn.ldrock.com/validator.js"></script>
<script type="text/javascript">
    LeadrockValidator.init({
        geo: {
            iso_code: 'IT'
        }
    });
</script>
</body>
</html>
