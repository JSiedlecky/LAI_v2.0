<!-- Redirect kiedy nie ma zapytania z angulara -->
<script type="text/javascript">
  if(typeof lai === 'undefined'){
    document.location.href="../";
  }
</script>

<div class="akademiaWrapper">
    <h2 class="text-center col-lg-12">Lokalna Akademia Informatyczna</h2>
    <hr>
    <p class="text-justify col-lg-12">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <section class="akademiaParallax col-lg-12">
        <div class="akademiaParallaxInner">
            <h3 class="text-center"></h3>
        </div>
    </section>
    <section class="akademiaCiscoWWW col-lg-12">
        <div class="akademiaCisco col-lg-6 col-md-10 col-sm-12 col-lg-offset-0 col-md-offset-1 col-sm-offset-0">
            <h2 class="text-center">CISCO</h2>
            <ul class="col-lg-offset-2 col-md-offset-4 col-sm-offset-1">
                <li>Wiedza teoretyczna o sieciach internetowych</li>
                <li>Zajęcoa praktyczne z urządzeniami sieciowymi</li>
                <li>Zarządzanie sieciami komputerowymi</li>
                <li>Certyfikat firmy CISCO</li>
            </ul>
        </div>
        <div class="akademiaWWW col-lg-6 col-md-10 col-sm-12 col-lg-offset-0 col-md-offset-1 col-sm-offset-0">
            <h2 class="text-center">WWW</h2>
            <ul class="col-lg-offset-3 col-md-offset-4 col-sm-offset-1">
                <li>Nowości w HTML5</li>
                <li>Zastosowanie CSS3 w ogranizowaniu wyglądu strony</li>
                <li>Tworzenie grafik dla witryn</li>
                <li>Responsywne serwisy internetowe</li>
            </ul>
        </div>
    </section>
    <section class="akademiaRegister col-lg-12 col-md-12 col-sm-12">
        <a href="#/zgloszenie">
            Zapisz sie na zajęcia
        </a>
    </section>
</div>
<script>
    $(function(){
        var h = $('.akademiaRegister').height();
        $('.akademiaRegister > a').css('line-height',h+"px");
        console.log(h);
    });
</script>
