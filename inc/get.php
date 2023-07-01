<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="form-control">
    <div class="text-center">
        <h5>Codice Fiscale</h5>
    </div>
    <p class="text-center text-muted mb-3">Genera il tuo codice fiscale</p>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="name" class="form-label">Nome: </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Inserisci il tuo nome">
            <small><?= $errors["name"] ?? '' ?></small>
        </div>
        <div class="col-md-4">
            <label for="surname" class="form-label">Cognome: </label>
            <input type="text" name="surname" id="surname" class="form-control" placeholder="Inserisci il tuo cognome">
            <small><?= $errors["surname"] ?? '' ?></small>
        </div>
        <div class="col-md-4">
            <div class="row" id="date">
                <div class="col-md-4">
                    <label for="day" class="form-label">Giorno Nascita</label>
                    <select name="day" id="day" class="form-select">
                        <option value="">---</option>
                        <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                        ?>
                    </select>
                    <small><?= $errors["day"] ?? '' ?></small>
                </div>
                <div class="col-md-4">
                    <label for="month" class="form-label">Mese Nascita</label>
                    <select name="month" id="month" class="form-select">
                        <option value="">---</option>
                        <option value="Gennaio">Gennaio</option>
                        <option value="Febbraio">Febbraio</option>
                        <option value="Marzo">Marzo</option>
                        <option value="Aprile">Aprile</option>
                        <option value="Maggio">Maggio</option>
                        <option value="Giugno">Giugno</option>
                        <option value="Luglio">Luglio</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Settembre">Settembre</option>
                        <option value="Ottobre">Ottobre</option>
                        <option value="Novembre">Novembre</option>
                        <option value="Dicembre">Dicembre</option>
                    </select>
                    <small><?= $errors["month"] ?? '' ?></small>
                </div>
                <div class="col-md-4">
                    <label for="year" class="form-label">Anno Nascita</label>
                    <select name="year" id="year" class="form-select">
                        <option value="">---</option>
                        <?php
                            for ($i = 1920; $i <= 2023; $i++) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                        ?>
                    </select>
                    <small><?= $errors["year"] ?? '' ?></small>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="city" class="form-label">Città di nascita: </label>
            <input type="text" class="form-control" name="city" id="city" placeholder="Città di nascita">
            <small><?= $errors["city"] ?? '' ?></small>
        </div>
        <div class="col-md-6">
            <label for="district" class="form-label">Provincia (sigla):</label>
            <input type="text" class="form-control" name="district" id="district" placeholder="Provincia" maxlength="2">
            <small><?= $errors["district"] ?? '' ?></small>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="gender" class="form-label">Sesso</label>
            <select name="gender" id="gender" class="form-select">
                <option>---Select a gender---</option>
                <option value="F">Femminile</option>
                <option value="M">Maschile</option>
            </select>
            <small><?= $errors["gender"] ?? '' ?></small>
        </div>
    </div>
    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?? '' ?>">
    <div class="row mb-3">
        <div class="col-md-6">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>

</form>