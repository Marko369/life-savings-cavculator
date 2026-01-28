<div id="calculator-box">
    <script src="<?php echo plugins_url('uplata_postojeci_klijenti.js', __FILE__); ?>" type="module"></script>
    <div class="calculator-container">
        <div class="calculator-page-wrap">
            <div class="calculator-form-wrap">
                <div class="form-left">
                    <div class="form-inner">
                        <div class="form-title-inner">
                            <label for="inputTrenutnoStanjeKli">Vaše trenutno stanje na računu (RSD)</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusKor1" class="button-minus" data-quantity="minus" data-field="rangeTrenutnoStanjeKli">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeTrenutnoStanjeKli"></output>
                                    <input class="range input-group-field" type="range" id="rangeTrenutnoStanjeKli" name="rangeTrenutnoStanjeKli" min="0" max="1500000" value="250000"
                                           step="5000">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusKor1" class="button-plus" data-quantity="plus" data-field="rangeTrenutnoStanjeKli">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="250000" name="rangeTrenutnoStanjeKli" type="text" id="inputTrenutnoStanjeKli" min="0" max="1500000" value="250.000"/>
                                </div>
                            </div>
                            <div class="info-wrap">
                                <p class="link" draggable="false"
                                   data-tooltip="INFO: Stanje možete da vidite u delu MOJ RAČUN)">
                                    <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                         alt=""></p>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputIznosUplateMesKli">Vaša mesečna uplata (rsd)</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusKor2" class="button-minus" data-quantity="minus" data-field="rangeIznosUplateMesKli">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeIznosUplateMesKli"></output>
                                    <input class="range input-group-field" type="range" id="rangeIznosUplateMesKli" name="rangeIznosUplateMesKli" min="500" max="100000" value="5000"
                                           step="100">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusKor2" class="button-plus" data-quantity="plus" data-field="rangeIznosUplateMesKli">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="5000" name="rangeIznosUplateMesKli" type="text" id="inputIznosUplateMesKli" min="0" max="30000" value="5.000"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputGodinaPocetkaUplateKli">Vaše godine na početku uplaćivanja</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusKor3" class="button-minus" data-quantity="minus" data-field="rangeGodinaPocetkaUplateKli">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeGodinaPocetkaUplateKli"></output>
                                    <input class="range input-group-field" type="range" id="rangeGodinaPocetkaUplateKli" name="rangeGodinaPocetkaUplateKli" min="0" max="69" value="45"
                                           step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusKor3" class="button-plus" data-quantity="plus" data-field="rangeGodinaPocetkaUplateKli">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="45" name="rangeGodinaPocetkaUplateKli" type="text" id="inputGodinaPocetkaUplateKli" min="0" max="69" value="45"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputGodinaPovlacenjeKli">Sa koliko godina želite da počnete da povlačite sredstva?</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusKor4" class="button-minus" data-quantity="minus" data-field="rangeGodinaPovlacenjeKli">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeGodinaPovlacenjeKli"></output>
                                    <input class="range input-group-field" type="range" id="rangeGodinaPovlacenjeKli" name="rangeGodinaPovlacenjeKli" min="58" max="70" value="65"
                                           step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusKor4" class="button-plus" data-quantity="plus" data-field="rangeGodinaPovlacenjeKli">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="65" name="rangeGodinaPovlacenjeKli" type="text" id="inputGodinaPovlacenjeKli" min="58" max="70" value="65"/>
                                </div>
                            </div>
                            <div class="info-wrap">
                                <p class="link" draggable="false"
                                   data-tooltip="INFO: Možete da počnete da povlačite sredstva već sa navršenih 58 godina, a najkasnije sa 70 godina.">
                                    <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                         alt=""></p>
                            </div>
                        </div>
                        <div class="form-title-inner">
                            <label for="inputStopaPrinosaKli">Prinos</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusKor5" class="button-minus" data-quantity="minus" data-field="rangeStopaPrinosaKli">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangeStopaPrinosaKli"></output>
                                    <input class="range input-group-field" type="range" id="rangeStopaPrinosaKli" name="rangeStopaPrinosaKli" min="0" max="10" value="5" step="0.01">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusKor5" class="button-plus" data-quantity="plus" data-field="rangeStopaPrinosaKli">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="5" type="text" name="rangeStopaPrinosaKli" id="inputStopaPrinosaKli" min="0" max="10" value="5.00%"/>
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
                            <label for="inputPeriodIsplateGodinamaKli">Koliko dugo želite da vam se isplaćuje privatna penzija? (u godinama)</label>
                        </div>
                        <div class="form-inner-part left">
                            <div class="input-group plus-minus-input">
                                <div class="input-group-button">
                                    <button type="button" id="buttonMinusKor6" class="button-minus" data-quantity="minus" data-field="rangePeriodIsplateGodinamaKli">
                                    </button>
                                </div>
                                <div class="range-wrap">
                                    <output class="bubble" name="rangePeriodIsplateGodinamaKli"></output>
                                    <input class="range input-group-field" type="range" id="rangePeriodIsplateGodinamaKli" name="rangePeriodIsplateGodinamaKli" min="1" max="30" value="10"
                                           step="1">
                                </div>
                                <div class="input-group-button">
                                    <button type="button" id="buttonPlusKor6" class="button-plus" data-quantity="plus" data-field="rangePeriodIsplateGodinamaKli">
                                    </button>
                                </div>
                                <div>
                                    <input class="input" data-value="10" name="rangePeriodIsplateGodinamaKli" type="text" id="inputPeriodIsplateGodinamaKli" min="2" max="30" value="10"/>
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
                                        rezultata.  Budući prinosi mogu biti viši ili niži od prethodno
                                        ostaverenih.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-right">
                    <div class="form-inner">
                        <div class="akumulacija-top">
                            <div class="form-inner-part right">
                                <label for="inputAkumuliranaSumaKli">Akumulirana suma </label>
                                <input type="text" id="inputAkumuliranaSumaKli"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: Ukupna suma na vašem računu, zbir uplata i zarade">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputIznosIsplateMesecnoKli">Iznos isplate (mesečno)</label>
                                <input type="text" id="inputIznosIsplateMesecnoKli"/>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputUkupanIznosIsplacenihSredstavaKli">Ukupan iznos isplaćenih sredstava</label>
                                <input type="text" id="inputUkupanIznosIsplacenihSredstavaKli"/>
                            </div>
                        </div>
                        <div class="akumulacija-bottom">
                            <p>DODATNE INFORMACIJE</p>
                            <div class="form-inner-part right">
                                <label for="inputUlaznaNaknadaKli">Ulazna naknada </label>
                                <input readonly type="text" id="inputUlaznaNaknadaKli"/>
                            </div>
                            <div class="form-inner-part right" style="display:none">
                                <label for="inputPeriodAkumulacijeKli">Period akumulacije</label>
                                <input type="text" id="inputPeriodAkumulacijeKli"/>
                            </div>
                            <div class="form-inner-part right" >
                                <label for="inputUkupnoUplacenoKli">Ukupno uplaćeno</label>
                                <input readonly type="text" id="inputUkupnoUplacenoKli"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: Zbir vaših uplata">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
                                             alt=""></p>
                                </div>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputAkumuliranaTrenutnoKli">Akumulirana suma za trenutno stanje</label>
                                <input readonly type="text" id="inputAkumuliranaTrenutnoKli"/>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputAkumuliranaMesKli">Akumulirana suma za mesečne uplate</label>
                                <input readonly type="text" id="inputAkumuliranaMesKli"/>
                            </div>
                            <div class="form-inner-part right">
                                <label for="inputZaradjenoKli">Zarađeno</label>
                                <input readonly type="text" id="inputZaradjenoKli"/>
                                <div class="info-wrap">
                                    <p class="link" draggable="false"
                                       data-tooltip="INFO: zarađeni iznos od prinosa">
                                        <img src="<?php echo plugins_url('images/info-icon.svg', __FILE__); ?>"
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
                <button type="button" id="btnKli">AŽURIRAJ GRAFIKON</button>
            </div>
            <div class="pie-wrap">
                <div class="pie-inner" id="chartContainerUplataPostojeci"></div>
            </div>
                </div>
            </div>
            
        </div>
    </div>
</div>