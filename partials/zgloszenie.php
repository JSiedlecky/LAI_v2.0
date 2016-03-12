<div class="zgloszenieHeader">
    <h2>Zgłoszenie</h2>
    <p> Karta zgłoszenia uczestnika szkolenia w module CISCO i Tworzenia Witryn WWW. </p>
</div>
    <hr>
<form class="zgloszenieFormularz form-horizontal" ng-submit="onSub()" novalidate>
    <div class="zgloszenieTopFormPanel">
        <div class="zgloszenieTopForm col-lg-8 col-md-12">
            <div class="form-group col-lg-12">
                <label for="imie" class="col-lg-3 control-label">Imię: </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="imie" placeholder="Jan">
                </div>
            </div>
            <div class="form-group col-lg-12">
                <label for="nazwisko" class="col-lg-3 control-label">Nazwisko: </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nazwisko" placeholder="Kowalski">
                </div>
            </div>
            <div class="form-group col-lg-12">
                <label for="emial" class="col-lg-3 control-label">E-mail: </label>
                <div class="col-lg-9">
                    <input type="email" class="form-control" name="emial" placeholder="jankowalski@wp.pl">
                </div>
            </div>
            <div class="form-group col-lg-12">
                <label for="telefon" class="col-lg-3 control-label">Telefon kontaktowy: </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="telefon" placeholder="123-456-789">
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
                     <select class="form-control" name="model">
                         <option value="cisco">CISCO</option>
                         <option value="aplikacje">Tworzenie Witryn WWW</option>
                     </select>
                </div>
            </div>
            <div class="form-group col-lg-4 col-md-12">
                <label for="lata" class="col-lg-4 control-label">Tryb zajęć: </label>
                <div class="col-lg-8">
                     <select class="form-control" name="lata">
                         <option value="rok">4 semestry/rok</option>
                         <option value="dwalata">4 semestry/2 lata</option>
                     </select>
                </div>
            </div>
            <div class="form-group col-lg-4 col-md-12">
                <label for="dni" class="col-lg-4 control-label">Zajęcia w:</label>
                <div class="col-lg-8">
                     <select class="form-control" name="dni">
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
                    <textarea class="form-control" rows="10"></textarea>
                </div>
            </div>
        </div>
        <div class="zgloszenieBtns col-lg-12">
            <input type="button" name="send" value="Wyślij zgłoszenie" id="sendBtn">
            <input type="reset" name="reset" value="Reseuj formularz" id="resetBtn">
        </div>
    </div>

</form>
