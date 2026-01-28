<div id="calculator-box">
    <script src="<?php echo plugins_url('mesecne_uplate.js', __FILE__); ?>" type="module"></script>

        <div class="calculator-page-wrap">
            <div class="calculator-form-wrap">
                <div class="form-left">
                    <div class="form-inner">
                        <div class="form-title-inner">
                            <label for="inputIznosUplateClanaMes">Vaša mesečna uplata (RSD)</label>
                        </div>
                        <div class="form-inner-part left">

                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusMes1" class="button-minus" data-quantity="minus"
                                            data-field="rangeIznosUplateClanaMes">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeIznosUplateClanaMes" id="specialIdrangeIznosUplateClanaMes"></output>
                                    <input class="range input-group-field" type="range" id="rangeIznosUplateClanaMes"
                                           name="rangeIznosUplateClanaMes"
                                           min="500"
                                           max="100000" value="5000"
                                           step="100">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusMes1" class="button-plus" data-quantity="plus"
                                            data-field="rangeIznosUplateClanaMes">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="5000" type="text" id="inputIznosUplateClanaMes" min="200"
                                           name="rangeIznosUplateClanaMes"
                                           max="30000" value="5000"/>
                                </div>
                            </div>

                        </div>
                        <div class="form-title-inner">
                            <label for="inputIznosUplatePoslodavcaMes">Iznos mesečne uplate poslodavca (RSD)</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusMes2" class="button-minus" data-quantity="minus"
                                            data-field="rangeIznosUplatePoslodavcaMes">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeIznosUplatePoslodavcaMes"></output>
                                    <input class="range input-group-field" type="range"
                                           id="rangeIznosUplatePoslodavcaMes"
                                           name="rangeIznosUplatePoslodavcaMes"
                                           min="0" max="100000"
                                           value="0" step="100">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusMes2" class="button-plus" data-quantity="plus"
                                            data-field="rangeIznosUplatePoslodavcaMes">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="0" type="text" id="inputIznosUplatePoslodavcaMes" min="200"
                                           max="30000" name="rangeIznosUplatePoslodavcaMes"
                                           value="0"/>
                                </div>
                            </div>

                            <div class="info-wrap">
                                <p class="link" draggable="false"
                                   data-tooltip="INFO: Opciono, ako vam i poslodavac uplaćuje">
                                    <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>" // ZAMENJENO
                                         alt=""></p>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputGodinaPocetkaUplateMes">Vaše godine na početku uplaćivanja </label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusMes3" class="button-minus" data-quantity="minus"
                                            data-field="rangeGodinaPocetkaUplateMes">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeGodinaPocetkaUplateMes"></output>
                                    <input class="range" type="range" id="rangeGodinaPocetkaUplateMes"
                                           name="rangeGodinaPocetkaUplateMes" min="0"
                                           max="69" value="30"
                                           step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusMes3" class="button-plus" data-quantity="plus"
                                            data-field="rangeGodinaPocetkaUplateMes">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="30" type="text" name="rangeGodinaPocetkaUplateMes"
                                           id="inputGodinaPocetkaUplateMes" min="0"
                                           max="69" value="30"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputGodinaPovlacenjeMes">Sa koliko godina želite da počnete da povlačite
                                sredstva? </label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusMes4" class="button-minus" data-quantity="minus"
                                            data-field="rangeGodinaPovlacenjeMes">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeGodinaPovlacenjeMes"></output>
                                    <input class="range input-group-field" type="range" id="rangeGodinaPovlacenjeMes"
                                           name="rangeGodinaPovlacenjeMes"
                                           min="58"
                                           max="70" value="60"
                                           step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusMes4" class="button-plus" data-quantity="plus"
                                            data-field="rangeGodinaPovlacenjeMes">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="60" name="rangeGodinaPovlacenjeMes" type="text"
                                           id="inputGodinaPovlacenjeMes" min="58"
                                           max="70" value="60"/>
                                </div>
                            </div>
                            <div class="info-wrap">
                                <p class="link" draggable="false"
                                   data-tooltip="INFO: Možete da počnete da povlačite sredstva već sa navršenih 58 godina, a najkasnije sa 70 godina.">
                                    <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>" // ZAMENJENO
                                         alt=""></p>
                            </div>

                        </div>
                        <div class="form-title-inner">
                            <label for="inputStopaPrinosaMes">Prinos </label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusMes5" class="button-minus" data-quantity="minus"
                                            data-field="rangeStopaPrinosaMes">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeStopaPrinosaMes"></output>
                                    <input class="range input-group-field" type="range" id="rangeStopaPrinosaMes"
                                           name="rangeStopaPrinosaMes"
                                           min="0"
                                           max="10"
                                           value="5" step="0.01">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusMes5" class="button-plus" data-quantity="plus"
                                            data-field="rangeStopaPrinosaMes">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="5" name="rangeStopaPrinosaMes" type="text"
                                           id="inputStopaPrinosaMes"
                                           min="0" max="10" value="5.00%"/>
                                </div>
                            </div>
                            <div class="info-wrap info-fix">
                              <div class="info-icon">
<div class="elementor-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M21.6667 10.8333C21.6667 16.8164 16.8164 21.6667 10.8333 21.6667C4.85025 21.6667 0 16.8164 0 10.8333C0 4.85025 4.85025 0 10.8333 0C16.8164 0 21.6667 4.85025 21.6667 10.8333ZM10.8333 17.0625C11.282 17.0625 11.6458 16.6987 11.6458 16.25V9.75C11.6458 9.30128 11.282 8.9375 10.8333 8.9375C10.3846 8.9375 10.0208 9.30128 10.0208 9.75V16.25C10.0208 16.6987 10.3846 17.0625 10.8333 17.0625ZM10.8333 5.41667C11.4317 5.41667 11.9167 5.9017 11.9167 6.5C11.9167 7.0983 11.4317 7.58333 10.8333 7.58333C10.235 7.58333 9.75 7.0983 9.75 6.5C9.75 5.9017 10.235 5.41667 10.8333 5.41667Z" fill="#E02726"></path></svg></div>
</div>
<div class="info-box"><p>INFO: <?php echo do_shortcode( '[elementor-template id="3027"]' ); ?></p></div>
                            </div>

                        </div>
                        <div class="form-title-inner">
                            <label for="inputPeriodIsplateGodinamaMes">Koliko dugo želite da vam se isplaćuje
                                privatna penzija? (u godinama) </label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusMes6" class="button-minus" data-quantity="minus"
                                            data-field="rangePeriodIsplateGodinamaMes">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangePeriodIsplateGodinamaMes"></output>
                                    <input class="range input-group-field" type="range"
                                           id="rangePeriodIsplateGodinamaMes"
                                           name="rangePeriodIsplateGodinamaMes"
                                           min="1" max="30"
                                           value="10"
                                           step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusMes6" class="button-plus" data-quantity="plus"
                                            data-field="rangePeriodIsplateGodinamaMes">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="10" name="rangePeriodIsplateGodinamaMes" type="text"
                                           id="inputPeriodIsplateGodinamaMes" min="2" max="30"
                                           value="10"/>
                                </div>
                            </div>

                        </div>
                        <div class="calculator-description">
                            <p class="vrednosti">Vrednosti u kalkulatoru su prikazane sa
                                već uračunatim svim naknadama!</p>
                            <ul>
                                <li>
                                    <p>Možete da uplaćujete za sebe ili za druge</p>
                                </li>
                                <li>
                                    <p>Možete da uplaćujete i za maloletna lica</p>
                                </li>
                                <li>
                                    <p>Prethodno ostvareni prinosi ne predstavljaju garanciju budućih
                                        rezultata. Budući prinosi mogu biti viši ili niži od prethodno
                                        ostvarenih.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-right">
                    <div class="form-inner">
                        <div class="akumulacija-top">
                            <div class="form-inner-part right">
                                <label for="inputAkumuliranaSumaMes">Akumulirana suma </label>
                                <div>
                                    <input type="text" id="inputAkumuliranaSumaMes"/>
                                </div>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: Ukupna suma na vašem računu, zbir uplata i zarade">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>" // ZAMENJENO
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputIznosIsplateMesecnoMes">Iznos isplate (mesečno) </label>
                                <div>
                                    <input type="text" id="inputIznosIsplateMesecnoMes"/>
                                </div>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputUkupanIznosIsplacenihSredstavaMes">Ukupan iznos isplaćenih
                                    sredstava </label>
                                <div>
                                    <input type="text" id="inputUkupanIznosIsplacenihSredstavaMes"/>
                                </div>
                            </div>
                        </div>
                        <div class="akumulacija-bottom">
                            <p>DODATNE INFORMACIJE</p>
                            <div class="form-inner-part right bottom-flex">
                                <label for="inputUlaznaNaknadaClanaMes">Ulazna naknada za uplatu člana </label>
                                <input readonly type="text" id="inputUlaznaNaknadaClanaMes"/>
                            </div>
                            <div class="form-inner-part right bottom-flex">
                                <label for="inputUlaznaNaknadaPoslodavcaMes">Ulazna naknada za uplatu
                                    poslodavca </label>
                                <input readonly type="text" id="inputUlaznaNaknadaPoslodavcaMes"/>
                            </div>
                            <div class="form-inner-part right bottom-flex" style="display: none;">
                                <label for="inputPeriodAkumulacijeMes">Period akumulacije (u godinama) </label>
                                <input type="text" id="inputPeriodAkumulacijeMes"/>
                            </div>
                            <div class="form-inner-part right bottom-flex" >
                                <label for="inputUkupnoUplacenoClanaMes">Ukupno uplaćeno od strane člana </label>
                                <input readonly type="text" id="inputUkupnoUplacenoClanaMes"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: Zbir vaših uplata">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>" // ZAMENJENO
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right bottom-flex">
                                <label for="inputUkupnoUplacenoPoslodavcaMes">Ukupno uplaćeno od strane
                                    poslodavca </label>
                                <input readonly type="text" id="inputUkupnoUplacenoPoslodavcaMes"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: Zbir uplata poslodavca">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>" // ZAMENJENO
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right bottom-flex">
                                <label for="inputAkumuliranaSumaClanaMes">Akumulirana suma (za uplate člana) </label>
                                <input type="text" id="inputAkumuliranaSumaClanaMes"/>
                            </div>
                            <div class="form-inner-part right bottom-flex">
                                <label for="inputAkumuliranaSumaPoslodavcaMes">Akumulirana suma (za uplate
                                    poslodavca) </label>
                                <input type="text" id="inputAkumuliranaSumaPoslodavcaMes"/>
                            </div>
                            <div class="form-inner-part right bottom-flex">
                                <label for="inputZaradjenoMes">Zarađeno </label>
                                <input readonly type="text" id="inputZaradjenoMes"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: zarađeni iznos od prinosa">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>" // ZAMENJENO
                                             alt=""></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-description right-box">
                        <p><span>*</span>Kalkulacija je informativnog karaktera, prethodno ostvareni prinosi ne
                            predstavljaju garanciju budućih rezultata. Budući prinosi mogu biti viši ili niži od
                            ranijih.
                        </p>
                        <p><span>*</span>Povlačenje sredstava može početi najranije sa navršenih 58 godina starosti a
                            najkasnije sa navršenih 70 godina</p>
                    </div>
					 <div class="btn-wrap">
                        <button type="button" id="btnMesecno">AŽURIRAJ GRAFIKON</button>
                    </div>
                    <div class="pie-wrap">
                        <div class="pie-inner" id="chartContainer"></div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
