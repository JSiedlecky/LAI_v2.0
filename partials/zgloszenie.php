<!-- Redirect kiedy nie ma zapytania z angulara -->
<script type="text/javascript">
  if(typeof lai === 'undefined'){
    document.location.href="../";
  }
</script>

<div class="zgloszenieHeader">
    <h2>Zgłoszenie</h2>
    <p> Karta zgłoszenia uczestnika szkolenia w module CISCO i Tworzenia Witryn WWW. </p>
</div>
    <hr>
<div ng-controller="zgloszenieCtrl">
    <form
          id="zgloszenieFormularz"
          class="zgloszenieFormularz form-horizontal"
          ng-submit="onSub()"
          novalidate name="zgloszenieForm">
        <div class="zgloszenieTopFormPanel">
            <div class="zgloszenieTopForm col-lg-8 col-md-12">
                <div class="form-group col-lg-12">
                    <label for="imie" class="col-lg-3 control-label">Imię: </label>
                    <div class="col-lg-9">
                        <input type="text"
                               ng-model="user.name"
                               ng-pattern="/^[A-Za-z\u0104\u0106\u0118\u0141\u0143\u00D3\u015A\u0179\u017B\u0105\u0107\u0119\u0142\u0144\u00F3\u015B\u017A\u017C]{1,}$/"
                               ng-pattern-err-type="badName"
                               class="form-control"
                               name="imie"
                               placeholder="Jan"
                               required>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label for="nazwisko" class="col-lg-3 control-label">Nazwisko: </label>
                    <div class="col-lg-9">
                        <input type="text"
                               ng-model="user.surname"
                               ng-pattern="/^[A-Za-z\u0104\u0106\u0118\u0141\u0143\u00D3\u015A\u0179\u017B\u0105\u0107\u0119\u0142\u0144\u00F3\u015B\u017A\u017C-]{1,}$/"
                               ng-pattern-err-type="badSurname"
                               class="form-control"
                               name="nazwisko"
                               placeholder="Kowalski"
                               required>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label for="email" class="col-lg-3 control-label">E-mail: </label>
                    <div class="col-lg-9">
                        <input type="email"
                        ng-model="user.mail"
                        class="form-control"
                        name="email"
                        placeholder="jankowalski@wp.pl"
                         required>
                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <label for="telefon" class="col-lg-3 control-label">Telefon kontaktowy: </label>
                    <div class="col-lg-9">
                        <input ng-model="user.phone"
                               ng-pattern="/\d{1,}/"
                               ng-pattern-err-type="badPhone"
                               type="text"
                               class="form-control"
                               name="telefon"
                               placeholder="+48 123-456-789"
                               required>
                    </div>
                </div>
            </div>
            <div class="zgloszeniePanel col-lg-4 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Panel title</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="zgloszenieBotForm col-lg-12">
            <div class="row">
                <div class="form-group col-lg-4 col-md-12">
                    <label for="model" class="col-lg-4 control-label">Moduł:</label>
                    <div class="col-lg-8">
                         <select ng-model="user.module" class="form-control" name="model" required>
                             <option value="">Wybierz moduł zajęć</option>
                             <option value="cisco">CISCO</option>
                             <option value="aplikacje">Tworzenie Witryn WWW</option>
                         </select>
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-12">
                    <label for="lata" class="col-lg-4 control-label">Tryb zajęć: </label>
                    <div class="col-lg-8">
                         <select ng-disabled="(user.module == 'aplikacje')" ng-model="user.years" class="form-control" name="lata" ng-required="user.module == 'cisco'">
                             <option value="">Wybierz tryb zajęć</option>
                             <option value="rok">4 semestry/rok</option>
                             <option value="dwalata">4 semestry/2 lata</option>
                         </select>
                    </div>
                </div>
                <div class="form-group col-lg-4 col-md-12">
                    <label for="dni" class="col-lg-4 control-label">Zajęcia w:</label>
                    <div class="col-lg-8">
                         <select ng-disabled="(user.module == 'aplikacje')" ng-model="user.days" class="form-control" name="dni" ng-required="user.module == 'cisco'">
                             <option value="">Wybierz dni zajęć</option>
                             <option value="tygodzien">Tygodniu roboczym</option>
                             <option value="weekend">Weekendy</option>
                         </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1">

                </div>
                <div class="form-group col-lg-10 textareaForm">
                    <label for="comment" class="col-lg-12">Informacje dodatkowe: </label>
                    <div class="col-lg-12">
                        <textarea ng-model="user.addInfo" class="form-control" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="zgloszenieBtns col-lg-12">
                <input type="submit" name="send" value="Wyślij zgłoszenie" id="sendBtn">
                <input type="reset" name="reset" value="Czyść formularz" id="resetBtn">
            </div>
        </div>
    </form>
</div>
